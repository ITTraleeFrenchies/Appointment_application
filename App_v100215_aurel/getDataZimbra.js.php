<?php
header('Content-type: application/javascript');


$day_meeting="";
	$timestart_meeting="";
	$timeend_meeting="";


	
	function display($user, $password, $file){
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
				/*$timestart_meeting=substr($dates[1],9,2).".".substr($dates[1],11,2);
				$timeend_meeting=substr($dates[1],26,2).".".substr($dates[1],28,2);*/
					
				// =============== We put in an array all the busy meeting ================
				echo "Day : ".$day_meeting." Time : ".$timestart_meeting." - ".$timeend_meeting." Status : ".$type[1]."<br>";
				$array_busy_times[$incr_array_busy_times] = "$timestart_meeting - $timeend_meeting - $day_meeting";
				$incr_array_busy_times++;
			}
		}
		/*foreach($array_busy_times as $x_value) {
				echo $x_value.'<br>';
		}*/	
		
	}
	
	function getBusyTime($user, $password, $file){
		loadUser($user, $password, $file);
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
	
	$array = getBusyTime('dyslexia','testproj15dysl','busyTimeData.txt');
	foreach($array as $x_value) {
				echo $x_value.'<br>';
		} 
?>

function getdata(){				
				alert("coucou");
				var service = document.getElementById("service").value;
				var i ="";	
				
				if(service=="Dyslexia Support Office"){ i = "<?php echo display('dyslexia','testproj15dysl','busyTimeData.txt'); ?>";}
				else if (service=="Counselling"){ i = "<?php echo display('counsellor','testproj15coun','busyTimeData.txt'); ?>";}
				else if (service=="Access Office"){ i = "<?php echo display('access','testproj15accs','busyTimeData.txt'); ?>";}
				document.getElementById("display-service").innerHTML=i;
				
				
				var choice_date = document.getElementById("date").value;
				var choice_start_time = document.getElementById("time_start").value;
				var choice_end_time = document.getElementById("time_end").value;
				/*document.getElementById("display-date").innerHTML=choice_date;
				document.getElementById("display-time-start").innerHTML=choice_start_time;
				document.getElementById("display-time-end").innerHTML=choice_end_time;*/
				
				// =========== We put all the values for the select of end time as disabled ============
				var select_time_start = document.getElementById("time_start");
				var select_time_end = document.getElementById("time_end");
				var j;
				for (j = 0; j <  select_time_end.length; j++) {
							select_time_end[j].disabled = true ;
				}
				
				// =========== We disable all the values of end time before start time ============
					var concat_time_start = choice_start_time.substr(0, 2) + choice_start_time.substr(3, 2);
					var k;
					var last_select_time_end;
					var putfirstSelected = true;
					var option_to_start=0;
					for (k = 0; k <  select_time_end.length; k++) {
						var concat_time_end = select_time_end.options[k].text.substr(0, 2) + select_time_end.options[k].text.substr(3, 2);
						if(concat_time_end <= concat_time_start){
							select_time_end[k].disabled = true ;
						}else {
							if(putfirstSelected == true){
								option_to_start = k+1;
								putfirstSelected = false;
							}
							select_time_end[k].disabled = false ;
							
						}
					}
					select_time_end[option_to_start].selected = true;
						
			
				var m;
				for (m = 0; m <  select_time_start.length; m++) {
							select_time_start[m].disabled = false ;
				}	
				// =========== We disable all the values of busy times ==========================
				
				var jArray= <?php echo json_encode(getBusyTime('dyslexia','testproj15dysl','busyTimeData.txt')); ?>;
				
				for (var i=0;i<jArray.length;i++){
					var start_hour = jArray[i].substr(0,4);
					var end_hour = jArray[i].substr(7,4);
					var busy_day = jArray[i].substr(14);
				  busy_day = busy_day.split("/").reverse().join("-");
					if(busy_day == choice_date){
						var l;
						for (l = 0; l <  select_time_start.length; l++) {
							if( start_hour == select_time_start.options[l].text.substr(0, 2) + select_time_start.options[l].text.substr(3, 2)){
								select_time_start[l].disabled = true ;
							}
						}
					
								
					}
                    
				}
			
			}