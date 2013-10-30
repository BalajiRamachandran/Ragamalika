<?php
	require dirname(__FILE__) . '/../../../wp-load.php';
	if ( empty ($_GET ) ) {
		return "Unknown Error";
	}
	//http://bramkaslp01/ragamalika/wp-content/themes/Ragamalika/register_user.php?register_id_code=&name=BALAJI+RAMACHANDRAN&dob=09%2F04%2F2006&email=1%40bramkas.com&gender=male&street=42319+CAPITAL+TERR&city=CHANTILLY&state=KS&zipcode=20152&home_phone=(123)+456-7890&cell_phone=(123)+456-7890&g_m_name=BALAJI+RAMACHANDRAN&g_m_email=BALAJITMR%40GMAIL.COM&g_m_cell_phone=5406322554&g_f_name=BALAJI+RAMACHANDRAN&g_f_email=BALAJITMR%40GMAIL.COM&g_f_cell_phone=5406322554&terms=on&register=register&register=register
// Array
// (
//     [register_id_code] => 
//     [name] => BALAJI RAMACHANDRAN
//     [dob] => 09/04/2006
//     [email] => 1@bramkas.com
//     [gender] => male
//     [street] => 42319 CAPITAL TERR
//     [city] => CHANTILLY
//     [state] => KS
//     [zipcode] => 20152
//     [home_phone] => (123) 456-7890
//     [cell_phone] => (123) 456-7890
//     [g_m_name] => BALAJI RAMACHANDRAN
//     [g_m_email] => BALAJITMR@GMAIL.COM
//     [g_m_cell_phone] => 5406322554
//     [g_f_name] => BALAJI RAMACHANDRAN
//     [g_f_email] => BALAJITMR@GMAIL.COM
//     [g_f_cell_phone] => 5406322554
//     [terms] => on
//     [register] => register
// )

	$mapping_array = array (
		'dob'	=>	'dob',
		'gender'	=>	'gender',
		'street'	=>	'street',
		'city'		=>	'city',
		'state'		=>	'state',
		'zipcode'	=>	'zipcode',
		'home_phone'	=>	'home_phone',
		'cell_phone'	=>	'cell_phone',
		'g_m_name'	=>	'g_m_name',
		'g_m_email'	=>	'g_m_email',
		'g_m_cell_phone'	=>	'g_m_cell_phone',
		'g_f_name'	=>	'g_f_name',
		'g_f_email'	=>	'g_f_email',
		'g_f_cell_phone'	=>	'g_f_cell_phone'
	);

	$username = $_GET['email'];
	$email = $_GET['email'];

	$table 				= 'wp_users';//is_dbtable_there('wp_users');//feusers');
	$qStr 				="SELECT ID FROM $table WHERE user_login = '$username'";	
	$result 			= mysql_query($qStr);
	$num 				= mysql_num_rows($result);
	if($num > 0)
	{
		// header("Location: $url".'?err=5');exit(NULL);	
		return "User Already Exists!";
	}	

	$pw = generateRandomString();

	require_once( ABSPATH . WPINC . '/registration.php');

	$userid = register_new_user($username, $email, $_GET);

	$contact_name = explode(" ", $_GET['name']); 
	print_r($_GET);
	print_r($contact_name);
	update_user_meta ( $userid,  'show_admin_bar_front', 'false');
	update_user_meta ( $userid,  'first_name', $contact_name[0]);
	update_user_meta ( $userid,  'last_name', $contact_name[1]);


	foreach ($mapping_array as $key => $value) {
		update_user_meta ($userid, $key, $_GET[$key]);
	}

/*
 * Handles registering a new user.
 *
 * @param string $user_login User's username for logging in
 * @param string $user_email User's email address to send password and add
 * @return int|WP_Error Either user's ID or error on failure.
 */
function register_new_user( $user_login, $user_email, $user_data ) {
	
	$errors = new WP_Error();

	$sanitized_user_login = sanitize_user( $user_login );
	$user_email = apply_filters( 'user_registration_email', $user_email );

	// Check the username
	if ( $sanitized_user_login == '' ) {
		$errors->add( 'empty_username', __( '<strong>ERROR</strong>: Please enter a username.' ) );
	} elseif ( ! validate_username( $user_login ) ) {
		$errors->add( 'invalid_username', __( '<strong>ERROR</strong>: This username is invalid because it uses illegal characters. Please enter a valid username.' ) );
		$sanitized_user_login = '';
	} elseif ( username_exists( $sanitized_user_login ) ) {
		$errors->add( 'username_exists', __( '<strong>ERROR</strong>: This username is already registered, please choose another one.' ) );
	}

	// Check the e-mail address
	if ( $user_email == '' ) {
		$errors->add( 'empty_email', __( '<strong>ERROR</strong>: Please type your e-mail address.' ) );
	} elseif ( ! is_email( $user_email ) ) {
		$errors->add( 'invalid_email', __( '<strong>ERROR</strong>: The email address isn&#8217;t correct.' ) );
		$user_email = '';
	} elseif ( email_exists( $user_email ) ) {
		$errors->add( 'email_exists', __( '<strong>ERROR</strong>: This email is already registered, please choose another one.' ) );
	}

	do_action( 'register_post', $sanitized_user_login, $user_email, $errors );

	$errors = apply_filters( 'registration_errors', $errors, $sanitized_user_login, $user_email );

	if ( $errors->get_error_code() )
		return $errors;

	$user_pass = wp_generate_password( 12, false);

	$user_id = wp_create_user( $sanitized_user_login, $user_pass, $user_email );

	if ( ! $user_id ) {
		$errors->add( 'registerfail', sprintf( __( '<strong>ERROR</strong>: Couldn&#8217;t register you... please contact the <a href="mailto:%s">webmaster</a> !' ), get_option( 'admin_email' ) ) );
		return $errors;
	}

	update_user_option( $user_id, 'default_password_nag', true, true ); //Set up the Password change nag.

	ad_new_user_notification( $user_id, $user_pass, $user_data );
	
	return $user_id;
}
?>