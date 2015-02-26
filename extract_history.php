<?php

	function get_meetings_user(){
		$servername = "localhost";
		$username = "root";
		$password = "mysqlitt12345";
		$dbname = "appointment_db";
		
		$tnumber=$_SESSION['tnumber'];
		$link = mysqli_connect($servername, $username, $password, $dbname);
		$sql_retrieve = 'select * from appointment where tnumber ="'.  $tnumber.'"';
		$query = mysqli_query($link,$sql_retrieve);
		$max =  mysqli_num_rows($query);
		$index_array=0;
		$array_meetings;
		
		while($row = mysqli_fetch_assoc($query)) {
		   $service= $row['service'];
		   $date_request = $row['date_request'];
		   $date_appointment = $row['date_appointment'];
		   $state = $row['state'];
		  // echo $service.' - '.$date_request.' - '.$date_appointment.' - '.$state;
		   $array_meetings[$index_array] = $service.' - '.$date_request.' - '.$date_appointment.' - '.$state .'/';
		  // echo '<br>';
		  $index_array++;
		}
		/*foreach($array_meetings as $data){ 
		  echo $data; 
		}*/
		
		return  $array_meetings;
	}
?> 