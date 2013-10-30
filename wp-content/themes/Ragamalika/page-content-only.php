<?php
/*
Template Name: Content Only
*/
?>

<?php $is_page = true; ?>

<div class="container_12 page_wrap no_sidebar">

 <h1><?php the_title(); ?></h1>
	
	<?php //if ( get_option( 'bizzthemes_breadcrumbs' )) { yoast_breadcrumb('<h1 class="breadcrumb">','</h1>'); } ?>

			<?php if(have_posts()) : ?>
					
				<?php while(have_posts()) : the_post() ?>
        
                    <div id="post-<?php the_ID(); ?>" class="post no-sidebar">
                                     
                        <div id="content" class="grid_8" style="width: 100%;">
						
                            <?php the_content(); ?>
							
                        </div>
                        <div class="clearfix"></div>
                        <?php
				            if ( strpos(get_permalink(), "registration") === false ) {

				            } else {
				            	echo '<div class="form">';
				            	include (TEMPLATEPATH . '/registrationForm.php');
				            	echo '</div>';
				            }                        
                        ?>
                                                                
                    </div><!--/post-->
                
                <?php endwhile; else : ?>
        
                    <div class="post box">
					
                        <div class="entry-head"><h2><?php echo get_option('bizzthemes_404error_name'); ?></h2></div>
						
                        <div class="entry-content"><p><?php echo get_option('bizzthemes_404solution_name'); ?></p></div>
						
                    </div>
        
            <?php endif; ?>

            <?php

            if (isset($action) && isset($account)) {
            	switch($action) {
            		case '1':
            			include (TEMPLATEPATH . '/custom/change_password.php');
            			break;
            		case '2':
            			include (TEMPLATEPATH . '/custom/my_class.php');
            			break;
            		default:
            			include (TEMPLATEPATH . '/custom/my_profile.php');
            			break;
            	}
            } else {
				// include (TEMPLATEPATH . '/custom/my_profile.php');            	
            }

            ?>
</div><!--/container_12 -->