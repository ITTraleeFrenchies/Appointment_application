<?php
session_start();
	// ======== if session is not started ========
	if(!isset($_SESSION['username'])){
		header("location: indexAdmin.php"); // Redirecting To Other Page
	}
						
						$servername = "localhost";
						$username = "root";
						$password = "mysqlitt12345";
						$dbname = "appointment_db";
						
						$link = mysqli_connect($servername, $username, $password, $dbname);
						/*=========================== GENERAL VIEW ===============*/
						
						$select_total = "select * from view_general";
						$result_view_general = mysqli_query($link,$select_total);

						$select_app = "select * from view_state";
						$result_view_app = mysqli_query($link,$select_app);

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
		<link rel="stylesheet" href="style/datareview.css" type="text/css">
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
						<h3>Administration </h2>
							<div>
							    <span class="sexy_line"></span>
							</div>	
						<h3>Global Statistics</h3>
						
						<?php 
							$sql_check='select * from connection';
							$query_check = mysqli_query($link,$sql_check);
							if($query_check->num_rows ==0){
								?>
								<h4>No statistics to show as no user has ever connected on the application</h4>
								<?php 
							}
							else{
							

						?>
						<h4>Total and average</h4>
						 <table class="tg">
													  <tr>
														<th class="tg-031e">Total number of users</th>
														<th class="tg-031e">Average time spent on the application</th>
														<th class="tg-031e">Total number of request</th>
														<th class="tg-031e">Meeting accepted</th>
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
							<form action="" method="get" name="login">
									<label for="tnumber">Search</label>
							   	    <input type="text" name="tnumber" maxlength="9" placeholder="tnumber" id="tnumber"/>
							   	    <button type="submit" class="button" >Search</button>
							   	    <br>
							   	    <br>
									<table class="tg">
															<tr>
																<?php 

																/*=================== PERSONNAL VIEW ==================*/
																if(isset($_GET['tnumber'])){ 

																	$sql_find = 'select * from user where tnumber = "' . $_GET['tnumber'].'"';
																	$query_find = mysqli_query($link,$sql_find);
																/* ===========   if the user exists in the database==================*/
																	if (!$query_find  || $_GET['tnumber'] == "" || empty($query_find) || $query_find->num_rows ==0) {
																		$error = "This user does not exist.";
																	?>
																		<br>
																	<!-- ============ Display an error ================= -->
																		<span><?php echo $error; ?></span>

																	<?php 	
																	}else {

															
																	$tnumber = $_GET['tnumber'];
																	$sql_view='create or replace view view_user as 
																	select (select "'. $tnumber.'") as "tnumber", (select count(*) from appointment where state="Accepted" and tnumber="'. $tnumber.'") 
																	as "Number of Meetings", (select count(*) from appointment where tnumber="'. $tnumber.'")
																	 as "Number of requests", (select register_date from user where tnumber="'. $tnumber.'") 
																	 as "Register date", (select min(date_request) from appointment where tnumber="'. $tnumber.'")
																	 as "Date of first request",
																	  (select CONCAT( FLOOR(HOUR(TIMEDIFF(user.register_date, min(appointment.date_request))) / 24), 
																	  	" days ", MOD(HOUR(TIMEDIFF(user.register_date, min(appointment.date_request))),24),
																	  	 " hours ", MINUTE(TIMEDIFF(user.register_date, min(appointment.date_request))), 
																	  	 " minutes") from appointment join user on appointment.tnumber = user.tnumber where appointment.tnumber="'. $tnumber.'") 
																	  as "Time diff"';
																	  $result_view_user = mysqli_query($link,$sql_view);

																	$sql_check_app = 'select * from appointment where tnumber = "' . $_GET['tnumber'].'"';
																	$query_check_app = mysqli_query($link,$sql_find);

																	if($query_check_app->num_rows !=0){

																	$select_view_user = "select * from view_user";
																	$result_view_user = mysqli_query($link,$select_view_user);


																	?>

																	<tr>
																		<th class="tg-031e">TNumber</th>
																		<th class="tg-031e">Total number of appointments attended</th>
																		<th class="tg-031e">Total number of requests sent</th>
																		<th class="tg-031e">Date of registration</th>
																		<th class="tg-031e">Date of the first request</th>
																		<th class="tg-031e">Time between registration and first request</th>
																	</tr>

																	<?php
																 	while($row_view_user = $result_view_user->fetch_row()){ 
																 			if($row_view_user[4] == "" ){
																 				?>
																 					<th> <?php echo $row_view_user[0]; ?> </th>
																					<th> <?php echo $row_view_user[1]; ?> </th>
																					<th> <?php echo $row_view_user[2]; ?> </th>
																					<th> <?php echo $row_view_user[3]; ?> </th>
																					<th> <?php echo "None"; ?> </th>
																					<th> <?php echo "None"; ?> </th>
																			<?php		
																 			}else{


																 			?>
																			<tr>
																					<th> <?php echo $row_view_user[0]; ?> </th>
																					<th> <?php echo $row_view_user[1]; ?> </th>
																					<th> <?php echo $row_view_user[2]; ?> </th>
																					<th> <?php echo $row_view_user[3]; ?> </th>
																					<th> <?php echo $row_view_user[4]; ?> </th>
																					<th> <?php echo $row_view_user[5]; ?> </th>
																			</tr>
																	<?php 
																		}
																	} ?>
																	<?php } ?>	
																<?php } ?> 
															<?php } ?>	
													<?php } ?>
															</tr> 
									</table>	
									<div class="see-services"><a href="seeService.php" style=" float:right; color:white;">See and update services</a></div>	
							</form>							  
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

