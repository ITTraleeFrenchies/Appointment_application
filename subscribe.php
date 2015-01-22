<?php include('insert.php'); ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Student Application : Appointment</title>
<!--		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="style/all_style.css" type="text/css">
		<link rel="stylesheet" href="style/body_style.css" type="text/css">
		<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css' -->
	</head>
	<body>
		<section>
			<div id="content">
			<img src="images/rsz_ittralee_icone.png" alt="ITtralee" >
			<h1>Institute of Technology of Tralee</h1>
			
			<div class="or-spacer">
				  <div class="mask"></div>
			</div>
			<h2>Appointment Application</h2>
			
				<form action="" method="POST">
					
					<br>
					<br>
					<label for="tnumber">T-number</label>
					<input type="text" name="tnumber">
					<br>
					<br>
					<label for="firstname">Firstname</label>
				    <input type="text" name="firstname" />
					<br>
					<br>
					<label for="lastname">Lastname</label>
				    <input type="text" name="lastname" />
					<br>
					<br>
					<span><?php echo $error; ?></span>
					<!--<div class="btn-subscribe"> Subscribe </div>-->
					<input type="submit" value="Subscribe" name="submit_subscribe" class="btn-subscribe">
					<br>
				</form>
			</div>
		</section>
		
		
		<div class="footer">
			<p>2015 - IT Tralee - Designed by Angele Demeurant and Aurelien Bigois </p>
		</div>
		
	</body>
	
</html>

