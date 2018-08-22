<?php
require_once('PHPMailer/class.phpmailer.php');

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;

$senderMail = 'mail@iflex-tech.com';

$mail->Host = "mail.iflex-tech.com";
$mail->Port = 25;
$mail->Username = "mail@iflex-tech.com";
$mail->Password = "Iflex@123";

$mail->SetFrom($senderMail, $name);
$mail->Subject = "Approval for login";
$body="
<b>***Approval for login***</b> <br><br><br>
<b>EMAIL ID:</b> $email <br><br>
<b>MESSAGE:</b> Mr. $name <br>  $message";
$mail->MsgHTML($body);
$address = $email;
 //mail send at this mail id
$mail->AddAddress($address, 'Approval for login');

if($mail->Send()) {
	//echo "true2";
  //header("Location:enquiry.php");
  //echo "<div id='navigation' style='width: 405px;  text-align:center; font-weight: 700; color: #009900; padding-top:9px; position:absolute; height:24px; margin-left:394px; margin-right:auto; margin-top:240px; '> THANK YOU! WE HAVE RECEIVED YOUR REQUEST </div>";
} else {
  echo "Mailer Error: " . $mail->ErrorInfo;
}

?>
