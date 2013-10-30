<?php
/*
Template Name: No Sidebar
*/
?>

<?php get_header(); ?>

<?php $is_page = true; ?>

<style type="text/css">
.container_12 .grid_8 {
	width: 100%;
}
</style>

<div class="container_12 page_wrap no_sidebar">

 <h1><?php the_title(); ?></h1>
	
	<?php if ( get_option( 'bizzthemes_breadcrumbs' )) { yoast_breadcrumb('<h1 class="breadcrumb">','</h1>'); } ?>

			<?php if(have_posts()) : ?>
					
				<?php while(have_posts()) : the_post() ?>
        
                    <div id="post-<?php the_ID(); ?>" class="post no-sidebar">
                                     
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
	
</div><!--/container_12 -->

<?php get_footer(); ?>