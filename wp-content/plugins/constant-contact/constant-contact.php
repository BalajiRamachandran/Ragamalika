<?php

/*
Plugin Name: Constant Contact
Plugin URI: http://www.gopiplus.com/work/2010/07/18/constant-contact/
Description: This Constant Contact wordpress plug-in adds a constant contact widget signup form to your website sidebar. Very easy and no need any coding language knowledge to use this plug-in. Once the widget is ready, entered emails are automatically stored into your constant contact account.
Author: Gopi.R
Version: 9.0
Author URI: http://www.gopiplus.com/
Donate link: http://www.gopiplus.com/work/2010/07/18/constant-contact/
*/

global $wpdb, $wp_version;

function gConstantcontact()
{
	include_once("gCls/gForm.php");
}

function gConstantcontact_activation()
{
	global $wpdb;
	
	add_option('gConstantcontact_widget_username', "enter username");
	add_option('gConstantcontact_widget_password', "enter password");
	add_option('gConstantcontact_widget_group', "General Interest");
	
	add_option('gConstantcontact_widget_title', "Newsletter");
	add_option('gConstantcontact_widget_caption', "Monthly Hints & Tips newsletter ");
	add_option('gConstantcontact_widget_button_style', "");
	add_option('gConstantcontact_widget_textbox_style', "");
	add_option('gConstantcontact_widget_with_in_textbox', "Enter email address.");
	add_option('gConstantcontact_widget_button', "Submit");
}

function widget_gConstantcontact_admin_options() 
{
}

function widget_gConstantcontact($args) 
{
  extract($args);
  echo $before_widget;
  echo $before_title;
  echo get_option('gConstantcontact_widget_title');
  echo $after_title;
  gConstantcontact();
  echo $after_widget;
}

function gConstantcontact_widget_control() 
{
	echo '<p>To change the setting goto Constant Contact link on Setting menu.';
	echo ' <a href="options-general.php?page=constant-contact/constant-contact.php">';
	echo 'click here</a></p>';
}

function gConstantcontact_admin_options()
{
	
	?>

<div class="wrap">
  <?php
    $mainurl = get_option('siteurl')."/wp-admin/options-general.php?page=constant-contact/constant-contact.php";
    ?>
  <h2>Constant Contact (Widget setting)</h2>
</div>
<?php

	@$gConstantcontact_username = get_option('gConstantcontact_widget_username');
	@$gConstantcontact_password = get_option('gConstantcontact_widget_password');
	@$gConstantcontact_group = get_option('gConstantcontact_widget_group');
	
	@$gConstantcontact_title = get_option('gConstantcontact_widget_title');
	@$gConstantcontact_caption = get_option('gConstantcontact_widget_caption');
	@$gConstantcontact_button_style = get_option('gConstantcontact_widget_button_style');
	@$gConstantcontact_textbox_style = get_option('gConstantcontact_widget_textbox_style');
	@$gConstantcontact_with_in_textbox = get_option('gConstantcontact_widget_with_in_textbox');
	@$gConstantcontact_button = get_option('gConstantcontact_widget_button');
	
	if (@$_POST['gConstantcontact_submit']) 
	{	
		$gConstantcontact_username = stripslashes(trim(@$_POST['gConstantcontact_widget_username']));
		$gConstantcontact_password = stripslashes(trim(@$_POST['gConstantcontact_widget_password']));
		$gConstantcontact_group = stripslashes(trim(@$_POST['gConstantcontact_widget_group']));		
		
		$gConstantcontact_title = stripslashes(trim(@$_POST['gConstantcontact_widget_title']));
		$gConstantcontact_caption = stripslashes(trim(@$_POST['gConstantcontact_widget_caption']));
		$gConstantcontact_button_style = stripslashes(trim(@$_POST['gConstantcontact_widget_button_style']));
		$gConstantcontact_textbox_style = stripslashes(trim(@$_POST['gConstantcontact_widget_textbox_style']));
		$gConstantcontact_with_in_textbox = stripslashes(trim(@$_POST['gConstantcontact_widget_with_in_textbox']));
		$gConstantcontact_button = stripslashes(trim(@$_POST['gConstantcontact_widget_button']));
		
		update_option('gConstantcontact_widget_username', $gConstantcontact_username );
		update_option('gConstantcontact_widget_password', $gConstantcontact_password );
		update_option('gConstantcontact_widget_group', $gConstantcontact_group );
		
		update_option('gConstantcontact_widget_title', $gConstantcontact_title );
		update_option('gConstantcontact_widget_caption', $gConstantcontact_caption );
		update_option('gConstantcontact_widget_button_style', $gConstantcontact_button_style );
		update_option('gConstantcontact_widget_textbox_style', $gConstantcontact_textbox_style );
		update_option('gConstantcontact_widget_with_in_textbox', $gConstantcontact_with_in_textbox );
		update_option('gConstantcontact_widget_button', $gConstantcontact_button );
	}
	
	?>
<form name="gConstantcontact_form" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
    <tr>
      <td width="61%" align="left"><?php

	echo '<p>Constant contact username:<br><input  style="width: 200px;" type="text" value="';
	echo $gConstantcontact_username . '" name="gConstantcontact_widget_username" id="gConstantcontact_widget_username" /></p>';

	echo '<p>Constant contact password:<br><input  style="width: 200px;" type="text" value="';
	echo $gConstantcontact_password . '" name="gConstantcontact_widget_password" id="gConstantcontact_widget_password" /></p>';

	echo '<p>Constant contact group:<br><input  style="width: 200px;" type="text" value="';
	echo $gConstantcontact_group . '" name="gConstantcontact_widget_group" id="gConstantcontact_widget_group" /></p>';
	
	echo '<p>Header title:<br><input  style="width: 200px;" type="text" value="';
	echo $gConstantcontact_title . '" name="gConstantcontact_widget_title" id="gConstantcontact_widget_title" /></p>';
	
	echo '<p>Word within text box:<br><input  style="width: 200px;" type="text" value="';
	echo $gConstantcontact_with_in_textbox . '" name="gConstantcontact_widget_with_in_textbox" id="gConstantcontact_widget_with_in_textbox" /></p>';	
	
	echo '<p>Button caption:<br><input  style="width: 200px;" type="text" value="';
	echo $gConstantcontact_button . '" name="gConstantcontact_widget_button" id="gConstantcontact_widget_button" /></p>';
	
	echo '<p>Top text:<br><input  style="width: 350px;" type="text" value="';
	echo $gConstantcontact_caption . '" name="gConstantcontact_widget_caption" id="gConstantcontact_widget_caption" /></p>';
	
	//echo '<p>Text Box Style:<br><input  style="width: 350px;" type="text" value="';
	//echo $gConstantcontact_textbox_style . '" name="gConstantcontact_widget_textbox_style" id="gConstantcontact_widget_textbox_style" /></p>';
	
	//echo '<p>Button Style:<br><input  style="width: 350px;" type="text" value="';
	//echo $gConstantcontact_button_style . '" name="gConstantcontact_widget_button_style" id="gConstantcontact_widget_button_style" /></p>';

	
	echo '<input id="gConstantcontact_submit" name="gConstantcontact_submit" lang="publish" class="button-primary" value="Update Setting" type="Submit" />';	
	
	?></td>
      <td width="39%" align="left" valign="middle" style=""></td>
    </tr>
  </table>
</form>
<h2>Option 1) Drag and Drop the Widget</h2>
Go to widget page under Appearance tab, Drag and drop "constant contact" widget into your side bar. its very easy.
<h2>Option 2) Paste the below code to your desired template location</h2>
<div style="padding-top:7px;padding-bottom:7px;"> <code style="padding:7px;"> &lt;?php if (function_exists (gConstantcontact)) gConstantcontact(); ?&gt; </code></div>
<h2>Need to send auto mail to user, admin?</h2>
<ul>
  <li><a target="_blank" href='http://www.gopiplus.com/work/2010/07/18/constant-contact/'>Check my another free plugin</a> </li>
</ul>
<h2>Need option to update mail content option?</h2>
<ul>
  <li><a target="_blank" href='http://www.gopiplus.com/work/2010/07/18/constant-contact/'>Check my another free plugin</a> </li>
</ul>
<h2>Need option to add the form in the posts and pages?</h2>
<ul>
  <li><a target="_blank" href='http://www.gopiplus.com/work/2010/07/18/constant-contact/'>Check my another free plugin</a> </li>
</ul>

<h2>About Plugin</h2>
<ul>
  <li>Check official website for more info <a target="_blank" href='http://www.gopiplus.com/work/plugin-list/'>click here</a></li>
</ul>
<?php

}

function gConstantcontact_plugins_loaded()
{
	if(function_exists('wp_register_sidebar_widget')) 
	{
		wp_register_sidebar_widget('constant contact', 'constant contact', 'widget_gConstantcontact');
	}
	
	if(function_exists('wp_register_widget_control')) 
	{
		wp_register_widget_control('constant contact', array('constant contact', 'widgets'), 'gConstantcontact_widget_control');
	} 
}


function gConstantcontact_deactivate() 
{
	delete_option('gConstantcontact_widget_username');
	delete_option('gConstantcontact_widget_password');
	delete_option('gConstantcontact_widget_group');
	
	delete_option('gConstantcontact_widget_title');
	delete_option('gConstantcontact_widget_caption');
	delete_option('gConstantcontact_widget_button_style');
	delete_option('gConstantcontact_widget_textbox_style');
	delete_option('gConstantcontact_widget_with_in_textbox');
	delete_option('gConstantcontact_widget_button');
}

function gConstantcontact_add_to_menu() 
{
	add_options_page('Constant contact', 'Constant contact', 'manage_options', __FILE__, 'gConstantcontact_admin_options' );
}

if (is_admin()) 
{
	add_action('admin_menu', 'gConstantcontact_add_to_menu');
}


function gConstantcontact_add_javascript_files() 
{
	if (!is_admin())
	{
		wp_enqueue_style( 'gConstantcontact', get_option('siteurl').'/wp-content/plugins/constant-contact/style.css');
		wp_enqueue_script( 'gConstantcontact', get_option('siteurl').'/wp-content/plugins/constant-contact/gExtra/gConstantcontact.js');
	}
}   
add_action('init', 'gConstantcontact_add_javascript_files');


register_activation_hook(__FILE__, 'gConstantcontact_activation');
add_action("plugins_loaded", "gConstantcontact_plugins_loaded");
register_deactivation_hook( __FILE__, 'gConstantcontact_deactivate' );
?>
