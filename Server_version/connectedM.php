<?php
session_start();
/* =================  We include the script in order to retrieve data  ====================== */
	include('submit.php');
	include('extract_busy_time.php'); 
	include('getDataZimbra.php');  
	// ======== if session is not started ========
	if(!isset($_SESSION['tnumber'])){
		header("location: index.php"); // Redirecting To Other Page
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
		<script src="http://www.datejs.com/build/date.js" type="text/javascript"></script>
		<script type="text/javascript">
			function getdata(){				
					var service = document.getElementById("service").value;
					var jArray;
					var array_js = new Array();
					if(service=="Dyslexia Student Services"){<?php $array = getBusyTime('Dyslexia Student Services','busyTimeData.txt');foreach($array as $key => $val){ ?>
							array_js.push('<?php echo $val; ?>');
						<?php } ?>
					}
					else if (service=="Counsellor Student Services"){<?php $array = getBusyTime('Counsellor Student Services','busyTimeData.txt');foreach($array as $key => $val){ ?>
								array_js.push('<?php echo $val; ?>');
							<?php } ?>
						}
					else if (service=="Access Student Services"){<?php $array = getBusyTime('Access Student Services','busyTimeData.txt');foreach($array as $key => $val){ ?>
							array_js.push('<?php echo $val; ?>');
						<?php } ?>
						}
					var choice_date = document.getElementById("date").value;
					var choice_start_time = document.getElementById("time_start").value;
					var choice_end_time = document.getElementById("time_end").value;
					// =========== We put all the values for the select of end time as disabled ============
					var select_time_start = document.getElementById("time_start");
					var select_time_end = document.getElementById("time_end");
					var j;
					for (j = 0; j <  select_time_end.length; j++){
								select_time_end[j].disabled = true ;
					}
					// =========== We reset all the values to enable ========================== 
					var m;
					for (m = 0; m <  select_time_start.length; m++){
								select_time_start[m].disabled = false ;
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
						// =========== We disable all the values of busy times ========================== 
					for (var i=0;i<array_js.length;i++){
						var start_hour = array_js[i].substr(0,4);
						var end_hour = array_js[i].substr(7,4);
						var busy_day = array_js[i].substr(14);
						busy_day = busy_day.split("/").reverse().join("-");
						if(busy_day == choice_date){
							var l;
							for (l = 0; l <  select_time_start.length; l++) {
								if( start_hour == select_time_start.options[l].text.substr(0, 2) + select_time_start.options[l].text.substr(3, 2)){
									select_time_start[l].disabled = true ;
									select_time_start[l].disabled = true ;
								}
							}
						}
					}
					select_time_end[option_to_start].selected = true;
					
							// =========== We end the meeting to a start meeting if needed ============
								var idx_selected_val = select_time_start.selectedIndex;
								if(select_time_start.options[select_time_start.selectedIndex+1].disabled == true){
											select_time_end[idx_selected_val+1].selected = true;
								}
					 document.getElementById('display-meeting').innerHTML = "You choose a meeting with the " + service + " on " + choice_date + " at " + select_time_start.value 
					 + " until " + select_time_end.value;		
				}
		</script>
			<script>
			function enable(){
				document.getElementById("date").disabled= false;
				document.getElementById("time_start").disabled=false;
				document.getElementById("time_end").disabled=false;
				document.getElementById("submit").disabled=false;
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
						<div class="part_align">
							<form action="" method="post" name="form" id="id_form" onchange="getdata();">
										<p>
											<h3>Make an appointment</h3>
													<label for="service">Select service</label>
													<select name="service" id="service" onchange="enable();">
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
														<label for="date">Date</label>		
													<select id="date" name="date" disabled>
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
													<select id="time_start" name="start" disabled>
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
													<select id="time_end" name="end" disabled>
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
													 <div id="display-meeting"></div>
													<br>
													<input id="submit" type="submit" value="Submit"name="submit_appointment" class="btn-submit" disabled>
													<br>
													<br>
													<a href="logout.php" style="text-decoration: none;"><input class="btn-disconnect" value="Disconnect" type="button" ></a>
													<br>
													<div class="see-history"><a href="history.php" style=" float:right; color:white;">See history</a></div>
													
										</p>
									</form>
						</div>
				</div>	
		</section>
		<div class="footer">
			<p>2015 - Institute of Technology of Tralee </p>
		</div>
		
	</body>
	
</html>

