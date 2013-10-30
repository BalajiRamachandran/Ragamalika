<?php
 
/*
Plugin Name: Ragamalika Welcome Email
Plugin URI: http://www.ragamalika.net
Description: Customize the output of the welcome email sent by WordPress.
Version: 0.1
Author: Balaji Ramachandran
Author URI: http://www.bramkas.com
License: GPLv2
 
**************************************************************************
 
  Copyright (C) 2012 BRAMKAS INC
 
  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.
 
  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General License for more details.
 
  You should have received a copy of the GNU General License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 
**************************************************************************
 
*/
 
// Redefine user notification function
if ( !function_exists( 'wp_new_user_notification' ) ) {
 
function wp_new_user_notification( $user_id, $plaintext_pass = '' ) {
    // define the functionality of your new function.
    $user = new WP_User($user_id);

    $user_login = stripslashes($user->user_login);
    $user_email = stripslashes($user->user_email);

    $options['name'] = $user->display_name;

        $user           = new WP_User($user_id);

    $user_login     = stripslashes($user->user_login);
    $user_email     = stripslashes($user->user_email);

    $options['email'] = $user_email;
    
    if ( empty($plaintext_pass) )
        return;
    
    $message = get_page_by_title ('RegistrationConfirmation')->post_content;

    $message        = str_replace('[##username##]',$user_login, "$message");
    $message        = str_replace('[##user_pass##]',$plaintext_pass, "$message");   
    
    // wp_mail($user_email, sprintf(__('Registration Confirmation: %s'), $blogname), $message, $headers);
    $blogname       = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

    // send_notification ($user_email, sprintf(__('Registration Confirmation: %s'), $blogname), $message, $headers );
    $blogname = get_option('blogname');
    $blogemail = get_option('admin_email');
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    $headers[] = "From: $blogname <${blogemail}>";
    // print_r($blogname);
    $message = str_replace("[##blogname##]", $blogname, $message);
    $message = str_replace("[##student_name##]", $options['name'], $message);
    $message = str_replace("[##admin_email##]", $blogemail, $message);
    $message = str_replace("[##site_url##]", get_option("site_url"), $message);
    $message = str_replace("[##register_id##]", $code, $message);
    $message = str_replace("[##registration_link##]", $registration_link, $message);
    $message = str_replace("[##registration_link_2##]", $registration_link . "?register_id=" . $code, $message);
    $message = str_replace("[##email_logo##]", get_stylesheet_directory_uri() . '/images/email_logo.png', $message);
    foreach ($options as $key => $value) {
        # code...
        $message = str_replace("[##${key}##]", $value, $message);
    }
    // print_r($message);
    // print_r($headers);

    switch ($action) {
        case 'register_id':
            $subject = "Welcome to $blogname";
            break;
        case 'registration' :
            $subject = "Welcome to $blogname";
            break;
        default:
            # code...
            $subject = "Welcome to $blogname";
            break;
    }

    wp_mail($options['email'], $subject, $message, $headers);

}

     
} // End of 'if wp_new_user_notification doesn't exist'
     
?>