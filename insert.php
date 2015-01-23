<?php
	 session_start();
  
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "db";

	$error='';




	if (isset($_POST['submit_subscribe'])) {

		$tnumber = $_POST["tnumber"];
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];

		 $_SESSION['insert'] = $tnumber;

		if (empty($_POST['tnumber']) || empty($_POST['firstname']) || empty($_POST['lastname'])) {
			$error = "tnumber, first name or last name are invalid";
		}
		else{
		

			// Establishing Connection with Server by passing server_name, user_id and password as a parameter
			$connection = mysqli_connect($servername, $username, $password, $dbname);
			
			$sql="insert into user values('". $tnumber . "','" . $firstname . "','" . $lastname . "', null, null)";
			$query = mysqli_query($connection,$sql);
				if ($query) {
					header("location: email.php"); // Redirecting To Other Page
	
				} else {
					$error = "Error : Invalid Tnumber	";
				}
			
		}

	}

	

?>