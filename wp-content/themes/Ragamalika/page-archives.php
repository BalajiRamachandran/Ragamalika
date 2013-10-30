<?php
/*
Template Name: Archives Page
*/
?>

<?php get_header(); ?>

<?php $is_page = true; ?>

<div class="container_12 page_wrap">

 <h1><?php the_title(); ?></h1>
	
	<?php if ( get_option( 'bizzthemes_breadcrumbs' )) { yoast_breadcrumb('<h1 class="breadcrumb">','</h1>'); } ?>

	<div id="content" class="grid_8">
        
                    <div id="post-<?php the_ID(); ?>" class="post archive-spot">
    						
						<div class="arclist box">
				
                            <ul>
				
					        <?php query_posts('showposts=60'); ?>
					
                            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    
                                <li>
						
						            <div class="archives-time"><?php the_time('M j Y') ?></div>
						
						            <a href="<?php the_permalink() ?>"><?php the_title(); ?></a> 
						
						            - <?php echo $post->comment_count ?>
						
						        </li>
                    
                            <?php endwhile; endif; ?>
					
				            </ul>				
			
			            </div><!--/arclist -->
						
				    </div><!--/post -->
					
		</div><!--/content -->

<?php get_sidebar(); ?>
	
	</div><!--/container_12 -->

<?php get_footer(); ?>