<?php  
	/* ===========  Variable To Store Error Message ==================*/
	$error=''; 
	if (isset($_POST['submit_login'])) {
		$error = "yo";
		if (empty($_POST['tnumber']) || empty($_POST['pin'])) {
			$error = "tnumber or pin is invalid";
		}
		else{
		
		//================= Get data from the form =================
		$value_tnumber = $_POST["tnumber"];
		$value_pin = $_POST["pin"];
		
		//================= identifications for database =================
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "appointment_db";
		//================= Create connection =================
		$link = mysqli_connect($servername, $username, $password, $dbname);
		/* ===========   To protect MySQL injection for Security purpose ==================*/
		$value_tnumber = stripslashes($value_tnumber);
		$value_pin = stripslashes($value_pin);
		$value_tnumber = mysqli_real_escape_string($link,$value_tnumber);
		$value_pin = mysqli_real_escape_string($link,$value_pin);
		
		/* ===========   SQL query to fetch information of registerd users and finds user match.==================*/
		$sql="select * from user where tnumber='$value_tnumber' AND pin='$value_pin'";
		
		$query = mysqli_query($link,$sql);
		/* ===========   if the user exists in the database, we redirect the user to connected.php==================*/
			if (mysqli_num_rows($query) == 1) {
				
				$_SESSION['tnumber']= $value_tnumber;  // Initializing Session with value of PHP Variable
				header("location: connectedM.php"); // Redirecting To Other Page
				exit();
			} else {
				$error = "T-number or pin are invalid";
			}
		mysqli_close($link); // Closing Connection
		}
	}
	else if(isset($_POST['submit_subscribe'])){
		header("location: subscribe.php"); // Redirecting To Other Page
		exit();
	}
?>	