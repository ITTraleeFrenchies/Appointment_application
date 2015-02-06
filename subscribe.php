<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "db";
	
	$error='';
	if (isset($_POST['submit_subscribe'])) {
		if (empty($_POST['tnumber']) || empty($_POST['firstname']) || empty($_POST['lastname'])) {
		$error = "tnumber, first name or last name are invalid";
		}
	else{
	
		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		$connection = mysqli_connect($servername, $username, $password, $dbname);
		
		$tnumber=$_POST["tnumber"];
		$firstname=$_POST["firstname"];
		$lastname=$_POST["lastname"];
		
		$sql="insert into user values('". $tnumber . "','" . $firstname . "','" . $lastname . "', null, null)";
		$query = mysqli_query($connection,$sql);
			if ($query) {
				//header("location: index.php"); // Redirecting To Other Page
			?>	
			<style>
				.modalDialog {
					position: fixed;
					font-family: Arial, Helvetica, sans-serif;
					top: 0;
					right: 0;
					bottom: 0;
					left: 0;
					background: rgba(0,0,0,0.8);
					z-index: 99999;
					opacity:0;
					-webkit-transition: opacity 400ms ease-in;
					-moz-transition: opacity 400ms ease-in;
					transition: opacity 400ms ease-in;
					pointer-events: none;
				}

				.modalDialog:target {
					opacity:1;
					pointer-events: auto;
				}

				.modalDialog > div {
					width: 400px;
					position: relative;
					margin: 10% auto;
					padding: 5px 20px 13px 20px;
					border-radius: 10px;
					background: #fff;
					background: -moz-linear-gradient(#fff, #999);
					background: -webkit-linear-gradient(#fff, #999);
					background: -o-linear-gradient(#fff, #999);
				}

				.close {
					background: #606061;
					color: #FFFFFF;
					line-height: 25px;
					position: absolute;
					right: -12px;
					text-align: center;
					top: -10px;
					width: 24px;
					text-decoration: none;
					font-weight: bold;
					-webkit-border-radius: 12px;
					-moz-border-radius: 12px;
					border-radius: 12px;
					-moz-box-shadow: 1px 1px 3px #000;
					-webkit-box-shadow: 1px 1px 3px #000;
					box-shadow: 1px 1px 3px #000;
				}

				.close:hover { background: #00d9ff; }
		</style>
		
		<?php
				} else {
				$error = "Error : Invalid Tnumber	";
			}
		
	}

	}
	?>

<!DOCTYPE html>
<head>
		<title>Student Application : Appointment</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="style/all_style.css" type="text/css">
		<link rel="stylesheet" href="style/subscribe.css" type="text/css">
		<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css' >
		<script>
		function getData(){
			/*var tnumber=document.forms["form"]["tnumber"].value;
			var firstname=document.forms["form"]["firstname"].value;
			var lastname=document.forms["form"]["lastname"].value;
			
			if (tnumber!=null && tnumber!="" && firstname!=null && firstname!="" && lastname!=null && lastname!="")
			  {
					var tnumber = document.getElementById("tnumber").value;
					var email = tnumber+"@"+"z3students.ittralee.ie";
					document.getElementById("textPopUp").innerHTML = "An email"+
					"has been sent to your Zimbra address email : "+ email;
					document.getElementById("id_form").setAttribute("action","#openModal");
			  }
		}*/
		</script>
		
</head>
					<div id="openModal" class="modalDialog">
						<div>
						
							<a href="" title="Close" class="close">X</a>
							<h2>Account created</h2>
							<p id="textPopUp">An email has been sent to your Zimbra address email : </p>
						</div>
					</div>

<body>
		<section>
			<div id="content">
			<img src="images/rsz_ittralee_icone.png" alt="ITtralee" >
			<h1>Institute of Technology of Tralee</h1>
			
			<div class="or-spacer">
				  <div class="mask"></div>
			</div>
			<h2>Appointment Application</h2>
			
				<form  method="POST" name="form" id="id_form">
					
					<br>
					<br>
					<label for="tnumber">T-number</label>
					<input type="text" name="tnumber">
					<br>
					<br>
					<label for="firstname">Firstname</label>
				    <input type="text" name="firstname" />
					<br>
					<br>
					<label for="lastname">Lastname</label>
				    <input type="text" name="lastname" />
					<br>
					<span><?php echo $error; ?></span>
					<br>
					<br>
						
					<input type="submit" value="Subscribe" name="submit_subscribe" class="btn-subscribe" onclick="getData()">
					<br>
					<br>
				</form>
			</div>
		</section>
		<div class="footer">
			<p>2015 - IT Tralee - Designed by Angele Demeurant and Aurelien Bigois </p>
		</div>
</body>
</html>