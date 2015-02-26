<?php
session_start();
/* =================  We include the script in order to retrieve data  ====================== */
	include('extract_busy_time.php'); 
	include('getDataZimbra.php');  
	include('extract_history.php');
	// ======== if session is not started ========
	if(!isset($_SESSION['tnumber'])){
		header("location: index.php"); // Redirecting To Other Page
	}
	/* when the user goes to history, we retrieve all his meeting from the database,
	we retrieve all the meeting for each service, we check if meeting corresponds and if it does
	we check the state.
	If a meeting from a service does not appear, or the service was before or the service has been cancelled
	*/

/*
	$servername = "localhost";
	$username = "root";
	$password = "ittdb12345";
	$dbname = "appointment_db";
		$sql_nb_user = "SELECT * FROM service";
	$link = mysqli_connect($servername, $username, $password, $dbname);
	$result = mysqli_query($link,$sql_nb_user);
	$nb_service = (mysqli_num_rows($result));
	while($row = $result->fetch_row()){
		if (getBusyTime($row[0],'busyTimeData.txt') != "error"){
			$array = getBusyTime($row[0],'busyTimeData.txt');
			echo $row[0];
			foreach($array as $key => $val){ 
				 echo $val; ;
			}
		}
	}*/
	

	// ============== get all busy time of the user ==========================
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "appointment_db";
	$sql_get_app = "SELECT * FROM appointment where tnumber='" . $_SESSION['tnumber']."'";
	$link = mysqli_connect($servername, $username, $password, $dbname);
	$result = mysqli_query($link,$sql_get_app);
	$nb_app = (mysqli_num_rows($result));
	$index=0;

	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Student Application : Appointment</title>
		<!-- ============ Viewport basics for mobile devices ================= -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="style/all_style.css" type="text/css">
		<link rel="stylesheet" href="style/history.css" type="text/css">
		<script type="text/javascript" >

		</script>
	</head>
	<body onload="getData();">
		<section>
			<div id="content">
				<img src="images/rsz_ittralee_icone.png" alt="ITtralee" width="100" height="100" >
				<h1>Institute of Technology of Tralee</h1>
				
				<!-- ============ Separator ================= -->
				<div class="or-spacer">
					  <div class="mask"></div>
				</div>
				<h2>Appointment Application</h2>
						<div class="part_align">
							<form action="" method="post" name="form" id="id_form" >
										<p>
											<h3>History of your appointments</h3>
												  <div id="meetings">
												  </div>
												  <div id="text">
												  </div>
												  <table class="tg" id="tableApp">
													  <tr>
														<th class="tg-031e">Service</th>
														<th class="tg-031e">Date request</th>
														<th class="tg-031e">Date appointment</th>
														<th class="tg-031e">State</th>
													  </tr>
													  <tr>
													  	<?php while($row = $result->fetch_row()){ ?>
															<tr>
																	<th> <?php echo $row[$index+2]; ?> </th>
																	<th> <?php echo $row[$index+3]; ?> </th>
																	<th> <?php echo $row[$index+4]; ?> </th>
																	<th> <?php echo $row[$index+5]; ?> </th>
															</tr>
														<?php } ?>
														
													  </tr>
												</table>
											 <div id="display-meeting"></div>	
											<div class="back-make"><a href="connectedM.php" style=" float:right; color:white;">Back to make an appointment</a></div>	
										</p>
							</form>
						</div>
			</div>	
			<!-- ============ Link to logout.php to disocnnect the user ================= -->
			
		</section>
		<div class="footer">
			<p>2015 - Institute of Technology of Tralee </p>
		</div>
		
	</body>
	
</html>

