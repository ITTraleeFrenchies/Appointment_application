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
				<form action="" method="post" name="search">
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
																if(isset($_POST['tnumber'])){ 

																	$sql_find = 'select * from user where tnumber = "' . $_POST['tnumber'].'"';
																	$query_find = mysqli_query($link,$sql_find);
																/* ===========   if the user exists in the database==================*/
																	if (!$query_find  || $_POST['tnumber'] == "" || empty($query_find) || $query_find->num_rows ==0) {
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
																					<th> <?php echo $row_user[0]; $attr1 = $row_user[0];?> </th>
																					<th> <?php echo $row_user[1]; $attr2 = $row_user[1];?> </th>
																					<th> <?php echo $row_user[2]; $attr3 = $row_user[2];?> </th>
																					<th> <?php echo $row_user[3]; $attr4 = $row_user[3];?> </th>
																					<th> <?php echo $row_user[4]; $attr5 = $row_user[4];?> </th>
																					<th> <?php echo $row_user[5]; $attr6 = $row_user[5];?> </th>
																					<th> <?php echo $row_user[6]; $attr7 = $row_user[6];?> </th>
																					<th> <?php echo $row_user[7]; $attr8 = $row_user[7];?> </th>
																					<th> <?php echo $row_user[8]; $attr9 = $row_user[8];?> </th>
																			</tr>
																		
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
																					
																					<th> <?php echo $row_user[9]; $attr10 = $row_user[9]; ?> </th>
																					<th> <?php echo $row_user[10]; $attr11 = $row_user[10]; ?> </th>
																					<th> <?php echo $row_user[11]; $attr12 = $row_user[11]; ?> </th>
																					<th> <?php echo $row_user[12]; $attr13 = $row_user[12]; ?> </th>
																					<th> <?php echo $row_user[13]; $attr14 = $row_user[13]; ?> </th>
																					<th> <?php echo $row_user[14]; $attr15 = $row_user[14]; ?> </th>
																			</tr>	
																			<?php } ?>		
															<?php } ?>
														<?php } ?>	

							</table>	
							<label for="service">Select </label>
							<select name="attribute" id="attribute" onclick="updateAttr();">
										 <option> tnumber </option> 
										 <option> firstname </option>
										 <option> lastname </option>
										 <option> pin </option>
										 <option> register date </option>
										 <option> date of birth</option>
										 <option> address1 </option>
										 <option> address2 </option>
										 <option> city </option>
										 <option> county </option>
										 <option> course</option>
										 <option> type of disability </option>
										 <option> disability detail</option>
										 <option> contact number </option>
										 <option> specification </option>
							</select>	
							<input type="text" name="new_attribute" maxlength="100" placeholder="new value" id="new_attribute"/>
							<br>
							<div id="test"></div>
							<button class="button" >Update</button>
							<button class="button" >Delete</button>																				
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
				
		<script>
			function updateAttr(){

				var attr_selected = document.getElementById("attribute").selectedIndex ;

				if(attr_selected == 0){
					 document.getElementById("new_attribute").value = "<?php echo $attr1 ?>";
				}else if(attr_selected == 1){
					 document.getElementById("new_attribute").value = "<?php echo $attr2 ?>";
				}else if(attr_selected == 2){
					 document.getElementById("new_attribute").value = "<?php echo $attr3 ?>";
				}else if(attr_selected == 3){
					 document.getElementById("new_attribute").value = "<?php echo $attr4 ?>";
				}else if(attr_selected == 4){
					 document.getElementById("new_attribute").value = "<?php echo $attr5 ?>";
				}else if(attr_selected == 5){
					 document.getElementById("new_attribute").value = "<?php echo $attr6 ?>";
				}else if(attr_selected == 6){
					 document.getElementById("new_attribute").value = "<?php echo $attr7 ?>";
				}else if(attr_selected == 7){
					 document.getElementById("new_attribute").value = "<?php echo $attr8 ?>";
				}else if(attr_selected == 8){
					 document.getElementById("new_attribute").value = "<?php echo $attr9 ?>";
				}else if(attr_selected == 9){
					 document.getElementById("new_attribute").value = "<?php echo $attr10 ?>";
				}else if(attr_selected == 10){
					 document.getElementById("new_attribute").value = "<?php echo $attr11 ?>";
				}else if(attr_selected == 11){
					 document.getElementById("new_attribute").value = "<?php echo $attr12 ?>";
				}else if(attr_selected == 12){
					 document.getElementById("new_attribute").value = "<?php echo $attr13 ?>";
				}else if(attr_selected == 13){
					 document.getElementById("new_attribute").value = "<?php echo $attr14 ?>";
				}else if(attr_selected == 14){
					 document.getElementById("new_attribute").value = "<?php echo $attr15 ?>";
				}
			}
		</script>	
		
</html>