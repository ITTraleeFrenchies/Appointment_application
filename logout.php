<?php
	session_start();
	
	//================= identifications for database =================
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "appointment_db";
	
		//================= Create connection =================
		//================= insert into connection =================	
		$tnumber=$_SESSION['tnumber'];
		$link = mysqli_connect($servername, $username, $password, $dbname);
		$sql="update connection set log_out = sysdate() where tnumber = '$tnumber' and log_out is NULL ";
		$query = mysqli_query($link,$sql);
		
	if(session_destroy()) // Destroying All Sessions
	{
		header("Location: index.php"); // Redirecting To Home Page
	}
?>