<?php
session_start();
<<<<<<< HEAD
	/* =================  If the user already connected  ====================== */
	if(isset($_SESSION['username'])){
		header("location: datareview.php");
	}
=======
>>>>>>> origin/master
						
						$servername = "localhost";
						$username = "root";
						$password = "mysqlitt12345";
						$dbname = "appointment_db";
						
						$link = mysqli_connect($servername, $username, $password, $dbname);
						$select_service = "select * from service";
						$result_sel_service = mysqli_query($link,$select_service);

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
				<form action="" method="get" name="">
						<div class="part_align">	
							<h3>Administration </h2>
							<div>
							    <span class="sexy_line"></span>
							</div>	
							<h3>View of a user</h3>	
							<label for="tnumber">Search</label>
							<input type="text" name="tnumber" maxlength="9" placeholder="tnumber" id="tnumber"/>
							<button type="submit" class="button" >Search</button>
							<br>
							<br>
							<table class="tg">
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
																	?>
																			
																			 <tr>
																				<th class="tg-031e">tnumber</th>
																				<th class="tg-031e">first name</th>
																				<th class="tg-031e">last name </th>
																				<th class="tg-031e">pin</th>
																				<th class="tg-031e">register date</th>
																				<th class="tg-031e">date of birth</th>
																				<th class="tg-031e">address 1</th>
																				<th class="tg-031e">address 2</th>
																				<th class="tg-031e">city </th>
																				
																			  </tr>
																	<?php 		  
																			while($row_user = $query_find->fetch_row()){ ?>
																			<tr>
																					<th> <?php echo $row_user[0]; ?> </th>
																					<th> <?php echo $row_user[1]; ?> </th>
																					<th> <?php echo $row_user[2]; ?> </th>
																					<th> <?php echo $row_user[3]; ?> </th>
																					<th> <?php echo $row_user[4]; ?> </th>
																					<th> <?php echo $row_user[5]; ?> </th>
																					<th> <?php echo $row_user[6]; ?> </th>
																					<th> <?php echo $row_user[7]; ?> </th>
																					<th> <?php echo $row_user[8]; ?> </th>

																					<?php 
																						$row_9 = $row_user[9]; 
																						$row_10 = $row_user[10];  
																						$row_11 = $row_user[11];  
																						$row_12 = $row_user[12];  	
																						$row_13 = $row_user[13]; 
																						$row_14 = $row_user[14]; 
																					?> 
																			</tr>
																		<?php } ?>
							</table>											
							<table class="tg">										
																		<tr>
																				<th class="tg-031e">county </th>
																				<th class="tg-031e">course </th>
																				<th class="tg-031e">type of disability </th>
																				<th class="tg-031e">disability detail </th>
																				<th class="tg-031e">contact number </th>
																				<th class="tg-031e">specification </th>	
																		</tr>		  
																			<tr>
																					
																					<th> <?php echo $row_9 ; ?> </th>
																					<th> <?php echo $row_10 ; ?> </th>
																					<th> <?php echo $row_11 ; ?> </th>
																					<th> <?php echo $row_12 ; ?> </th>
																					<th> <?php echo $row_13 ; ?> </th>
																					<th> <?php echo $row_14 ; ?> </th>
																			</tr>	
																			<?php } ?>		
															<?php } ?>

							</table>	

																														
						</div>
						<div class="see-services"><a href="seeService.php" style=" float:right; color:white;">See services</a></div>
				</form>	
				<br>
						<a href="logoutAdmin.php" style="text-decoration: none;"><input class="btn-disconnect" value="Disconnect" type="button" ></a>
						<br>

		</section>
		<div class="footer">
							<p>2015 - Institute of Technology of Tralee </p>
		</div>
		
	</body>
						
</html>