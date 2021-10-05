<?php
require('assets/phpmailer/PHPMailer.php');

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE; //set default smtp or imap authentication
$mail->SMTPSecure = "ssl"; //indentifies secure connection type either tls or ssl
$mail->Port     = 465;   //secure connection port 465 if ssl, 587 if tls.
$mail->Username = "marcoabra88@gmail.com"; //Your User Email in GMAIL
$mail->Password = ""; //your password in GMAIL
$mail->Host     = "smtp.gmail.com"; //smtp or imap host address from an Email Provider like GMAIL
$mail->Mailer   = "smtp"; //type of email service either smtp or imap. Smtp service method means you are using the service to send an email
//while an IMAP service means that you are using the service to recieve an incoming emails.
$mail->SetFrom($_POST["marcopogi88@gmail.com"], $_POST["Marco"]); //set sender (use current account deets provided by you)
$mail->AddReplyTo($_POST["userEmail"], $_POST["userName"]); //set email reply address
$mail->AddAddress("parientesmarisol18@gmail.com");	//set email recipient
$mail->Subject = $_POST["subject"]; //default email subject
$mail->WordWrap   = 80; //set default message maximum characters
$mail->MsgHTML($_POST["content"]); //default email message body


$mail->IsHTML(true);

if(!$mail->Send()) {
	echo "<p class='error'>Problem in Sending Mail.</p>";
} else {
	echo "<p class='success'>Contact Mail Sent.</p>";
}	
?>
