<?php
require '../reservation/config.inc.php';

$clientblurb =<<< EOT
<p>Name: @NAME@</p>
<p>Email: @EMAIL@</p>
<p>Telephone: @TELEPHONE@</p>
<p>Message: @MESSAGE@</p>
EOT;

$clientblurb = str_replace('@EMAIL@',$_POST['email'], $clientblurb);
$clientblurb = str_replace('@TELEPHONE@',$_POST['telephone'], $clientblurb);
$clientblurb = str_replace('@NAME@',$_POST['name'], $clientblurb);
$clientblurb = str_replace('@MESSAGE@',nl2br($_POST['message']), $clientblurb);

require '../phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               	// Enable verbose debug output

$mail->isSMTP();                                      	// Set mailer to use SMTP
$mail->Host = EMAIL_HOST;  								// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               	// Enable SMTP authentication
$mail->Username = EMAIL_USERNAME;                 		// SMTP username
$mail->Password = EMAIL_PASSWORD;                      	// SMTP password
$mail->SMTPSecure = 'tls';                            	// Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    	// TCP port to connect to

$mail->From = EMAIL_FROM;
$mail->FromName = EMAIL_FROMNAME;
$mail->addAddress(REPLY_EMAIL, BUSINESS_NAME);     	// Add a recipient
$mail->addReplyTo($_POST['email'], $_POST['name']); 
$mail->isHTML(true);                                  	// Set email format to HTML
$mail->Subject= EMAIL_SUBJECT;

$mail->Body    = $clientblurb;

	if(!$mail->send()) {
    echo CONTACT_FAILURE_MESSAGE; 
	}	
	else
	{
	echo CONTACT_SUCCESS_MESSAGE;
	}
	
?>