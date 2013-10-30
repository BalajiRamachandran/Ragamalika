<?php
/*
Template Name: About
*/
?>

<?php get_header(); ?>

<?php $is_page = true; ?>

<div class="container_12 page_wrap no_sidebar">

 <h1><?php the_title(); ?></h1>
	
	<?php if ( get_option( 'bizzthemes_breadcrumbs' )) { yoast_breadcrumb('<h1 class="breadcrumb">','</h1>'); } ?>

			<?php if(have_posts()) : ?>
					
				<?php while(have_posts()) : the_post() ?>

                    <div id="post-<?php the_ID(); ?>" class="post no-sidebar">
                                     
                        <div id="content" class="grid_8">
					
                            <?php the_content(); ?>

                        </div>
                        <?php if ( strpos(get_permalink(), 'bio') === false  ) {
                        } else {
                        ?>
		                  <div class="ragamalika_tabs">
		                        <ul>
		                              <li><a href="<?php echo get_permalink(get_page_by_title('Maragatham Ramaswamy')->ID);?>">Maragatham Ramaswamy</a></li>
		                        </ul>
		                  </div>

                        <?php
                        }?>                                                                
                    </div><!--/post-->
                <?php endwhile; else : ?>
        
                    <div class="post box">
					
                        <div class="entry-head"><h2><?php echo get_option('bizzthemes_404error_name'); ?></h2></div>
						
                        <div class="entry-content"><p><?php echo get_option('bizzthemes_404solution_name'); ?></p></div>
						
                    </div>
        
            <?php endif; ?>


	<div id="sidebar" class=" hideclass grid_4">
	    <div class="widget"><h3><span>Instructors</span></h3></div>
	    	<style type="text/css">
	    		.grid_4 ul, sidebar_pagenav {
	    			list-style: none;
	    		}
	    	</style>
	    	<?php
	    	// $children = wp_list_pages("title_li=<h3><span>Instructors</span></h3>&child_of=".$post->ID."&echo=0");
	    	// $children = str_replace  ("<li>", "", $children);
	    	// echo "<ul class='sidebar_pagenav'>" . $children . "</ul>";
	    	?>

	    	<div class="widget">
	    		<table width="93%" border="0" cellpadding="1" cellspacing="0" class="table">                  
	    			<tbody>
	    				<tr>
                    <td colspan="2" class="thead">Maragatham Ramaswamy</td>
                  </tr>
                  <tr>
                  	<td><img height="200px" width="300px" src="http://bramkaslp01/ragamalika/wp-content/themes/Ragamalika/images/dummy/staff.png"/></td>
                  </tr>

 			  </tbody></table></div>
 			  <div class="widget">
 			  	<table width="93%" border="0" cellpadding="1" cellspacing="0" class="table">                  
 			  		<tbody>
 			  			<tr>
                    <td colspan="2" class="thead">Jayashree Sankaran</td>
                  </tr>
                  <tr>
                  	<td><img height="200px" width="300px" src="http://bramkaslp01/ragamalika/wp-content/themes/Ragamalika/images/dummy/staff.png"/></td>
                  </tr>

 			  </tbody>
 			</table>
 		</div>	
		<div class="clearfix"><!----></div>	

	
</div><!--/container_12 -->
<?php get_footer(); ?>