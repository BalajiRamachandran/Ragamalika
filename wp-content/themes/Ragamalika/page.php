<?php get_header(); ?>

	<div class="container_12 page_wrap">
    
    <h1><?php the_title(); ?></h1>
    
    	
	    <?php if ( get_option( 'bizzthemes_breadcrumbs' )) { yoast_breadcrumb('<h1 class="breadcrumb">','</h1>'); } ?>
        
        
        
        
	    	
			<?php if(have_posts()) : ?>
					
				<?php while(have_posts()) : the_post() ?>
        
                    <div id="post-<?php the_ID(); ?>" class="page">
                                     
                        <div id="content" class="grid_8">
						
                            <?php the_content(); ?>
							
                        </div>
                                                                
                    </div><!--/post-->
                
                <?php endwhile; else : ?>
        
                    <div class="post box">
					
                        <div class="entry-head"><h2><?php echo get_option('bizzthemes_404error_name'); ?></h2></div>
						
                        <div class="entry-content"><p><?php echo get_option('bizzthemes_404solution_name'); ?></p></div>
						
                    </div>
        
            <?php endif; ?>

	<?php get_sidebar(); ?>
	
	</div><!--/container_12 -->

<?php get_footer(); ?>