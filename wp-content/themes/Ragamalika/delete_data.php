<?php
delete_option('sidebars_widgets'); //delete widgets
delete_option('shoppingcart_general_settings');
delete_option('shipping_method_free_shipping');
delete_option('shipping_method_flat_rate');
delete_option('shipping_method_price_base');
delete_option('shipping_method_weight_base');
delete_option('payment_method_paypal');
delete_option('payment_method_googlechkout');
delete_option('payment_method_authorizenet');
delete_option('payment_method_worldpay');
delete_option('payment_method_2co');
delete_option('payment_method_prebanktransfer');
delete_option('payment_method_payondelevary');

global $wpdb;
$delete_options = "delete from $wpdb->options where option_name like \"ptthemes_%\" or option_name like \"bizzthemes_%\"";
$wpdb->query($delete_options);
/////////DELETE USERES/////////
require_once(ABSPATH.'wp-admin/includes/user.php'); 
$usrid = $current_user->data->ID;
$user_str = $wpdb->get_var("select group_concat(ID) from $wpdb->users where ID not in (1,$usrid)");
if($user_str)
{
   $user_arr = explode(',',$user_str);
   for($i=0;$i<count($user_arr);$i++)
    {
       wp_delete_user($user_arr[$i]);
   }
}
////////////DELETE CATEGORY ///////////////
$cat_str = $wpdb->get_var("select group_concat(term_id) from $wpdb->terms");
if($cat_str)
{
   $cat_arr = explode(',',$cat_str);
   for($i=0;$i<count($cat_arr);$i++)
    {
        wp_delete_term( $cat_arr[$i],'');
        //wp_delete_term($cat_ID, 'link_category', array('default' => $default_cat_id));
        //wp_delete_term($cat_ID, 'category', array('default' => $default));
   }
}
/////////DELETE POSTS///////////////
$pids_str = $wpdb->get_var("select group_concat(ID) from $wpdb->posts");
if($pids_str)
{
	$pids_arr = explode(',',$pids_str);
  	for($i=0;$i<count($pids_arr);$i++)
    {
    	wp_delete_post($pids_arr[$i]);
    }
}
?>