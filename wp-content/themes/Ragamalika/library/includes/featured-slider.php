<?php
	// Split the featured pages from the options, and put in an array
	$sliderpages = get_option('bizzthemes_sliderpages');
	$sliderarray=split(",",$sliderpages);
	$sliderarray = array_diff($sliderarray, array(""));
	
    if ( get_option('bizzthemes_imgslideheight') != "") { $slideimgheight = get_option('bizzthemes_imgslideheight'); } else { $slideimgheight = "200"; };
	if ( get_option('bizzthemes_imgslidewidth') != "") { $slideimgwidth = get_option('bizzthemes_imgslidewidth'); } else { $slideimgwidth = "350"; };
	
?>

<div class="container_12 featslider">

<div class="wrap-slider clearfix">
	
    <div class="featured-button-l fl" <?php if ( get_option('bizzthemes_featheight') <> "") { ?>style="top: <?php echo (get_option('bizzthemes_featheight') / 2); ?>px"<?php } ?>><a href="javascript:stepcarousel.stepBy('mygallery', -1)"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/arr-left.gif" alt="Back" /></a></div>
                
		<div class="grid_11 stepcarousel" id="mygallery" <?php if ( get_option('bizzthemes_featheight') != "") { ?>style="height: <?php echo get_option('bizzthemes_featheight');  ?>px"<?php } ?>>

			<div class="belt">
        
                <?php foreach ( $sliderarray as $featitem ) { ?>
                    
                <?php query_posts('page_id=' . $featitem); ?>

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>		        					
        
                	<div class="panel">
                    
                        <div class="slider-post">
							
                            <?php if (get_post_meta($post->ID, "image", true)) { ?>
								
								<a title="<?php the_title(); ?>" href="<?php echo get_post_meta($post->ID, "url", true); ?>"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=<?php echo $slideimgheight; ?>&amp;w=<?php echo $slideimgwidth; ?>&amp;zc=1&amp;q=80<?php echo $thumb_url;?>" alt="<?php the_title(); ?>" class="fl" /></a>
                        
                            <?php } ?>
							
							<div class="slider-title"><?php the_title(); ?></div>
								
                            <?php the_content(); ?>
							
							<?php if (get_post_meta($post->ID, "button1name", true)) { ?>
								
								<br/><a class="button" title="<?php echo get_post_meta($post->ID, "button1name", true); ?>" href="<?php echo get_post_meta($post->ID, "button1url", true); ?>"><?php echo get_post_meta($post->ID, "button1name", true); ?></a>
                        
                            <?php } ?>
							
							<?php if (get_post_meta($post->ID, "button2name", true)) { ?>
								
								<a class="button" title="<?php echo get_post_meta($post->ID, "button2name", true); ?>" href="<?php echo get_post_meta($post->ID, "button2url", true); ?>"><?php echo get_post_meta($post->ID, "button2name", true); ?></a>
                        
                            <?php } ?>
														                        
						<div class="clear"><!----></div>
						
                        </div><!--/post -->

					</div><!--/panel -->
                    
				<?php endwhile; endif; } ?>
                    					
			</div><!--/belt -->

		</div><!--/stepcarousel -->
       
    <div class="featured-button-r fr" <?php if ( get_option('bizzthemes_featheight') != "") { ?>style="top: <?php echo (get_option('bizzthemes_featheight') / 2); ?>px"<?php } ?>><a href="javascript:stepcarousel.stepBy('mygallery', 1)"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/arr-right.gif" alt="Forward" /></a></div>

<div class="clearfix"><!----></div>
	
</div>
	
</div><!--/featslider -->

<div class="fix"><!----></div>

