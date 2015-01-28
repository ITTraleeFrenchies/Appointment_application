<?php
	include('script_sql_index.php'); // Includes Login Script
	if(isset($_SESSION['tnumber'])){
		header("location: connected.php");
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Student Application : Appointment</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="style/all_style.css" type="text/css">
		<link rel="stylesheet" href="style/index.css" type="text/css">
		<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
	</head>
	<body>
		<section>
			<div id="content">
				<img src="images/rsz_ittralee_icone.png" alt="ITtralee" width="100" height="100" >
				<h1>Institute of Technology of Tralee</h1>
				
				<div class="or-spacer">
					  <div class="mask"></div>
				</div>
				<h2>Appointment Application</h2>
					<form action="" method="post" name="login">
						<div class="part_align">
								<br>
								<br>
								<label for="tnumber">T-number</label>
								<input type="text" name="tnumber" placeholder="tnumber">
								<br>
								<br>
								<label for="pin">Pin</label>
							    <input type="password" name="pin" placeholder="*****"/>
								<br>
								<br>
								<input name="submit_login" class="btn-login" value="login" type="submit">
								<input name="submit_subscribe" class="btn-subscribe" value="subscribe" type="submit">
								<br>
							</div>
					</form>
					<span><?php echo $error; ?></span>
					
			</div>
		</section>
		
		
		<div class="footer">
			<p>2015 - Institute of Technology of Tralee </p>
		</div>
		
	</body>
	
</html>

