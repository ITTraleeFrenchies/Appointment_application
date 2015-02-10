<?php  
	session_start();
	/* ===========  Variable To Store Error Message ==================*/
	$error=''; 
	if (isset($_POST['submit_login'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) {
			$error = "invalid user name or password";
		}
	else{
		//================= Get data from the form =================
		$value_user = $_POST["username"];
		$value_password = $_POST["password"];
		
		//================= identifications for database =================
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "appointment_db";
		//================= Create connection =================
		$link = mysqli_connect($servername, $username, $password, $dbname);
		/* ===========   To protect MySQL injection for Security purpose ==================*/
		$value_user = stripslashes($value_user);
		$value_password = stripslashes($value_password);
		$value_user = mysqli_real_escape_string($link,$value_user);
		$value_password = mysqli_real_escape_string($link,$value_password);
		
		/* ===========   SQL query to fetch information of registerd users and finds user match.==================*/
		$sql="select * from admin where username='$value_user' AND password='$value_password'";
		
		$query = mysqli_query($link,$sql);
		/* ===========   if the user exists in the database, we redirect the user to connected.php==================*/
			if (mysqli_num_rows($query) == 1) {
				$_SESSION['username']= $value_user;  // Initializing Session with value of PHP Variable
				//header("location: connected.php"); // Redirecting To Other Page
			} else {
				$error = "Invalid user name or password";
			}
		mysqli_close($link); // Closing Connection
		}
	}
?>	