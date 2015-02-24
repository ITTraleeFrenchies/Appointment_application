<?php
session_start();
	// ======== if session is not started ========
	if(!isset($_SESSION['username'])){
		header("location: indexAdmin.php"); // Redirecting To Other Page
	}
						
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "appointment_db";
						
						$link = mysqli_connect($servername, $username, $password, $dbname);
						/*=========================== GENERAL VIEW ===============*/
						
						$select_total = "select * from view_general";
						$result_view_general = mysqli_query($link,$select_total);

						
						$select_app = "select * from view_state";
						$result_view_app = mysqli_query($link,$select_app);
															
															
						/*=================== PERSONNAL VIEW ==================*/
						/*$tnumber="t00178764";
						$sql='create or replace view view_user as
						select (select "'.$tnumber.'") as "tnumber",
						(select count(*) from appointment where state="Accepted" and tnumber="'.$tnumber.'") as "Number of Meetings",
						(select count(*) from appointment where tnumber="'.$tnumber.'") as "Number of requests"
						';
						
						$query = mysqli_query($link,$sql);*/
						
						$select = "select * from view_user";
						$result_view_user = mysqli_query($link,$select);
						
								




?>
<!DOCTYPE html>
<html>
	<head>
		<title>Student Application : Appointment</title>
		<!-- ============ Viewport basics for mobile devices ================= -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="style/all_style.css" type="text/css">
		<link rel="stylesheet" href="style/connected.css" type="text/css">
		<link rel="stylesheet" href="style/history.css" type="text/css">
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
						<h4>Total and average</h4>
						 <table class="tg">
													  <tr>
														<th class="tg-031e">Total number of users</th>
														<th class="tg-031e">Total number of meeting</th>
														<th class="tg-031e">Total number of request</th>
														<th class="tg-031e">Average time spent on the app per user </th>
														<th class="tg-031e">Average number of request per user</th>
													  </tr>
													  <tr>
													  		<?php while($row_view_gen = $result_view_general->fetch_row()){ ?>
																<tr>
																		<th> <?php echo $row_view_gen[0]; ?> </th>
																		<th> <?php echo $row_view_gen[1]; ?> </th>
																		<th> <?php echo $row_view_gen[2]; ?> </th>
																		<th> <?php echo $row_view_gen[3]; ?> </th>
																		<th> <?php echo $row_view_gen[4]; ?> </th>
																</tr>
															<?php } ?>
													  </tr>
							</table>	
							<br>
							<h4>Total about appointment</h4>
							<table class="tg">
													  <tr>
														<th class="tg-031e">Total number of appointment</th>
														<th class="tg-031e">Total number of appointment waiting</th>
														<th class="tg-031e">Total number of appointment accepted</th>
														<th class="tg-031e">Total number of appointment cancelled</th>
													  </tr>
													  <tr>
													  		<?php while($row_view_app = $result_view_app->fetch_row()){ ?>
																<tr>
																		<th> <?php echo $row_view_app[0]; ?> </th>
																		<th> <?php echo $row_view_app[1]; ?> </th>
																		<th> <?php echo $row_view_app[2]; ?> </th>
																		<th> <?php echo $row_view_app[3]; ?> </th>
																</tr>
															<?php } ?>
													  </tr>
							</table>	
							<br>
							<h4>User stats</h4>
							<table class="tg">
													<tr>
														<th class="tg-031e">TNumber</th>
														<th class="tg-031e">Total number of appointments attended</th>
														<th class="tg-031e">Total number of requests sent</th>
														<th class="tg-031e">Date of registration</th>
														<th class="tg-031e">Date of the first request</th>
														<th class="tg-031e">Time between registration and first request</th>
													</tr>
													<tr>
														<?php while($row_view_user = $result_view_user->fetch_row()){ ?>
																<tr>
																		<th> <?php echo $row_view_user[0]; ?> </th>
																		<th> <?php echo $row_view_user[1]; ?> </th>
																		<th> <?php echo $row_view_user[2]; ?> </th>
																		<th> <?php echo $row_view_user[3]; ?> </th>
																		<th> <?php echo $row_view_user[4]; ?> </th>
																		<th> <?php echo $row_view_user[5]; ?> </th>
																</tr>
															<?php } ?>
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

