<div id="sidebar" class="grid_4">

<?php global $is_page; ?>

	<?php if ( (is_page() || $is_page ) && ( function_exists('dynamic_sidebar') && (is_sidebar_active(2)) ) ) { //Show sidebar on pages ?>
	
	    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(2) )  ?>	

    <?php } elseif ( function_exists('dynamic_sidebar') && (is_sidebar_active(1)) ) { // //Show sidebar on blog ?>
	
	    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(1) )  ?>	

    <?php } ?>
	
<div class="clearfix"><!----></div>	

</div><!--/sidebar -->

<div class="clear"><br/></div>	