<?php
/* =================  We include the script in order to retrieve data  ====================== */
	include('extract_busy_time.php'); 
	$day_meeting="";
	$timestart_meeting="";
	$timeend_meeting="";
	function display($user, $password, $file){
		loadUser($user, $password, $file);
		$select = file_get_contents($file);
		$lines = explode("\n", $select);
		echo "Busy Times : <br>";

		$incr_array_busy_times=0;
		$array_busy_times="";
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
				$array_busy_times[$incr_array_busy_times] = $timestart_meeting .'-'.$timeend_meeting;
				$incr_array_busy_times++;
			}
		}
			
		/*foreach($array_busy_times as $x => $x_value) {
				echo $x . ' - ' . $x_value.'<br>';
		}*/
			
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Student Application : Appointment</title>
		<!-- ============ Viewport basics for mobile devices ================= -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="style/all_style.css" type="text/css">
		<link rel="stylesheet" href="style/connected.css" type="text/css">

		<script type="text/javascript">
			function getdata(){
				var service = document.getElementById("service").value;
				var i ="";	
				if(service=="Dyslexia Support Office"){ i = "<?php echo display('dyslexia','testproj15dysl','content_dyslexia.txt'); ?>";}
				else if (service=="Counselling"){ i = "<?php echo display('counsellor','testproj15coun','content_counsellor.txt'); ?>";}
				else if (service=="Access Office"){ i = "<?php echo display('access','testproj15accs','content_access.txt'); ?>";}
				document.getElementById("display-service").innerHTML=i;
				
				
				var choice_date = document.getElementById("date").value;
				var choice_start_time = document.getElementById("time_start").value;
				var choice_end_time = document.getElementById("time_end").value;
				/*document.getElementById("display-date").innerHTML=choice_date;
				document.getElementById("display-time-start").innerHTML=choice_start_time;
				document.getElementById("display-time-end").innerHTML=choice_end_time;*/
				
				// =========== We put all the values for the select of end time as disabled ============
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
					for (k = 0; k <  select_time_end.length; k++) {
						var concat_time_end = select_time_end.options[k].text.substr(0, 2) + select_time_end.options[k].text.substr(3, 2);
						if(concat_time_end <= concat_time_start){
							select_time_end[k].disabled = true ;
						}else {
							select_time_end[k].disabled = false ;
							if(putfirstSelected == true){
								select_time_end[k].selected = true;
								putfirstSelected = false;
							}
						}
					}
				
				
				/*var array_busy_times_js = [<?php echo '"'.implode('","', $array_busy_times).'"' ?>];			
				var l=0;
				var tout="";
				for(l =0; l < array_busy_times_js.length; l++){
					tout += array_busy_times_js[l];
				}				
				alert("coucou" + tout);*/
				
			}
		</script>
	</head>
	<body>
		<section>
			<div id="content">
				<img src="images/rsz_ittralee_icone.png" alt="ITtralee" width="100" height="100" >
				<h1>Institute of Technology of Tralee</h1>
				
				<!-- ============ Separator ================= -->
				<div class="or-spacer">
					  <div class="mask"></div>
				</div>
				<h2>Appointment Application</h2>

					<article class="tabs">
						<div class="part_align">
						<form action="" method="post" name="form" id="id_form" onchange="getdata();">
							<section id="tab1">
									<p>
										<h2><a href="#tab1">Make an appointment</a></h2>
										<label for="service">Select service</label>
										<select name="service" id="service">
										  <option value="Health Centre">Health Centre</option>
										  <option value="Careers Office">Careers Office</option>
										  <option value="Chaplaincy">Chaplaincy</option>
										  <option value="Counselling">Counselling</option>
										  <option value="Access Office">Access Office</option>
									 	  <option value="Students Union">Students Union</option>
									 	  <option value="Sports Office">Sports Office</option>
									 	  <option value="Dyslexia Support Office">Dyslexia Support Office</option>
									 	  <option value="Orientation">Orientation</option>
									 	  <option value="Charities Commitee">Charities Commitee</option>
										</select>  
										  <br>
										  <br>
										  <div id="display-service"> </div>
										  <div id="display-date"></div>
										  <div id="display-time-start"></div>
										  <div id="display-time-end"></div>
										<br>
											<label for="date">Date</label>		
										<select id='date'>
											<?php 
												date_default_timezone_set('Europe/Dublin');
												 $date = date('Y-m-d');
												// $date_in_2_weeks =  date('l jS \of F Y ',strtotime('+2 weeks'));
												$day=1;
												 while($day <= 12 ){
												 	$date=date('Y-m-d',strtotime('+'.$day .' days'));
												 	$day_letters = date('D',strtotime($date));	
												 //	$date=date('l jS \of F Y ',strtotime('+'.$day .' days'));
												 	if($day_letters != 'Sat' && $day_letters != 'Sun'){
												 		 //$date = date_format($date,'l jS \of F Y ');
												 		echo'<option value="'. $date . '">' . $date .'</option>';
												 	}
													$day++;
												 }
											?>
										</select>
										
										<br>	
										<label for="start">Start</label>		
										<select id="time_start">
											<?php 
											for($hour = 8; $hour < 17; $hour++){
												$minutes =0;
												$minutes = str_pad($minutes, 2, '0', STR_PAD_LEFT);
												 while( $minutes < 60 ){
												 	if($hour <=10){
												 		$hour = str_pad($hour, 2, '0', STR_PAD_LEFT);
												 	}
												 	 echo'<option value="'. $hour .'.'.$minutes.'">' . $hour .'.' .$minutes . '</option>';
												 	 $minutes+=15;
												 	}
												} 
											?>
										</select>
										<br>	
										<label for="End">End</label>	
										<select id='time_end'>
											<?php 
											$minutes =15;
											for($hour = 8; $hour <= 17; $hour++){
												$minutes =0;
												$minutes = str_pad($minutes, 2, '0', STR_PAD_LEFT);
												if($hour == 17){
														$minutes =0;
														$minutes = str_pad($minutes, 2, '0', STR_PAD_LEFT);
													 echo'<option value="'. $hour . '.'.$minutes.'">' . $hour .'.' .$minutes . '</option>';
												}else {
													while( $minutes < 60 ){
															if($hour <=10){
																$hour = str_pad($hour, 2, '0', STR_PAD_LEFT);
															}
														 echo'<option value="'. $hour . '.'.$minutes.'">' . $hour .'.' .$minutes . '</option>';
														 $minutes+=15;
												 	}
												}
											}
											?>
										</select>
										<br>	
									
										<div class="btn-submit"> Submit </div>
										<br>
									</p>
								
							</section>
						</form>
					
						<section id="tab2">
							<h2><a href="#tab2">History appointments</a></h2>
							<br>
							<br>
									<label for="filter">Filter</label>								
									<select name="filter">
									  <option value="waiting">waiting</option>
									  <option value="done">done</option>
									  <option value="achieved">achieved</option>
									</select>  
							<br>
							<table class="tg">
							  <tr>
								<th class="tg-031e">Appointment</th>
								<th class="tg-031e">Service</th>
								<th class="tg-031e">State</th>
								<th class="tg-031e">Date</th>
							  </tr>
							  <tr>
								<td class="tg-031e"></td>
								<td class="tg-031e"></td>
								<td class="tg-031e"></td>
								<td class="tg-031e"></td>
							  </tr>
							  <tr>
								<td class="tg-031e"></td>
								<td class="tg-031e"></td>
								<td class="tg-031e"></td>
								<td class="tg-031e"></td>
							  </tr>
							</table>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
						</section>
						</div>

			</article>
			</div>
			<!-- ============ Link to logout.php to disocnnect the user ================= -->
			<b id="logout"><a href="logout.php" style="text-decoration: none;"><div class="btn-disconnect"> Disconnect</div></a></b>
		</section>
		<div class="footer">
			<p>2015 - Institute of Technology of Tralee </p>
		</div>
		
	</body>
	
</html>

