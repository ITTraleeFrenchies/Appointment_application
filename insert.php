<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "db";
	
	$error='';
	if (isset($_POST['submit_subscribe'])) {
		if (empty($_POST['tnumber']) || empty($_POST['firstname']) || empty($_POST['lastname'])) {
		$error = "tnumber, first name or last name are invalid";
		}
	else{
	
		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		$connection = mysqli_connect($servername, $username, $password, $dbname);
		
		$tnumber=$_POST["tnumber"];
		$firstname=$_POST["firstname"];
		$lastname=$_POST["lastname"];
		
		$sql="insert into user values('". $tnumber . "','" . $firstname . "','" . $lastname . "', null, null)";
		$query = mysqli_query($connection,$sql);
			if ($query) {
				header("location: index.php"); // Redirecting To Other Page
			} else {
				$error = "Error : Invalid Tnumber	";
			}
		
	}

	}
?>