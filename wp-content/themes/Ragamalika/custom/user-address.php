<?php
// Update address form
require ( dirname(__FILE__) . '/../../../../wp-load.php');
?>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery("input[ref=phone]").mask("(999) 999-9999");
		jQuery(".validation_form").each(function(i){
		  	jQuery(this).validate({
				rules : {
					street: {
						required: true
					},
					zipcode: {
						required: true,
						digits: true,
						maxlength: 5,
						minlength: 5
					},
					new_passwd2 : {
						minlength: 6,
						maxlength: 10,
						required: true,
						equalTo: "#new_passwd1"
					},
					cell_phone : {
						required : true
					},
					home_phone : {
						required : true
					},
					g_m_name : {
						required : true
					}
				}, 	
				messages : {
					street: {
						required: "Enter the street address"
					},
					zipcode: {
						required: "Enter the zipcode",
						minlength: "5 digit"
					},
					new_passwd2: {
						required: "Confirm Password",
						minlength : "Must be atleast 6 and Maximum 10 characters long",
						equalTo : "Password do not match"
					},
					cell_phone : {
						required : "Enter the Phone no"
					},
					home_phone : {
						required : "Enter the Phone no"
					},
					g_m_name : {
						required : "Enter Guardian Name"
					}
				},
		        invalidHandler: function(form, validator) {
		            var errors = validator.numberOfInvalids();
	                window.setTimeout('jQuery.colorbox.resize()',10);
		     	},
		     	submitHandler : function ( form ) {
		     		if ( form.name == 'profile_passwd_form' || form.name == 'profile_address_form' || form.name == 'change_phone' ) {
		     			// alert ( jQuery(form).serialize());
		     			var url = _STYLESHEETPATH + '/custom/update_user_meta.php?' + jQuery(form).serialize();
						jQuery.ajax ({
							url: url,
							type: "GET",
							success: function(data){
								jQuery.colorbox.close();
							}			
						});
		     		}
		     	}

		  	});
		});
	  // 	jQuery("#profile_passwd_form").validate({
			// rules : {
			// 	new_passwd2 : {
			// 		minlength: 6,
			// 		maxlength: 10,
			// 		required: true,
			// 		equalTo: "#new_passwd1"
			// 	}
			// }, 	
			// messages : {
			// 	new_passwd2: {
			// 		required: "Confirm Password",
			// 		minlength : "Must be atleast 6 and Maximum 10 characters long",
			// 		equalTo : "Password do not match"
			// 	}
			// }
			// // ,
			// // errorPlacement: function (error, element) {
			// // }
	  // 	});
	});
</script>
<?php
if ( isset($_GET['address']) && $_GET['address'] == '1' ) {
	global $current_user;
?>
<div class="address-form form_styling">
	<form method="POST" class="validation_form" id="profile_address_form" name="profile_address_form" action="">
		<input type="hidden" name="address_form" value="true"/>
		<input type="hidden" name="userid" value="<?php echo $current_user->ID;?>"/>
		<fieldset>
			<?php include (get_stylesheet_directory() . '/custom/street-state-zip.php');?>
			<p><button id="update">Update</button></p>
		</fieldset>
	</form>
</div>
<?php
}
elseif ( isset($_GET['ch_passwd']) && $_GET['ch_passwd'] == '1' ) {
?>
<div class="ch_passwd-form form_styling">
	<form method="POST" class="validation_form" id="profile_passwd_form" name="profile_passwd_form" action="">
		<input type="hidden" name="password_form" value="true"/>
		<input type="hidden" name="userid" value="<?php echo $current_user->ID;?>"/>
		<fieldset>
			<p>
				<label class="label_field" for="new_passwd1">Enter Password</label>
				<input id="new_passwd1" name="new_passwd1" type="password"/>
			</p>
			<p>
				<label class="label_field" for="new_passwd2">Confirm Password</label>
				<input id="new_passwd2" name="new_passwd2" type="password"/>
			</p>
			<p  class="right"><button id="update">Change</button></p>
		</fieldset>
	</form>
</div>
<?php
}
elseif ( isset($_GET['ch_phone']) && $_GET['ch_phone'] == '1' ) {
?>
<div class="ch_phone-form form_styling">
	<form method="POST"  class="validation_form" action="" name="change_phone" id="change_phone">
		<input type="hidden" name="phone_form" value="true"/>
		<input type="hidden" name="userid" value="<?php echo $current_user->ID;?>"/>
		<fieldset>
			<?php include (get_stylesheet_directory() . '/custom/phone-nos.php');?>
			<p  class="right"><button id="update">Change</button></p>
		</fieldset>
	</form>
</div>
<?php
}
elseif ( $_GET['f_g_info'] == '1' ) {
?>
<div class="m_g_info form_styling">
	<form method="POST"  class="validation_form" action="">
		<input type="hidden" name="f_g_info" value="true"/>
		<input type="hidden" name="userid" value="<?php echo $current_user->ID;?>"/>
		<fieldset>
			<?php include (get_stylesheet_directory() . '/custom/f_g_info.php');?>
			<p  class="right"><button id="update">Update</button></p>
		</fieldset>
	</form>
</div>
<?php
}
elseif ( $_GET['m_g_info'] == '1' ) {
?>
<div class="m_g_info form_styling">
	<form method="POST"  class="validation_form" action="">
		<input type="hidden" name="m_g_info" value="true"/>
		<input type="hidden" name="userid" value="<?php echo $current_user->ID;?>"/>
		<fieldset>
			<?php include (get_stylesheet_directory() . '/custom/m_g_info.php');?>
			<p  class="right"><button id="update">Update</button></p>
		</fieldset>
	</form>
</div>
<?php
}
?>
