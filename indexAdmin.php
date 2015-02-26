<?php
	session_start();
	/* =================  We include the script in order to check the connection  ====================== */
	include('connectAdmin.php'); 
	/* =================  If a session is not openned   ====================== */
	if(isset($_SESSION['username'])){
		header("location: datareview.php");
	}
	
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Student Application : Appointment</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="style/all_style.css" type="text/css">
		<link rel="stylesheet" href="style/index.css" type="text/css">
	</head>
	<body>
		<section>
			<div id="content">
				<img src="images/rsz_ittralee_icone.png" alt="ITtralee" width="100" height="100" >
				<h1>Institute of Technology of Tralee</h1>
				
				<!-- ============ Separator ================= -->
				<div class="or-spacer">
					  <div class="mask"></div>
				</div>
				<h2>Appointment Application</h2>
					<form action="" method="post" name="login">
						<h3>Administration </h2>
						<div class="part_align">
								<br>
								<label for="username">Username</label>
								<input type="text" name="username" placeholder="username" maxlength="30">
								<br>
								<br>
								<label for="pin">Password</label>
							    <input type="password" name="password" placeholder="*********" maxlength="30"/>
								<br>
								<br>
								<!-- ============ Display an error if the connection did not work ================= -->
									<span><?php echo $error; ?></span>
								<br>
								<br>	
								<input name="submit_login" class="btn-login" value="login" type="submit">
								<br>
							</div>
					</form>
					
			</div>
		</section>
		
		
		<div class="footer">
			<p>2015 - Institute of Technology of Tralee </p>
		</div>
		
	</body>
	
</html>

