<?php
/*
Template Name: Sitemap Page
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
			
				            <h3><?php echo get_option('bizzthemes_pages_name'); ?>:</h3>
	
				            <ul>
					        
							    <?php wp_list_pages('title_li='); ?>	
				            
							</ul>				
			
			            </div><!--/arclist -->
						
						<div class="arclist box">
			
				            <h3><?php echo get_option('bizzthemes_last_posts'); ?>:</h3>
	
				            <ul>
					        
							    <?php $archive_query = new WP_Query('showposts=60');
		                        
								while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
	                            
								   <li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a> <strong><?php comments_number('0', '1', '%'); ?></strong></li>
	                
					            <?php endwhile; ?>	
				            
							</ul>				
			
			            </div><!--/arclist -->
						
						<div class="arclist box">
			
				            <h3><?php echo get_option('bizzthemes_monthly_archives'); ?>:</h3>
	
				            <ul>
					        
							    <?php wp_get_archives('type=monthly'); ?>
				            
							</ul>				
			
			            </div><!--/arclist -->
						
						<div class="arclist box">
			
				            <h3><?php echo get_option('bizzthemes_categories_name'); ?>:</h3>
	
				            <ul>
					        
							    <?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>
				            
							</ul>				
			
			            </div><!--/arclist -->
						
						<div class="arclist box">
			
				            <h3><?php echo get_option('bizzthemes_rssfeeds_name'); ?>:</h3>
	
				            <ul>
					        
							    <li><a href="<?php bloginfo('rdf_url'); ?>" title="RDF/RSS 1.0 feed"><acronym title="Resource Description Framework">RDF</acronym>/<acronym title="Really Simple Syndication">RSS</acronym> 1.0 feed</a></li>
	                            <li><a href="<?php bloginfo('rss_url'); ?>" title="RSS 0.92 feed"><acronym title="Really Simple Syndication">RSS</acronym> 0.92 feed</a></li>
	                            <li><a href="<?php bloginfo('rss2_url'); ?>" title="RSS 2.0 feed"><acronym title="Really Simple Syndication">RSS</acronym> 2.0 feed</a></li>
	                            <li><a href="<?php bloginfo('atom_url'); ?>" title="Atom feed">Atom feed</a></li>
				            
							</ul>				
			
			            </div><!--/arclist -->
						
				    </div><!--/post -->
					
		</div><!--/content -->

<?php get_sidebar(); ?>
	
	</div><!--/container_12 -->

<?php get_footer(); ?>