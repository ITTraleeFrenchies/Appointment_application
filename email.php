<?php
/* =================  Redirect the page email.php to index.php after 3 seconds   ====================== */	
//header( "refresh:3;url=index.php" );
include "insert.php";

/* =================  We retrieve the data  ====================== */	
	$tnumber = $_SESSION['insert'];
	$email = $tnumber . "@z3students.ittralee.ie";
	$pin =  substr($tnumber, -5); 
  	
 /* =================  We send an email to the student   ====================== */	

 /*
 require_once 'swiftmailer-master/lib/swift_required.php';

$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
  ->setUsername('ademeura')
  ->setPassword('100694Angele');

$mailer = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance('Test Subject')
  ->setFrom(array('ademeura@gmail.com' => 'ABC'))
  ->setTo(array('angel079@hotmail.com'))
  ->setBody('This is a test mail.');

$result = $mailer->send($message);
*/

 
  	$to      = $email;
	$subject = 'Registering to Appointment Application of the Institute of Technology of Tralee';
	$message = 'Hello ' . $tnumber . ' , <br /> You are now registered in the appointment application
	the Institute of Technology of Tralee. <br /> Your PIN is : ' . $pin ;
	$headers = 'From:  webmaster.it.tralee.app@gmail.com' . "\r\n" .
    'Reply-To:  webmaster.it.tralee.app@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message, $headers))
    echo "Email sent";
else
    echo "Email sending failed";


/* =================  Code HTML of email.php   ====================== */	
echo '<!DOCTYPE html>
<head>
		<title>Student Application : Appointment</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="style/all_style.css" type="text/css">
		<link rel="stylesheet" href="style/email.css" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet" type="text/css" >
</head>

<body>
		<section>
			<div id="content">
				<img src="images/rsz_ittralee_icone.png" alt="ITtralee" height="100" width="100">
				<h1>Institute of Technology of Tralee</h1>
				
				<div class="or-spacer">
					  <div class="mask">
				</div>

				<h2>Appointment Application</h2>
					<div class="message">	  
							<p>An email has been sent to your Zimbra address email: ' . $email . '</p>
							<p>Do not refresh the page, you will be automatically redirected to your profile. </p>
					</div>
				
			</div>
		</section>
		<div class="footer">
			<p>2015 - Institute of Technology of Tralee </p>
		</div>
</body>
</html>
';
/* =================  We don't need a connected session anymore ====================== */
session_destroy();
?>	