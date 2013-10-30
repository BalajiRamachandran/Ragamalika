<?php 

require ( dirname(__FILE__) . '/../../../../../wp-load.php');

// Custom fields for WP write panel
// This code is protected under Creative Commons License: http://creativecommons.org/licenses/by-nc-nd/3.0/


//Featured Image Settings

$bizz_metaboxes = array(
		"image" => array (
			"name"		=> "image",
			"default" 	=> "",
			"label" 	=> "Custom Slider Image Location",
			"type" 		=> "text",
			"desc"      => "Enter full path for image to use in the featured slider. (including <code>http://</code>)"
		),
		"url" => array (
			"name"		=> "url",
			"default" 	=> "",
			"label" 	=> "Custom Slider Image Destination",
			"type" 		=> "text",
			"desc"      => "Enter full URL where the image should link to. (including <code>http://</code>)"
		),
		"button1name" => array (
			"name"		=> "button1name",
			"default" 	=> "",
			"label" 	=> "Slider Button 1 Name",
			"type" 		=> "text",
			"desc"      => "Enter name for button 1, displayed below slider page content"
		),
		"button1url" => array (
			"name"		=> "button1url",
			"default" 	=> "",
			"label" 	=> "Custom Button 1 Destination",
			"type" 		=> "text",
			"desc"      => "Enter full URL where button1 should link to. (including <code>http://</code>)"
		),
		"button2name" => array (
			"name"		=> "button2name",
			"default" 	=> "",
			"label" 	=> "Slider Button 2 Name",
			"type" 		=> "text",
			"desc"      => "Enter name for button 2, displayed below slider page content"
		),
		"button2url" => array (
			"name"		=> "button2url",
			"default" 	=> "",
			"label" 	=> "Custom Button 2 Destination",
			"type" 		=> "text",
			"desc"      => "Enter full URL where button12 should link to. (including <code>http://</code>)"
		),
	);
	
$bizz_metaboxes_post = array(
		"image" => array (
			"name"		=> "image",
			"default" 	=> "",
			"label" 	=> "Custom Thumbnail Image Location",
			"type" 		=> "text",
			"desc"      => "Enter full path for image to use as thumbnail in blog posts/menu list. (including <code>http://</code>)"
		),
	);
	
function bizzthemes_meta_box_content() {
	global $post, $bizz_metaboxes;
	echo ''."\n";
	foreach ($bizz_metaboxes as $bizz_metabox) {
		$bizz_metaboxvalue = get_post_meta($post->ID,$bizz_metabox["name"],true);
		if ($bizz_metaboxvalue == "" || !isset($bizz_metaboxvalue)) {
			$bizz_metaboxvalue = $bizz_metabox['default'];
		}
		echo "\t".'<div>';
		echo "\t\t".'<br/><p><strong><label for="'.$bizz_metabox.'">'.$bizz_metabox['label'].':</label></strong></p>'."\n";
		echo "\t\t".'<p><input size="100" type="'.$bizz_metabox['type'].'" value="'.$bizz_metaboxvalue.'" name="bizzthemes_'.$bizz_metabox["name"].'" id="'.$bizz_metabox.'"/></p>'."\n";
		echo "\t\t".'<p><span style="font-size:11px">'.$bizz_metabox['desc'].'</span></p>'."\n";	
		echo "\t".'</div>'."\n";
	}
	echo ''."\n\n";
}

function bizzthemes_meta_box_content_post() {
	global $post, $bizz_metaboxes_post;
	echo ''."\n";
	foreach ($bizz_metaboxes_post as $bizz_metabox) {
		$bizz_metaboxvalue = get_post_meta($post->ID,$bizz_metabox["name"],true);
		if ($bizz_metaboxvalue == "" || !isset($bizz_metaboxvalue)) {
			$bizz_metaboxvalue = $bizz_metabox['default'];
		}
		echo "\t".'<div>';
		echo "\t\t".'<br/><p><strong><label for="'.$bizz_metabox.'">'.$bizz_metabox['label'].':</label></strong></p>'."\n";
		echo "\t\t".'<p><input size="100" type="'.$bizz_metabox['type'].'" value="'.$bizz_metaboxvalue.'" name="bizzthemes_'.$bizz_metabox["name"].'" id="'.$bizz_metabox.'"/></p>'."\n";
		echo "\t\t".'<p><span style="font-size:11px">'.$bizz_metabox['desc'].'</span></p>'."\n";	
		echo "\t".'</div>'."\n";
	}
	echo ''."\n\n";
}

function bizzthemes_metabox_insert($pID) {
	global $bizz_metaboxes;
	foreach ($bizz_metaboxes as $bizz_metabox) {
		$var = "bizzthemes_".$bizz_metabox["name"];
		if (isset($_POST[$var])) {			
			if( get_post_meta( $pID, $bizz_metabox["name"] ) == "" )
				add_post_meta($pID, $bizz_metabox["name"], $_POST[$var], true );
			elseif($_POST[$var] != get_post_meta($pID, $bizz_metabox["name"], true))
				update_post_meta($pID, $bizz_metabox["name"], $_POST[$var]);
			elseif($_POST[$var] == "")
				delete_post_meta($pID, $bizz_metabox["name"], get_post_meta($pID, $bizz_metabox["name"], true));
		}
	}
}

function bizzthemes_metabox_insert_post($pID) {
	global $bizz_metaboxes_post;
	foreach ($bizz_metaboxes_post as $bizz_metabox) {
		$var = "bizzthemes_".$bizz_metabox["name"];
		if (isset($_POST[$var])) {			
			if( get_post_meta( $pID, $bizz_metabox["name"] ) == "" )
				add_post_meta($pID, $bizz_metabox["name"], $_POST[$var], true );
			elseif($_POST[$var] != get_post_meta($pID, $bizz_metabox["name"], true))
				update_post_meta($pID, $bizz_metabox["name"], $_POST[$var]);
			elseif($_POST[$var] == "")
				delete_post_meta($pID, $bizz_metabox["name"], get_post_meta($pID, $bizz_metabox["name"], true));
		}
	}
}

function bizzthemes_meta_box() {
	if ( function_exists('add_meta_box') ) {
		add_meta_box('bizzthemes-settings',$GLOBALS['themename'].' Custom Slider Settings','bizzthemes_meta_box_content','page','normal','high');
	}
}

function bizzthemes_meta_box_post() {
	if ( function_exists('add_meta_box') ) {
		add_meta_box('bizzthemes-settings',$GLOBALS['themename'].' Custom Thumbnail Settings','bizzthemes_meta_box_content_post','post','normal','high');
	}
}

add_action('admin_menu', 'bizzthemes_meta_box');
add_action('wp_insert_post', 'bizzthemes_metabox_insert');

add_action('admin_menu', 'bizzthemes_meta_box_post');
add_action('wp_insert_post', 'bizzthemes_metabox_insert_post');


//Custom taxonomy // only works for WP 2.8

add_action( 'init', 'create_bizzthemes_taxonomies', 0 );

function create_bizzthemes_taxonomies() {
	register_taxonomy( 'menu_price', 'post', array( 'hierarchical' => false, 'label' => 'Menu Price', 'query_var' => true, 'rewrite' => true ) );

}

// Excerpt length

function bm_better_excerpt($length, $ellipsis) {
$text = get_the_content();
$text = strip_tags($text);
$text = substr($text, 0, $length);
$text = substr($text, 0, strrpos($text, " "));
$text = $text.$ellipsis;
return $text;
}

// Relative dates

function relativeDate($posted_date) {
    
    $tz = 0;    // change this if your web server and weblog are in different timezones
                // see project page for instructions on how to do this
    
    $month = substr($posted_date,4,2);
    
    if ($month == "02") { // february
    	// check for leap year
    	$leapYear = isLeapYear(substr($posted_date,0,4));
    	if ($leapYear) $month_in_seconds = 2505600; // leap year
    	else $month_in_seconds = 2419200;
    }
    else { // not february
    // check to see if the month has 30/31 days in it
    	if ($month == "04" or 
    		$month == "06" or 
    		$month == "09" or 
    		$month == "11")
    		$month_in_seconds = 2592000; // 30 day month
    	else $month_in_seconds = 2678400; // 31 day month;
    }
  
/* 
some parts of this implementation borrowed from:
http://maniacalrage.net/archives/2004/02/relativedatesusing/ 
*/
  
    $in_seconds = strtotime(substr($posted_date,0,8).' '.
                  substr($posted_date,8,2).':'.
                  substr($posted_date,10,2).':'.
                  substr($posted_date,12,2));
    $diff = time() - ($in_seconds + ($tz*3600));
    $months = floor($diff/$month_in_seconds);
    $diff -= $months*2419200;
    $weeks = floor($diff/604800);
    $diff -= $weeks*604800;
    $days = floor($diff/86400);
    $diff -= $days*86400;
    $hours = floor($diff/3600);
    $diff -= $hours*3600;
    $minutes = floor($diff/60);
    $diff -= $minutes*60;
    $seconds = $diff;

    if ($months>0) {
        // over a month old, just show date ("Month, Day Year")
        echo ''; the_time('F jS, Y');
    } else {
        if ($weeks>0) {
            // weeks and days
            $relative_date .= ($relative_date?', ':'').$weeks.' '.get_option('bizzthemes_relative_week').''.($weeks>1?''.get_option('bizzthemes_relative_s').'':'');
            $relative_date .= $days>0?($relative_date?', ':'').$days.' '.get_option('bizzthemes_relative_day').''.($days>1?''.get_option('bizzthemes_relative_s').'':''):'';
        } elseif ($days>0) {
            // days and hours
            $relative_date .= ($relative_date?', ':'').$days.' '.get_option('bizzthemes_relative_day').''.($days>1?''.get_option('bizzthemes_relative_s').'':'');
            $relative_date .= $hours>0?($relative_date?', ':'').$hours.' '.get_option('bizzthemes_relative_hour').''.($hours>1?''.get_option('bizzthemes_relative_s').'':''):'';
        } elseif ($hours>0) {
            // hours and minutes
            $relative_date .= ($relative_date?', ':'').$hours.' '.get_option('bizzthemes_relative_hour').''.($hours>1?''.get_option('bizzthemes_relative_s').'':'');
            $relative_date .= $minutes>0?($relative_date?', ':'').$minutes.' '.get_option('bizzthemes_relative_minute').''.($minutes>1?''.get_option('bizzthemes_relative_s').'':''):'';
        } elseif ($minutes>0) {
            // minutes only
            $relative_date .= ($relative_date?', ':'').$minutes.' '.get_option('bizzthemes_relative_minute').''.($minutes>1?''.get_option('bizzthemes_relative_s').'':'');
        } else {
            // seconds only
            $relative_date .= ($relative_date?', ':'').$seconds.' '.get_option('bizzthemes_relative_minute').''.($seconds>1?''.get_option('bizzthemes_relative_s').'':'');
        }
        
        // show relative date and add proper verbiage
    	echo ''.get_option('bizzthemes_relative_posted').' '.$relative_date.' '.get_option('bizzthemes_relative_ago').'';
    }
    
}

function isLeapYear($year) {
        return $year % 4 == 0 && ($year % 400 == 0 || $year % 100 != 0);
}

    if(!function_exists('how_long_ago')){
        function how_long_ago($timestamp){
            $difference = time() - $timestamp;

            if($difference >= 60*60*24*365){        // if more than a year ago
                $int = intval($difference / (60*60*24*365));
                $s = ($int > 1) ? ''.get_option('bizzthemes_relative_s').'' : '';
                $r = $int . ' '.get_option('bizzthemes_relative_year').'' . $s . ' '.get_option('bizzthemes_relative_ago').'';
            } elseif($difference >= 60*60*24*7*5){  // if more than five weeks ago
                $int = intval($difference / (60*60*24*30));
                $s = ($int > 1) ? ''.get_option('bizzthemes_relative_s').'' : '';
                $r = $int . ' '.get_option('bizzthemes_relative_month').'' . $s . ' '.get_option('bizzthemes_relative_ago').'';
            } elseif($difference >= 60*60*24*7){        // if more than a week ago
                $int = intval($difference / (60*60*24*7));
                $s = ($int > 1) ? ''.get_option('bizzthemes_relative_s').'' : '';
                $r = $int . ' '.get_option('bizzthemes_relative_week').'' . $s . ' '.get_option('bizzthemes_relative_ago').'';
            } elseif($difference >= 60*60*24){      // if more than a day ago
                $int = intval($difference / (60*60*24));
                $s = ($int > 1) ? ''.get_option('bizzthemes_relative_s').'' : '';
                $r = $int . ' '.get_option('bizzthemes_relative_day').'' . $s . ' '.get_option('bizzthemes_relative_ago').'';
            } elseif($difference >= 60*60){         // if more than an hour ago
                $int = intval($difference / (60*60));
                $s = ($int > 1) ? ''.get_option('bizzthemes_relative_s').'' : '';
                $r = $int . ' '.get_option('bizzthemes_relative_hour').'' . $s . ' '.get_option('bizzthemes_relative_ago').'';
            } elseif($difference >= 60){            // if more than a minute ago
                $int = intval($difference / (60));
                $s = ($int > 1) ? ''.get_option('bizzthemes_relative_s').'' : '';
                $r = $int . ' '.get_option('bizzthemes_relative_minute').'' . $s . ' '.get_option('bizzthemes_relative_ago').'';
            } else {                                // if less than a minute ago
                $r = ''.get_option('bizzthemes_relative_moments').' '.get_option('bizzthemes_relative_ago').'';
            }

            return $r;
        }
    }

/*
Plugin Name: WP-PageNavi 
Plugin URI: http://www.lesterchan.net/portfolio/programming.php 
*/ 

function wp_pagenavi($before = '', $after = '', $prelabel = '', $nxtlabel = '', $pages_to_show = 5, $always_show = false) {

	global $request, $posts_per_page, $wpdb, $paged;
	if(empty($prelabel)) {
		$prelabel  = '<strong>&laquo;</strong>';
	}
	if(empty($nxtlabel)) {
		$nxtlabel = '<strong>&raquo;</strong>';
	}
	$half_pages_to_show = round($pages_to_show/2);
	if (!is_single()) {
		if(is_tag()) {
			preg_match('#FROM\s(.*)\sGROUP BY#siU', $request, $matches);		
		} elseif (!is_category()) {
			preg_match('#FROM\s(.*)\sORDER BY#siU', $request, $matches);	
		} else {
			preg_match('#FROM\s(.*)\sGROUP BY#siU', $request, $matches);		
		}
		$fromwhere = $matches[1];
		$numposts = $wpdb->get_var("SELECT COUNT(DISTINCT ID) FROM $fromwhere");
		$max_page = ceil($numposts /$posts_per_page);
		if(empty($paged)) {
			$paged = 1;
		}
		if($max_page > 1 || $always_show) {
			echo "$before <div class='Navi'>";
			if ($paged >= ($pages_to_show-1)) {
				echo '<a href="'.get_pagenum_link().'">&laquo; '.get_option('bizzthemes_pagination_first_name').'</a>';
			}
			previous_posts_link($prelabel);
			for($i = $paged - $half_pages_to_show; $i  <= $paged + $half_pages_to_show; $i++) {
				if ($i >= 1 && $i <= $max_page) {
					if($i == $paged) {
						echo "<strong class='on'>$i</strong>";
					} else {
						echo ' <a href="'.get_pagenum_link($i).'">'.$i.'</a> ';
					}
				}
			}
			next_posts_link($nxtlabel, $max_page);
			if (($paged+$half_pages_to_show) < ($max_page)) {
				echo '<a href="'.get_pagenum_link($max_page).'">'.get_option('bizzthemes_pagination_last_name').' &raquo;</a>';
			}
			echo "</div> $after";
		}
	}
}

// Use Noindex for sections specified in theme admin

function bizzthemes_noindex_head() { 

    if ((is_category() && get_option('bizzthemes_noindex_category')) ||
	    (is_tag() && get_option('bizzthemes_noindex_tag')) ||
		(is_day() && get_option('bizzthemes_noindex_daily')) ||
		(is_month() && get_option('bizzthemes_noindex_monthly')) ||
		(is_year() && get_option('bizzthemes_noindex_yearly')) ||
		(is_author() && get_option('bizzthemes_noindex_author')) ||
		(is_search() && get_option('bizzthemes_noindex_search'))) {

		$meta_string .= '<meta name="robots" content="noindex,follow" />';
	}
	
	echo $meta_string;
	
}

add_action('wp_head', 'bizzthemes_noindex_head');


////////////////////////////////////////
function _cat_rows1( $parent = 0, $level = 0, $categories, &$children, $page = 1, $per_page = 20, &$count )
{
	//global $category_array;
	$start = ($page - 1) * $per_page;
	$end = $start + $per_page;
	ob_start();

	foreach ( $categories as $key => $category ) 
	{
		if ( $count >= $end )
			break;

		$_GET['s']='';
		if ( $category->parent != $parent && empty($_GET['s']) )
			continue;

		// If the page starts in a subtree, print the parents.
		if ( $count == $start && $category->parent > 0 ) {
			$my_parents = array();
			$p = $category->parent;
			while ( $p ) {
				$my_parent = get_category( $p );
				$my_parents[] = $my_parent;
				if ( $my_parent->parent == 0 )
					break;
				$p = $my_parent->parent;
			}

			$num_parents = count($my_parents);
			while( $my_parent = array_pop($my_parents) ) {
				$category_array[] = _cat_rows1( $my_parent, $level - $num_parents );
				$num_parents--;
			}
		}

		if ($count >= $start)
		{
			$categoryinfo = array();
			$category = get_category( $category, '', '' );
			$default_cat_id = (int) get_option( 'default_category' );
			$pad = str_repeat( '&#8212; ', max(0, $level) );
			$name = ( $name_override ? $name_override : $pad . ' ' . $category->name );
			$categoryinfo['ID'] = $category->term_id;
			$categoryinfo['name'] = $name;
			$category_array[] = $categoryinfo;
		}

		unset( $categories[ $key ] );
		$count++;
		if ( isset($children[$category->term_id]) )
			_cat_rows1( $category->term_id, $level + 1, $categories, $children, $page, $per_page, $count );
	}
	$output = ob_get_contents();
	ob_end_clean();
	return $category_array;
}
		
function getCategoryList( $parent = 0, $level = 0, $categories = 0, $page = 1, $per_page = 1000 ) 
{
	$count = 0;
	if ( empty($categories) ) 
	{
		$args = array('hide_empty' => 0,'orderby'=>'id');
			
		$categories = get_categories( $args );
		if ( empty($categories) )
			return false;
	}		
	$children = _get_term_hierarchy('category');
	return _cat_rows1( $parent, $level, $categories, $children, $page, $per_page, $count );
}


function is_sub_category($parentid)
{
	$child_category = array();
	$child_category = get_term_children( $parentid ,'category');
	$child_category[] = $parentid;
	
	if($child_category)
	{
		foreach($child_category as $key=>$val)
		{
			if($val != '')
			{
				if(is_category($val))
				{
					return true;
				}
			}
		}
	}
	return false;
}


function generate_id ( $email ) {
	return md5($email);
}

function get_formsdata_fields ( $meta_id, $meta_key ) {

}

function update_cformsdata_fields ($meta_id, $meta_key, $meta_value = '', $force = 'false') {

}

function update_registration_data ($meta_id, $meta_key, $meta_value = '') {
	global $wpdb, $table_prefix;
	$meta_key = stripslashes($meta_key);
	$passed_value = $meta_value;
	$meta_value = stripslashes_deep($meta_value);
	$id_column = 'sub_id';
	$table = $table_prefix . "cformsdata";
	$meta_value = sanitize_meta( $meta_key, $meta_value, $meta_type );
	if ( ! $meta_id = $wpdb->get_var( $wpdb->prepare( "SELECT $id_column FROM $table WHERE field_name = %s AND $id_column = %d", $meta_key, $meta_id ) ) ) {
		return add_registration_meta ($meta_id, $meta_key, $meta_value);
	}
}

function approve_student ( $id ) {
	global $wpdb;
	$wpdb->show_errors();
	$sql = "SELECT a.field_val FROM ragamalika_cformsdata a WHERE a.sub_id = '%d' AND a.field_name LIKE %s";
	$row = $wpdb->get_var($wpdb->prepare($sql, $id, 'Email'));
	if ( !empty ( $row )) {
		$register_id = generate_id($row);
		update_status ( $id, 'Approved' );
		insert_register_id ( $id, $register_id);			

	}
}

function update_status ( $id, $status ) {
	global $wpdb;
	$wpdb->show_errors();
	$sql = "UPDATE ragamalika_cformsdata SET field_val = %s where sub_id = '%d' and field_name = %s";
	if ( $_REQUEST['debug']) {
		echo $wpdb->prepare($sql, $status, $id, 'status');
	}
	$wpdb->query($wpdb->prepare($sql, $status, $id, 'status'));
}

function insert_register_id ($id, $register_id  ) {
	global $wpdb;
	$wpdb->show_errors();

	$sql = "SELECT field_val FROM ragamalika_cformsdata WHERE sub_id = %d AND field_name LIKE 'register_id' AND field_val LIKE %s";

	$row = $wpdb->get_var($wpdb->prepare ( $sql, $id, $register_id));
	
	if ( !empty($row) && $row == $register_id ) {
		// send email
	} elseif ( !empty($row) && $row != $register_id ) {
		//regenerate
		//update
		$sql = "UPDATE ragamalika_cformsdata SET field_val = '%s' WHERE sub_id = %d and field_name = '%s'";
		$row = $wpdb->get_results($wpdb->prepare($sql, $register_id, $id, 'register_id'));
		if ( $row === false ) {
			return false;
		}
	} else {
		//insert
		$sql = "INSERT INTO ragamalika_cformsdata (sub_id, field_name, field_val) VALUES ('%d', %s, %s)";
		if ( $_REQUEST['debug']) {
			echo $wpdb->prepare($sql, $id, 'register_id', $register_id);
		}
		$row = $wpdb->get_results($wpdb->prepare($sql, $id, 'register_id', $register_id));
		if ( $row === false ) {
			return false;
		}
	}

	$sql = "SELECT field_val  FROM ragamalika_cformsdata WHERE sub_id = %d AND field_name LIKE 'Email'";
	$student_email = $wpdb->get_var($wpdb->prepare($sql, $id ));
	if ( $student_email === false ) {
		return false;
	}

	$sql = "SELECT field_val  FROM ragamalika_cformsdata WHERE sub_id = %d AND field_name LIKE 'Your Name'";
	$student_name = $wpdb->get_var($wpdb->prepare($sql, $id ));

	send_notification ( $register_id, $student_email, 'register_id', array ('student_name' => $student_name) );
	return true;
} 


function send_notification ( $code, $to, $action, $options = array() ) {
	add_filter('wp_mail_content_type',create_function('', 'return "text/html";'));
	$blogname = get_option('blogname');
	$blogemail = get_option('admin_email');
	$headers[] = 'Content-type: text/html; charset=iso-8859-1';
	$headers[] = "From: $blogname <${blogemail}>";
	// print_r($blogname);
	$message = get_page_by_title ('Registration Code Email')->post_content;
	$registration_link = get_permalink (get_page_by_title("Registration")->ID);
	$message = str_replace("[##blogname##]", $blogname, $message);
	$message = str_replace("[##admin_email##]", $blogemail, $message);
	$message = str_replace("[##site_url##]", get_option("site_url"), $message);
	$message = str_replace("[##register_id##]", $code, $message);
	$message = str_replace("[##registration_link##]", $registration_link, $message);
	$message = str_replace("[##registration_link_2##]", $registration_link . "?register_id=" . $code, $message);
	$message = str_replace("[##email_logo##]", get_stylesheet_directory_uri() . '/images/email_logo.png', $message);
	foreach ($options as $key => $value) {
		# code...
		$message = str_replace("[##${key}##]", $value, $message);
	}
	// print_r($message);
	// print_r($headers);

	switch ($action) {
		case 'register_id':
			$subject = "Welcome to $blogname";
			break;
		
		default:
			# code...
			$subject = "This is $blogname";
			break;
	}

	wp_mail($to, $subject, $message, $headers);
}


function validate_register_id ( $id ) {
	global $table_prefix;
	$sTable = $table_prefix . "cformsdata";
	$sTableQuery = "SELECT b.field_val from $sTable a, $sTable b ";
	$sTableQuery .= "WHERE a.field_val = '$id' ";
	$sTableQuery .= "and a.field_name = 'register_id' ";
	$sTableQuery .= "and a.sub_id = b.sub_id ";
	$sTableQuery .= "and b.field_name='Email'";
	// print_r($sTableQuery);
	$sTableResult = mysql_query($sTableQuery);
	if ( mysql_num_rows($sTableResult) > 0 ) {
		while ( $sRow = mysql_fetch_object($sTableResult))
		{
			$result = $sRow->field_val;
		}
	} else {
		return 'false';
	}
	return $result;
// select a.sub_id, b.field_val
// from ragamalika_cformsdata a, ragamalika_cformsdata b
// where a.field_val = 'Rejected'
// and a.sub_id = b.sub_id
// and b.field_name = 'Email'

}

function is_auth () {
	if ( is_user_logged_in() ) {
		return 1;
	}
	return 0;
}

class Ragamalika_Walker_Nav_Menu extends Walker_Nav_Menu {
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;           

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		if ( $item->attr_title == 'secured' && is_user_logged_in() ) {
			$item->attr_title = "";

		} elseif ( $item->attr_title == 'secured' && ! is_user_logged_in() ) {
			# code...
			$item->attr_title = "";
			return;
		} elseif ( $item->attr_title == 'admin-only' && ! current_user_can('administrator') ) {
			# code...
			$item->attr_title = "";
			return;
		}

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

                // new addition for active class on the a tag
                if(in_array('current-menu-item', $classes)) {
                    $attributes .= ' class="active"';
                }

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

function get_protocol() {

}

function get_metadata_by_sid( $meta_id ) {
	global $wpdb;

	if ( !$meta_id = absint( $meta_id ) )
		return false;

	$table = 'ragamalika_cformsdata';

	$id_column = 'sub_id';
	$meta = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table WHERE $id_column = %d", $meta_id ) );

	if ( empty( $meta ) )
		return false;
	$metas = array();
	foreach ($meta as $key ) {
		# code...
		$key->field_name = str_replace(" ", "_", $key->field_name);
		$key->field_name = str_replace("ID", "ref_id", $key->field_name);
		$metas[$key->field_name] = maybe_unserialize ( $key->field_val );
	}

	if ( isset( $meta->meta_value ) )
		$meta->meta_value = maybe_unserialize( $meta->meta_value );

	return $metas;
}
function generateRandomString($length = 6, $letters = '1234567890qwertyuiopasdfghjklzxcvbnm'){
	  $s = '';
	  $lettersLength = strlen($letters)-1;
	 
	  for($i = 0 ; $i < $length ; $i++)
	  {
	  $s .= $letters[rand(0,$lettersLength)];
	  }
	 
	return $s;
}	
function ad_new_user_notification($user_id, $plaintext_pass = '', $options = '' ) {
	$user 			= new WP_User($user_id);

	$user_login 	= stripslashes($user->user_login);
	$user_email 	= stripslashes($user->user_email);
	
	if ( empty($plaintext_pass) )
		return;
	
	$message = get_page_by_title ('RegistrationConfirmation')->post_content;

	$message		= str_replace('[##username##]',$user_login, "$message");
	$message		= str_replace('[##user_pass##]',$plaintext_pass, "$message");	
	
	// wp_mail($user_email, sprintf(__('Registration Confirmation: %s'), $blogname), $message, $headers);
	$blogname 		= wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

	// send_notification ($user_email, sprintf(__('Registration Confirmation: %s'), $blogname), $message, $headers );
	$blogname = get_option('blogname');
	$blogemail = get_option('admin_email');
	$headers[] = 'Content-type: text/html; charset=iso-8859-1';
	$headers[] = "From: $blogname <${blogemail}>";
	// print_r($blogname);
	$message = str_replace("[##blogname##]", $blogname, $message);
	$message = str_replace("[##student_name##]", $options['name'], $message);
	$message = str_replace("[##admin_email##]", $blogemail, $message);
	$message = str_replace("[##site_url##]", get_option("site_url"), $message);
	$message = str_replace("[##register_id##]", $code, $message);
	$message = str_replace("[##registration_link##]", $registration_link, $message);
	$message = str_replace("[##registration_link_2##]", $registration_link . "?register_id=" . $code, $message);
	$message = str_replace("[##email_logo##]", get_stylesheet_directory_uri() . '/images/email_logo.png', $message);
	foreach ($options as $key => $value) {
		# code...
		$message = str_replace("[##${key}##]", $value, $message);
	}
	// print_r($message);
	// print_r($headers);

	switch ($action) {
		case 'register_id':
			$subject = "Welcome to $blogname";
			break;
		case 'registration' :
			$subject = "Welcome to $blogname";
			break;
		default:
			# code...
			$subject = "This is $blogname";
			break;
	}

	wp_mail($options['email'], $subject, $message, $headers);
}
add_action('admin_init', 'no_mo_dashboard');
function no_mo_dashboard() {
  if (!current_user_can('manage_options') && $_SERVER['DOING_AJAX'] != '/wp-admin/admin-ajax.php') {
  wp_redirect(home_url()); exit;
  }
}


// function wp_new_user_notification( $user_id, $plaintext_pass = '' ) {
//     // define the functionality of your new function.
// 	$user = new WP_User($user_id);

// 	$user_login = stripslashes($user->user_login);
// 	$user_email = stripslashes($user->user_email);

//     $options['name'] = $user->display_name;

//     ad_new_user_notification ($user_id, $plaintext_pass, $options);
// }
?>