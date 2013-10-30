<?php
/*
Plugin Name: Bulk Password Reset
Plugin URI: http://rubenwoudsma.nl/bulk-password-reset
Description: This plugin makes it possible to perform a bulk password reset for users within a specific group. You can send an activation key to all the users or perform a hard reset of the password.
Author: Ruben Woudsma
Version: 1.0.0.
Author URI: http://rubenwoudsma.nl
*/   
   
if (!class_exists('bulk_password_reset')) {
    class bulk_password_reset {

        var $hook = 'bulk_password_reset';
				var $longname = 'Bulk Password Reset';
				var $shortname = 'Bulk Password Reset';
        var $optionname = 'bpr_options';
        
        //Class Functions
        /**
        * PHP 4 Compatible Constructor
        */
        function bulk_password_reset(){$this->__construct();}
        
        /**
        * PHP 5 Constructor
        */        
        function __construct(){
            //Language Setup
            $locale = get_locale();
            $mo = dirname(__FILE__) . "/languages/" . $this->hook . "-".$locale.".mo";
            load_textdomain($this->hook, $mo);

            //Actions        
						add_action('admin_menu', array(&$this, 'add_usermenu_item') );
						add_action('admin_print_scripts', array(&$this, 'do_script') );
						add_action('admin_print_styles', array(&$this, 'do_css') );
						add_action('admin_head', array(&$this, 'config_page_head') );

        }
        
        /**
        * @desc Adds the page to the users submenu
        */
				function add_usermenu_item() {
					add_submenu_page('users.php', $this->longname, $this->shortname, 'administrator', $this->hook, array(&$this, 'bulk_password_reset_page') );
				}
				
        /**
        * @desc Adds some code to the head of the settings/options page
        */
				function config_page_head() {
					if ($_GET['page'] == $this->hook) {
						wp_enqueue_script('jquery');
						?>
						 <script type="text/javascript" charset="utf-8">
						 	jQuery(document).ready(function(){
								jQuery('#advancedsettings').change(function(){
									if (jQuery('#advancedsettings').is(':checked')) {
										jQuery('#advancedbprsettings').css("display","block");
									} else {
										jQuery('#advancedbprsettings').css("display","none");
									}
								}).change();
							});
						 </script>
					<?php
					}
				}
        
        /**
        * @desc Adds settings/options page
        */
				function bulk_password_reset_page() {
					
					$options = get_option($this->optionname);
				
					if ( (isset($_POST['reset']) && $_POST['reset'] == "true") || !is_array($options) ) {
						$this->set_defaults();
						$options	= get_option($this->optionname);
						echo "<div class=\"updated\"><p>" . __('Bulk Password reset settings reset to default','bulk_password_reset') . "</p></div>\n";
					}
				
					if ( isset($_POST['submit']) ) {
						if (!current_user_can('manage_options')) die(__('You cannot edit the plugin Bulk Password Reset for WordPress options.','bulk_password_reset'));
						check_admin_referer('bprsettings-config');
							
						//Text options
						foreach (array('custommessage', 'customauthkey', 'custompassword') as $option_name) {
							if (isset($_POST[$option_name]))
								$options[$option_name] = $_POST[$option_name];
							else
								$options[$option_name] = '';
						}
						
						//Checkbox options
						foreach (array('sendnotification', 'advancedsettings', 'hardreset', 'passwordnag') as $option_name) {
							if (isset($_POST[$option_name]))
								$options[$option_name] = true;
							else
								$options[$option_name] = false;
						}
				
						update_option($this->optionname, $options);
						echo "<div id=\"updatemessage\" class=\"updated fade\"><p>" . __('Bulk Password Reset settings updated.', 'bulk_password_reset') . "</p></div>\n";
						echo "<script type=\"text/javascript\">setTimeout(function(){jQuery('#updatemessage').hide('slow');}, 3000);</script>";	
						
						//Here we need to process al the users within the role groups
						if (isset($_POST['dobulkreset'])) {
							$err_msg = '';
							
							//Validate if roles have been selected
							if ( !isset($_POST['send_roles']) || !is_array($_POST['send_roles']) || empty($_POST['send_roles']) ) {
									$err_msg =  __('No reset has been executed, as no group was selected. You need to select at least one group.', 'bulk_password_reset');
							} 
							else {
								$send_roles = $_POST['send_roles'];
								
								$recipients = $this->get_recipients_from_roles($send_roles, $user_ID);
								
								if (empty($recipients)) {
									$err_msg = __('No recepients where found in the selected groups', 'bulk_password_reset');
								}
								else {
									//do mail processing with for each loop
									foreach ($recipients as $recipient) {
										// no do sending for each recipient
										if ( $options['hardreset'] ) {
											$errors = $this->reset_password($recipient->user_login);
										} else {
											$errors = $this->sent_activation_mail($recipient->user_login);
										}
									}
									
									if ( is_wp_error($errors) ) {
										$err_msg = $errors->get_error_message();
									}
								}
							}
							
							// If error, show error message else show succes message
							if ( $err_msg !='' ) {
								// Show error message
								echo "<div id=\"errormessage\" class=\"error\"><p>" . $err_msg . "</p></div>\n";
								echo "<script type=\"text/javascript\">setTimeout(function(){jQuery('#errormessage').hide('slow');}, 6000);</script>";	
							} else {
								//Show success message
								echo "<div id=\"successmessage\" class=\"updated fade\"><p>" . __('Succesfully reset the password for the selected role(s).', 'bulk_password_reset') . "</p></div>\n";
								echo "<script type=\"text/javascript\">setTimeout(function(){jQuery('#successmessage').hide('slow');}, 6000);</script>";	
							}
				
						}
						
					}
				   
				?>
				<div class="wrap">
					<h2><?php _e('Bulk Password Reset','bulk_password_reset') ?></h2>
					
					<!-- Main section -->
					<div class="postbox-container" style="width:70%;">
						<div class="metabox-holder">	
							<div class="meta-box-sortables">
								<form action="" method="post" id="bpr-config">
									<?php wp_nonce_field('bprsettings-config'); ?>
									<div id="bprsettings" class="postbox">
										<div class="handlediv" title="Click to toggle"><br /></div>
										<h3 class="hndle"><span><?php _e('Bulk Password Reset settings','bulk_password_reset'); ?> </span></h3>
										<div class="inside">
											<table class="form-table">
												<tr>
													<td colspan="2"><?php _e('With the options down below you can select groups for which you want to do a password reset','bulk_password_reset') ?></td>
												</tr>
												<tr>
													<th scope="row" valign="top"><label for="send_roles"><?php _e('Recipients', 'bulk_password_reset') ?>
													<br/><br/>
													<small><?php _e('You can select multiple groups by pressing the CTRL key.', 'bulk_password_reset') ?></small>
													<br/><br/>
													<small><?php _e('Only the groups having at least one user appear here.', 'bulk_password_reset') ?></small></label></th>
													<td>
														<select id="send_roles" name="send_roles[]" multiple="multiple" size="8" style="width: 554px; height: 150px;">
														<?php
															$roles = $this->get_roles($user_ID);
															foreach ($roles as $key => $value) {
																$name = translate_user_role($value );
														?>
															<option value="<?php echo $key; ?>"	<?php
																echo (in_array($key, (array) $send_roles) ? ' selected="selected"' : '');?>>
																<?php echo __('Role', 'bulk_password_reset') . ' - ' . $name; ?>
															</option>
														<?php
															}
														?>
														</select>
													</td>
												</tr>
												<tr>
													<th valign="top" scrope="row"><label for="dobulkreset"><?php _e('Do the bulk reset:', 'bulk_password_reset') ?></label><br/><small><?php _e('Activate this checkbox when you actually would like to do the reset, else only the settings are saved.', 'bulk_password_reset') ?></small></th>
													<td valign="top"><input type="checkbox" id="dobulkreset" name="dobulkreset" /></td>
												</tr>
												<tr>
													<th valign="top" scrope="row"><label for="advancedsettings"><?php _e('Show advanced settings:', 'bulk_password_reset') ?></label><br/><small><?php _e('Only adviced for users who want to change the default reset options', 'bulk_password_reset') ?></small></th>
													<td valign="top"><input type="checkbox" id="advancedsettings" name="advancedsettings" <?php echo checked($options['advancedsettings'],true,false); ?>/></td>
												</tr>
											</table>				
										</div>
									</div>
									
									<!-- Advanced settings -->
									<div id="advancedbprsettings" class="postbox">
										<div class="handlediv" title="Click to toggle"><br /></div>
										<h3 class="hndle"><span><?php _e('Advanced Settings', 'bulk_password_reset') ?></span></h3>
										<div class="inside">
											<table class="form-table">
												<tr>
													<th valign="top" scrope="row"><label for="hardreset"><?php _e('Direct password reset', 'bulk_password_reset') ?>:</label><br/><small><?php _e('Not recommended, as this immidiatly changes the password of the users without confirmation e-mail.','bulk_password_reset') ?></small></th>
													<td valign="top"><input type="checkbox" id="hardreset" name="hardreset" <?php echo checked($options['hardreset'],true,false); ?> /></td>
												</tr>
												<tr>
													<th valign="top" scrope="row"><label for="sendnotification"><?php _e('E-mail notification', 'bulk_password_reset') ?>:</label><br/><small><?php _e('Not recommended to deactivate, as this change the default reset functionality.','bulk_password_reset') ?></small></th>
													<td valign="top"><input type="checkbox" id="sendnotification" name="sendnotification" <?php echo checked($options['sendnotification'],true,false); ?> /></td>
												</tr>
												<tr>
													<th valign="top" scrope="row"><label for="passwordnag"><?php _e('Password nag', 'bulk_password_reset') ?>:</label><br/><small><?php _e('Not recommended to deactivate, as this will display a note to users to change their password.','bulk_password_reset') ?></small></th>
													<td valign="top"><input type="checkbox" id="passwordnag" name="passwordnag" <?php echo checked($options['passwordnag'],true,false); ?> /></td>
												</tr>
												<tr>
													<th valign="top" scrope="row"><label for="custompassword"><?php _e('Set a custom password:', 'bulk_password_reset') ?></label></th>
													<td valign="top"><input type="text" id="custompassword" name="custompassword" size="30" value="<?php echo $options['custompassword']; ?>"/></td>
												</tr>
												<tr>
													<th valign="top" scrope="row"><label for="customauthkey"><?php _e('Set a custom authentication key:', 'bulk_password_reset') ?></label></th>
													<td valign="top"><input type="text" id="customauthkey" name="customauthkey" size="30" value="<?php echo $options['customauthkey']; ?>"/></td>
												</tr>
												<tr>
													<th valign="top" scrope="row"><label for="custommessage"><?php _e('Additional information for in the e-mail body:', 'bulk_password_reset') ?></label></th>
													<td valign="top"><textarea rows="8" cols="70" name="custommessage" id="custommessage"><?php echo $options['custommessage']; ?></textarea></td>
												</tr>
											</table>
										</div>
									</div>
									
									<div class="submit"><input type="submit" class="button-primary" name="submit" value="<?php _e('Save the bulk Password Reset settings and reset passwords &raquo;', 'bulk_password_reset') ?>" /></div>
				
								</form>
								<form action="" method="post">
									<input type="hidden" name="reset" value="true"/>
									<div class="submit"><input type="submit" value="<?php _e('Reset Default Settings &raquo;', 'bulk_password_reset'); ?>" /></div>
								</form>
							</div>
						</div>
					</div>
				
					<div class="postbox-container" style="width:20%;">
						<div class="metabox-holder">	
							<div class="meta-box-sortables">
								<?php
									$this->plugin_like();
									$this->plugin_support();
									$this->news(); 
								?>
							</div>
							<br/><br/><br/>
						</div>
					</div>
					
				</div>
				<?php
				   
				}    

        /**
        * @desc Set the default options used within the plugin
        */
				function set_defaults() {
					$options = get_option($this->optionname);
					$options['custommessage'] = '';
					$options['customauthkey'] = '';
					$options['custompassword'] = '';
					$options['sendnotification'] = true;
					$options['advancedsettings'] = false;
					$options['hardreset'] = false;	
					$options['passwordnag'] = true;			
					update_option($this->optionname,$options);
				}
				
        /**
        * @desc Create a "plugin like" box.
        */
				function plugin_like() {
					$content = '<p>'.__('Why not do any or all of the following:','bulk_password_reset').'</p>';
					$content .= '<ul>';
					$content .= '<li><a href="http://rubenwoudsma.nl/bulk-password-reset">'.__('Link to it so other folks can find out about it.','bulk_password_reset').'</a></li>';
					$content .= '<li><a href="http://wordpress.org/extend/plugins/bulk_password_reset/">'.__('Give it a good rating on WordPress.org.','bulk_password_reset').'</a></li>';
					$content .= '<li><a href="http://wordpress.org/extend/plugins/bulk-password-reset/">'.__('Visit the plugin website.','bulk_password_reset').'</a></li>';
					$content .= '</ul>';
					$this->postbox($this->hook.'like', 'Like this plugin?', $content);
				}	
				
        /**
        * @desc Info box with link to the support forums.
        */
				function plugin_support() {
					$content = '<p>'.__('If you have any problems with this plugin or good ideas for improvements or new features, please talk about them in the','bulk_password_reset').' <a href="http://wordpress.org/tags/bulk_password_reset">'.__("Support forums",'bulk_password_reset').'</a>.</p>';
					$this->postbox($this->hook.'support', 'Need support?', $content);
				}
				
        /**
        * @desc Box with latest news from rubenwoudsma.nl
        */
				function news() {
					require_once(ABSPATH.WPINC.'/rss.php');  
					if ( $rss = fetch_rss( 'http://feeds.feedburner.com/rubenwoudsma' ) ) {
						$content = '<ul>';
						$rss->items = array_slice( $rss->items, 0, 3 );
						foreach ( (array) $rss->items as $item ) {
							$content .= '<li class="yoast">';
							$content .= '<a class="rsswidget" href="'.clean_url( $item['link'], $protocolls=null, 'display' ).'">'. htmlentities($item['title']) .'</a> ';
							$content .= '</li>';
						}
						$content .= '<li class="rss"><a href="http://rubenwoudsma.nl/feed/">Subscribe with RSS</a></li>';
						$this->postbox('rubenlatest', __('Latest news from rubenwoudsma.nl','bulk_password_reset'), $content);
					} else {
						$this->postbox('rubenlatest', __('Latest news from rubenwoudsma.nl','bulk_password_reset'), __('Nothing to say...','bulk_password_reset'));
					}
				}
				
        /**
        * @desc Create a postbox widget
        */
				function postbox($id, $title, $content) {
				?>
					<div id="<?php echo $id; ?>" class="postbox">
						<div class="handlediv" title="<?php _e('Click to toggle','bulk_password_reset') ?>"><br /></div>
						<h3 class="hndle"><span><?php echo $title; ?></span></h3>
						<div class="inside">
							<?php echo $content; ?>
						</div>
					</div>
				<?php
				}
				
        /**
        * @desc Load the plugin related css
        */
				function do_css() {
					wp_enqueue_style('dashboard');
					wp_enqueue_style('thickbox');
					wp_enqueue_style('global');
					wp_enqueue_style('wp-admin');
					wp_enqueue_style('bprextra-admin-css', WP_CONTENT_URL . '/plugins/' . plugin_basename(dirname(__FILE__)). '/bulk_password_reset.css');
				}
				
        /**
        * @desc Load the plugin related javascript
        */
				function do_script() {
					wp_enqueue_script('postbox');
					wp_enqueue_script('dashboard');
					wp_enqueue_script('thickbox');
					wp_enqueue_script('media-upload');
				}
				
        /**
        * @desc Retrieve the roles from the users
        */
				function get_roles( $exclude_id='') {
					$roles = array();
				
					$wp_roles = new WP_Roles();
					foreach ($wp_roles->get_names() as $key => $value) {
						$users_in_role = $this->get_recipients_from_roles(array($key), $exclude_id);
						if (!empty($users_in_role)) {
							$roles[$key] = $value;
						}
					}
				
					return $roles;
				}
				
        /**
        * @desc Retrieve the users from the roles
        */
				function get_recipients_from_roles($roles, $exclude_id='') {
					global $wpdb;
				
					if (empty($roles)) {
						return array();
					}
				
					// Build role filter for the list of roles
					$role_count = count($roles);
					$capability_filter = '';
					for ($i=0; $i<$role_count; $i++) {
						$capability_filter .= "meta_value like '%" . $roles[$i] . "%'";
						if ($i!=$role_count-1) {
							$capability_filter .= ' OR ';
						}
					}
				
				  $users = $wpdb->get_results(
						  "SELECT id, user_login, user_email, display_name "
						. "FROM $wpdb->usermeta, $wpdb->users "
						. "WHERE "
						. " (user_id = id) "
						. ( $exclude_id!='' ? ' AND (id<>' . $exclude_id . ')' : '' )
						. " AND (meta_key = '" . $wpdb->prefix . "capabilities') "
						. " AND (" . $capability_filter . ") " );
				
					return $users;
				}
				
        /**
        * @desc Sent the activation email to the users. Function copied from WP core and adjusted.
        */
				function sent_activation_mail($user_login) {
					global $wpdb;
					$options = get_option($this->optionname);
					
					$user_data = get_userdatabylogin($user_login);
					
					// redefining user_login ensures we return the right case in the email
					$user_login = $user_data->user_login;
					$user_email = $user_data->user_email;
				
					$key = $wpdb->get_var($wpdb->prepare("SELECT user_activation_key FROM $wpdb->users WHERE user_login = %s", $user_login));
					if ( empty($key) ) {
						
						if ( isset($options['customauthkey']) && $options['customauthkey'] != "" ) {
							$key = $options['customauthkey'];
						} else {
							// Generate something random for a key...
							$key = wp_generate_password(20, false);
						}
						
						// Now insert the new key into the db
						$wpdb->update($wpdb->users, array('user_activation_key' => $key), array('user_login' => $user_login));
					}
					
					if ( isset($options['custommessage']) && $options['custommessage'] != "" ) {
						$message = $options['custommessage'] . "\r\n\r\n";
					} else {
						$message = '';
					}
					
					$message .= sprintf(__('The site administrator of %s has automatically requested to changes your password.', 'bulk_password_reset'), get_option('siteurl')) . "\r\n\r\n";
					$message .= sprintf(__('Username: %s', 'bulk_password_reset'), $user_login) . "\r\n\r\n";
					$message .= __('To reset your password visit the following address.', 'bulk_password_reset') . "\r\n\r\n";
					$message .= site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user_login), 'login') . "\r\n";
				
					$title = sprintf(__('[%s] Password Reset', 'bulk_password_reset'), get_option('blogname'));
				
					if ( $message && !wp_mail($user_email, $title, $message) )
						die('<p>' . __('The e-mail could not be sent.', 'bulk_password_reset') . "<br />\n" . __('Possible reason: your host may have disabled the mail() function...', 'bulk_password_reset') . '</p>');
				
					return true;
					
				}
				
        /**
        * @desc Reset the users password. Function copied and adjusted from WP core.
        */
				function reset_password($user_login) {
					global $wpdb;
					$options = get_option($this->optionname);
				
					$user = get_userdatabylogin($user_login);
					if ( empty( $user ) )
						return new WP_Error('invalid_user', __('Invalid user login supplied', 'bulk_password_reset'));
				
					
					if ( isset($options['custompassword']) && $options['custompassword'] != "" ) {
						$new_pass = $options['custompassword'];
					} else {
						// Generate something random for a password...
						$new_pass = wp_generate_password();
					}
				
					wp_set_password($new_pass, $user->ID);
					
					if ( $options['passwordnag'] ) {
						update_usermeta($user->ID, 'default_password_nag', true); //Set up the Password change nag.
					}
					
					if ( isset($options['custommessage']) && $options['custommessage'] != "" ) {
						$message = $options['custommessage'] . "\r\n\r\n";
					} else {
						$message = '';
					}

					$message .= sprintf(__('The site administrator of %s has automatically changed your password.', 'bulk_password_reset'), get_option('siteurl')) . "\r\n\r\n";
					$message .= sprintf(__('Username: %s', 'bulk_password_reset'), $user->user_login) . "\r\n";
					$message .= sprintf(__('Password: %s', 'bulk_password_reset'), $new_pass) . "\r\n";
					$message .= site_url('wp-login.php', 'login') . "\r\n";
				
					$title = sprintf(__('[%s] Your new password', 'bulk_password_reset'), get_option('blogname'));
				
					if ( $message && !wp_mail($user->user_email, $title, $message) )
				  		die('<p>' . __('The e-mail could not be sent.', 'bulk_password_reset') . "<br />\n" . __('Possible reason: your host may have disabled the mail() function...', 'bulk_password_reset') . '</p>');
				
					return true;
				}

        
  } //End Class
} //End if class exists statement

//instantiate the class
if (class_exists('bulk_password_reset')) {
    $bulk_password_reset_var = new bulk_password_reset();
}
?>