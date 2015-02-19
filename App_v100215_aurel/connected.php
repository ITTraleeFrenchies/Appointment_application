<?php
/* =================  We include the script in order to retrieve data  ====================== */
	include('extract_busy_time.php'); 
	include('getDataZimbra.php'); 
				
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Student Application : Appointment</title>
		<!-- ============ Viewport basics for mobile devices ================= -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="style/all_style.css" type="text/css">
		<link rel="stylesheet" href="style/connected.css" type="text/css">
		<script src="http://www.datejs.com/build/date.js" type="text/javascript"></script>
		<script>
		function getdata(){				
				var service = document.getElementById("service").value;
				var a ="";
				var jArray=[];
				
				if(service=="Dyslexia Student Services"){jArray = <?php echo json_encode(getBusyTime('Dyslexia Student Services','busyTimeData.txt')); ?>;}
				else if (service=="Counsellor Student Services"){ jArray = <?php echo json_encode(getBusyTime('Counsellor Student Services','busyTimeData.txt')); ?>;}
				else if (service=="Access Student Services"){jArray = <?php echo json_encode(getBusyTime('Access Student Services','busyTimeData.txt')); ?>;}

				
				var choice_date = document.getElementById("date").value;
				var choice_start_time = document.getElementById("time_start").value;
				var choice_end_time = document.getElementById("time_end").value;
				
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
				
<<<<<<< HEAD:connected.php
				
				/*var array_busy_times_js = [<?php echo '"'.implode('","', $array_busy_times).'"' ?>];			
				var l=0;
				var tout="";
				for(l =0; l < array_busy_times_js.length; l++){
					tout += array_busy_times_js[l];
				}				
				alert("coucou" + tout);*/
			
				
=======
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
>>>>>>> origin/master:App_v100215_aurel/connected.php
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
										  <option value="Health Centre">Health Centre </option>
										  <option value="Careers Office">Careers </option>
										  <option value="Chaplaincy">Chaplaincy </option>
										  <option value="Counsellor Student Services">Counsellor </option>
										  <option value="Access Student Services">Access </option>
									 	  <option value="Students Union">Students Union </option>
									 	  <option value="Sports Office">Sports </option>
									 	  <option value="Dyslexia Student Services">Dyslexia </option>
									 	  <option value="Orientation">Orientation </option>
									 	  <option value="Charities Commitee">Charities Commitee </option>
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
												$day=1;
												 while($day <= 12 ){
												 	$date=date('Y-m-d',strtotime('+'.$day .' days'));
												 	$day_letters = date('D',strtotime($date));	
												 	if($day_letters != 'Sat' && $day_letters != 'Sun'){
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
