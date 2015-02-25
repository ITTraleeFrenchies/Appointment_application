<html>
<head>

</head>
<body>
<?php
	/*==============CONNECTION====================*/
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "appointment_db";
							
	$link = mysqli_connect($servername, $username, $password, $dbname);
							
	/*==============SELECT SERVICE================*/
	$sql= "select name from service";
	$result = mysqli_query($link,$sql);

	echo '<form action="" method="get" >';
	echo '<select name="service" id=service">';
	  
	while($row = $result->fetch_row()){	
		echo '<option value="'.$row[0].'">'.$row[0].'</option>';
	}
	echo '</select>';
	echo '<button type="submit" class="button" >Search</button>';

	if(isset($_GET['service'])){
	$service = $_GET['service'];
	$select = 'select * from service where name = "'.$service.'"';
	$result_select = mysqli_query($link,$select);
	
	/*==============DISPLAY SERVICE DATA===========*/
	while ($row = $result_select->fetch_row()){	
		echo '<form action="" method="get" ><br>';
		echo $row[0] ."<br>";
		echo $row[2];
		echo '<input type="text" name="password" placeholder="Change password" id="password"/>';
		echo '<button type="submit" class="button" >Change password</button> <br>';
		echo $row[1];
		echo '<input type="text" name="email" placeholder="Change email address" id="email"/>';
		echo '<button type="submit" class="button" >Change email address</button> <br>';
	}
		echo '</form>';
		$name = $_GET['service'];
		echo $name; 
	/*=============UPDATE DB=======================*/
	if(isset($_GET['name'])&& $_GET['name']!=""){
		$changename  = 'update service set name = "'.$_GET['name'].'" where name = "'.$_GET['service'].'"';
		$result_change_password=mysqli_query($link,$changename);
		echo $changename;			
	}
	if(isset($_GET['password'])&& $_GET['password']!=""){
		$changepassword  = 'update service set password = "'.$_GET['password'].'" where name = "'.$_GET['service'].'"';
		$result_change_password=mysqli_query($link,$changepassword);
		echo $changepassword;			
	}
	if(isset($_GET['email'])&& $_GET['email']!=""){
		$changeaddress  = 'update service set email_address = "'.$_GET['email'].'" where name = "'.$_GET['service'].'"';
		$result_change_address=mysqli_query($link,$changeaddress);
		echo $changeaddress;			
	}
	

}

echo '</form>';
?>
</body>
</html>
<!--
<html>
<head>
<script>
function displayService(){
	var service = document.getElementById("service");
	document.getElementById("display").innerHTML = 
}
</script>
</head>
<body>

	<form action="" method="get" >
	<select name="service" id ="service">		  
		?php 
			while($row = $result->fetch_row()){	
			echo '<option value="'.$row[0].'">'.$row[0].'</option>';
		} ?>
	</select>
	<button onclick="displayService();">Search</button>
	</form>
	<div id="display"></div>
</body>
</html>	
-->


















