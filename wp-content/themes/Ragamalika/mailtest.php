<?php

if ( !empty($_POST)) {
  if ( !empty ($_POST['to']) && !empty($_POST['from']))  {
    $return = mail_utf8 ( $_POST['to'], $_POST['from'], $_POST['from'], $_POST['subject'], $_POST['message']);
    if ( !empty($return )) {
      echo "<p>Mail sent successfully!</p>";
    } else {
      echo "<p>Mail sent error!</p>";
    }
  } 
}

// $to      = 'nobody@bramkas.com';
// $subject = 'the subject';
// $message = 'hello';
// $headers = 'From: webmaster@bramkas.com' . "\r\n" .
//     'Reply-To: webmaster@bramkas.com' . "\r\n" .
//     'X-Mailer: PHP/' . phpversion();

?>

<form method="POST" name="mail-form">

  <p><label for="to-email">To</label><input type="text" name="to" id="to"/></p>
  <p><label for="from-email">From</label><input type="text" name="from" id="from"/></p>
  <p><label for="subject-email">Subject</label><input type="text" name="subject" id="subject"/></p>
  <p><lable>Message</label><textarea name="message" id="message" rows="3"></textarea></p>
  <p><input type="submit" value="send"/>
</form>

<?php
function mail_utf8($to, $from_user, $from_email, 
                                             $subject = '(No subject)', $message = '')
   { 
      // $from_user = "=?UTF-8?B?".base64_encode($from_user)."?=";
      // $subject = "=?UTF-8?B?".base64_encode($subject)."?=";

      $headers = "From: $from_user <$from_email>\r\n". 
               "MIME-Version: 1.0" . "\r\n" . 
               "Content-type: text/html; charset=UTF-8" . "\r\n"; 

     return mail($to, $subject, $message, $headers); 
   }
// mail($to, $subject, $message, $headers);
?>