<?php
require_once('PHPMailer/PHPMailerAutoload.php');
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;  
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML();
$mail->Username = 'feedbacklnmiit@gmail.in';
$mail->Password = 'helloworld12345';
$mail->SetFrom('no-reply@gmail.com');
$mail->Subject = 'A test email';
$mail->Body = 'A test mail';
$mail->AddAddress('15uec022@lnmiit.ac.in');

$mail->Send();

?>
