<?php
include "insert.php";
  	 $tnumber = $_SESSION['insert'];
	$email = $tnumber . "@z3students.ittralee.ie";
	
session_destroy();

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
				<img src="images/rsz_ittralee_icone.png" alt="ITtralee" >
				<h1>Institute of Technology of Tralee</h1>
				
				<div class="or-spacer">
					  <div class="mask">
				</div>

				<h2>Appointment Application</h2>
					<div class="message">	  
							<h2>Account created</h2>
							<p>An email has been sent to your Zimbra address email :' . $email . '</p>
					</div>
				
			</div>
		</section>
		<div class="footer">
			<p>2015 - IT Tralee - Designed by Angele Demeurant and Aurelien Bigois </p>
		</div>
</body>
</html>
';

?>	