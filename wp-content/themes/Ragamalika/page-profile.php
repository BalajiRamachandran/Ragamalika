<?php
/*
Template Name: profile
*/
?>
<?php
	if ( is_auth() ) {

	} else {
		header ( "Location: " . site_url() . "/?auth=fail" );
		exit(NULL);
	}

	if ( strpos(get_permalink(), "/my-profile") === false ) {
		$profile_page = 'admin';
	} else {
		$profile_page = 'profile';
	}

	$account = $_GET["account"];
	$action = $_GET["action"];
?>

<?php get_header(); ?>

<?php $is_page = true; ?>

<div class="container_12 page_wrap no_sidebar">

 <h1><?php the_title(); ?></h1>
	
	<?php if ( get_option( 'bizzthemes_breadcrumbs' )) { yoast_breadcrumb('<h1 class="breadcrumb">','</h1>'); } ?>


			<?php if(have_posts()) : ?>
					
				<?php while(have_posts()) : the_post() ?>
        
					<?php
						if ( $profile_page == 'admin') :
							include (TEMPLATEPATH . "/custom/admin_links.php");
						endif;
					?>

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

            <?php 
            // update banner
	            if ( count ($_POST) > 1 ) {
	            	include ( TEMPLATEPATH . '/custom/process_form.php');
	            }

            ?>


            <?php
            	if ( $profile_page == 'profile') :
            		include (TEMPLATEPATH . '/custom/profile_links.php');
            	endif;
            ?>

            <?php
            	if ( $profile_page == 'profile') :
            	elseif ($profile_page == 'admin') :
	            	// include ( TEMPLATEPATH . '/custom/admin_body.php');
	            	include ( TEMPLATEPATH . '/custom/students-list.php');
	            else:
	            endif;

            ?>

			<div id="sidebar" class="hideclass grid_4">
					<?php
						if ( $profile_page == 'profile' ) :
						$page = get_page_by_title("My Profile", OBJECT);
					?>
				    <div class="widget">
				    	<h3>
				    		<span>My Features</span>
				    	</h3>
				    </div>
			    	<div class="widget">
			    		<table width="93%" border="0" cellpadding="1" cellspacing="0" class="table">                  
			    		<tbody>
			    		<tr>
		                    <td colspan="2" class="thead colorbox-form">
		                    	<a 
		                    		href="#" 
		                    		id="address-form"
		                    		class="colorbox-form"		                    		
		                    		xtitle="Update the Address" 
		                    		xref="<?php echo get_stylesheet_directory_uri() . '/custom/user-address.php?address=1';?>">Update Address</a>
		                    </td>
		                </tr>
			    		<tr>
		                    <td colspan="2" class=""></td>
	                  </tr>
			    		<tr>
		                    <td colspan="2" class="thead colorbox-form">
		                    	<a 
		                    		href="#" 
		                    		id="ch_passwd-form"
		                    		class="colorbox-form"
		                    		xtitle="Change Password" 
		                    		xref="<?php echo get_stylesheet_directory_uri() . '/custom/user-address.php?ch_passwd=1';?>">Change Password</a>
		                    </td>
		                </tr>
			    		<tr>
		                    <td colspan="2" class="thead colorbox-form">
		                    	<a 
		                    		href="#" 
		                    		id="ch_passwd-form"
		                    		class="colorbox-form"
		                    		xtitle="Change Password" 
		                    		xref="<?php echo get_stylesheet_directory_uri() . '/custom/user-address.php?ch_passwd=1';?>">Change Password</a>
		                    </td>
		                </tr>
			    		<tr>
		                    <td colspan="2" class="thead">
		                    	<a 
		                    		href="#" 
		                    		id="ch_passwd-form"
		                    		class="colorbox-form"
		                    		xtitle="Change Password" 
		                    		xref="<?php echo get_stylesheet_directory_uri() . '/custom/user-address.php?ch_passwd=1';?>">Change Password</a>
		                    </td>
		                </tr>
			    		<tr>
		                    <td colspan="2" class=""></td>
		                  </tr>
			    		<tr>
		                    <td colspan="2" class="thead">
		                    	<a href="<?php echo get_permalink($page->ID) . '?account=1&action=2';?>">My Class</a>
		                    </td>
		                  </tr>
		 			  </tbody>
		 			</table>
		 			</div>    	
					<div class="clearfix"><!----></div>
			<?php 
			elseif ( $profile_page == 'profile' ):
				?>
			<?php
			endif;
			?>	


			</div>	
	
</div><!--/container_12 -->

<?php get_footer(); ?>