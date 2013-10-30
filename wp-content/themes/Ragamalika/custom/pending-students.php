<?php
	include dirname(__FILE__) . '/../../../../wp-load.php';

	/* Datatable */
	// mysql_connect('localhost', 'root', 'my5ql');
	// mysql_select_db('bramkas');
	$aColumns = array( 'id', 'sub_date', 'email' );
	$otherColumns = array ( 'subject', 'status');

	$othersTable = $table_prefix . "cformsdata";
	
	/* Indexed column (used for fast and accurate table cardinality) */
	$sIndexColumn = "id";
	
	/* DB table to use */
	$sTable = $table_prefix . "cformssubmissions";


	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
	 * no need to edit below this line
	 */
	
	/* 
	 * Local functions
	 */
	function fatal_error ( $sErrorMessage = '' )
	{
		header( $_SERVER['SERVER_PROTOCOL'] .' 500 Internal Server Error' );
		die( $sErrorMessage );
	}

	/* 
	 * Paging
	 */
	$sLimit = "";
	if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
	{
		$sLimit = "LIMIT ".intval( $_GET['iDisplayStart'] ).", ".
			intval( $_GET['iDisplayLength'] );
	}
	
	
	/*
	 * Ordering
	 */
	$sOrder = "";
	if ( isset( $_GET['iSortCol_0'] ) )
	{
		$sOrder = "ORDER BY  ";
		for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
		{
			if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
			{
				$sOrder .= "`".$aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."` ".
				 	mysql_real_escape_string( $_GET['sSortDir_'.$i] ) .", ";
			}
		}
		
		$sOrder = substr_replace( $sOrder, "", -2 );
		if ( $sOrder == "ORDER BY" )
		{
			$sOrder = "";
		}
	}
	
	
	/* 
	 * Filtering
	 * NOTE this does not match the built-in DataTables filtering which does it
	 * word by word on any field. It's possible to do here, but concerned about efficiency
	 * on very large tables, and MySQL's regex functionality is very limited
	 */
	$sWhere = "";
	if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
	{
		$sWhere = "WHERE (";
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" )
			{
				$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ";
			}
		}
		$sWhere = substr_replace( $sWhere, "", -3 );
		$sWhere .= ')';
	}
	
	/* Individual column filtering */
	for ( $i=0 ; $i<count($aColumns) ; $i++ )
	{
		if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
		{
			if ( $sWhere == "" )
			{
				$sWhere = "WHERE ";
			}
			else
			{
				$sWhere .= " AND ";
			}
			$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($_GET['sSearch_'.$i])."%' ";
		}
	}
	
	
	/*
	 * SQL queries
	 * Get data to display
	 */
	$sQuery = "
		SELECT SQL_CALC_FOUND_ROWS * 
		FROM   $sTable
		$sWhere
		$sOrder
		$sLimit
		";
	$rResult = mysql_query( $sQuery ) or fatal_error( __LINE__ . ']MySQL Error: ' . mysql_errno() . mysql_error() . $sQuery);
	
	/* Data set length after filtering */
	$sQuery = "
		SELECT FOUND_ROWS()
	";
	$rResultFilterTotal = mysql_query( $sQuery ) or fatal_error(  __LINE__ . ']MySQL Error: ' . mysql_errno() . $sQuery );
	$aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
	$iFilteredTotal = $aResultFilterTotal[0];
	
	/* Total data set length */
	$sQuery = "
		SELECT COUNT(`".$sIndexColumn."`)
		FROM   $sTable
	";
	$rResultTotal = mysql_query( $sQuery ) or fatal_error(  __LINE__ . ']MySQL Error: ' . mysql_errno() . $sQuery);
	$aResultTotal = mysql_fetch_array($rResultTotal);
	$iTotal = $aResultTotal[0];
	
	
	/*
	 * Output
	 */
	$output = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);
	$student_details = '';
	while ( $aRow = mysql_fetch_array( $rResult ) )
	{
		// print_r($aRow);
		$row = array();
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( $aColumns[$i] == 'id' )
			{
				// print_r($aRow[ $aColumns[$i] ]);
				// $row[] = "<input type='checkbox' name='student' id='s" . $aRow[ $aColumns[$i] ] . "'/>";
				$row[] = $aRow[ $aColumns[$i] ];
				$student_details = get_student_details ($aRow[ $aColumns[$i] ]);
				// $row[] = "<a href='" . get_stylesheet_directory_uri() . '/custom/show-students.php?id=' . $aRow[ $aColumns[$i] ] ."' class='student_info'>" . $aRow[ $aColumns[$i] ] . "</a>";
			}
			else if ( $aColumns[$i] != ' ' )
			{
				/* General output */
				$row[] = $aRow[ $aColumns[$i] ];
			} 
			else {
				// echo '<p>' . $aColumns[$i] . '==' . in_array($aColumns[$i], $aRow) . '</p>';
			}

		}
		for ( $i=0 ; $i<count($otherColumns) ; $i++ )
		{
			if ( ! in_array($otherColumns[$i], $aRow) )
			{
				// $row[] = 	get_value_from_table ( $aColumns[$i], 'Select One');
				if ( isset($student_details->$otherColumns[$i]) && $student_details->$otherColumns[$i] != '' ) {
					$row[] = $student_details->$otherColumns[$i];
				} else {
					$row[] = 'Select One';
				}
			} 
			else 
			{
				$row[] = $aRow[ $otherColumns[$i] ];
			}

		}
		$output['aaData'][] = $row;
	}
	
	echo json_encode( $output );

function get_value_from_table ( $fieldName, $default ) {
	return $default;
}
function get_student_details ( $id ) {
	global $table_prefix;
	$sql_query = "SELECT field_name, field_val from " . $table_prefix . "cformsdata where sub_id = " . $id;
	$rResult = mysql_query( $sql_query ) or fatal_error(  __LINE__ . ']MySQL Error: ' . mysql_errno() . mysql_error());
	$row = array();
	$x = new stdClass();
	while ( $aRow = mysql_fetch_object( $rResult ) )
	{
		// $row[] = $aRow;

		$x->{$aRow->field_name}=$aRow->field_val;
		// $row[] = $aRow;
	}
	$rows = $x;
	// print_r($rows);
	return $rows;
}
?>