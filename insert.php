<script>
var dateObject = $(this).datepicker('getDate'); 

</script>

<?php
	 session_start();
  
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "appointment_db";

	$error='';


	if (isset($_POST['submit_subscribe'])) {

		if (empty($_POST['tnumber']) || empty($_POST['firstname']) || empty($_POST['lastname'])
			|| empty($_POST['datebirth']) || empty($_POST['city']) || empty($_POST['selectCounty']) || empty($_POST['courses'])
			|| empty($_POST['disability']) || empty($_POST['disabilityS'] )) {
			$error = "tnumber, first name or last name are invalid";
		}
		else{

		$tnumber = $_POST["tnumber"];
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$date = $_POST["datebirth"];
		$address1 = $_POST["address1"];
		$address2 = $_POST["address2"];
		$city = $_POST["city"];
	    $county = $_POST["selectCounty"];
	    $course = $_POST["courses"];
	    $disability = $_POST["disability"];
	    $name = $_POST['disabilityS'];
	    $comment =""; 
	    $contact = $_POST['contact'];

		    if( !empty($_POST['comment'])){
		    	$comment = $_POST['comment'];
		    }

			$all_check ="{";

			foreach ($name as $disabilityS){
			$all_check= $all_check . $disabilityS . ",";
			}

			$all_check = substr($all_check,0, -1); 
			$all_check = $all_check . "}";

			$_SESSION['insert'] = $tnumber;

			// Establishing Connection with Server by passing server_name, user_id and password as a parameter
			$connection = mysqli_connect($servername, $username, $password, $dbname);
			
			$sql="insert into user values('". $tnumber . "','" . $firstname . "','" . $lastname  ."', null, null"
			."," . $date .",'" . $address1 ."','" . $address2 ."','" . $city ."','" . $county ."','" . $course ."','" . $disability ."','" . $all_check ."','" . $contact ."','". $comment . "')";
			$query = mysqli_query($connection,$sql);
			echo $sql;
			echo $query;
				if ($query) {
					header("location: email.php"); // Redirecting To Other Page
	
				} else {
					$error = $query . "Error : Invalid Tnumber	";
				}
			
		}

	}

	

?>