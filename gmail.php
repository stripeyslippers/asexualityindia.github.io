<?php
date_default_timezone_set('Asia/Kolkata');
require_once('class.phpmailer.php');
require_once('class.smtp.php');
function smtpmailer($from, $from_name, $body) { 
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "maildivyamary@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "oknplm24";
//Set who the message is to be sent from
$mail->setFrom($from, $from_name);
//Set an alternative reply-to address
$mail->addReplyTo($from, $from_name);
//Set who the message is to be sent to
$mail->addAddress('maildivyamary@gmail.com', 'Divya Mary');
//Set the subject line
$mail->Subject = 'Mail from divyamary.in';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$mail->Body=$body;
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
}
