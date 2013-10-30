<?php
// Update address form
require ( dirname(__FILE__) . '/../../../../wp-load.php');
global $current_user;
if ( !empty($_GET) ) {
	//http://bramkaslp01/ragamalika/wp-content/themes/Ragamalika/custom/update_meta.php?password_form=true&userid=4&new_passwd1=balaji&new_passwd2=balaji
	unset ($_GET['userid']);
	if ( !empty($_GET['password_form'])) {
		$new_password = wp_hash_password( $_GET['new_passwd1'] );
		// $current_user = wp_get_current_user(  );
		$args = array (
				'ID' => $current_user->ID,
				'user_pass' => $new_password
			);
		// wp_update_user ( $args );
		wp_set_password ( $_GET['new_passwd1'], $current_user->ID);
		update_user_meta ($current_user->ID, 'default_password_nag', 0);
		wp_password_change_notification($current_user);		
	}
	if ( !empty($_GET['address_form'])) {
		unset ($_GET['address_form']);
		foreach ($_GET as $key => $value) {
			update_user_meta($current_user->ID, $key, $value);
		}
	}
}

?>
