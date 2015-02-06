<!-- ======== Comaptible with Firefow and Google chrome ======== -->

<?php
	include "insert.php";
?>

<!DOCTYPE html>
<head>
		<title>Student Application : Appointment</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="style/all_style.css" type="text/css">
		<link rel="stylesheet" href="style/subscribe.css" type="text/css">
		<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css' >
		<script>
			function setCursorPos(){
					setCaretToPos(document.getElementById("comment"), 0);
			}
			function setSelectionRange(input, selectionStart, selectionEnd) {
					if (input.setSelectionRange) {
					input.focus();
					input.setSelectionRange(selectionStart, selectionEnd);
				}
				else if (input.createTextRange) {
					var range = input.createTextRange();
					range.collapse(true);
					range.moveEnd('character', selectionEnd);
					range.moveStart('character', selectionStart);
					range.select();
					}
			}
			function setCaretToPos (input, pos) {
			setSelectionRange(input, pos, pos);
			}


		/* ======== DATE BIRTH ======== */
				
			    var datefield=document.createElement("input");
			    datefield.setAttribute("type", "date");
			    if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
			        document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
			        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
			        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n')
			    }
			 
			if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
			    jQuery(function($){ //on document.ready
			        $('#birthday').datepicker();
			    })
			}

		</script>
</head>
<body>
		<section>
			<div id="content">
			<img src="images/rsz_ittralee_icone.png" alt="ITtralee" width="100" height="100" />
			<h1>Institute of Technology of Tralee</h1>
			
			<div class="or-spacer">
				  <div class="mask"></div>
			</div>
			<h2>Appointment Application</h2>
			
				<form action="" method="post" name="form" id="id_form">
					<div class="part_align">
						<br>
						<br>
						<label for="tnumber">T-number</label>
						<input type="text" name="tnumber" maxlength="9" placeholder="tnumber" >
						<span class="required"> * </span>
						<br>
						<br>
						<label for="firstname">Firstname</label>
					    <input type="text" name="firstname" maxlength="30" placeholder="firstname"/>
					    <span class="required"> * </span>
						<br>
						<br>
						<label for="lastname">Lastname</label>
					    <input type="text" name="lastname" maxlength="30"placeholder="lastname"/>
					    <span class="required"> * </span>
						<br>
						<br>
						<label for="datebirth">Date of birth</label>
						<input type="date" name="datebirth" size="20"/>
						<span class="required"> * </span>
						<br>
						<br>
						<label for="address1">Adress (first line)</label>
					    <input type="text" name="address1" maxlength="100" placeholder="address"/>
					    <span class="required"> * </span>
						<br>
						<br>
						<label for="address2">Adress (second line)</label>
					    <input type="text" name="address2" maxlength="100" placeholder="adress"/>
					    <span class="required"> * </span>
						<br>
						<br>
						<label for="city">City </label>
					    <input type="text" name="city" maxlength="35" placeholder="city"/>
					    <span class="required"> * </span>
						<br>
						<br>
						<label for="counties">County</label>
						<label>
							<select name="selectCounty">
								<option  selected disabled value="select">Select a county </option>
							   <option value="Cork"> Cork</option>
							   <option value="Galway"> Galway</option>
							   <option value="Mayo"> Mayo</option>
							   <option value="Donegal"> Donegal</option>
							   <option value="Kerry"> Kerry</option>
								<option value="Tpperary"> Tipperary</option>
								<option value="Clare"> Clare</option>
								<option value="Tyrone"> Tyrone</option>
								<option value="Antrim"> Antrim</option>
								<option value="Limerick"> Limerick</option>
								<option value="Roscommon"> Roscommon</option>
								<option value="Down"> Down</option>
								<option value="Wexford"> Wexford</option>
								<option value="Meath"> Meath</option>
								<option value="Londonderry"> Londonderry</option>
								<option value="kilkenny"> Kilkenny</option>
								<option value="Wicklow"> Wicklow</option>
								<option value="Offaly"> Offaly</option>
								<option value="Cavan"> Cavan</option>
								<option value="Waterford"> Waterford</option>
								<option value="Westmeath"> Westmeath</option>
								<option value="Sligo"> Sligo</option>
								<option value="Laois"> Laois</option>
								<option value="Kildare"> Kildare</option>
								<option value="Fermanagh"> Fermanagh</option>
								<option value="Leitrim"> Leitrim</option>
								<option value="Armagh"> Armagh</option>
								<option value="Monaghan"> Monaghan</option>
								<option value="Longford"> Longford</option>
								<option value="Dublin"> Dublin</option>
								<option value="Carlow"> Carlow</option>
								<option value="Louth"> Louth</option>
							</select>
							<span class="required"> * </span>
						</label>
						<br>
						<br>
						<label for="courses">Select your course</label>
						<label>
							 <select name="courses">
								<option selected disabled>Select Department</option>
						       <?php
								$select = file_get_contents('files/Courses_list.txt');
								$lines = explode("\n", $select);
								foreach($lines as $line) {
									if(substr( $line, 0, 4 ) !== "----"){
									echo '<option value="'.$line.'">'.$line.'</option>';
									}else{									
									echo '<option disabled>'.$line.'</option>';
									}
								}
							    ?>
						    </select>
						    <span class="required"> * </span>
					    </label>
						<br>
						<br>
						<label for="disability">Indicate if you are</label>
						<label>
							<select name="disability" name="selectDisability">
								<option  selected disabled value="select">Select a term </option>
							   <option value="none"> None</option>
							   <option value="none"> Student with a disability</option>
							   <option value="none"> Student with a learning difficulty</option>
							   <option value="none"> Member of the travelling community</option>
							   <option value="none"> Pathfinder Participant</option>
							</select>
							<span class="required"> * </span>
						</label>   	
						<br>
						<br>	
					</div>
					<br>
					<br>
					<div class="part_check_align">
						<label>Please indicate below the nature of your disability by ticking the appropriate box(es)</label>
						<br>
						<input type="checkbox" name="disabilityS[]" name="disabilityS" value="1"><label class="checkbox-label" for="PA"> Physical Disability ambulant</label> 
						<br>
						<input type="checkbox" name="disabilityS[]" name="disabilityS" value="2"><label class="checkbox-label" for="VI"> Visual Impairment</label> 
						<br>
						<input type="checkbox" name="disabilityS[]" name="disabilityS" value="3"><label class="checkbox-label" for="DF"> Deaf</label> 
						<br>
						<input type="checkbox" name="disabilityS[]" name="disabilityS" value="4"><label class="checkbox-label" for="BL"> Blind
						<br>
						<input type="checkbox" name="disabilityS[]" name="disabilityS" value="5"><label class="checkbox-label" for="HD"> Hard of hearing
						<br>
						<input type="checkbox" name="disabilityS[]" name="disabilityS" value="6"><label class="checkbox-label" for="MH"> Mental Health
						<br>
						<input type="checkbox" name="disabilityS[]" name="disabilityS" value="7"><label class="checkbox-label" for="MS"> Neurological (e.g. Acquired Brain injury)
						<br>
						<input type="checkbox" name="disabilityS[]" name="disabilityS" value="8"><label class="checkbox-label" for="HC"> Significant Health Condition
						<br>
						<input type="checkbox" name="disabilityS[]" name="disabilityS" value="9"><label class="checkbox-label" for="PN"> Physical Disability non-ambulant (wheelchair user)
						<br>
						<input type="checkbox" name="disabilityS[]" name="disabilityS" value="4"><label class="checkbox-label" for="DY"> Specific Learning Difficulty(e.g. dyslexia, dyspraxia,dyscalculia)
						<br>
						<input type="checkbox" name="disabilityS[]" name="disabilityS" value="4"><label class="checkbox-label" for="v"> Other
						<br>
						<br>
						<label for="contact">Contact number</label>
					    <input type="text" name="contact" maxlength="14" placeholder="+353000000000"/>
					    <span class="required"> * </span>
						<br>
						<br>
						<label for="comment" maxlength="500">Please specify disability supports required</label>
						<br>
						 <textarea id ="comment" name = "comment" rows = "3"cols = "80" value="insert your comment here" onclick="setCursorPos()">
		              	</textarea>
		             </div>
		              	<p style="color:red;"> fields marqued by this asterisk * has to be filled. </p>
		              	<br>
		              	<br>
						<span class="error"><?php echo $error; ?></span>
						<br>
						<br>
						<a href="index.php" style="text-decoration: none;"><input class="btn-back" value="back" type="button"></a>
						<input type="submit" value="Subscribe" name="submit_subscribe" class="btn-subscribe">
						<br>
						<br>
				</form>
			</div>
		</section>
		<div class="footer">
			<p>2015 - Institute of Technology of Tralee </p>
		</div>
</body>
</html>