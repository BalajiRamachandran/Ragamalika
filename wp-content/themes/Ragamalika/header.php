<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>
<?php 
  $protocol = "http://";
  if ( is_ssl()) {
    $protocol = "https://";
  }
?>
<?php header('Access-Control-Allow-Origin: *'); ?>
<?php if ( is_home() ) { ?>
<?php bloginfo('description'); ?>
&nbsp;|&nbsp;
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_search() ) { ?>
Search Results&nbsp;|&nbsp;
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_author() ) { ?>
Author Archives&nbsp;|&nbsp;
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_single() ) { ?>
<?php wp_title(''); ?>
<?php } ?>
<?php if ( is_page() ) { ?>
<?php wp_title(''); ?>
<?php } ?>
<?php if ( is_category() ) { ?>
<?php single_cat_title(); ?>
&nbsp;|&nbsp;
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_month() ) { ?>
<?php the_time('F'); ?>
&nbsp;|&nbsp;
<?php bloginfo('name'); ?>
<?php } ?>
<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?>
<?php bloginfo('name'); ?>
&nbsp;|&nbsp;Tag Archive&nbsp;|&nbsp;
<?php single_tag_title("", true); } } ?>
</title>
<link href='http://fonts.googleapis.com/css?family=Yellowtail|Tangerine|Miss+Fajardose' rel='stylesheet' type='text/css'/>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php if (is_home()) { ?>
<?php if ( get_option('bizzthemes_meta_description') <> "" ) { ?>
<meta name="description" content="<?php echo stripslashes(get_option('bizzthemes_meta_description')); ?>" />
<?php } ?>
<?php if ( get_option('bizzthemes_meta_keywords') <> "" ) { ?>
<meta name="keywords" content="<?php echo stripslashes(get_option('bizzthemes_meta_keywords')); ?>" />
<?php } ?>
<?php if ( get_option('bizzthemes_meta_author') <> "" ) { ?>
<meta name="author" content="<?php echo stripslashes(get_option('bizzthemes_meta_author')); ?>" />
<?php } ?>
<?php } ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() . '/library/css/jquery-ui-1.8.21.custom.css'; ?>" media="screen" />

<?php if ( get_option('bizzthemes_favicon') <> "" ) { ?>
<link rel="shortcut icon" type="image/png" href="<?php echo get_option('bizzthemes_favicon'); ?>" />
<?php } ?>
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('bizzthemes_feedburner_url') <> "" ) { echo get_option('bizzthemes_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/library/css/print.css" media="print" /> 

<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/r_fonts_ie.css" /> 
<![endif]-->

<link href="<?php bloginfo('template_directory'); ?>/library/css/bootstrap-css/bootstrap.css" rel="stylesheet"/>
<!-- <link href="<?php bloginfo('template_directory'); ?>/library/css/bootstrap-css/bootstrap-responsive.css" rel="stylesheet"/>
 --><link href="<?php bloginfo('template_directory'); ?>/library/css/bootstrap-css/docs.css" rel="stylesheet"/>

<!--[if lt IE 7]>
<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE7.js" type="text/javascript"></script>
<![endif]-->
<?php if ( get_option('bizzthemes_scripts_header') <> "" ) { echo stripslashes(get_option('bizzthemes_scripts_header')); } ?>
<?php 
  wp_enqueue_script('jquery');
  // wp_deregister_script ( 'jquery');
  // wp_register_script( 'jquery', get_bloginfo('template_directory').'/library/js/jquery.validate.pack.js' );

?>
<?php wp_enqueue_script('jquery-ui-accordion'); ?>
<?php 
  wp_enqueue_script('thickbox');
  wp_enqueue_script('jquery-ui-datepicker');
  wp_enqueue_script('jquery-ui-dialog');
  wp_enqueue_script('jquery-ui-button');
  wp_enqueue_script('jquery-ui-tabs');
  wp_enqueue_script('media-upload');
  

  wp_register_script( 'jquery.validate.pack', get_bloginfo('template_directory').'/library/js/jquery.validate.pack.js' );
  wp_enqueue_script( 'jquery.validate.pack' );
  wp_register_script( 'jquery-ui-min', $protocol . 'ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js' );
  wp_enqueue_script( 'jquery-ui-min' );
  wp_register_script( 'colorbox-js', get_bloginfo('template_directory').'/library/js/colorbox/jquery.colorbox-min.js' );
  wp_enqueue_script( 'colorbox-js' );
  wp_register_script( 'ragamalika-js', get_bloginfo('template_directory').'/library/js/ragamalika.js' );
  wp_enqueue_script( 'ragamalika-js' );
  wp_register_script( 'jquery-masked-input', get_bloginfo('template_directory').'/library/js/masked-input/jquery.maskedinput-1.3.min.js' );
  wp_enqueue_script( 'jquery-masked-input' );
  /* datatables */
  wp_register_script( 'jquery-datatables', $protocol. 'ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.1/jquery.dataTables.min.js' );
  wp_enqueue_script( 'jquery-datatables' );
  wp_register_script( 'jquery-edit-table', get_bloginfo('template_directory').'/library/js/editTable/jquery.jeditable.js' );
  wp_enqueue_script( 'jquery-edit-table' );
  wp_register_script( 'jquery-edit-table-gc', get_bloginfo('template_directory').'/library/js/editTable/jquery.dataTables.editable.js' );
  wp_enqueue_script( 'jquery-edit-table-gc' );
  wp_register_script( 'jquery-ZeroClipboard', get_bloginfo('template_directory').'/library/js/media/js/ZeroClipboard.js' );
  wp_enqueue_script( 'jquery-ZeroClipboard' );
  wp_register_script( 'jquery-tabletools', get_bloginfo('template_directory').'/library/js/editTable/TableTools.js' );
  wp_enqueue_script( 'jquery-tabletools' );
  
?>
    <script type="text/javascript">
      var _STYLESHEETPATH = "<?php echo get_bloginfo('stylesheet_directory');?>";
      var _TEMPLATEPATH = "<?php echo get_stylesheet_uri();?>";
    </script>


<?php if (is_home()) {
	  wp_enqueue_script( 'stepcarousel', get_bloginfo('template_directory').'/library/js/stepcarousel.js', array( 'jquery' ) );
	  wp_enqueue_script( 'stepcarousel-setup', get_bloginfo('template_directory').'/library/js/stepcarousel-setup.js', array( 'jquery' ) );
	}
?>
<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
?>
<?php wp_head(); ?>
<link href="<?php bloginfo('template_directory'); ?>/library/css/colorbox.css" rel="stylesheet" type="text/css" />

<?php if ( get_option('bizzthemes_customcss') ) { ?>
<link href="<?php bloginfo('template_directory'); ?>/custom.css" rel="stylesheet" type="text/css" />
<?php } ?>

</head>

<body <?php body_class(); ?>>
  <!-- <img src="<?php bloginfo('template_directory'); ?>/images/trinity.jpg" alt="" id="background" class="fullBg" style="width: 1265px; height: 949px; "> -->
<div id="maincontent">
<div class="container_12" id="header">
  <div class="h_left" id="logo-spot">
    <?php if ( get_option('bizzthemes_show_blog_title') ) { ?>
    <div class="blog-title"><a href="<?php echo get_option('home'); ?>/">
      <?php bloginfo('name'); ?>
      </a></div>
    <div class="blog-description">
      <?php bloginfo('description'); ?>
    </div>
    <?php } else { ?>
    <h1 class="logo"> 
      <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"> 
    <div style="float: left;z-index: 1001; position: relative; ">
    <img src="<?php echo get_stylesheet_directory_uri() . '/images/raga-logo-left-bw.png';?>" height="98" width="90"/>
    </div>

        <?php 
        include TEMPLATEPATH . '/custom/logo.php';
        ?>
        <!-- <img src="<?php if ( get_option('bizzthemes_logo_url') <> "" ) { echo get_option('bizzthemes_logo_url'); } else { echo get_bloginfo('template_directory').'/images/logo.png'; } ?>" alt="<?php bloginfo('name'); ?>" />  -->
      </a> 
    </h1>
    <!--/logo-->
    <?php } ?>
  </div>
  <!--/logo-spot-->
  <p class='login_logout_link'>
  <?php 
      global $current_user;
      get_currentuserinfo();
      $logout = wp_loginout(site_url(), false);
      if ( is_user_logged_in() ) {
        echo '<span>Welcome, <span><a href="' . get_permalink( get_page_by_title("My Profile")->ID) . '">' . $current_user->display_name . '</a></span></span>';
        $tmp_password = get_user_meta($current_user->ID, 'default_password_nag', true);
        if ( !empty($tmp_password) ) {
          //alert change password
          ?>
          <script type="text/javascript">
          jQuery(document).ready(function(){
            var url = _STYLESHEETPATH + '/custom/user-address.php?ch_passwd=1';
            jQuery.colorbox({
              href: url, title: 'Change Password', maxWidth: "100%", maxHeight: "100%", 
              height: "400px",
              width: "500px",
              onComplete : function () {
                jQuery(this).colorbox.resize();
              }
            });
          });
          </script>
          <?php
        }
      } else {
        $logout = wp_loginout(get_permalink(), false);
        if ( is_home() ) {
          $logout = wp_loginout(site_url(), false);
        }
        $logout = str_replace(" href", " class='loginicon' id='loginicon' href", $logout);    
        $logout = str_replace("\'", "\"", $logout );
        $logout = str_replace("<a", "<button", $logout);
        $logout = str_replace("</a", "</button", $logout);
      }
      // echo htmlspecialchars($logout);
      // echo  "<button class='buttonid' >" . $logout . "</button>";
      echo $logout;
  ?>
  </p>
  <?php 
    if ( $_GET['auth'] == 'fail') {
      ?>
      <script type="text/javascript">
      jQuery(document).ready(function(){
        jQuery(".not-logged-alert").click(function(){
          jQuery(".not-logged-alert").fadeOut("slow");
        });
        jQuery(".not-logged-alert").delay(1000).fadeOut("slow");
        
      });
      </script>
      <div class="not-logged-alert">Please Login to View!</div>
      <?php
    }
  ?>
  <?php 
    if ( is_home() ) {
      $logout_url = wp_logout_url( site_url() );
    } else {
      $logout_url = wp_logout_url( get_permalink()  );
    }
    if ( is_user_logged_in() ) {
          // echo $logout_url;
    }
   ?> 
<!--    <div style="float: left;z-index: 1001; position: absolute; margin-left: -12%;">
   <img src="http://bramkaslp01/ragamalika/wp-content/uploads/2012/07/raga-logo-left.png" height="135" width="150"/>
 </div>
 --><!--   <div class="callnow"> <?php echo get_option('bizzthemes_reservations_name'); ?><br />
    <span class="number"><?php echo get_option('bizzthemes_reservations_number'); ?></span> </div>
  </div>
 --><!-- header #end -->
<?php /*?><?php
		global $wpdb;
		$blogcatname = get_option('bizzthemes_blogcategory');
		$catid = $wpdb->get_var("SELECT term_ID FROM $wpdb->terms WHERE name = '$blogcatname'");
    ?>
    <?php
    $bizzthemes_categories_id_flag = 0;
	$cartegoryArr = explode(',',get_option('bizzthemes_categories_id'));
	if(in_array($_GET['cat'],$cartegoryArr) || is_page() || is_home())
	{
		$bizzthemes_categories_id_flag = 1;
	}
	
	?>
<?php */?>
<div id="navbg">

<?php $defaults = array(
  'theme_location'  => '',
  'menu'            => '', 
  'container'       => 'div', 
  'container_class' => 'menu-{menu slug}-container', 
  'container_id'    => '',
  'menu_class'      => 'menu', 
  'menu_id'         => '',
  'echo'            => true,
  'fallback_cb'     => 'wp_page_menu',
  'before'          => '',
  'after'           => '',
  'link_before'     => '',
  'link_after'      => '',
  'items_wrap'      => '<ul id=\"%1$s\" class=\"%2$s\">%3$s</ul>',
  'depth'           => 0,
  'walker'          => new Ragamalika_Walker_Nav_Menu()
  );
?>

<?php
     wp_nav_menu( $defaults );
// if ( is_user_logged_in() ) {
// } else {
//     $defaults['theme_location'] = 'secured';
//      wp_nav_menu( $defaults );
// }
?>
  <?php 
  $wp_nav_menu = 'skip';
  if ( 'noskip' == $wp_nav_menu ) {
  if (function_exists('dynamic_sidebar') && dynamic_sidebar('Header Navigation') ){  } else{  

  ?>	
  <ul >
    <li class="hometab <?php if ( is_home() ) { ?>current_page_item <?php } ?>">
      <a href="<?php echo get_option('home'); ?>/">
      <?php echo get_option('bizzthemes_home_name'); ?>
    </a>
  </li>
      <!--
    <?php wp_list_categories ('title_li=&depth=0&include=' . get_option('bizzthemes_categories_id') . '&sort_column=menu_order'); ?>
  -->
    <?php //echo get_inc_pages("pag_exclude_");?>
    <?php //wp_list_pages('title_li=&depth=0&exclude=' . get_inc_pages("pag_exclude_") .'&sort_column=menu_order'); ?>
     <?php /*?><?php  if ( get_option('bizzthemes_blogcategory') <> "" ) { ?>
     <li <?php if (!$bizzthemes_categories_id_flag) { ?> class="current_page_item" <?php } ?>>
     <a href="<?php echo get_option('home');?>/?cat=<?php echo $catid; ?>" title="<?php echo $blogcatname; ?>"><?php echo $blogcatname; ?></a></li>
    <?php } ?><?php */?>
      <?php
	  	if(get_option('bizzthemes_blogcategory'))
		{
		$blog_categories_id = $wpdb->get_var("SELECT $wpdb->terms.term_id FROM $wpdb->term_taxonomy,  $wpdb->terms WHERE $wpdb->term_taxonomy.term_id =  $wpdb->terms.term_id AND $wpdb->term_taxonomy.taxonomy = 'category' and $wpdb->terms.name like \"".get_option('bizzthemes_blogcategory')."\" ");
		}
	  if(get_option('bizzthemes_showhide_blog') && $blog_categories_id){  wp_list_categories ('title_li=&depth=0&include=' . $blog_categories_id . '&sort_column=menu_order'); }?>
  </ul>
  <?php }
  }
  ?>
  <!--/page-menu-->
</div>