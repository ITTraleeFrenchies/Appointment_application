<?php
$day_meeting="";
	$timestart_meeting="";
	$timeend_meeting="";


	
/*	function display($user, $password, $file){
		loadUser($user, $password, $file);
		$select = file_get_contents($file);
		$lines = explode("\n", $select);
		echo "Busy Times : <br>";
		$array_busy_times="";
		$incr_array_busy_times=0;

		foreach($lines as $line){
			if(substr( $line, 0, 8 ) == "FREEBUSY" ){
				$dates = explode(":",$line);
				$type = explode("=",$dates[0]);
				if($type[1] == "BUSY" || $type[1] == "BUSY-UNAVAILABLE") $type[1]="Busy";
				if($type[1] == "BUSY-TENTATIVE") $type[1]="Waiting for validation";
				$day_meeting=substr($dates[1],6,2)."/".substr($dates[1],4,2)."/".substr($dates[1],0,4);
					
				// ============= hours and minutes concatenated of each busy time ==========
				$timestart_meeting=substr($dates[1],9,4);
				$timeend_meeting=substr($dates[1],26,4);
					
				// ============= hours and minutes separated of each busy time ==========
				$timestart_meeting=substr($dates[1],9,2).".".substr($dates[1],11,2);
				$timeend_meeting=substr($dates[1],26,2).".".substr($dates[1],28,2);
					
				// =============== We put in an array all the busy meeting ================
				echo "Day : ".$day_meeting." Time : ".$timestart_meeting." - ".$timeend_meeting." Status : ".$type[1]."<br>";
				$array_busy_times[$incr_array_busy_times] = "$timestart_meeting - $timeend_meeting - $day_meeting";
				$incr_array_busy_times++;
			}
		}
		foreach($array_busy_times as $x_value) {
				echo $x_value.'<br>';
		}	
		
	}*/
	
	function getBusyTime($service, $file){

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "appointment_db";
	
			$link = mysqli_connect($servername, $username, $password, $dbname);
			$sql_retrieve = 'select password from service where name ="'.  $service.'"';
			$query_retrieve = mysqli_query($link,$sql_retrieve);
			$rowcount=mysqli_num_rows($query_retrieve);
			//echo $sql_retrieve;
			$result = mysqli_query($link,"select email_address from service where name ='" . $service."'");
			while ($row = $result->fetch_assoc()) {
				//echo $row['email_address']."<br>";
				$user= explode("@",$row['email_address']);
			}
			//$row = mysql_fetch_array($result);
			//echo $row;
			//$user= explode("@",$row);

			//var_dump($query_retrieve); 

			//echo $rowcount;
			if ($rowcount == 1) {
				//echo $user[0];
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
			else{echo "erreur";}
		
		
	}
	
	
	
/*	$array = getBusyTime('Dyslexia Student Services','busyTimeData.txt');
	foreach($array as $x_value) {
				echo $x_value.'<br>';
		} */
		
/*	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "appointment_db";
	
	$service="Dyslexia Student Services";
	
	$link = mysqli_connect($servername, $username, $password, $dbname);
			$sql_retrieve = 'select password from service where name ="'.  $service.'"';
			$query_retrieve = mysqli_query($link,$sql_retrieve);
			$rowcount=mysqli_num_rows($query_retrieve);
			//echo $sql_retrieve;
			$result = mysqli_query($link,"select email_address from service where name ='" . $service."'");
			while ($row = $result->fetch_assoc()) {
				//echo $row['email_address']."<br>";
				$user= explode("@",$row['email_address']);
			}
	echo $user[0];
	loadUser($user[0], $query_retrieve, $file);*/
	
?>
