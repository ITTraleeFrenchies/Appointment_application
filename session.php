<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "db";
	
	// Establishing Connection with Server by passing server_name, user_id and password as a parameter
	$connection = mysqli_connect($servername, $username, $password, $dbname);
	
	session_start();// Starting Session
	// Storing Session
	$user_check=$_SESSION['tnumber'];
	
	// SQL Query To Fetch Complete Information Of User
/*	$sql="select tnumber from user where tnumber='$user_check'";
	$ses_sql=mysqli_query($connection,$sql);
	$row = mysqli_fetch_assoc($ses_sql);
	$login_session =$row['tnumber'];*/
	
	/*if(!isset($login_session)){
		mysqli_close($connection); // Closing Connection
		header('Location: index.php'); // Redirecting To Home Page
	}
	*/
?>