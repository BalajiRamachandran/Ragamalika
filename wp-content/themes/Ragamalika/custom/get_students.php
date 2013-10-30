<?php
	include dirname(__FILE__) . '/../../../../wp-load.php';
	// ini_set('error_reporting', E_ALL);
	require get_template_directory() . '/custom/class/class.xml.php';
	$xml = new xml();
	global $wpdb;
	$total_pages = "1";
	//ragamalika_cformssubmissions
	ob_start();
	ob_end_clean();
	if ( ! isset($_GET['debug'])) {
		if ( stristr($_SERVER["HTTP_ACCEPT"],"application/xhtml+xml") ) {
			header("Content-type: application/xhtml+xml;charset=utf-8"); 
		} else {
			header("Content-type: text/xml;charset=utf-8");
		}	
	}

	$page = $_REQUEST['page']; // get the requested page
	$limit = $_REQUEST['rows']; // get how many rows we want to have into the grid
	$sidx = $_REQUEST['sidx']; // get index row - i.e. user click to sort
	$sord = $_REQUEST['sord']; // get the direction

	if(!$sidx) {
		$sidx =1;
	}



	$totalrows = isset($_REQUEST['totalrows']) ? $_REQUEST['totalrows']: false;
	if($totalrows) {$limit = $totalrows;}

	if ($page > $total_pages) $page=$total_pages;
	$start = $limit*$page - $limit; // do not put $limit*($page - 1)
	if ($start<0) $start = 0;

	if ( isset($_GET['action'])) {
		$action = $_GET['action'];
	}
	if ( isset($_GET['id'])) {
		$id = $_GET['id'];
	}
	if ( !empty ( $action) && !empty($action)) {
		process_action ( $id,  $action);
	}


	$where = '';
	$order = "";
	if ( !empty ( $sidx) ) {
		$order = "ORDER BY $sidx ";
	}
	$sql = "SELECT SQL_CALC_FOUND_ROWS b.* from ragamalika_cformssubmissions as b, ragamalika_cformsdata as c $where GROUP BY b.id $order $sord LIMIT $start, $limit;";
	$students = $wpdb->get_results($sql, OBJECT);
	$students_data = array();
	foreach ($students as $key ) {
		$key->meta = get_metadata_by_sid ( $key->id );
		$students_data[] = $key;
	}

	$students_data['arga']['sql'] = $sql;
	$students_data['arga']['limit'] = $limit;

	echo $xml->generate_valid_xml_from_array ( $students_data);

	function process_action ( $id, $action ) {
		global $xml;
		$ids = explode(',', $id);
		foreach ($ids as $id ) {
			switch ($action) {
				case 'approved':
					echo $xml->generate_valid_xml_from_array(approve_student ( $id ));
					break;
				
				default:
					# code...
					break;
			}

		}
	}

	function Strip($value)
	{
		if(get_magic_quotes_gpc() != 0)
	  	{
	    	if(is_array($value))  
				if ( array_is_associative($value) )
				{
					foreach( $value as $k=>$v)
						$tmp_val[$k] = stripslashes($v);
					$value = $tmp_val; 
				}				
				else  
					for($j = 0; $j < sizeof($value); $j++)
	        			$value[$j] = stripslashes($value[$j]);
			else
				$value = stripslashes($value);
		}
		return $value;
	}

	function array_is_associative ($array)
	{
	    if ( is_array($array) && ! empty($array) )
	    {
	        for ( $iterator = count($array) - 1; $iterator; $iterator-- )
	        {
	            if ( ! array_key_exists($iterator, $array) ) { return true; }
	        }
	        return ! array_key_exists(0, $array);
	    }
	    return false;
	}
	function constructWhere($s){
	    $qwery = "";
		//['eq','ne','lt','le','gt','ge','bw','bn','in','ni','ew','en','cn','nc']
	    $qopers = array(
					  'eq'=>" = ",
					  'ne'=>" <> ",
					  'lt'=>" < ",
					  'le'=>" <= ",
					  'gt'=>" > ",
					  'ge'=>" >= ",
					  'bw'=>" LIKE ",
					  'bn'=>" NOT LIKE ",
					  'in'=>" IN ",
					  'ni'=>" NOT IN ",
					  'ew'=>" LIKE ",
					  'en'=>" NOT LIKE ",
					  'cn'=>" LIKE " ,
					  'nc'=>" NOT LIKE " );
	    if ($s) {
	        $jsona = json_decode($s,true);
	        if(is_array($jsona)){
				$gopr = $jsona['groupOp'];
				$rules = $jsona['rules'];
	            $i =0;
	            foreach($rules as $key=>$val) {
	                $field = $val['field'];
	                $op = $val['op'];
	                $v = $val['data'];
					if($v && $op) {
		                $i++;
						// ToSql in this case is absolutley needed
						$v = ToSql($field,$op,$v);
						if ($i == 1) $qwery = " AND ";
						else $qwery .= " " .$gopr." ";
						switch ($op) {
							// in need other thing
						    case 'in' :
						    case 'ni' :
						        $qwery .= $field.$qopers[$op]." (".$v.")";
						        break;
							default:
						        $qwery .= $field.$qopers[$op].$v;
						}
					}
	            }
	        }
	    }
	    return $qwery;
	}


	function getStringForGroup( $group )
	{
		$i_='';
		$sopt = array('eq' => "=",'ne' => "<>",'lt' => "<",'le' => "<=",'gt' => ">",'ge' => ">=",'bw'=>" {$i_}LIKE ",'bn'=>" NOT {$i_}LIKE ",'in'=>' IN ','ni'=> ' NOT IN','ew'=>" {$i_}LIKE ",'en'=>" NOT {$i_}LIKE ",'cn'=>" {$i_}LIKE ",'nc'=>" NOT {$i_}LIKE ", 'nu'=>'IS NULL', 'nn'=>'IS NOT NULL');
		// $sopt = array('eq' => "EQUALS",'ne' => "NOT EQUALS",'lt' => "LESS THAN",'le' => "LESS THAN OR EQUAL",'gt' => ">",'ge' => ">=",'bw'=>" {$i_}LIKE ",'bn'=>" NOT {$i_}LIKE ",'in'=>' IN ','ni'=> ' NOT IN','ew'=>" {$i_}LIKE ",'en'=>" NOT {$i_}LIKE ",'cn'=>" {$i_}LIKE ",'nc'=>" NOT {$i_}LIKE ", 'nu'=>'IS NULL', 'nn'=>'IS NOT NULL');
		$s = "(";
		$m_query = array();
		if( isset ($group['groups']) && is_array($group['groups']) && count($group['groups']) >0 )
		{
			for($j=0; $j<count($group['groups']);$j++ )
			{
				if(strlen($s) > 1 ) {
					$s .= " ".$group['groupOp']." ";
				}
				try {
					$dat = getStringForGroup($group['groups'][$j]);
					$s .= $dat;
				} catch (Exception $e) {
					echo $e->getMessage();
				}
			}
		}
		if (isset($group['rules']) && count($group['rules'])>0 ) {
			try{
				foreach($group['rules'] as $key=>$val) {
					if (strlen($s) > 1) {
						$s .= " ".$group['groupOp']." ";
					}
					$field = $val['field'];
					$op = $val['op'];
					$v = $val['data'];
					$tmp = array();
					if ( $field != 'status' ) {
						$tmp['key'] = $field;
						$tmp['value'] = $v;
						$tmp['compare'] = $sopt[$op];						
					}

					if( $op ) {
						switch ($op)
						{
							case 'bw':
							case 'bn':
								$s .= $field.' '.$sopt[$op]."'$v%'";
								break;
							case 'ew':
							case 'en':
								$s .= $field.' '.$sopt[$op]."'%$v'";
								break;
							case 'cn':
							case 'nc':
								$s .= $field.' '.$sopt[$op]."'%$v%'";
								break;
							case 'in':
							case 'ni':
								$s .= $field.' '.$sopt[$op]."( '$v' )";
								break;
							case 'nu':
							case 'nn':
								$s .= $field.' '.$sopt[$op]." ";
								break;
							default :
								$s .= "(" . $field.' '.$sopt[$op]." '$v' )";								
								// echo "<h2>$s</h2>";
								break;
						}
					}
					if ( !empty($tmp) ) {
						array_push($m_query, $tmp);
					}
				}
			} catch (Exception $e) 	{
				echo $e->getMessage();
			}
		}
		return $m_query;
		$s .= ")";
		if ($s == "()") {
			// return array("",$prm); // ignore groups that don't have rules
			return " 1=1 ";
		} else {
			return $s;
		}
	}   
?>