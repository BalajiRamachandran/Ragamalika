<?php

// Register widgetized areas
if ( function_exists('register_sidebar') ) {
    register_sidebars(1,array('name' => 'Blog Sidebar','before_widget' => '<div class="widget">','after_widget' => '</div>','before_title' => '<h3><span>','after_title' => '</span></h3>'));
    register_sidebars(1,array('name' => 'Page Sidebar','before_widget' => '<div class="widget">','after_widget' => '</div>','before_title' => '<h3><span>','after_title' => '</span></h3>'));
    register_sidebars(3,array('name' => 'Front Footer %d','before_widget' => '<div class="widget">','after_widget' => '</div>','before_title' => '<h3><span>','after_title' => '</span></h3>'));
	register_sidebars(1,array('name' => 'Header Navigation','before_widget' => '<div class="widget">','after_widget' => '</div>','before_title' => '<h3><span>','after_title' => '</span></h3>'));
}
	
// Check for widgets in widget-ready areas http://wordpress.org/support/topic/190184?replies=7#post-808787
// Thanks to Chaos Kaizer http://blog.kaizeku.com/
function is_sidebar_active( $index = 1){
	$sidebars	= wp_get_sidebars_widgets();
	$key		= (string) 'sidebar-'.$index;
 
	return (isset($sidebars[$key]));
}


// =============================== Ads 125x125 widget ======================================

function adsWidget()
{
$img_url[1] = get_option('bizzthemes_ad_image_1');
$dest_url[1] = get_option('bizzthemes_ad_url_1');
$img_url[2] = get_option('bizzthemes_ad_image_2');
$dest_url[2] = get_option('bizzthemes_ad_url_2');
$img_url[3] = get_option('bizzthemes_ad_image_3');
$dest_url[3] = get_option('bizzthemes_ad_url_3');
$img_url[4] = get_option('bizzthemes_ad_image_4');
$dest_url[4] = get_option('bizzthemes_ad_url_4');
$img_url[5] = get_option('bizzthemes_ad_image_5');
$dest_url[5] = get_option('bizzthemes_ad_url_5');
$img_url[6] = get_option('bizzthemes_ad_image_6');
$dest_url[6] = get_option('bizzthemes_ad_url_6');

?>

<div class="ad-box">

<?php if ( get_option('bizzthemes_show_ads_top12') ) { ?>
       
    <div class="ads123456"> 
        <?php if($img_url[1]){?>
        <a <?php do_action('bizzthemes_external_ad_link'); ?> href="<?php echo "$dest_url[1]"; ?>"><img src="<?php echo "$img_url[1]"; ?>" alt="" /></a>
		<?php }?>
        <?php if($img_url[2]){?>
        <a <?php do_action('bizzthemes_external_ad_link'); ?> href="<?php echo "$dest_url[2]"; ?>"><img src="<?php echo "$img_url[2]"; ?>" alt="" class="last" /></a>
        <?php }?>
    </div>
	
	<div class="fix"></div>
                
<?php } ?>

<?php if ( get_option('bizzthemes_show_ads_top34') ) { ?>
       
    <div class="ads123456"> 
        <?php if($img_url[3]){?>
        <a <?php do_action('bizzthemes_external_ad_link'); ?> href="<?php echo "$dest_url[3]"; ?>"><img src="<?php echo "$img_url[3]"; ?>" alt="" /></a>
		<?php }?>
        <?php if($img_url[4]){?>
        <a <?php do_action('bizzthemes_external_ad_link'); ?> href="<?php echo "$dest_url[4]"; ?>"><img src="<?php echo "$img_url[4]"; ?>" alt="" class="last" /></a>
        <?php }?>
    </div> 

    <div class="fix"></div>	

<?php } ?>

<?php if ( get_option('bizzthemes_show_ads_top56') ) { ?>
       
    <div class="ads123456"> 
        <?php if($img_url[5]){?>
        <a <?php do_action('bizzthemes_external_ad_link'); ?> href="<?php echo "$dest_url[5]"; ?>"><img src="<?php echo "$img_url[5]"; ?>" alt="" /></a>
		<?php }?>
        <?php if($img_url[6]){?>
        <a <?php do_action('bizzthemes_external_ad_link'); ?> href="<?php echo "$dest_url[6]"; ?>"><img src="<?php echo "$img_url[6]"; ?>" alt="" class="last" /></a>
        <?php }?>
    </div> 

    <div class="fix"></div>	

<?php } ?>

</div>
<!--/ad-box -->

<?php }

register_sidebar_widget('PT &rarr; Ads 125x125', 'adsWidget');

function adsWidgetAdmin() {

	echo '<input type="hidden" id="update_ads" name="update_ads" value="1" />';

}

register_widget_control('PT &rarr; Ads 125x125', 'adsWidgetAdmin', 200, 200);

// =============================== Ad 300x250 widget ======================================

function adoneWidget()
{
?>

<?php if ( !get_option('bizzthemes_not_200') ) { ?>

<?php 

	if ( get_option('bizzthemes_home_only') ) { 
	
		if ( is_home() ) {

?>

<div class="ad-box">

    <div id="big_banner">
  
		<?php
                    
            // Get block code //
            $block_img = get_option('bizzthemes_block_image');
            $block_url = get_option('bizzthemes_block_url');
                
        ?>
                
        <a <?php do_action('bizzthemes_external_ad_link'); ?> href="<?php echo "$block_url"; ?>"><img src="<?php echo "$block_img"; ?>" alt="" /></a>

    </div>
    
</div>

<?php } } else { ?>

<div class="ad-box">

    <div id="big_banner">
      
        <?php
                    
            // Get block code //
            $block_img = get_option('bizzthemes_block_image');
            $block_url = get_option('bizzthemes_block_url');
                
        ?>
                
        <a <?php do_action('bizzthemes_external_ad_link'); ?> href="<?php echo "$block_url"; ?>"><img src="<?php echo "$block_img"; ?>" alt="" /></a>
    
    </div>
    
</div>

<?php } } }

register_sidebar_widget('PT &rarr; Ad 300x250', 'adoneWidget');

function adoneWidgetAdmin() {

	echo '<input type="hidden" id="update_ads" name="update_ads" value="1" />';

}

register_widget_control('PT &rarr; Ad 300x250', 'adoneWidgetAdmin', 200, 200);


// =============================== Popular Posts Widget ======================================

function PopularPostsSidebar()
{

    $settings_pop = get_option("widget_popularposts");

	$name = $settings_pop['name'];
	$number = $settings_pop['number'];
	if ($name <> "") { $popname = $name; } else { $popname = 'Popular Posts'; }
	if ($number <> "") { $popnumber = $number; } else { $popnumber = '10'; }

?>

<div class="widget popular">

	<h3 class="hl"><span><?php echo $popname; ?></span></h3>
	
		<ul>
			 
			<?php
			global $wpdb;
            $now = gmdate("Y-m-d H:i:s",time());
            $lastmonth = gmdate("Y-m-d H:i:s",gmmktime(date("H"), date("i"), date("s"), date("m")-12,date("d"),date("Y")));
            $popularposts = "SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS 'stammy' FROM $wpdb->posts, $wpdb->comments WHERE comment_approved = '1' AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status = 'publish' AND post_date < '$now' AND post_date > '$lastmonth' AND comment_status = 'open' GROUP BY $wpdb->comments.comment_post_ID ORDER BY stammy DESC LIMIT $popnumber";
            $posts = $wpdb->get_results($popularposts);
            $popular = '';
            if($posts){
                foreach($posts as $post){
	                $post_title = stripslashes($post->post_title);
		               $guid = get_permalink($post->ID);
					   
					      $first_post_title=substr($post_title,0,26);
            ?>
		        <li>
                    <a href="<?php echo $guid; ?>" title="<?php echo $post_title; ?>"><?php echo $first_post_title; ?></a> [...]
                    <br style="clear:both" />
                </li>
            <?php } } ?>

		</ul>
</div>

<?php
}
function PopularPostsAdmin() {

	$settings_pop = get_option("widget_popularposts");

	// check if anything's been sent
	if (isset($_POST['update_popular'])) {
		$settings_pop['name'] = strip_tags(stripslashes($_POST['popular_name']));
		$settings_pop['number'] = strip_tags(stripslashes($_POST['popular_number']));

		update_option("widget_popularposts",$settings_pop);
	}

	echo '<p>
			<label for="popular_name">Title:
			<input id="popular_name" name="popular_name" type="text" class="widefat" value="'.$settings_pop['name'].'" /></label></p>';
	echo '<p>
			<label for="popular_number">Number of popular posts:
			<input id="popular_number" name="popular_number" type="text" class="widefat" value="'.$settings_pop['number'].'" /></label></p>';
	echo '<input type="hidden" id="update_popular" name="update_popular" value="1" />';

}

register_sidebar_widget('PT &rarr; Popular Posts', 'PopularPostsSidebar');
register_widget_control('PT &rarr; Popular Posts', 'PopularPostsAdmin', 250, 200);


// =============================== Today Special Widget (particular category) ======================================

class todayspecialparticular extends WP_Widget {

	function todayspecialparticular() {
	//Constructor
	
		$widget_ops = array('classname' => 'widget special', 'description' => 'List of today special menu in particular category' );
		$this->WP_Widget('widget_recent', 'PT &rarr; Today Special', $widget_ops);
	}
 
	function widget($args, $instance) {
	// prints the widget
global $thumb_url;
		extract($args, EXTR_SKIP);
 
		echo $before_widget;
		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
		$category = empty($instance['category']) ? '&nbsp;' : apply_filters('widget_category', $instance['category']);
 		
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
		        ?>
			    <?php 
			        global $post;
			        $today_special = get_posts('numberposts=1&category='.$category.'');
                    foreach($today_special as $post) :
                    setup_postdata($post);
			    ?>
			  
			    <?php if ( get_post_meta($post->ID,'image', true) ) { ?>
                
                        <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=115&amp;w=250&amp;zc=1&amp;q=80<?php echo $thumb_url;?>" alt="<?php the_title(); ?>" class="fl" style="margin:0 0 5px 0;" /></a>          	
                
			  <?php } ?>
			  <div class="clear"><!----></div>
			  <br/>
			  <a class="widget-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			  <p class="featured-excerpt"><?php echo strip_tags(get_the_excerpt()); ?> </p>
			  <div class="clear"><!----></div>
			  
			    <?php endforeach; ?>
			    <?php
		echo $after_widget;
		
	}
 
	function update($new_instance, $old_instance) {
	//save the widget
	
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['category'] = strip_tags($new_instance['category']);
 
		return $instance;
	}
 
	function form($instance) {
	//widgetform in backend

		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'category' => '', 'post_number' => '' ) );
		$title = strip_tags($instance['title']);
		$category = strip_tags($instance['category']);
?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('category'); ?>">Categories (<code>IDs</code> separated by commas): <input class="widefat" id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" type="text" value="<?php echo attribute_escape($category); ?>" /></label></p>
<?php
	}
}
register_widget('todayspecialparticular');

// =============================== Latest Menu Widget (particular category) ======================================

class LatestMenuParticular extends WP_Widget {

	function LatestMenuParticular() {
	//Constructor
	
		$widget_ops = array('classname' => 'widget latest', 'description' => 'List of latest menus in particular category' );
		$this->WP_Widget('widget_latest', 'PT &rarr; Latest Menus', $widget_ops);
	}
 
	function widget($args, $instance) {
	// prints the widget

		extract($args, EXTR_SKIP);
 		global $thumb_url;
		echo $before_widget;
		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
		$category = empty($instance['category']) ? '&nbsp;' : apply_filters('widget_category', $instance['category']);
		$post_number = empty($instance['post_number']) ? '&nbsp;' : apply_filters('widget_post_number', $instance['post_number']);
 
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
		echo '<ul>';
		        ?>
			    <?php 
			        global $post;
			        $latest_menus = get_posts('numberposts='.$post_number.'&category='.$category.'');
                    foreach($latest_menus as $post) :
                    setup_postdata($post);
			    ?>
			  
			    <li>
			  
			        <?php if ( get_post_meta($post->ID,'image', true) ) { ?>
                
                        <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=60&amp;w=60&amp;zc=1&amp;q=80<?php echo $thumb_url;?>" alt="<?php the_title(); ?>" class="fl" style="margin:0 10px 10px 0;" /></a>          	
                
			        <?php } ?>
			  
					<a class="widget-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			  
			        <p class="featured-excerpt"><?php echo bm_better_excerpt(100, ' ... '); ?></p>
			  
			    </li>
			  
			    <?php endforeach; ?>
			    <?php
	    echo '</ul>';
		echo $after_widget;
		
	}
 
	function update($new_instance, $old_instance) {
	//save the widget
	
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['category'] = strip_tags($new_instance['category']);
		$instance['post_number'] = strip_tags($new_instance['post_number']);
 
		return $instance;
	}
 
	function form($instance) {
	//widgetform in backend

		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'category' => '', 'post_number' => '' ) );
		$title = strip_tags($instance['title']);
		$category = strip_tags($instance['category']);
		$post_number = strip_tags($instance['post_number']);
?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('category'); ?>">Categories (<code>IDs</code> separated by commas): <input class="widefat" id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" type="text" value="<?php echo attribute_escape($category); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('post_number'); ?>">Number of posts: <input class="widefat" id="<?php echo $this->get_field_id('post_number'); ?>" name="<?php echo $this->get_field_name('post_number'); ?>" type="text" value="<?php echo attribute_escape($post_number); ?>" /></label></p>
<?php
	}
}
register_widget('LatestMenuParticular');

// =============================== Widget Title ======================================

class SimpleTitle extends WP_Widget {

	function SimpleTitle() {
	//Constructor
	
		$widget_ops = array('classname' => 'widget title', 'description' => 'Title for widget (used in Restaurant Hours)' );
		$this->WP_Widget('widget_stitle', 'PT &rarr; Widget Title', $widget_ops);
	}
 
	function widget($args, $instance) {
	// prints the widget

		extract($args, EXTR_SKIP);
 
		echo $before_widget;
		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
 
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };

		echo $after_widget;
		
	}
 
	function update($new_instance, $old_instance) {
	//save the widget
	
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
 
		return $instance;
	}
 
	function form($instance) {
	//widgetform in backend

		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = strip_tags($instance['title']);
?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>">Widget Title (i.e. Restaurant Hours): <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<?php
	}
}
register_widget('SimpleTitle');

// =============================== Restaurant Hours Widget ======================================

class RestaurantHours extends WP_Widget {

	function RestaurantHours() {
	//Constructor
	
		$widget_ops = array('classname' => 'widget hours', 'description' => 'List of hours when Restaurant is opened' );
		$this->WP_Widget('widget_hours', 'PT &rarr; Restaurant Hours', $widget_ops);
	}
 
	function widget($args, $instance) {
	// prints the widget

		extract($args, EXTR_SKIP);
 
		echo $before_widget;
		$title1 = empty($instance['title1']) ? '&nbsp;' : apply_filters('widget_title1', $instance['title1']);
		$days1 = empty($instance['days1']) ? '&nbsp;' : apply_filters('widget_days1', $instance['days1']);
		$hours1 = empty($instance['hours1']) ? '&nbsp;' : apply_filters('widget_hours1', $instance['hours1']);
		$days12 = empty($instance['days12']) ? '&nbsp;' : apply_filters('widget_days12', $instance['days12']);
		$hours12 = empty($instance['hours12']) ? '&nbsp;' : apply_filters('widget_hours12', $instance['hours12']);
 
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
		echo '<table width="93%" border="0" cellpadding="1" cellspacing="0" class="table">';
		      ?>
                  <tr>
                    <td colspan="2" class="thead"><?php echo $title1; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $days1; ?></td>
                    <td><?php echo $hours1; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $days12; ?></td>
                    <td><?php echo $hours12; ?></td>
                  </tr>

 			  <?php
	    echo '</table>';
		echo $after_widget;
		
	}
 
	function update($new_instance, $old_instance) {
	//save the widget
	
		$instance = $old_instance;
		$instance['title1'] = strip_tags($new_instance['title1']);
		$instance['days1'] = strip_tags($new_instance['days1']);
		$instance['hours1'] = strip_tags($new_instance['hours1']);
		$instance['days12'] = strip_tags($new_instance['days12']);
		$instance['hours12'] = strip_tags($new_instance['hours12']);
 
		return $instance;
	}
 
	function form($instance) {
	//widgetform in backend

		$instance = wp_parse_args( (array) $instance, array( 'title1' => '', 'days1' => '', 'hours1' => '' ) );
		$title1 = strip_tags($instance['title1']);
		$days1 = strip_tags($instance['days1']);
		$hours1 = strip_tags($instance['hours1']);
		$days12 = strip_tags($instance['days12']);
		$hours12 = strip_tags($instance['hours12']);
?>
			<p><label for="<?php echo $this->get_field_id('title1'); ?>">Time of meal 1 (i.e. Lunch): <input class="widefat" id="<?php echo $this->get_field_id('title1'); ?>" name="<?php echo $this->get_field_name('title1'); ?>" type="text" value="<?php echo attribute_escape($title1); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('days1'); ?>">Days opened 1 (i.e. Mon - Fri): <input class="widefat" id="<?php echo $this->get_field_id('days1'); ?>" name="<?php echo $this->get_field_name('days1'); ?>" type="text" value="<?php echo attribute_escape($days1); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('hours1'); ?>">Time opened 1 (i.e. 11 am - 3 pm): <input class="widefat" id="<?php echo $this->get_field_id('hours1'); ?>" name="<?php echo $this->get_field_name('hours1'); ?>" type="text" value="<?php echo attribute_escape($hours1); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('days12'); ?>">Days opened 2 (i.e. Sat - Sun): <input class="widefat" id="<?php echo $this->get_field_id('days12'); ?>" name="<?php echo $this->get_field_name('days12'); ?>" type="text" value="<?php echo attribute_escape($days12); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('hours12'); ?>">Time opened 2 (i.e. 11 am - 3 pm): <input class="widefat" id="<?php echo $this->get_field_id('hours12'); ?>" name="<?php echo $this->get_field_name('hours12'); ?>" type="text" value="<?php echo attribute_escape($hours12); ?>" /></label></p>
<?php
	}
}
register_widget('RestaurantHours');

// =============================== Restaurant Hours Widget ======================================

class MusicSchedule extends WP_Widget {

	function MusicSchedule() {
	//Constructor
	
		$widget_ops = array('classname' => 'music schedule', 'description' => 'Music class schedule' );
		$this->WP_Widget('widget_schedule', 'PT &rarr; Music schedule', $widget_ops);
	}
 
	function widget($args, $instance) {
	// prints the widget

		extract($args, EXTR_SKIP);
 
		echo $before_widget;
		$title1 = empty($instance['title1']) ? '&nbsp;' : apply_filters('widget_title1', $instance['title1']);
		$days1 = empty($instance['days1']) ? '&nbsp;' : apply_filters('widget_days1', $instance['days1']);
		$hours1 = empty($instance['hours1']) ? '&nbsp;' : apply_filters('widget_hours1', $instance['hours1']);
		$days12 = empty($instance['days12']) ? '&nbsp;' : apply_filters('widget_days12', $instance['days12']);
		$hours12 = empty($instance['hours12']) ? '&nbsp;' : apply_filters('widget_hours12', $instance['hours12']);
 
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
		echo '<table width="93%" border="0" cellpadding="1" cellspacing="0" class="table">';
		      ?>
                  <tr>
                    <td colspan="2" class="thead"><?php echo $title1; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $days1; ?></td>
                    <td><?php echo $hours1; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo $days12; ?></td>
                    <td><?php echo $hours12; ?></td>
                  </tr>

 			  <?php
	    echo '</table>';
		echo $after_widget;
		
	}
 
	function update($new_instance, $old_instance) {
	//save the widget
	
		$instance = $old_instance;
		$instance['title1'] = strip_tags($new_instance['title1']);
		$instance['days1'] = strip_tags($new_instance['days1']);
		$instance['hours1'] = strip_tags($new_instance['hours1']);
		$instance['days12'] = strip_tags($new_instance['days12']);
		$instance['hours12'] = strip_tags($new_instance['hours12']);
 
		return $instance;
	}
 
	function form($instance) {
	//widgetform in backend

		$instance = wp_parse_args( (array) $instance, array( 'title1' => '', 'days1' => '', 'hours1' => '' ) );
		$title1 = strip_tags($instance['title1']);
		$days1 = strip_tags($instance['days1']);
		$hours1 = strip_tags($instance['hours1']);
		$days12 = strip_tags($instance['days12']);
		$hours12 = strip_tags($instance['hours12']);
?>
			<p><label for="<?php echo $this->get_field_id('title1'); ?>">Time of meal 1 (i.e. Lunch): <input class="widefat" id="<?php echo $this->get_field_id('title1'); ?>" name="<?php echo $this->get_field_name('title1'); ?>" type="text" value="<?php echo attribute_escape($title1); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('days1'); ?>">Days opened 1 (i.e. Mon - Fri): <input class="widefat" id="<?php echo $this->get_field_id('days1'); ?>" name="<?php echo $this->get_field_name('days1'); ?>" type="text" value="<?php echo attribute_escape($days1); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('hours1'); ?>">Time opened 1 (i.e. 11 am - 3 pm): <input class="widefat" id="<?php echo $this->get_field_id('hours1'); ?>" name="<?php echo $this->get_field_name('hours1'); ?>" type="text" value="<?php echo attribute_escape($hours1); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('days12'); ?>">Days opened 2 (i.e. Sat - Sun): <input class="widefat" id="<?php echo $this->get_field_id('days12'); ?>" name="<?php echo $this->get_field_name('days12'); ?>" type="text" value="<?php echo attribute_escape($days12); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('hours12'); ?>">Time opened 2 (i.e. 11 am - 3 pm): <input class="widefat" id="<?php echo $this->get_field_id('hours12'); ?>" name="<?php echo $this->get_field_name('hours12'); ?>" type="text" value="<?php echo attribute_escape($hours12); ?>" /></label></p>
<?php
	}
}
register_widget('MusicSchedule');

// =============================== Contact Widget ======================================

class ContactWidget extends WP_Widget {

	function ContactWidget() {
	//Constructor
	
		$widget_ops = array('classname' => 'widget contactinfo', 'description' => 'List of contact details' );
		$this->WP_Widget('widget_contact', 'PT &rarr; Contact Details', $widget_ops);
	}
 
	function widget($args, $instance) {
	// prints the widget

		extract($args, EXTR_SKIP);
 
		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
		$address = empty($instance['address']) ? '&nbsp;' : apply_filters('widget_address', $instance['address']);
		$phone_title = empty($instance['phone_title']) ? '&nbsp;' : apply_filters('widget_phone_title', $instance['phone_title']);
		$phone_number = empty($instance['phone_number']) ? '&nbsp;' : apply_filters('widget_phone_number', $instance['phone_number']);
		$email_title = empty($instance['email_title']) ? '&nbsp;' : apply_filters('widget_email_title', $instance['email_title']);
		$email_address = empty($instance['email_address']) ? '&nbsp;' : apply_filters('widget_email_address', $instance['email_address']);
 		
		    ?>
			  
			<div class="contactinfo">
			  
            <h4><strong><?php echo $title; ?></strong></h4>
			  
                <p><strong><?php echo $address; ?></strong></p>
			   
                <p><?php echo $phone_title; ?> : <?php echo $phone_number; ?></p> 
			   
			    <p><?php echo $email_title; ?> : <a href="mailto:<?php echo $email_address; ?>"><?php echo $email_address; ?></a> </p>
			
			</div>
			   
			<?php
			  		
	}
 
	function update($new_instance, $old_instance) {
	//save the widget
	
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['address'] = strip_tags($new_instance['address']);
		$instance['phone_title'] = strip_tags($new_instance['phone_title']);
		$instance['phone_number'] = strip_tags($new_instance['phone_number']);
		$instance['email_title'] = strip_tags($new_instance['email_title']);
		$instance['email_address'] = strip_tags($new_instance['email_address']);
 
		return $instance;
	}
 
	function form($instance) {
	//widgetform in backend

		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'address' => '', 'phone_title' => '', 'phone_number' => '', 'email_title' => '', 'email_address' => '' ) );
		$title = strip_tags($instance['title']);
		$address = strip_tags($instance['address']);
		$phone_title = strip_tags($instance['phone_title']);
		$phone_number = strip_tags($instance['phone_number']);
		$email_title = strip_tags($instance['email_title']);
		$email_address = strip_tags($instance['email_address']);
?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>">Widget Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('address'); ?>">Restaurant Address: <input class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo attribute_escape($address); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('phone_title'); ?>">Phone field Title: <input class="widefat" id="<?php echo $this->get_field_id('phone_title'); ?>" name="<?php echo $this->get_field_name('phone_title'); ?>" type="text" value="<?php echo attribute_escape($phone_title); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('phone_number'); ?>">Phone Number: <input class="widefat" id="<?php echo $this->get_field_id('phone_number'); ?>" name="<?php echo $this->get_field_name('phone_number'); ?>" type="text" value="<?php echo attribute_escape($phone_number); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('email_title'); ?>">Email field Title: <input class="widefat" id="<?php echo $this->get_field_id('email_title'); ?>" name="<?php echo $this->get_field_name('email_title'); ?>" type="text" value="<?php echo attribute_escape($email_title); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('email_address'); ?>">Email Address: <input class="widefat" id="<?php echo $this->get_field_id('email_address'); ?>" name="<?php echo $this->get_field_name('email_address'); ?>" type="text" value="<?php echo attribute_escape($email_address); ?>" /></label></p>
<?php
	}
}
register_widget('ContactWidget');

?>