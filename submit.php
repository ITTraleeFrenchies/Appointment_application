<?php
    /* ============identifications for database================= */
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "appointment_db";
	$error='';
	
	if (isset($_POST['submit_appointment'])) {
<<<<<<< HEAD
	
=======
		
>>>>>>> origin/master
		$tnumber=$_SESSION['tnumber'];
		$service=$_POST["service"];
		$starttime=explode(".",$_POST["start"]);
		$dateAppointment=$_POST["date"]." ".$starttime[0].":".$starttime[1].":00";	

		$link = mysqli_connect($servername, $username, $password, $dbname);
		$insert = "insert into appointment values(null,'".$tnumber."','".$service."',null,'".$dateAppointment."','Waiting')";
		$query = mysqli_query($link,$insert);
		
		//var_dump($query);
		
		if ($query) {
<<<<<<< HEAD
				header("location: email_meeting.php");
			}
		else {
=======
<<<<<<< HEAD
				header("location: email_meeting.php");
			}
		else {
=======
			echo $insert;
			session_start();
			if(session_destroy()) // Destroying All Sessions
			{
				header("location: index.php");
			}
		}else {
>>>>>>> origin/master
>>>>>>> origin/master
					$error = "Please complete correctly all the mandatory field";
			}
	}
	
?>