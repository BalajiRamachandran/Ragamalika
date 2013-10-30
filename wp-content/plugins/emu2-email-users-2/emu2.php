<?php
/*
Plugin Name: Emu2 - Email Users 2
Version: 0.83b
Plugin URI: http://1manfactory.com/emu2
Description: Allows admins to send an e-mail to the single, mutible oder group of blog users. You can extract all e-mail adresses as well for external mass mailings. Credits to Vincent Prat  http://www.vincentprat.info
Author: Juergen Schulze, 1manfactory@gmail.com
Author URI: http://1manfactory.com
*/

/*  Copyright
	2010 Juergen Schulze
	based on code by Vincent Prat

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

require('emu2_core.php');

// Version/Build of the plugin
define( 'EMU2_CURRENT_VERSION', '0.83b' );
define( 'EMU2_CURRENT_BUILD', '111' );

// i18n plugin domain for language files
define( 'EMU2_I18N_DOMAIN', 'email-users-2' );

// Capabilities used by the plugin
define( 'EMU2_MANAGE_OPTIONS_CAP', 			'emu2_manage_options' );
define( 'EMU2_EMAIL_SINGLE_USER_CAP', 		'emu2_email_single_user' );
define( 'EMU2_EMAIL_MULTIPLE_USERS_CAP',	'emu2_email_multiple_users' );
define( 'EMU2_EMAIL_USER_GROUPS_CAP',		'emu2_email_user_groups' );
define( 'EMU2_NOTIFY_USERS_CAP',			'emu2_email_users_notify' );
define( 'EMU2_EXPORT_LIST_CAP',				'emu2_export_list' );

// User meta
define( 'EMU2_ACCEPT_NOTIFICATION_USER_META', 'email_users_accept_notifications' );
define( 'EMU2_ACCEPT_MASS_EMAIL_USER_META', 'email_users_accept_mass_emails' );

// load language files
function EMU2_set_lang_file() {
	# set the language file
	$currentLocale = get_locale();
	if(!empty($currentLocale)) {
		$moFile = dirname(__FILE__) . "/lang/" . $currentLocale . ".mo";
		if (@file_exists($moFile) && is_readable($moFile)) {
			load_textdomain(EMU2_I18N_DOMAIN, $moFile);
		}

	}
}
EMU2_set_lang_file();

# plan the scheduler
add_action('EMU2_task_hook', 'EMU2_send_scheduled');
#if (EMU2_get_debug()) add_action('init', 'EMU2_send_scheduled');	# run always when site is called for debugging

/**
 * Set default values for the options
 */
add_action('admin_menu','EMU2_plugin_activation');

function EMU2_plugin_activation() {

	$installed_build = EMU2_get_installed_build();

	if ( $installed_build==EMU2_get_current_build() ) {
		// update to new version
		//EMU2_add_default_capabilities();
		//EMU2_add_default_user_meta();
		if ( $installed_build<100 ) {
			add_option(
				'EMU2_build',
				EMU2_get_current_build(),
				'Emu2 - Email User 2 - Build of the email users plugin' );
			add_option(
				'EMU2_mail_function',
				'wp_mail',
				'Emu2 - Email User 2 - Function to be used for mail sending (mail or wp_mail)' );
		}
		// debug function
		if ( $installed_build<104 ) {
			add_option(
				'EMU2_debug',
				'',
				'Emu2 - Email User 2 - Debug mode true/false' );
		}
		// schedule function
		if ( $installed_build<109 ) {
			add_option(
				'EMU2_schedule_time',
				'',
				'Emu2 - Email User 2 - Mail schedule time (leave empty for no scheduling)' );
			add_option(
				'EMU2_double_place',
				'',
				'Emu2 - Email User 2 - Put sender into every To field against problems' );
			}
			add_option(
				'EMU2_default_schedule_subject',
				__('[%BLOG_NAME%] The latest posts - %THE_DATE%', EMU2_I18N_DOMAIN),
				'Emu2 - Email User 2 - The default subject to use when sending schedule mail' );
			add_option(
				'EMU2_default_schedule_body',
				__('Digest of %BLOG_NAME%: %BLOG_URL%<br />'."\n<p></p>\n".'%THE_DIGEST%'."\n<p></p>\n".'Thank you', EMU2_I18N_DOMAIN),
				'Emu2 - Email User 2 - The default schedule body to use' );			
		// user options capabilities
		if ( $installed_build<109 ) {
			EMU2_add_default_capabilities();
		}

	} else if ( $installed_build=='' ) {
		// first time install/activate
		add_option(
			'EMU2_double_place',
			'',
			'Emu2 - Email User 2 - Put sender into every To field against problems' );
		add_option(
			'EMU2_debug',
			'',
			'Emu2 - Email User 2 - Debug mode true/false' );
		add_option(
			'EMU2_version',
			EMU2_get_current_version(),
			'Emu2 - Email User 2 - Version of the email users plugin' );
		add_option(
			'EMU2_build',
			EMU2_get_current_build(),
			'Emu2 - Email User 2 - Build of the email users plugin' );
		add_option(
			'EMU2_default_subject',
			__('[%BLOG_NAME%] A post of interest: "%POST_TITLE%"', EMU2_I18N_DOMAIN),
			'Emu2 - Email User 2 - The default title to use when using the post notification functionality' );
		add_option(
			'EMU2_default_body',
			__('<p>Hello, </p><p>I would like to bring your attention on a new post published on the blog. Details of the post follow; I hope you will find it interesting.</p><p>Best regards, </p><p>%FROM_NAME%</p><hr><p><strong>%POST_TITLE%</strong></p><p>%POST_EXCERPT%</p><ul><li>Link to the post: <a href="%POST_URL%">%POST_URL%</a></li><li>Link to %BLOG_NAME%: <a href="%BLOG_URL%">%BLOG_URL%</a></li></ul>', EMU2_I18N_DOMAIN),
			'Emu2 - Email User 2 - The default body to use when using the post notification functionality' );
		add_option(
			'EMU2_default_mail_format',
			'html',
			'Emu2 - Email User 2 - Default mail format (html or plain text)' );
		add_option(
			'EMU2_default_schedule_subject',
			__('[%BLOG_NAME%] The latest posts - %THE_DATE%', EMU2_I18N_DOMAIN),
			'Emu2 - Email User 2 - The default subject to use when sending schedule mail' );
		add_option(
			'EMU2_default_schedule_body',
			__('Digest of %BLOG_NAME%: %BLOG_URL%<br />'."\n<p></p>\n".'%THE_DIGEST%'."\n<p></p>\n".'Thank you', EMU2_I18N_DOMAIN),
			'Emu2 - Email User 2 - The default schedule body to use' );
		add_option(
			'EMU2_max_bcc_recipients',
			'0',
			'Emu2 - Email User 2 - Maximum number of recipients in the BCC field' );
		add_option(
			'EMU2_schedule_time',
			'',
			'Emu2 - Email User 2 - Mail schedule time (leave empty for no scheduling)' );
		add_option(
			'EMU2_sender_name',
			'',
			'Emu2 - Email User 2 - Individual sender name' );
		add_option(
			'EMU2_sender_address',
			'',
			'Emu2 - Email User 2 - Individual sender address' );
		add_option(
			'EMU2_mail_function',
			'wp_mail',
			'Emu2 - Email User 2 - Function to be used for mail sending (mail or wp_mail)' );

		EMU2_add_default_capabilities();
		EMU2_add_default_user_meta();

	}

	// Update version number
	update_option( 'EMU2_version', EMU2_get_current_version() );
		// Update build number
	update_option( 'EMU2_build', EMU2_get_current_build() );

}

/**
* Plugin deactivation
*/
register_deactivation_hook( __FILE__, 'EMU2_plugin_deactivation' );
function EMU2_plugin_deactivation() {
	// deactivate schedule
	wp_clear_scheduled_hook('EMU2_task_hook');
	// delete schedule value as well
	delete_option('EMU2_schedule_time');
}

// uninstall
register_uninstall_hook (__FILE__, 'EMU2_uninstall');
function EMU2_uninstall() {
	# delete all data stored by Email Users 2

	delete_metadata('user', null, 'EMU2_ACCEPT_NOTIFICATION_USER_META', null, $delete_all = true);
	delete_metadata('user', null, 'EMU2_ACCEPT_MASS_EMAIL_USER_META', null, $delete_all = true);

	delete_option('EMU2_version');
	delete_option('EMU2_build');
	delete_option('EMU2_debug');
	delete_option('EMU2_default_subject');
	delete_option('EMU2_default_body');
	delete_option('EMU2_default_mail_format');
	delete_option('EMU2_default_schedule_subject');
	delete_option('EMU2_default_schedule_body');
	delete_option('EMU2_max_bcc_recipients');
	delete_option('EMU2_schedule_time');
	delete_option('EMU2_sender_name');
	delete_option('EMU2_sender_address');
	delete_option('EMU2_mail_function');

	EMU2_remove_default_capabilities();
}

/**
* Add default user meta information
*/
function EMU2_add_default_user_meta() {
	global $wpdb;
	$users = $wpdb->get_results("SELECT id FROM $wpdb->users");
	foreach ($users as $user) {
		EMU2_user_register($user->id);
	}
}

/**
* Add capabilities to roles by default
*/
function EMU2_add_default_capabilities() {
	$role = get_role('contributor');
	$role->add_cap(EMU2_EMAIL_SINGLE_USER_CAP);

	$role = get_role('author');
	$role->add_cap(EMU2_EMAIL_SINGLE_USER_CAP);
	$role->add_cap(EMU2_EMAIL_MULTIPLE_USERS_CAP);

	$role = get_role('editor');
	$role->add_cap(EMU2_NOTIFY_USERS_CAP);
	$role->add_cap(EMU2_EMAIL_SINGLE_USER_CAP);
	$role->add_cap(EMU2_EMAIL_MULTIPLE_USERS_CAP);
	$role->add_cap(EMU2_EMAIL_USER_GROUPS_CAP);
	$role->add_cap(EMU2_EXPORT_LIST_CAP);

	$role = get_role('administrator');
	$role->add_cap(EMU2_MANAGE_OPTIONS_CAP);
	$role->add_cap(EMU2_NOTIFY_USERS_CAP);
	$role->add_cap(EMU2_EMAIL_SINGLE_USER_CAP);
	$role->add_cap(EMU2_EMAIL_MULTIPLE_USERS_CAP);
	$role->add_cap(EMU2_EMAIL_USER_GROUPS_CAP);
	$role->add_cap(EMU2_EXPORT_LIST_CAP);
}function EMU2_remove_default_capabilities() {
	$role = get_role('contributor');
	$role->remove_cap(EMU2_EMAIL_SINGLE_USER_CAP);

	$role = get_role('author');
	$role->remove_cap(EMU2_EMAIL_SINGLE_USER_CAP);
	$role->remove_cap(EMU2_EMAIL_MULTIPLE_USERS_CAP);

	$role = get_role('editor');
	$role->remove_cap(EMU2_NOTIFY_USERS_CAP);
	$role->remove_cap(EMU2_EMAIL_SINGLE_USER_CAP);
	$role->remove_cap(EMU2_EMAIL_MULTIPLE_USERS_CAP);
	$role->remove_cap(EMU2_EMAIL_USER_GROUPS_CAP);
	$role->remove_cap(EMU2_EXPORT_LIST_CAP);

	$role = get_role('administrator');
	$role->remove_cap(EMU2_MANAGE_OPTIONS_CAP);
	$role->remove_cap(EMU2_NOTIFY_USERS_CAP);
	$role->remove_cap(EMU2_EMAIL_SINGLE_USER_CAP);
	$role->remove_cap(EMU2_EMAIL_MULTIPLE_USERS_CAP);
	$role->remove_cap(EMU2_EMAIL_USER_GROUPS_CAP);
	$role->remove_cap(EMU2_EXPORT_LIST_CAP);
}

/**
* Add the meta field when a user registers
*/
add_action('user_register', 'EMU2_user_register');

function EMU2_user_register($user_id) {
	if (get_usermeta($user_id, EMU2_ACCEPT_NOTIFICATION_USER_META)=='')
		update_usermeta($user_id, EMU2_ACCEPT_NOTIFICATION_USER_META, 'true');

	if (get_usermeta($user_id, EMU2_ACCEPT_MASS_EMAIL_USER_META)=='')
		update_usermeta($user_id, EMU2_ACCEPT_MASS_EMAIL_USER_META, 'true');
}

/**
* Add a related link to the post edit page to create a template from current post
*/
add_action('submitpost_box', 'EMU2_post_relatedlink');

function EMU2_post_relatedlink() {
	global $post_ID;
	if (isset($post_ID) && current_user_can(EMU2_NOTIFY_USERS_CAP)) {
?>
<div class="postbox">
<h3 class='hndle'><span>Email</span></h3>
<div class="inside">
<p><a href="admin.php?page=emu2-email-users-2/emu2_notify_form.php&post_id=<?php echo $post_ID; ?>"><?php _e('Notify users about this post', EMU2_I18N_DOMAIN); ?></a></p>
</div>
</div>
<?php
	}
}add_action('submitpage_box', 'EMU2_page_relatedlink');
function EMU2_page_relatedlink() {
	global $post_ID;
	if (isset($post_ID) && current_user_can(EMU2_NOTIFY_USERS_CAP)) {
?>
<div class="postbox">
<h3 class='hndle'><span>Email</span></h3>
<div class="inside">
<p><a href="admin.php?page=emu2-email-users-2/emu2_notify_form.php&post_id=<?php echo $post_ID; ?>"><?php _e('Notify users about this page', EMU2_I18N_DOMAIN); ?></a></p>
</div>
</div>
<?php
	}
}

/**
 * Add a new menu under Write:, visible for all users with access levels 8+ (administrator role).
 */
add_action( 'admin_menu', 'EMU2_add_pages' );
function EMU2_add_pages() {
	if (	current_user_can(EMU2_EMAIL_SINGLE_USER_CAP)
		|| 	current_user_can(EMU2_EMAIL_MULTIPLE_USERS_CAP)
		||	current_user_can(EMU2_EMAIL_USER_GROUPS_CAP)
		||	current_user_can(EMU2_EXPORT_LIST_CAP) )  {

		add_menu_page(__('Email Users 2', EMU2_I18N_DOMAIN), __('Email Users 2', EMU2_I18N_DOMAIN), 0, 'emu2-email-users-2/emu2_options_form.php', '', WP_CONTENT_URL . '/plugins/emu2-email-users-2/images/email2.png' );

		if (current_user_can(EMU2_MANAGE_OPTIONS_CAP)) {
			add_submenu_page( 'emu2-email-users-2/emu2_options_form.php', __('Settings', EMU2_I18N_DOMAIN), __('Settings', EMU2_I18N_DOMAIN), 0, 'emu2-email-users-2/emu2_options_form.php' );
		}

		if (current_user_can(EMU2_MANAGE_OPTIONS_CAP)) {
			add_submenu_page( 'emu2-email-users-2/emu2_options_form.php', __('Templates', EMU2_I18N_DOMAIN), __('Templates', EMU2_I18N_DOMAIN), 0, 'emu2-email-users-2/emu2_templates_form.php' );
		}
		
		if (current_user_can(EMU2_EMAIL_SINGLE_USER_CAP) || current_user_can(EMU2_EMAIL_MULTIPLE_USERS_CAP)) {
			add_submenu_page( 'emu2-email-users-2/emu2_options_form.php', __('Send to users', EMU2_I18N_DOMAIN), __('Send to users', EMU2_I18N_DOMAIN), 0, 'emu2-email-users-2/emu2_user_mail_form.php' );
		}

		if (current_user_can(EMU2_EMAIL_USER_GROUPS_CAP)) {
			add_submenu_page( 'emu2-email-users-2/emu2_options_form.php', __('Send to groups', EMU2_I18N_DOMAIN), __('Send to groups', EMU2_I18N_DOMAIN), 0, 'emu2-email-users-2/emu2_group_mail_form.php' );
		}

		if (current_user_can(EMU2_EXPORT_LIST_CAP) ) {
			add_submenu_page( 'emu2-email-users-2/emu2_options_form.php', __('Export a List', EMU2_I18N_DOMAIN), __('Export a List', EMU2_I18N_DOMAIN), 0, 'emu2-email-users-2/emu2_export.php' );
		}

		// For WP 2.8
		//--

		global $_registered_pages;
		$_registered_pages[get_plugin_page_hookname('emu2-email-users-2/emu2_user_mail_form.php','admin.php')] = true;
		$_registered_pages[get_plugin_page_hookname('emu2-email-users-2/emu2_group_mail_form.php','admin.php')] = true;
		$_registered_pages[get_plugin_page_hookname('emu2-email-users-2/emu2_notify_form.php','admin.php')] = true;
		$_registered_pages[get_plugin_page_hookname('emu2-email-users-2/emu2_send_group_mail.php','admin.php')] = true;
		$_registered_pages[get_plugin_page_hookname('emu2-email-users-2/emu2_send_notify_mail.php','admin.php')] = true;
		$_registered_pages[get_plugin_page_hookname('emu2-email-users-2/emu2_send_user_mail.php','admin.php')] = true;
		$_registered_pages[get_plugin_page_hookname('emu2-email-users-2/emu2_send_test_mail.php','options-general.php')] = true;
		$_registered_pages[get_plugin_page_hookname('emu2-email-users-2/emu2_set_options.php','options-general.php')] = true;
		$_registered_pages[get_plugin_page_hookname('emu2-email-users-2/emu2_set_templates.php','options-general.php')] = true;		
		$_registered_pages[get_plugin_page_hookname('emu2-email-users-2/emu2_export.php','admin.php')] = true;

	}
}

/**
* Add a form to change user preferences in the profile
*/
add_action('show_user_profile', 'EMU2_user_profile_form');
function EMU2_user_profile_form() {
	global $user_ID;
?>
	<h3><?php _e('Email Preferences', EMU2_I18N_DOMAIN); ?></h3>

	<table class="form-table">
	<tbody>
		<tr>
			<th></th>
			<td>
				<input 	type="checkbox"
						name="<?php echo EMU2_ACCEPT_NOTIFICATION_USER_META; ?>"
						id="<?php echo EMU2_ACCEPT_NOTIFICATION_USER_META; ?>"
						value="true"
						<?php if (get_usermeta($user_ID, EMU2_ACCEPT_NOTIFICATION_USER_META)=="true") echo 'checked="checked"'; ?> ></input>
				<?php _e('Accept to recieve post or page notification emails', EMU2_I18N_DOMAIN); ?><br/>
				<input 	type="checkbox"
						name="<?php echo EMU2_ACCEPT_MASS_EMAIL_USER_META; ?>"
						id="<?php echo EMU2_ACCEPT_MASS_EMAIL_USER_META; ?>"
						value="true"
						<?php if (get_usermeta($user_ID, EMU2_ACCEPT_MASS_EMAIL_USER_META)=="true") echo 'checked="checked"'; ?> ></input>
				<?php _e('Accept to recieve emails sent to multiple recipients (but still accept emails sent only to me)', EMU2_I18N_DOMAIN); ?>
			</td>
		</tr>
	</tbody>
	</table>
<?php
}

/**
* Save our profile data
*/
add_action('personal_options_update', 'EMU2_user_profile_update');
function EMU2_user_profile_update() {
	global $_POST, $user_ID;

	if (isset($_POST[EMU2_ACCEPT_NOTIFICATION_USER_META])) {
		update_usermeta($user_ID, EMU2_ACCEPT_NOTIFICATION_USER_META, 'true');
	} else {
		update_usermeta($user_ID, EMU2_ACCEPT_NOTIFICATION_USER_META, 'false');
	}

	if (isset($_POST[EMU2_ACCEPT_MASS_EMAIL_USER_META])) {
		update_usermeta($user_ID, EMU2_ACCEPT_MASS_EMAIL_USER_META, 'true');
	} else {
		update_usermeta($user_ID, EMU2_ACCEPT_MASS_EMAIL_USER_META, 'false');
	}
}add_filter('admin_init', 'EMU2_editor_admin_init');
function EMU2_editor_admin_init() {
	wp_enqueue_script('word-count');
	#wp_enqueue_script('post');
	wp_enqueue_script('editor');
	add_thickbox();
	wp_enqueue_script('media-upload');
}

/**
 * Wrapper for the option 'EMU2_default_subject'
 */
function EMU2_get_default_subject() {
	return stripslashes(get_option( 'EMU2_default_subject' ));
}

/**
 * Wrapper for the option 'EMU2_default_subject'
 */
function EMU2_update_default_subject( $subject ) {
	return update_option( 'EMU2_default_subject', stripslashes($subject) );
}

/**
 * Wrapper for the option 'EMU2_default_body'
 */
function EMU2_get_default_body() {
	return stripslashes(get_option( 'EMU2_default_body' ));
}

/**
 * Wrapper for the option 'EMU2_default_body'
 */
function EMU2_update_default_body( $body ) {
	return update_option( 'EMU2_default_body', stripslashes($body) );
}

/**
 * Wrapper for the option 'EMU2_default_subject'
 */
function EMU2_get_default_schedule_subject() {
	return stripslashes(get_option( 'EMU2_default_schedule_subject' ));
}

/**
 * Wrapper for the option 'EMU2_default_subject'
 */
function EMU2_update_default_schedule_subject( $subject ) {
	return update_option( 'EMU2_default_schedule_subject', stripslashes($subject) );
}

/**
 * Wrapper for the option 'EMU2_default_body'
 */
function EMU2_get_default_schedule_body() {
	return stripslashes(get_option( 'EMU2_default_schedule_body' ));
}

/**
 * Wrapper for the option 'EMU2_default_body'
 */
function EMU2_update_default_schedule_body( $body ) {
	return update_option( 'EMU2_default_schedule_body', stripslashes($body) );
}

/**
 * Wrapper for the option 'EMU2_version'
 */
function EMU2_get_installed_version() {
	return get_option( 'EMU2_version' );
}

/**
 * Wrapper for the option 'EMU2_version'
 */
function EMU2_get_current_version() {
	return EMU2_CURRENT_VERSION;
}

/**
 * Wrapper for the option 'EMU2_build'
 */
function EMU2_get_installed_build() {
	return get_option( 'EMU2_build' );
}

/**
 * Wrapper for the option 'EMU2_build'
 */
function EMU2_get_current_build() {
	return EMU2_CURRENT_BUILD;
}

/**
 * Wrapper for the option default_mail_format
 */
function EMU2_get_default_mail_format() {
	return get_option( 'EMU2_default_mail_format' );
}

/**
 * Wrapper for the option default_mail_format
 */
function EMU2_update_default_mail_format( $default_mail_format ) {
	return update_option( 'EMU2_default_mail_format', $default_mail_format );
}

/**
 * Wrapper for the option max_bcc_recipients
 */
function EMU2_get_max_bcc_recipients() {
	return get_option( 'EMU2_max_bcc_recipients' );
}

/**
 * Wrapper for the option max_bcc_recipients
 */
function EMU2_update_max_bcc_recipients( $max_bcc_recipients ) {
	return update_option( 'EMU2_max_bcc_recipients', $max_bcc_recipients );
}

/**
 * Wrapper for the option schedule_time
 */
function EMU2_get_schedule_time() {
	return get_option( 'EMU2_schedule_time' );
}

/**
 * Wrapper for the option schedule_time
 */
function EMU2_update_schedule_time( $schedule_time ) {
	return update_option( 'EMU2_schedule_time', $schedule_time );
}

/**
 * Wrapper for the option individual sender name
 */
function EMU2_get_sender_name() {
	return get_option( 'EMU2_sender_name' );
}

/**
 * Wrapper for the option individual sender name
 */
function EMU2_update_sender_name( $emu2_sender_name ) {
	return update_option( 'EMU2_sender_name', $emu2_sender_name );
}

/**
 * Wrapper for the option individual sender address
 */
function EMU2_get_sender_address() {
	return get_option( 'EMU2_sender_address' );
}

/**
 * Wrapper for the option individual sender address
 */
function EMU2_update_sender_address( $EMU2_sender_address ) {
	return update_option( 'EMU2_sender_address', $EMU2_sender_address );
}

/**
 * Wrapper for the option mail_function
 */
function EMU2_get_mail_function() {
	return get_option( 'EMU2_mail_function' );
}

/**
 * Wrapper for the option mail_function
 */
function EMU2_update_mail_function( $mail_function ) {
	return update_option( 'EMU2_mail_function', $mail_function );
}

/**
 * Wrapper for the option debug
 */
function EMU2_get_debug() {
	return get_option( 'EMU2_debug' );
}

/**
 * Wrapper for the option debug
 */
function EMU2_update_debug( $debug ) {
	return update_option( 'EMU2_debug', $debug );
}

/**
 * Wrapper for the option double_place
 */
function EMU2_get_double_place() {
	return get_option( 'EMU2_double_place' );
}

/**
 * Wrapper for the option double_place
 */
function EMU2_update_double_place( $double_place ) {
	return update_option( 'EMU2_double_place', $double_place );
}

/**
 * Get the users
 * $meta_filter can be '', EMU2_ACCEPT_NOTIFICATION_USER_META, or EMU2_ACCEPT_MASS_EMAIL_USER_META
 */
function EMU2_get_users( $exclude_id='', $meta_filter = '') {
	global $wpdb;

	$additional_sql_filter = "";

	if ($meta_filter=='') {
		if ($exclude_id!='') {
			$additional_sql_filter = " WHERE (id<>" . $exclude_id . ") ";
		}

	    $users = $wpdb->get_results(
			  "SELECT id, user_email, display_name "
			. "FROM $wpdb->users "
			. $additional_sql_filter );
	} else {
		if ($exclude_id!='') {
			$additional_sql_filter .= " AND (id<>" . $exclude_id . ") ";
		}
		$additional_sql_filter .= " AND (meta_key='" . $meta_filter . "') ";
		$additional_sql_filter .= " AND (meta_value='true') ";

	    $users = $wpdb->get_results(
			  "SELECT id, user_email, display_name "
			. "FROM $wpdb->usermeta, $wpdb->users "
			. "WHERE "
			. " (user_id = id)"
			. $additional_sql_filter );
	}

	return $users;
}

/**
 * Get the users
 * $meta_filter can be '', EMU2_ACCEPT_NOTIFICATION_USER_META, or EMU2_ACCEPT_MASS_EMAIL_USER_META
 */
function EMU2_get_roles( $exclude_id='', $meta_filter = '') {
	$roles = array();

	$wp_roles = new WP_Roles();
	#print_r($wp_roles);
	foreach ($wp_roles->get_names() as $key => $value) {
		$users_in_role = EMU2_get_recipients_from_roles(array($key), $exclude_id, $meta_filter);
		if (!empty($users_in_role)) {
			$roles[$key] = $value;
		}
	}

	return $roles;
}

/**
 * Get the users given a id or an array of ids
 * $meta_filter can be '', EMU2_ACCEPT_NOTIFICATION_USER_META, or EMU2_ACCEPT_MASS_EMAIL_USER_META
 */
function EMU2_get_recipients_from_ids( $ids, $exclude_id='', $meta_filter = '') {
	global $wpdb;

	if (empty($ids)) {
		return array();
	}

	$id_filter = implode(", ", $ids);

	$additional_sql_filter = "";
	if ($exclude_id!='') {
		$additional_sql_filter .= " AND (id<>" . $exclude_id . ") ";
	}

	if ($meta_filter=='') {
	    $users = $wpdb->get_results(
			  "SELECT id, user_email, display_name "
			. "FROM $wpdb->users "
			. "WHERE "
			. " (id IN (" . implode(", ", $ids) . ")) "
			. $additional_sql_filter );
	} else {
		$additional_sql_filter .= " AND (meta_key='" . $meta_filter . "') ";
		$additional_sql_filter .= " AND (meta_value='true') ";

	    $users = $wpdb->get_results(
			  "SELECT id, user_email, display_name "
			. "FROM $wpdb->usermeta, $wpdb->users "
			. "WHERE "
			. " (user_id = id)"
			. $additional_sql_filter
			. " AND (id IN (" . implode(", ", $ids) . ")) " );
	}

	return $users;
}

# getting all recipients for digest schedule
function EMU2_get_recipients_all($meta_filter = EMU2_ACCEPT_MASS_EMAIL_USER_META) {
	# detect all roles with a) users which b) accept mass mails
	$roles = EMU2_get_roles( null, $meta_filter);
	$recipients = EMU2_get_recipients_from_roles($roles, null, $meta_filter);
	#print_r($recipients);
	return $recipients;
}

/**
 * Get the users given a role or an array of roles
 * $meta_filter can be '', EMU2_ACCEPT_NOTIFICATION_USER_META, or EMU2_ACCEPT_MASS_EMAIL_USER_META
 */
function EMU2_get_recipients_from_roles($roles, $exclude_id='', $meta_filter = '') {
	global $wpdb;

	if (empty($roles)) {
		return array();
	}

	// Build role filter for the list of roles
	//--
	$role_count = count($roles);
	$capability_filter = '';
	for ($i=0; $i<$role_count; $i++) {
		$capability_filter .= "meta_value like '%" . $roles[$i] . "%'";
		if ($i!=$role_count-1) {
			$capability_filter .= ' OR ';
		}
	}

	// Additional filter on the meta_filters if necessary
	//--
	if ($meta_filter!='') {
	
		// Get ids corresponding to the roles
		//--
	    $ids = $wpdb->get_results(
				  "SELECT id "
				. "FROM $wpdb->usermeta, $wpdb->users "
				. "WHERE "
				. " (user_id = id) "
				. ($exclude_id!='' ? ' AND (id<>' . $exclude_id . ')' : '')
				. " AND (meta_key = '" . $wpdb->prefix . "capabilities') "
				. " AND (" . $capability_filter . ") " );

		if (count($ids)<1) {
			return array();
		}
	
		$id_list = "";
		for ($i=0; $i<count($ids)-1; $i++) {
			$id_list .= $ids[$i]->id . ",";
		}
		$id_list .= $ids[count($ids)-1]->id;
		
		#print $id_list."<br>";

		
		$sql=  "SELECT id, user_email, display_name "
				. "FROM $wpdb->usermeta, $wpdb->users "
				. "WHERE "
				. " (user_id = id) "
				. " AND (id in (" . $id_list . ")) "
				. " AND (meta_key = '" . $meta_filter ."') "
				. " AND (meta_value = 'true') ";
		#print ($sql)."<br>";
		$users = $wpdb->get_results($sql);
	} else {
	    $users = $wpdb->get_results(
				  "SELECT id, user_email, display_name "
				. "FROM $wpdb->usermeta, $wpdb->users "
				. "WHERE "
				. " (user_id = id) "
				. ( $exclude_id!='' ? ' AND (id<>' . $exclude_id . ')' : '' )
				. " AND (meta_key = '" . $wpdb->prefix . "capabilities') "
				. " AND (" . $capability_filter . ") " );
	}
#print_r($users);
	return $users;
}

/**
 * Check Valid E-Mail Address
 */
function EMU2_is_valid_email($email) {
	if (EMU2_get_debug() || $_SERVER["HTTP_HOST"]=='localhost') return true;
	if (function_exists('is_email')) {
		return is_email($email);
	}
	$regex = '/^[A-z0-9][\w.+-]*@[A-z0-9][\w\-\.]+\.[A-z0-9]{2,6}$/';
	return (preg_match($regex, $email));
}

/**
 * Replace the template variables in a given text.
 */
function EMU2_replace_post_templates($text, $post_title, $post_excerpt, $post_url) {
	$text = preg_replace( '/%POST_TITLE%/', $post_title, $text );
	$text = preg_replace( '/%POST_EXCERPT%/', $post_excerpt, $text );
	$text = preg_replace( '/%POST_URL%/', $post_url, $text );
	return $text;
}

/**
 * Replace the template variables in a given text.
 */
function EMU2_replace_blog_templates($text) {
	$blog_url = get_option( 'home' );
	$blog_name = get_option( 'blogname' );

	$text = preg_replace( '/%BLOG_URL%/', $blog_url, $text );
	$text = preg_replace( '/%BLOG_NAME%/', $blog_name, $text );
	return $text;
}

/**
 * Replace the template variables in a given text.
 */
function EMU2_replace_sender_templates($text, $sender_name) {
	$text = preg_replace( '/%FROM_NAME%/', $sender_name, $text );
	return $text;
}
?>