<?php get_header(); ?>

    <?php if (is_paged()) $is_paged = true; ?>
	
	<?php
		
			if(isset($_GET['author_name'])) :
			$curauth = get_userdatabylogin($author_name);
			else :
			$curauth = get_userdata(intval($author));
			endif;
	?>

	<div class="container_12 page_wrap">
        
	
		<?php if ( get_option( 'bizzthemes_breadcrumbs' )) { yoast_breadcrumb('<h1 class="breadcrumb">','</h1>'); } ?>
		
	    <div id="content"  class="grid_8">


				
                
                <?php
    $VG = get_option('bizzthemes_blogcategory');
	if(get_option('bizzthemes_blogcategory'))
	{
		$VG = $wpdb->get_var("SELECT $wpdb->terms.term_id FROM $wpdb->term_taxonomy,  $wpdb->terms WHERE $wpdb->term_taxonomy.term_id =  $wpdb->terms.term_id AND $wpdb->term_taxonomy.taxonomy = 'category' and $wpdb->terms.name like \"".get_option('bizzthemes_blogcategory')."\" ");
	}
	
    $VG1 = $VG;
    // if ($VG == $VG1 ) 
    if (is_category($VG) || is_sub_category($VG) || is_month() ||  is_date() ||  is_day() ||  is_tag() ||  is_year()) 
    {
    ?>
    
    
    	 <h1><?php echo single_cat_title(); ?></h1>

       <?php
		
			if(isset($_GET['author_name'])) :
			$curauth = get_userdatabylogin($author_name);
			else :
			$curauth = get_userdata(intval($author));
			endif;
			
		?>
      <?php if(have_posts()) : ?>
      <?php while(have_posts()) : the_post() ?>
              <div id="post-<?php the_ID(); ?>" class="posts">
                 <div class="post_top">
        <div class="calendar">
          <?php the_time('d'); ?>
          <br />
          <span class="month">
          <?php the_time('M'); ?>
          </span> </div>
        <div class="post_title">
          <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
            <?php the_title(); ?>
            </a></h3>
          <p>Published by
            <?php the_author_posts_link(); ?>
          </p>
        </div>
      </div> <!-- posttop #end -->
                
                <div class="post_content">
 				<?php if ( get_option( 'bizzthemes_postcontent_full' )) { ?>
               
                <?php if ( get_post_meta($post->ID,'image', true) ) { ?>
                <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"> <img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;w=495&amp;zc=1&amp;q=80<?php echo $thumb_url;?>" alt="<?php the_title(); ?>" class="post_img"   />
                <?php } ?>
                </a>
                
                <?php the_content(); ?>
                
                <?php } else { ?>
                <?php the_excerpt(); ?>
                <?php } ?>
                
                </div>
                
                
                 <div class="post_bottom">
                         	Categories : <?php the_category(","); ?> 
                     </div>    
                
              </div>  <!-- post #end -->
      <?php endwhile; ?>
      <div class="pagination">
        <?php if (function_exists('wp_pagenavi')) { ?>
        <?php wp_pagenavi(); ?>
        <?php } ?>
      </div>
      <?php endif; ?>
      
   
  </div><!--/content -->
        
        
       
  
<?php 
} 
else 
{ 
?>

 <span class="print"><a href="#" onclick="window.print();return false;">print</a></span>
    <div class="clearfix"></div>
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
                                    
                                    <td width="100" align="center" valign="top" class="">
                                    	<p class="size">                
									   <?php echo $size1; ?> </p>                                    </td>
                                      
                                   
                                   <?php if($price1 !== '') { ?> 
                                    <td align="center" valign="top">
                                    	<p class="price">                
									   <?php echo $price1; ?> </p>                                    </td>
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

<div class="pagination">
      <?php if (function_exists('wp_pagenavi')) { ?>
      <?php wp_pagenavi(); ?>
      <?php } ?>
    </div>
    
    

		</div><!--/content -->
    



<?php 
} 
?>
						

			
	 
		
	<?php get_sidebar(); ?>
	
	</div><!--/container_12 -->

<?php get_footer(); ?>