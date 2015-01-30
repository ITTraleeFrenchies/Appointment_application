
<!DOCTYPE html>
<html>
	<head>
		<title>Student Application : Appointment</title>
		<!-- ============ Viewport basics for mobile devices ================= -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="style/all_style.css" type="text/css">
		<link rel="stylesheet" href="style/connected.css" type="text/css">
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
						<section id="tab1">
							<p>
								<h2><a href="#tab1">Make an appointment</a></h2>
								<label for="service">Select service</label>
								<select name="service">
								  <option value="default">default</option>
								</select>  
								  <table class="tg">
									  <tr>
										<th class="tg-031e">Name</th>
										<th class="tg-031e">8</th>
										<th class="tg-031e">9</th>
										<th class="tg-031e">10</th>
										<th class="tg-031e">11</th>
										<th class="tg-031e">12</th>
										<th class="tg-031e">13</th>
										<th class="tg-031e">14</th>
										<th class="tg-031e">15</th>
										<th class="tg-031e">16</th>
										<th class="tg-031e">17</th>
										<th class="tg-031e">18</th>
									  </tr>
									  <tr>
										<td class="tg-031e"></td>
										<td class="tg-031e"></td>
										<td class="tg-031e"></td>
										<td class="tg-031e"></td>
										<td class="tg-031e"></td>
										<td class="tg-031e"></td>
										<td class="tg-031e"></td>
										<td class="tg-031e"></td>
										<td class="tg-031e"></td>
										<td class="tg-031e"></td>
										<td class="tg-031e"></td>
										<td class="tg-031e"></td>
									  </tr>
								</table>
								
								<label for="time">Select the time</label>								
								<select name="time">
								  <option value="default">default</option>
								</select>  
								<br>
								<div class="btn-submit"> Submit </div>
								<br>
							</p>
						</section>
					
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
						
					</section>

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

