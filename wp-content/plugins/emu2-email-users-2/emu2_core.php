<?php
/*  Copyright
	2011 Juergen Schulze

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


/**
 * Delivers email to recipients in HTML or plaintext
 *
 * Returns number of recipients addressed in emails or false on internal error.
 */
function EMU2_send_mail($recipients = array(), $subject = '', $message = '', $type='plaintext', $sender_name='', $sender_email='') {
	$num_sent = 0; // return value
	if ( (empty($recipients)) ) { return $num_sent; }
	if ($message=='') { return false; }
	if (EMU2_get_debug()) {
		print "Sender Name: ".$sender_name."<br>\n";
		print "Sender Address: ".$sender_email."<br>\n";
	}
    $headers  = 'From: "'.$sender_name.'" <'.$sender_email.'>'."\n";
    $headers .= 'Reply-To: "'.$sender_name.'" <'.$sender_email.'>'."\n";
	$headers .= 'Return-Path: '. $sender_email. "\n";
	$headers .= 'X-Mailer: Wordpress with EMU2 Email Users 2 - PHP'.phpversion()."\n";
	$headers .= 'Date: ' . date('r')."\n";
	$temp_ary = explode(' ', (string) microtime());
	$headers .= 'Message-Id: <' . date('YmdHis') . '.' . substr($temp_ary[0],2) . '@'.$_SERVER["HTTP_HOST"].'>'."\n";

	$subject = stripslashes($subject);
	$message = stripslashes($message);

	if ($type == 'html') {
		$headers .= 'MIME-Version: 1.0'."\n";
		$headers .= 'Content-Type: '.get_bloginfo('html_type').'; charset='. get_bloginfo('charset')."\n";
		$mailtext = '<html><head><title>'.$subject.'</title></head><body>'.$message.'</body></html>';
	} else {
		$headers .= 'MIME-Version: 1.0'."\n";
		$headers .= 'Content-Type: text/plain; charset='.get_bloginfo('charset')."\n";
		$message = preg_replace('|&[^a][^m][^p].{0,3};|', '', $message);
		$message = preg_replace('|&amp;|', '&', $message);
		$mailtext = wordwrap(strip_tags($message), 80, "\n");
	}

	// If one unique recipient, send mail using to field.
	//--
	if (count($recipients)==1) {
		if (EMU2_is_valid_email($recipients[0]->user_email)) {
			#$headers .= 'Bcc: '.$recipients[0]->display_name.' <'.$recipients[0]->user_email.'>'."\n";
			#$headers .= 'To: '.$recipients[0]->display_name.' <'.$recipients[0]->user_email.'>'."\n";
			// don't need to send to sender twice
			#$headers .= 'Cc: ' . $sender_email . "\n\n";
			#emu2_mailf($sender_email, $subject, $mailtext, $headers);

			# just do a normal sending to the one recepient and with the sender in Bcc field
			$headers .= 'Bcc: '.$sender_name.' <'.$sender_email.'>'."\n";
			emu2_mailf($recipients[0]->user_email, $subject, $mailtext, $headers);
			$num_sent++;
		} else {
			echo '<p class="error"The email address of the user you are trying to send mail to is not a valid email address format.</p>';
			return $num_sent;
		}
		return $num_sent;
	}

	// If multiple recipients, use the BCC field
	//--
	$bcc = '';
	$bcc_limit = EMU2_get_max_bcc_recipients();

	if ( $bcc_limit>0 && (count($recipients)>$bcc_limit) ) {
		$count = 0;
		$sender_emailed = false;
		for ($i=0; $i<count($recipients); $i++) {
			$recipient = $recipients[$i]->user_email;

			if (!EMU2_is_valid_email($recipient)) { continue; }
			if ( empty($recipient) || ($sender_email == $recipient) ) { continue; }

			if ($bcc=='') {
				$bcc = "Bcc: $recipient";
			} else {
				$bcc .= ", $recipient";
			}

			$count++;

			if (($bcc_limit == $count) || ($i==count($recipients)-1)) {
				if (!$sender_emailed) {
					$newheaders = $headers . 'To: ' . $sender_name . ' <' . $sender_email . '>'."\n" . "$bcc\n";
					$sender_emailed = true;
				} else {
					$newheaders = $headers . "$bcc\n";
				}
				emu2_mailf($sender_email, $subject, $mailtext, $newheaders);
				$count = 0;
				$bcc = '';
			}

			$num_sent++;
		}
	} else {
		// place sender into to field as well to overcome some problems if wanted
		if (EMU2_get_double_place()==true) {
			$headers .= 'To: ' . $sender_name . ' <' . $sender_email . '>'."\n";
		}

		for ($i=0; $i<count($recipients); $i++) {
			$recipient = $recipients[$i]->user_email;

			if (!EMU2_is_valid_email($recipient)) { echo "$recipient email not valid"; continue; }
			if ( empty($recipient) || ($sender_email == $recipient) ) { continue; }

			if ($bcc=='') {
				$bcc = "Bcc: $recipient";
			} else {
				$bcc .= ", $recipient";
			}
			$num_sent++;
		}
		$newheaders = $headers . "$bcc\n";
		emu2_mailf($sender_email, $subject, $mailtext, $newheaders);
	}

	return $num_sent;
}

function emu2_mailf($to_address, $subject, $mailtext, $header) {

	if (EMU2_get_debug()) {
		print "<br>To:".$to_address."<br><br>\n";
		print "Header-><br/>\n".nl2br(htmlentities($header))."\n<-\n";
	}
		if (EMU2_get_mail_function()=="wp_mail") {
		if (EMU2_get_debug()==false) {
			@wp_mail($to_address, $subject, $mailtext, $header);
		} else {
			wp_mail($to_address, $subject, $mailtext, $header);
		}
	} else {
		if (EMU2_get_debug()==false) {
			@mail($to_address, $subject, $mailtext, $header);
		} else {
			mail($to_address, $subject, $mailtext, $header);
		}
	}
}


# sending digest mail on schedule
function EMU2_send_scheduled() {
	$subject = EMU2_get_digest_subject();
	$mail_content = EMU2_get_digest_body();
	$recipients = EMU2_get_recipients_all();
	//print_r($recipients);
	$mail_format = EMU2_get_default_mail_format();


	$from_name = get_bloginfo('name');
	$from_address = get_bloginfo('admin_email');
	# check for individual sender settings and overwrite
	if (EMU2_get_sender_name()!="") $from_name=EMU2_get_sender_name();
	if (EMU2_get_sender_address()!="") $from_address=EMU2_get_sender_address();

	if ($mail_content['check']) {
	# new posts found
		if (empty($recipients)) {
			# no recepients found
			emu2_mailf($from_address, "Digest NOT sent", "Digest NOT sent to. There are no recepients".$num_sent." users", "From: ".$from_address);
		} else {
			$num_sent = EMU2_send_mail($recipients, $subject, $mail_content['body'], $mail_format, $from_name, $from_address);
			# send mail to admin about how many where sent
			emu2_mailf($from_address, "Digest sent", "Digest sent to: ".$num_sent." users", "From: ".$from_address);
		}
	} else {
		# no new posts found
		emu2_mailf($from_address, "Digest NOT sent", "There are no new posts", "From: ".$from_address);
	}
}

# creates the schedule digest subject
function EMU2_get_digest_subject() {
	$subject=EMU2_replace_schedule_templates(EMU2_get_default_schedule_subject());
	return $subject;
}

# creates the complete digest body
function EMU2_get_digest_body() {
	global $wpdb;
	$return_value=array();
	$body="";
	$sql = "SELECT ID,post_title, post_content, post_excerpt
            FROM $wpdb->posts
            WHERE post_type = 'post'
				AND post_status = 'publish'
				AND post_date > NOW( ) - INTERVAL 1 DAY
				ORDER BY post_date DESC
				";
	#print "<br />\n".$sql."<br />\n";
	$posts = $wpdb->get_results($sql);
	if (count($posts)===0) {
		$return_value['check']=false;
	} else {
		$return_value['check']=true;
		foreach ($posts as $post) {
			$body.=$post->post_title."<br />\n";
			if ($post->post_excerpt!="") {
				# use the excerpt
				$body.=$post->post_excerpt."<br />\n";
			} else {
				# call function to custom create the excerpt
				$body.=EMU2_create_excerpt($post->post_content)."<br />\n";
			}
			$body.='<a href="'.get_permalink($post->ID).'">'.get_permalink($post->ID).'</a>'."<br />\n";
			$body.="<br />\n";
		}
		
		// fill %THE_DIGEST%
		$body_new = preg_replace( '/%THE_DIGEST%/', $body, EMU2_get_default_schedule_body() );

		// Replace the template variables
		$return_value['body'] = EMU2_replace_schedule_templates($body_new);		
		
	}
	



	return $return_value;

}

# replace the variables for schedule mails
function EMU2_replace_schedule_templates($text) {
	$text = preg_replace( '/%THE_DATE%/', date(get_option('date_format')), $text );
	$text = preg_replace( '/%BLOG_NAME%/', get_option( 'blogname' ), $text );
	$text = preg_replace( '/%BLOG_URL%/', get_option( 'home' ), $text );
	return $text;
}

# smart way to shorten the content to create an excerpt
function EMU2_create_excerpt($mycontent) {
	$mycontent = strip_shortcodes($mycontent);
	$mycontent = str_replace(']]>', ']]&gt;', $mycontent);
	$mycontent = strip_tags($mycontent);
	$excerpt_length = 55;
	$words = explode(' ', $mycontent, $excerpt_length + 1);
	if(count($words) > $excerpt_length) {
		array_pop($words);
		array_push($words, '...');
		$mycontent = implode(' ', $words);
	}
	return $mycontent;
}

?>