<?php
	
	//################################################################################
	//###### Project   : Constant contact integration with word press  			######
	//###### File Name : gCls1.php                   							######
	//###### Purpose   : send the user entered value to constant contact class  ######
	//###### Date      : June 20th 2009                  						######
	//###### Updated   : July 24th 2010                  						######
	//###### Author    : Gopi.R                        							######
	//################################################################################
	
	require_once('../../../../wp-config.php');
	$Email=@$_GET["txt_email_newsletter"];
	require_once 'gCls2.php';
	$ConstantContact = new ConstantContact();
	$ConstantContact->setUsername(get_option('gConstantcontact_widget_username')); /* set the constant contact username */
	$ConstantContact->setPassword(get_option('gConstantcontact_widget_password')); /* set the constant contact password */
	$ConstantContact->setCategory(get_option('gConstantcontact_widget_group')); /* set the constant contact interest category */
	if($ConstantContact->add($Email)):
		echo "succ";
	else:
		echo "err";
	endif;
?>
