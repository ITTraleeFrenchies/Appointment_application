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

						$error ="";
						$user_selected= "";

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
							<button type="submit" class="button" name="search">Search</button>
							<br>
							<br>
							<table class="tg">
							 <?php 

																/*=================== PERSONNAL VIEW ==================*/
																if(isset($_POST['tnumber']) || isset($_POST['attribute']) && isset($_POST["search"])){ 

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

																	$_SESSION["user_selected"] = $_POST['tnumber'];
																	?>
																			
																			 <tr>
																				<th class="tg-031e">first_name</th>
																				<th class="tg-031e">last_name </th>
																				<th class="tg-031e">pin</th>
																				<th class="tg-031e">register_date</th>
																				<th class="tg-031e">date_of_birth</th>
																				<th class="tg-031e">address1</th>
																				<th class="tg-031e">address2</th>
																				<th class="tg-031e">city</th>
																				
																			  </tr>
																	<?php 		  
																			while($row_user = $query_find->fetch_row()){ ?>

																			<tr>
																					<th> <?php $attr1 = $row_user[0]; echo $row_user[1]; $attr2 = $row_user[1];?> </th>
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
																				<th class="tg-031e">county</th>
																				<th class="tg-031e">course</th>
																				<th class="tg-031e">type</th>
																				<th class="tg-031e">disability_detail</th>
																				<th class="tg-031e">contact_number</th>
																				<th class="tg-031e">specifications</th>	
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

															<?php } 

															
															
															?>
														<?php }
														 ?>	

							</table>
							<p>For Disability detail: <br>	
							1: Physical Disability ambulant /
							2: Visual impairment /
							3: Deaf /
							4: Blind /
							5: Hard of hearing /
							6: Mental health /
							7: Neurological /
							8: Significant health condition /
							9: Physical Disability non-ambulant / 
							10: Specific Learning Difficulty /
							11: Other
							</p>
							<p>For type: 	<br>
							- None <br>
							- Student with disability <br>
							- Student with a learning difficulty <br>
							- Member of the travelling community <br>
							- Pathfinder participant
							</p>
							<label for="service">Select </label>
							<select name="attribute" id="attribute" onclick="updateAttr();">
										 <option>first_name</option>
										 <option>last_name</option>
										 <option>pin</option>
										 <option>register_date</option>
										 <option>date_of_birth</option>
										 <option>address1</option>
										 <option>address2</option>
										 <option>city</option>
										 <option>county</option>
										 <option>course</option>
										 <option>type</option>
										 <option>disability_detail</option>
										 <option>contact_number</option>
										 <option>specifications</option>
							</select>	
							<input type="text" name="new_attribute" maxlength="100" placeholder="new value" id="new_attribute"/>
							<br>
							<div id="test"></div>
							<button class="button" type="submit" name="update" >Update</button>
							<button class="button" name="delete">Delete</button>		

							<?php 
								if(isset($_POST['attribute']) && !empty($_POST['attribute']) && isset($_POST['update']) ){

																$selectOption = $_POST['attribute'];
																if($_POST['new_attribute'] !=""){
																	$new_attribute = $_POST['new_attribute'];
																	$sql_update = 'update user set '. $selectOption.'="'.$new_attribute.'" where tnumber = "' . $_SESSION["user_selected"].'"';
																	$query_update = mysqli_query($link,$sql_update);
																	$error = "Please, refresh the page.";
																}else {
																	$error = "Enter a correct value.";
																}
																
															}

								if(isset($_POST['delete'])){
										$sql_delete = 'delete from user where tnumber ="'. $_SESSION["user_selected"].'";';
										$query_delete = mysqli_query($link,$sql_delete);
										echo $user_selected;
										
									}



							?>									
						</div>
						<div class="see-services"><a href="seeService.php" style=" float:right; color:white;">See services</a></div>
						<br>
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
				document.getElementById('tnumber').value = '<?php echo $attr1 ?>';
			}
		</script>	
</html>