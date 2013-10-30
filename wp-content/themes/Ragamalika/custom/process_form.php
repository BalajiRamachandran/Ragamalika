<?php
global $current_user;
$post_values = $_POST;
$return = false;

if ( isset($post_values['password_form']) && $post_values['password_form'] == 'true' ) {

} elseif (isset($post_values['address_form']) && $post_values['address_form'] == 'true') {
	update_user_meta ( $current_user->ID, "street", $post_values['street']);
	update_user_meta ( $current_user->ID, "state", $post_values['state']);
	update_user_meta ( $current_user->ID, "zipcode", $post_values['zipcode']);
	$return = true;
	# code...
} elseif (isset($post_values['phone_form']) && $post_values['phone_form'] == 'true') {
	# code...
	$post_values['home_phone'] = str_replace("(", "", $post_values['home_phone']);
	$post_values['home_phone'] = str_replace(")", "", $post_values['home_phone']);
	$post_values['home_phone'] = str_replace("-", "", $post_values['home_phone']);
	$post_values['home_phone'] = str_replace(" ", "", $post_values['home_phone']);
	update_user_meta ( $current_user->ID, 'home_phone', $post_values['home_phone']);

	$post_values['cell_phone'] = str_replace("(", "", $post_values['cell_phone']);
	$post_values['cell_phone'] = str_replace(")", "", $post_values['cell_phone']);
	$post_values['cell_phone'] = str_replace("-", "", $post_values['cell_phone']);
	$post_values['cell_phone'] = str_replace(" ", "", $post_values['cell_phone']);
	update_user_meta ( $current_user->ID, 'cell_phone', $post_values['cell_phone']);
	$return = true;
}

if ( $return == 'true' ) { 
	$message = "Updated Sucessfully";
?>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery(".success_result").delay(1200).fadeOut(200);
});
</script>
<?php
} else {
	$message = "Update Unsuccessful!";
}
?>
<div class="metro gradient1 success_result">
	<h3 class="color_white"><?php echo $message;?></h3>
</div>
