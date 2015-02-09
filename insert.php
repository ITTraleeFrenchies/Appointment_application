<script>
/* ============ Insert a calendar to an input button ================= */
var dateObject = $(this).datepicker('getDate'); 

</script>

<?php
	 session_start();
    /* ============identifications for database================= */
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "appointment_db";
	$error='';

	if (isset($_POST['submit_subscribe'])) {
		  /* ============ check if fields are empty================= */
		if (empty($_POST['tnumber']) || empty($_POST['firstname']) || empty($_POST['lastname'])
			|| empty($_POST['datebirth']) || empty($_POST['city']) || empty($_POST['selectCounty']) || empty($_POST['courses'])
			|| empty($_POST['disability']) || empty($_POST['disabilityS'] )) {
			$error = "Please complete all the mandatory field";
		}
		else{
  		/* ============ retrieve data for indentification================= */
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
		  
			 /* ============ Create connection================= */
			   /* ============ check if an user alreadye xists with the tnumber given================= */
			$link = mysqli_connect($servername, $username, $password, $dbname);
			$sql_check = "select * from user where tnumber='" . $tnumber ."'";
			$query_check = mysqli_query($link,$sql_check);
			  $rowcount=mysqli_num_rows($query_check);
			if ($rowcount == 1) {
					$error = "This account already exists";
			}
			else {

			 /* ============ We insert the several disabilities as number into the database ================= */
			$all_check ="{";
				foreach ($name as $disabilityS){
					$all_check= $all_check . $disabilityS . ",";
				}
			$all_check = substr($all_check,0, -1); 
			$all_check = $all_check . "}";
			$_SESSION['insert'] = $tnumber;

			 /* ============ We execute the insert and redirect to email.php================= */
			$sql_insert="insert into user values('". $tnumber . "','" . $firstname . "','" . $lastname  ."', null, null"
			.",'" . $date ."','" . $address1 ."','" . $address2 ."','" . $city ."','" . $county ."','" . $course ."','" . $disability ."','" . $all_check ."','" . $contact ."','". $comment . "')";
			$query_insert = mysqli_query($link,$sql_insert);
			
				if ($query_insert) {
					header("location: email.php");
				} else {
					$error = "Please complete correctly all the mandatory field";
				}
			}
		   


		   
			
		}

	}

	

?>