<?php get_header(); ?>

	<?php if (is_paged()) $is_paged = true; ?>

	<div class="container_12 page_wrap">
    
    
     <h1><?php the_title(); ?></h1>
	
		<?php if ( get_option( 'bizzthemes_breadcrumbs' )) { yoast_breadcrumb('<h1 class="breadcrumb">','</h1>'); } ?>
        
        		
	    <div id="content"  class="grid_8">
		
		    <!-- AdSense Search: START -->
	
	            <?php if (get_option('bizzthemes_search_adsense') <> "") { ?>
							
					<br/>
							
					<div class="adsense-468">
		
		                <?php echo stripslashes(get_option('bizzthemes_search_adsense')); ?>
		
		            </div>
					
					<br/>
							
		        <?php } ?>	
		
            <!-- AdSense Search: END -->
		
	        <div class="fix"></div>

			<?php if(have_posts()) : ?>
					
			<?php while(have_posts()) : the_post() ?>
        
                <div id="post-<?php the_ID(); ?>" class="posts clearfix">
				
				    <div class="post_top">
					
                        <div class="calendar">
							
                            <?php the_time('d'); ?> <br /> <span class="month"> <?php the_time('M'); ?>  </span>
								
                        </div>
                            
                        <div class="post_title">
							
                            <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                                
							<p>Published by <?php the_author_posts_link(); ?></p>
                                
                        </div>
						
					</div> <!-- posttop #end -->
							
					<div class="comments"><a href="4"><?php comments_popup_link('0', '1', '%'); ?></a> Comments</div>
							
				    <div class="post_content">
                
                		<?php if ( get_post_meta($post->ID,'image', true) ) { ?>
                
                            <a title="Link to <?php the_title(); ?>" href="<?php the_permalink() ?>"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=250&amp;w=450&amp;zc=1&amp;q=80<?php echo $thumb_url;?>" alt="<?php the_title(); ?>" class="post_img" style="margin-top:5px; margin-right:10px" /></a>          	
                        							
                        <?php } ?>
                
                        <?php if ( get_option( 'bizzthemes_postcontent_full' )) { ?> 
					
					        <?php the_content(); ?>
					
					    <?php } else { ?>
					
					        <?php the_excerpt(); ?>
						
					    <?php } ?>
					
                    </div>
                        
                    <div class="post_bottom">
						
                        	Categories : <?php the_category(","); ?>  
							
                    </div>                            
                            						
                </div><!--/posts-->                            
        
            <?php endwhile; ?>
			
		    <div class="pagination">
			
                <?php if (function_exists('wp_pagenavi')) { ?><?php wp_pagenavi(); ?><?php } ?>
						
            </div>
        
            <?php endif; ?>
			
		</div><!--/content -->
		
	<?php get_sidebar(); ?>
	
	</div><!--/container_12 -->

<?php get_footer(); ?>