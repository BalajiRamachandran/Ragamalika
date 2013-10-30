<?php
/*
Template Name: Menu Page
*/
?>

<?php get_header(); ?>

<?php $is_page = true; ?>

<div class="container_12 page_wrap">

	 <h1><?php the_title(); ?></h1>
	
	<?php if ( get_option( 'bizzthemes_breadcrumbs' )) { yoast_breadcrumb('<h1 class="breadcrumb">','</h1>'); } ?>

	<div id="content" class="grid_8">
	
	<!-- Category Archive Start -->
	
	<?php 
	
	 //   $catQuery =  get_categories('include=9999999' . get_inc_categories("cat_exclude_") .''); 
	 $catQuery =  get_categories('include='.get_option('bizzthemes_categories_id')); 
	$catCounter = 0;
		
		foreach ($catQuery as $category) {

		$catCounter++;

		$catLink = get_category_link($category->cat_id);
		query_posts('cat='.$category->term_id.'&showposts=-1');
		echo '<h4>'.$category->name.'</h4>';
		
		 	echo '';

			?>
          
<table width="100%" border="0" cellspacing="1" cellpadding="0" class="menutable">
                          <tr>
                            <td class="title">Dishes </td>
                            <td width="100" align="center" class="title">Size</td>
                            <td width="100" align="center" class="title">Price</td>
                          </tr>
                          
                           
                          <tr >
                            <td class="catetitle" >
							<?php if (is_category()) { ?>
                            <?php echo get_option('bizzthemes_browsing_category'); ?> <?php echo single_cat_title(); ?> 
	                        <?php } ?></td>
                            <td class="catetitle" >&nbsp;</td>
                            <td class="catetitle" > </td>
                          </tr>
                          
                           <?php while (have_posts()) : the_post(); ?>
                           
                           <?php $size1 = get_post_meta($post->ID, 'size1', $single = true);	?>
                           <?php $size2 = get_post_meta($post->ID, 'size2', $single = true);	?>
                           <?php $size3 = get_post_meta($post->ID, 'size3', $single = true);	?>
                           <?php $price1 = get_post_meta($post->ID, 'price1', $single = true);	?>
                           <?php $price2 = get_post_meta($post->ID, 'price2', $single = true);	?>
                           <?php $price3 = get_post_meta($post->ID, 'price3', $single = true);	?>
                          
                          <tr>
                            <td class="row" >
                            	<div class="iteam">
                                 <?php if ( get_post_meta($post->ID,'image', true) ) { ?>
                         <a title="Link to <?php the_title(); ?>" href="<?php the_permalink() ?>"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=75&amp;w=95&amp;zc=1&amp;q=80<?php echo $thumb_url;?>" alt="<?php the_title(); ?>" /></a> 
                         <?php } ?>
                         			
                                  	
                                  <div class="iteam_content">
                                    <p class="iteam_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><strong><?php the_title(); ?></strong></a></p>
                                    <p><?php echo bm_better_excerpt(105, ' ... '); ?> </p>
                       			  </div>
                            	</div>                            </td>
                            
                            	<td colspan="2" align="left" valign="top" class="row" >
                                
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="menutable2">
                                 
                                  <tr>
                                    
                                    <td width="100" align="center" valign="top" class="size">
                                    	                 
									   <?php echo $size1; ?>                                   </td>
                                      
                                   
                                   <?php if($price1 !== '') { ?> 
                                    <td align="center" valign="top" class="price">
                                    	         
									   <?php echo $price1; ?>                                   
                                      </td>
                                  </tr>
                                  <?php } else { echo ''; } ?>
                                  
                                   
                                  <tr>
                                    
                                    <td align="center" valign="top">
                                    	<p class="size">                
									   <?php echo $size2; ?> </p>                                    </td>
                                       
                                    <td align="center" valign="top">
                                    	<p class="price">                
									   <?php echo $price2; ?> </p>                                    </td>
                                  </tr>
                                  
                                  
                                  <tr>
                                    
                                    <td align="center" valign="top">
                                    	<p class="size">                
									   <?php echo $size3; ?> </p>                                    </td>
                                       
                                       
                                    <td align="center" valign="top">
                                    	<p class="price">                
									   <?php echo $price3; ?> </p>                                    </td>
                                  </tr>
                                 </table></td>
                          </tr>
                          
                           <?php endwhile; ?>
                  </table>
			
	<?php }	?>
		
	<!-- Category Archive End -->
	
	</div><!--/content -->

<?php get_sidebar(); ?>
	
</div><!--/container_12 -->

<?php get_footer(); ?>
