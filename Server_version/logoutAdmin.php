<?php
	session_start();
	if(session_destroy()) // Destroying All Sessions
	{
		header("Location: indexAdmin.php"); // Redirecting To Home Page
	}
?>