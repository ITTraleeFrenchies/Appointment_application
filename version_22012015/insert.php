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
				//header("location: index.php"); // Redirecting To Other Page
				<body>
					<div id="openModal" class="modalDialog">
						<div>
						
							<a href="" title="Close" class="close">X</a>
							<h2>Account created</h2>
							<p id="textPopUp">An email has been sent to your Zimbra address email : </p>
						</div>
					</div>
			} else {
				$error = "Error : Invalid Tnumber	";
			}
		
	}

	}
?>