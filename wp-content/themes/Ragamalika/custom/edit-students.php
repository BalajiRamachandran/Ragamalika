<?php
	include dirname(__FILE__) . '/../../../../wp-load.php';
	//value=balaji%40bramkas.com.1&id=1&rowId=0&columnPosition=2&columnId=2&columnName=Email
	$sTable = $table_prefix . "cformssubmissions";

	$id = $_POST['id'];
	$columnName = $_POST['columnName'];
	$value = $_POST['value'];
	$statusUpdate = 0;

	if ( $columnName != 'status' ) {
		$updateStudentsSql = "UPDATE $sTable SET $columnName = '" . $value . "' WHERE id = '" . $id . "'";
	} else {
		$updateStudentsSql = "UPDATE " . $table_prefix . "cformsdata SET field_val = '" . $value . "' WHERE sub_id = '" . $id . "' and field_name ='" . $columnName . "'";
	}
	$result = mysql_query($updateStudentsSql);
	$num = mysql_num_rows($result);

	if ( mysql_error()) {
		echo mysql_error();
		exit(NULL);
	}

	if ( strtolower($value) == 'approved' && !empty($num) ) {
		// get email using id.
		$updateStudentsSql=  "select field_val from ${table_prefix}cformsdata where sub_id = $id and field_name = 'Email';";
		$result = mysql_query($updateStudentsSql);
		$num = mysql_num_rows($result);

		if ( mysql_error()) {
			echo mysql_error();
			exit(NULL);
		}
		while ($row = mysql_fetch_object($result)) {
			$to = $row->field_val;
		}

		if ( !empty($to)) {

			$subject = "Ragamalika Registration Link";
			$message = apply_filters('the_content', get_page_by_title ('Approval Email')->post_content);

			$register_id = generate_id ( $to );

			$updateStudentsSql = "INSERT INTO ${table_prefix}cformsdata (sub_id, field_name, field_val) VALUES ($id, 'register_id', $register_id); ";
			$result = mysql_query($updateStudentsSql);
			$num = mysql_num_rows($result);

			if ( mysql_error()) {
				echo mysql_error();
				exit(NULL);
			}
			

		}

		//select field_val from ragamalika_cformsdata where sub_id = '11' and field_name = 'Email'
		// email format

		//
		// wp_mail( $to, $subject, $message, $headers );
		//send email link
		//add unique id to table
		// send registration link
		// verify id in the link in registration form.
		// on completion set status to complete
	}

	echo $_POST['value'];
?>