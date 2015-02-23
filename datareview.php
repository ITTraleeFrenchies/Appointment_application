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
						<?php 
						
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "appointment_db";
						
						$link = mysqli_connect($servername, $username, $password, $dbname);
										
						echo "GLOBAL VIEWS </br></br>";
						/*================= VIEW STATE =========================*/
						echo "State View : </br>";
						$view_state = 'create or replace view view_state as 
						SELECT 
						(
						 SELECT COUNT(*) FROM appointment 
						) AS number_app,
						( 
						SELECT COUNT(*) FROM appointment where state="Waiting"
						 )AS number_waiting, 
						( 
						SELECT COUNT(*) FROM appointment where state="Accepted" 
						) AS number_accepted,
						(
						 SELECT COUNT(*) FROM appointment where state="Declined" 
						) AS number_cancelled
						';
						
						$query = mysqli_query($link,$view_state);
						
						$select = "select * from view_state";
						$result = mysqli_query($link,$select);
						
						while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
							//print_r($row);
							var_dump($row);
							echo "</br>";
						}										
						
						/*=========================== GENERAL VIEW ===============*/
						echo "General View </br>";
						$view_general = 'create or replace view view_general as
						SELECT 
						(SELECT COUNT(*) FROM user) AS "Number of users",
						(select sec_to_time(round(sum(time_to_sec(timediff(log_out, log_in))) / count(distinct tnumber))) as "average time" from connection) AS"Average time spent", 
						(select round(count(id) / count(distinct tnumber),1) as "average request" from appointment) AS "Average meeting requests", 
						(select count(id) as "number accepted" from appointment where state = "Accepted") AS "Number of meeting", 
						(select count(*) as "number of requests" from appointment) AS "Number of request"';
						
						$query = mysqli_query($link,$view_general);
						
						$select = "select * from view_general";
						$result = mysqli_query($link,$select);
						
						while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
							var_dump($row);
							echo "</br>";
						}
						
						
						/*================== TIME VIEW =============================*/
						echo ("Time View : </br>");
						$view_time = 'create or replace view view_time as
						select appointment.tnumber as "tnumber",
						CONCAT(
						FLOOR(HOUR(TIMEDIFF(user.register_date, appointment.date_request)) / 24), " days ",
						MOD(HOUR(TIMEDIFF(user.register_date, appointment.date_request)), 24), " hours ",
						MINUTE(TIMEDIFF(user.register_date, appointment.date_request)), " minutes") as "time diff"
						from appointment
						join user on appointment.tnumber=user.tnumber
						group by appointment.tnumber';
						
						$query = mysqli_query($link,$view_time);
						
						$select = "select * from view_time";
						$result = mysqli_query($link,$select);
						
						while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
							var_dump($row);
							echo "</br></br>";
						}
						
						echo ("PERSONNAL VIEW </br></br>");
						/*=================== PERSONNAL VIEW ==================*/
						$tnumber="t00178764";
						$sql='create or replace view view_user as
						select (select "'.$tnumber.'") as "tnumber",
						(select count(*) from appointment where state="Accepted" and tnumber="'.$tnumber.'") as "Number of Meetings",
						(select count(*) from appointment where tnumber="'.$tnumber.'") as "Number of requests"
						';
						
						$query = mysqli_query($link,$sql);
						
						$select = "select * from view_user";
						$result = mysqli_query($link,$select);
						
						while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
							var_dump($row);
							echo "</br>";
						}
						
						?>
						
						
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

