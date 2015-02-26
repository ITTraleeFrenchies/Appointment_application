<?php
session_start();
						
						$servername = "localhost";
						$username = "root";
						$password = "mysqlitt12345";
						$dbname = "appointment_db";
						
						$link = mysqli_connect($servername, $username, $password, $dbname);
						$select_service = "select * from service";
						$result_sel_service = mysqli_query($link,$select_service);
						$result_sel_service_sec = mysqli_query($link,$select_service);

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
		<style>
			select {
		   background-color:#BDBDBD;
		   min-width: 2%;
		   padding: 5px;
		   font-size: 13px;
		   border: 1px solid #ccc;
		   height: 34px;
		   margin-bottom:20px;
			}
		</style>
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
				<form action="" method="POST" name="">
						<div class="part_align">	
							<h3>Administration </h2>
							<div>
							    <span class="sexy_line"></span>
							</div>	
							<h3>Services</h3>		
							<?php 
							if($result_sel_service->num_rows ==0){
								?>
								<h4>No statistics to show as there is no service in the database</h4>
								<?php 
							}
							else{
						?>		  
						<table class="tg">
													  <tr>
														<th class="tg-031e">Service</th>
														<th class="tg-031e">email</th>
														<th class="tg-031e">password</th>
													  </tr>
													  <tr>
													  		<?php while($row_serv = $result_sel_service->fetch_row()){ ?>
																<tr>
																		<th> <?php echo $row_serv[0]; ?> </th>
																		<th> <?php echo $row_serv[1]; ?> </th>
																		<th> <?php echo $row_serv[2]; ?> </th>
																</tr>
															<?php } ?>
													  </tr>
							</table>	

							<label for="service">Select service</label>
							<select name="service" id="service">
								<?php 


									if($result_sel_service_sec->num_rows !=0){
										while($row_serv_sec = $result_sel_service_sec->fetch_row()){ ?>
								?>		
										 <option> <?php echo $row_serv_sec[0]?> </option> 
										 <?php	} ?>
								<?php	} ?>

							</select>	
							<br>
							<label for="password">Password</label>
							<input type="password" name="password" maxlength="30" placeholder="*******" id="password"/>
							<br>
							<br>
							<label for="email">Email</label>
							<input type="text" name="email" maxlength="30" placeholder="email@domain.com" id="email"/>
							<br>
							<br>
								<?php 
							/*=============UPDATE DB=======================*/
							if(isset($_POST['password'])&& $_POST['password']!=""){
								$changepassword  = 'update service set password = "'.$_POST['password'].'" where name = "'.$_POST['service'].'"';
								$result_change_password=mysqli_query($link,$changepassword);
								if($result_change_password){
									header("Refresh: 0;url='seeService.php'");
								}
								
								
							}
							if(isset($_POST['email'])&& $_POST['email']!=""){
								$changeaddress  = 'update service set email_address = "'.$_POST['email'].'" where name = "'.$_POST['service'].'"';
								$result_change_address=mysqli_query($link,$changeaddress);

								if($result_change_address){
									header("Refresh: 0;url='seeService.php'");
								}
								
							
								}
							} ?>
							<br>
							<button type="submit" class="button" name="update" >Update</button>												
						</div>
						<br>
						<a href="logoutAdmin.php" style="text-decoration: none;"><input class="btn-disconnect" value="Disconnect" type="button" ></a>
						<br>
						<div class="see-statistics"><a href="datareview.php" style=" float:left; color:white;">See statistics</a></div>
						<div class="see-user"><a href="seeUser.php" style=" float:right; color:white;">See for one User</a></div>
				</form>	
			</div>		
		</section>
		<div class="footer">
			<p>2015 - Institute of Technology of Tralee </p>
		</div>
		
	</body>
	
</html>