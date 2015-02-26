<?php
$day_meeting="";
	$timestart_meeting="";
	$timeend_meeting="";

	function getBusyTime($service, $file){

	$servername = "localhost";
	$username = "root";
	$password = "mysqlitt12345";
	$dbname = "appointment_db";
	
			$link = mysqli_connect($servername, $username, $password, $dbname);
			$sql_retrieve = 'select password from service where name ="'.  $service.'"';
			$query_retrieve = mysqli_query($link,$sql_retrieve);
			$rowcount=mysqli_num_rows($query_retrieve);
			$result = mysqli_query($link,"select email_address from service where name ='" . $service."'");
			while ($row = $result->fetch_assoc()) {
				$user= explode("@",$row['email_address']);
			}
			if ($rowcount == 1) {
				loadUser($user[0], $query_retrieve, $file);
				$select = file_get_contents($file);
				$lines = explode("\n", $select);
				$array_busy_times="";
				$incr_array_busy_times=0;
				foreach($lines as $line){
					if(substr( $line, 0, 8 ) == "FREEBUSY" ){
						$dates = explode(":",$line);
				
						$timestart_meeting=substr($dates[1],9,4);
						$timeend_meeting=substr($dates[1],26,4);
						$day_meeting=substr($dates[1],6,2)."/".substr($dates[1],4,2)."/".substr($dates[1],0,4);
						
						$array_busy_times[$incr_array_busy_times] = "$timestart_meeting - $timeend_meeting - $day_meeting";
						$incr_array_busy_times++;
					}
				}
				return $array_busy_times;	
			}
			else{echo "error";}
		
		
	}
	
?>
