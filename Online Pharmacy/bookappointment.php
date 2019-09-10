<?php
include "connection.php";
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pharmacy Management</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<style type="text/css">
		.backgroundimg{
			background-image: url(images/pharmaceuticals-production-shutterstock-331288130-1068x601.jpg);
			background-size: cover;
			margin-top: -80px;
			
		}
		.box1 {
    		height: 500px;
   			width: 700px;
    		background-color: #000000eb;
    		margin: 80px auto;
    		margin-bottom: -20px;
       		opacity: 0.75;
		}
		.navbar{
			background-image: url(images/jik.jpg);
			height: 160px;
			padding-left: 50px;
			padding-top: 50px;
			margin-top: -10px;
			margin-right: -10px;
			margin-left: -10px;
		}
		section{
			background-image: url(images/mildred-doctor-appointment-wait-times-ftr.jpg);
			background-size: cover;
			height: 650px;
			margin-top: -20px;
			margin-bottom: -20px;
		}
		input{
			height: 45px;
    		width: 620px;
		}
		form .registration{
    		margin: auto 220px;
    	}
		form .register_button{
    		padding-top: -5px;
    		margin: auto 30px;
    	}
    	body{
			font-family: "Lato", sans-serif;
			transition: background-color .5s;
		}
		.sideNav{
			height: 100%;
			width: 0;
			position: fixed;
			z-index: 1;
			top: 0;
			left: 0;
			background-color: #737373;
			overflow-x: hidden;
			transition: 0.5s;
			padding-top: 60px;
		}
		.sideNav a{
			padding: 5px 5px 5px 20px;
			text-decoration: none;
			font-size: 20px;
			color: #000000;
			display: block;
			transition: 0.3s;

		}
		.sideNav a:hover{
			color: #f1f1f1;
		}
		.sideNav .closebtn{
			color: red;
			position: absolute;
			top: 0;
			right: 25px;
			font-size: 25px;
			margin-left: 50px;
		}
		#main{
			transition: margin-left .5s;
		}
		.h:hover{
			color: white;
			background-color: red;
		}
	</style>
</head>

<body>
	<div class="navbar">
		<h1 style="color: orange; text-align: center; font-family: Lucida Bright; font-size: 45px;">ONLINE PHARMACY</h1>
	</div>

	<section>
			<div id="mySidenav" class="sideNav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<div style="color: black; font-family: Lucida Bright; margin-left: 30px; font-size: 30px;">
				<b><u>
					<?php
						if(isset($_SESSION['login_user'])){
							echo "Welcome ".$_SESSION['login_user'];
						}
					?>
				</u></b>
			</div><br>

			<div class="h"><a href="medicine.php" style="font-size:30px; font-family: Lucida Bright; color: black; text-decoration: none;">MED CORNER</a></div>
			<div class="h"><a href="doctor_list.php" style="font-size:30px; font-family: Lucida Bright; color: black; text-decoration: none;">DOCTOR LIST</a></div>
			<div class="h"><a href="bookappointment.php" style="font-size:30px; font-family: Lucida Bright; color: black; text-decoration: none;">BOOK APPOINTMENT</a></div>
			<div class="h"><a href="companylist.php" style="font-size:30px; font-family: Lucida Bright; color: black; text-decoration: none;">COMPANY LIST</a></div>
			<div class="h"><a href="profile.php" style="font-size:30px; font-family: Lucida Bright; color: black; text-decoration: none;">INFO</a></div>
			<div class="h"><a href="request.php" style="font-size:30px; font-family: Lucida Bright; color: black; text-decoration: none;">ORDERS</a></div>
			<div class="h"><a href="logout.php" style="font-size:30px; font-family: Lucida Bright; color: black; text-decoration: none;">LOGOUT</a></div>
		</div>

			<div id="main">
				<div style="padding-left: 20px;">
					<span style="font-size:30px; font-family: Lucida Bright; color: black; cursor: pointer;" onclick="openNav()">&#9776; <b> Options </b>
					</span>
			</div>

			<script>
				function openNav(){
					document.getElementById("mySidenav").style.width="350px";
					document.getElementById("main").style.marginLeft="350px";
					document.body.style.backgroundColor = "rgba(0, 0, 0, 0.7)";
				}

				function closeNav(){
					document.getElementById("mySidenav").style.width = "0";
					document.getElementById("main").style.marginLeft= "0";
					document.body.style.backgroundColor = "white";
				}
			</script>
			<div class="box1">
				<h1 style="color: white; text-align: center; font-size: 45px; font-family: Lucida Bright; padding-top: 40px;">
							Fix Appointment
				</h1>
				<br>
				<form name="registration" action="" method="post">
					<div class="registration">
						<input class="form-control" name="Doctor_ID" type="text" placeholder="Doctor ID" required=" " style="font-family: Lucida Bright; font-size: 30px;">
						<br>
						<input class="form-control" name="Doctor_Name" type="text" placeholder="Doctor Name" required=" " style="font-family: Lucida Bright; font-size: 30px;">
						<br>
						<input class="form-control" name="Patient_name" type="text" placeholder="Patient Name" required=" " style="font-family: Lucida Bright; font-size: 30px;">
						<br>
						<input class="form-control" name="Patient_Email" type="text" placeholder="Patient Email" required=" " style="font-family: Lucida Bright; font-size: 30px;">
						<br>
						<input class="form-control" name="Patient_Contact" type="text" placeholder="Patient Contact" required=" " style="font-family: Lucida Bright; font-size: 30px;">
						<br>
						<div class="register_button">
							<input class="btn btn-default" type="submit" name="submit" value="Book Appointment"  style="color: black; height: 55px; width: 300px; font-size: 25px; background-color: #e8a23d5e; color: white; font-family: Lucida Bright; padding-top: 5px;">
						</div>

					</div>
				</form>
			</div>						
		</div>

	<?php
		if(isset($_POST['submit'])){
	
				$sql = "INSERT INTO appointment (doc_id, doc_name, patient_name, email, contact) VALUES ('$_POST[Doctor_ID]', '$_POST[Doctor_Name]', '$_POST[Patient_name]', '$_POST[Patient_Email]', '$_POST[Patient_Contact]')";

				$res=mysqli_query($link, $sql);
	?>

	<script type="text/javascript" style="font-size: 30px; font-family: Lucida Bright;">
        alert("Congratulations!!!\nYour Appointment is booked!");
    </script>

	<?php

    	}
        

    mysqli_close($link);
    ?>
    <?php
			include "footer_bootstrap.php";
			?>
	</section>
	
</body>
</html>