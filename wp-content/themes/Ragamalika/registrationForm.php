<?php
/*
Registration Form
*/

require ( dirname(__FILE__) . '/../../../wp-load.php');

?>
<?php
$register = false;
$age_linit = false;
unset ( $above_16 );
if ( isset($_GET["register_id"]) && strlen($_GET["register_id"]) > 3 ) {
	$register = validate_register_id ( $_GET["register_id"] );
}
if ( !empty($_POST)) {
	// $register = true;
	if ( $_POST['name'] == 'registration') {
		print_r($_POST);

	} else {
		if ( !empty($_POST["register_id"]) ) {
			$register = validate_register_id ( $_POST["register_id"] );
			// print_r($register);
		}			
	}
}
if ( $_GET['register_id'] == 'demo-balaji' || $_POST["register_id"] == 'demo-balaji' ) {
	$register = "ragamalika@bramkas.com";
}

if ( !empty ($register)) {
	$user = get_user_by('email', $register);
	if ( !empty ( $user ) ) {
		echo '<div class="registration-success success-message success">You have already registered using this email: ' . $register . '</div>';
		die();
	}
}

if ( !empty($_GET['register_id']) ) {
	$register_id = $_GET['register_id'];
}
if ( !empty($_POST['register_id']) ) {
	$register_id = $_POST['register_id'];
}

if ( !empty($_GET['above_16']) ) {
	$above_16 = $_GET['above_16'];
}
if ( !empty($_POST['above_16']) ) {
	$above_16 = $_POST['above_16'];
}

// die();

// if ( ! isset( $_POST['reg_email_address'] ) )  {
// 	$register = false;
// } elseif ( isset( $_POST['reg_email_address'] ) && strlen ( $_POST['reg_email_address'] ) > 5 ) {
	// $register = true;
// }

// if ( isset($_POST['register']) && $_POST['register'] == 'register') {
// 	print_r($_POST);
// 	$register_complete = true;
// }
if ( empty($register) ) {
?>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery("#cboxClose").hide();
		jQuery(document).colorbox (
			{
				title: 'Registration Code',
				open : true,
				inline: true, 
				overlayClose: false, 
				escKey: false,
				close: '', 
				href: '#gather_email',
				onLoad: function() {
    				jQuery('#cboxClose').remove();
    				jQuery('#cboxTitle').remove();
    			},
    			onComplete : function() { 
       				jQuery(this).colorbox.resize(); 
       			}
			}
		);
	});
</script>

<div id="gather_email">
	<center>
	<form action="<?php echo get_permalink();?>" name="gather_email_form" id="gather_email_form" method="POST">
		<fieldset>
			<!-- <legend><h3>Enter your approved email address</h3></legend> -->
			<legend><h3>Enter the registration Code!</h3></legend>
<!-- 			<p>
				<label for="reg_email_address"><strong>Email Address</strong></label>
				<input id="reg_email_address" name="reg_email_address" type="text"/>
			</p>
 -->			<p>
 				<label for="register_id"><strong>Registration Code</strong></label>
				<input id="register_id" name="register_id" type="text"/>
			</p>
			<div class="clearfix"><!----></div>
			<p>
				<button name="submit" type="submit" class="btn btn-primary">Submit</button>
			</p>
		</fieldset>
	</form>
			<p>
				<a href="<?php echo site_url();?>"><button class="btn btn-primary">Home</button></a>
			</p>
	</center>
</div>

<?php
}


if ( !empty ($register) && empty($above_16)) {
	//ask for age
	?>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery("#cboxClose").hide();
		jQuery(document).colorbox (
			{
				title: 'Age Verification',
				open : true,
				inline: true, 
				overlayClose: false, 
				escKey: false,
				close: '', 
				href: '#age_verification',
				onLoad: function() {
    				jQuery('#cboxClose').remove();
    				jQuery('#cboxTitle').remove();
    			},
    			onComplete : function() { 
       				jQuery(this).colorbox.resize(); 
       			}
			}
		);
	});
</script>

<div id="gather_email">
	<center>
	<form action="<?php echo get_permalink();?>?register_id=<?php echo $register_id;?>" name="age_verification" id="age_verification" method="POST">
		<fieldset>
			<!-- <legend><h3>Enter your approved email address</h3></legend> -->
			<legend><h3>Select your Age!</h3></legend>
<!-- 			<p>
				<label for="reg_email_address"><strong>Email Address</strong></label>
				<input id="reg_email_address" name="reg_email_address" type="text"/>
			</p>
 -->		
 			<input id="register_id" name="register_id" type="hidden" value="<?php echo $register_id;?>"/>	
 			<p>
 				<label for="above_16"><strong>Age</strong></label>
 				<select name="above_16" id="above_16">
 					<option value="true">Above 18</option>
 					<option value="false">Below 18</option>
 				</select>
			</p>
			<div class="clearfix"><!----></div>
			<p>
				<button name="submit" type="submit" class="btn btn-primary">Submit</button>
			</p>
		</fieldset>
	</form>
	<p>
		<a href="<?php echo site_url();?>"><button class="btn btn-primary">Home</button></a>
	</p>

	</center>
</div>

	<?php
}


?>

<?php

$student_details = array (
	"name"			=>	"Name (First and Last)",
	"date_of_birth"	=>	"Date Of Birth",
	"gender"		=>	array ( "Gender", "Male" , "Female" ),
	"student"		=>	array ( "Student Type", "New" , "Returning" ),
	"street_addr"	=>	"Street Address",
	"city"			=>	"City",
	"state"			=>	"State",
	"zip"			=>	"Zip",
	"home_phone"	=>	"Home Phone",
	"cell_phone"	=>	"Cell Phone",
	"email"			=>	"Email Address"
);

$parent_details = array (
	"name"			=>	"Name (First and Last)",
	"cell_phone_p"	=>	"Cell Phone",
	"email_p"		=>	"Email Address"
);

?>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery(".registration-success").hide();
		// jQuery("#registration").submit(function(){
		// 	// alert ( jQuery(this).serialize());
		// 	//get ajax call to save the info.
		// 	jQuery(this).hide();
		// 	var _TEMPLATEPATH = '<?php echo get_stylesheet_directory_uri();?>';
		// 	var url = _TEMPLATEPATH + "/register_user.php?" + jQuery(this).serialize();
		// 	jQuery.ajax ({
		// 		url: url,
		// 		type: "GET",
		// 		success: function(data){
		// 			jQuery(this).hide();
		// 			jQuery(".registration-success").show();
		// 		}			
		// 	});
		// 	return false;
		// });
	});
</script>
<style type="text/css">
.ui-datepicker-year {
	display: none;
}
</style>
<form action="<?php echo get_permalink() . '?register';?>" method="POST" name="registration" class="form_styling" id="registration">
	<input type="hidden" name="register_id_code" value="<?php echo $_POST['register_id'];?>"/>
	<table width="100%" class="table">
		<tr>
			<td><h3>Student Information</h3></td>
			<td><h3>Guardian Information</h3></td>
		</tr>
	</table>
	<table width="100%">
		<tr>
			<td>
				<p>
					<label class="label_field" for="name">Name (First and Last)</label>
					<input id="name" name="name" type="text" tabindex="1" placeholder="First & Last Name"/>
				</p>
				<p>
					<label class="label_field" for="dob">Date Of Birth</label>
					<input id="dob" name="dob" xid="ddmmm" type="text" tabindex="1" placeholder="Date Of Birth"/>
				</p>
				<p>
					<label class="label_field" for="email">Email</label>
					<div class="input-prepend">
				     	<span class="add-on">@</span>

						<input id="email" name="email" type="text" value="<?php echo $register;?>" tabindex="1" placeholder="email@ragamalika.net" readonly="readonly"/>
						<input id="email" name="email" type="hidden" value="<?php echo $register;?>" />
					</div>
				</p>
				<p>
					<label class="label_field" for="gender">Gender</label>
					<select id="gender" name="gender" tabindex="1">
			            <option value="">Please Select One:</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select>
				</p>
<!-- 				<p>
					<label class="label_field" for="student_type">Student Type</label>
					<select id="student_type" name="student_type" tabindex="1">
			            <option value="">Please Select One:</option>
						<option value="new">New</option>
						<option value="returning">Returning</option>
					</select>
				</p>
 -->				<?php include (TEMPLATEPATH . '/custom/street-state-zip.php');?>
				<?php include ( TEMPLATEPATH . '/custom/phone-nos.php'); ?>
			</td>
			<td>
				<?php 
				$guardian_1 = array ( 
					'title' => 'Guardian Information', 
					'subtitle' => 'Mother / Guardian 1',
					'name'	=>	'Name (First and Last)',
					'email'	=>	'Email',
					'cell_phone' => 'Cell Phone'
				);
				?>
				<!-- Mother / Guardian -->
				<?php
				if ( $above_16 == 'false' ) {
					include ( TEMPLATEPATH . '/custom/m_g_info.php');
					include ( TEMPLATEPATH . '/custom/f_g_info.php');
				}
				?>
				<?php  //include ( TEMPLATEPATH . '/custom/m_g_info.php'); ?>
				<?php //include ( TEMPLATEPATH . '/custom/f_g_info.php'); ?>

			</td>
		</tr>
	</table>
	<table >
		<tr>
			<td colspan="2"><input type="checkbox" name="terms" id="terms"/>
				<span>&nbsp;I/we am/are aware and agree with the <?php echo get_bloginfo('description');?>'s 
				<a class="rules" xhref="<?php echo get_permalink(get_page_by_title('Rules and Regulations')->ID );?>">rules and regulations</a>.
				</span>
			</td>
		</tr>
		<div class="clearfix"><!----></div>
		<tr>
			<td>
				<div class="clearfix"><!----></div>
			</td>
		</tr>
	</table>
	<table class="table">
		<tr>
			<td colspan="2" align="right">
				<button name="register" value="register" id="register.button" type="submit" class="btn btn-primary">Register</button>
				<button name="reset" class="btn btn-primary">Reset</button>
			</td>
		</tr>
	</table>
</form>
<div class="registration-success success-message">Thank you! You will receive an email with your login credentials!.</div>