<?php
session_start();
	// ======== if session is not started ========
	if(!isset($_SESSION['username'])){
		header("location: indexAdmin.php"); // Redirecting To Other Page
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Student Application : Appointment</title>
		<!-- ============ Viewport basics for mobile devices ================= -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="style/all_style.css" type="text/css">
		<link rel="stylesheet" href="style/connected.css" type="text/css">
		<script src="http://www.datejs.com/build/date.js" type="text/javascript"></script>
		
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
				<form action="" method="" name="">
						<div class="part_align">
						<h3>Global Statistics</h3>
						 <table class="tg">
													  <tr>
														<th class="tg-031e">Name</th>
														<th class="tg-031e">8</th>
														<th class="tg-031e">9</th>
														<th class="tg-031e">10</th>
														<th class="tg-031e">11</th>
														<th class="tg-031e">12</th>
														<th class="tg-031e">13</th>
														<th class="tg-031e">14</th>
														<th class="tg-031e">15</th>
														<th class="tg-031e">16</th>
														<th class="tg-031e">17</th>
														<th class="tg-031e">18</th>
													  </tr>
													  <tr>
														<td class="tg-031e"></td>
														<td class="tg-031e"></td>
														<td class="tg-031e"></td>
														<td class="tg-031e"></td>
														<td class="tg-031e"></td>
														<td class="tg-031e"></td>
														<td class="tg-031e"></td>
														<td class="tg-031e"></td>
														<td class="tg-031e"></td>
														<td class="tg-031e"></td>
														<td class="tg-031e"></td>
														<td class="tg-031e"></td>
													  </tr>
							</table>	
						</div>
						<br>
						<a href="logoutAdmin.php" style="text-decoration: none;"><input class="btn-disconnect" value="Disconnect" type="button" ></a>
						<br>
				</form>	
			</div>		
		</section>
		<div class="footer">
			<p>2015 - Institute of Technology of Tralee </p>
		</div>
		
	</body>
	
</html>

