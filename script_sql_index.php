<?php  

	session_start();
	$error=''; // Variable To Store Error Message
	if (isset($_POST['submit_login'])) {
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
		$dbname = "db";
		//================= Create connection =================
		$connection = mysqli_connect($servername, $username, $password, $dbname);
		// To protect MySQL injection for Security purpose
		$value_tnumber = stripslashes($value_tnumber);
		$value_pin = stripslashes($value_pin);
		$value_tnumber = mysqli_real_escape_string($connection,$value_tnumber);
		$value_pin = mysqli_real_escape_string($connection,$value_pin);
		
		// SQL query to fetch information of registerd users and finds user match.
		$sql="select * from user where tnumber='$value_tnumber' AND pin='$value_pin'";
		$query = mysqli_query($connection,$sql);
		$rows = mysqli_num_rows($query);
			if ($rows == 1) {
				$_SESSION['tnumber']= $value_tnumber;  // Initializing Session with value of PHP Variable
				header("location: connected.php"); // Redirecting To Other Page
			} else {
				$error = "Username or Password is invalid";
			}
		mysqli_close($connection); // Closing Connection
		}
	}
?>	