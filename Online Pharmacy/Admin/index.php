<?php
include "connection.php";
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHARMACY ADMIN</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style type="text/css">
		.navbar{
			background-image: url(images/jik.jpg);
			height: 160px;
			padding-left: 50px;
			padding-top: 50px;
			margin-top: -10px;
			margin-left: -10px;
			margin-right: -10px;
			
		}
		section{
			background-image: url(images/stethoscope-840125__340.jpg);
			height: 620px;
			background-size: cover;
			background-color: lightgrey;
			margin-right: -10px;
			margin-left: -10px;
			margin-top: -20px;
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
			padding-top: 25px;
		}
		.h:hover{
			color: white;
			background-color: red;
		}	
	</style>
</head>
<body>
	<div class="navbar">
		<h1 style="color: orange; font-family: Lucida Bright; font-size: 45px;">ONLINE PHARMACY-ADMIN PANEL</h1>
		
	</div>
	<section>
		<div id="mySidenav" class="sideNav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<div style="color: black; font-family: Lucida Bright; margin-left: 30px; font-size: 30px;">
				<b><u>
					<?php
							echo "Welcome Admin";
					?>
				</u></b>
			</div><br>

			<div class="h"><a href="medicinelist.php" style="font-size:30px; font-family: Lucida Bright; color: black; text-decoration: none;">MED LIST</a></div>
			<div class="h"><a href="doctor_list.php" style="font-size:30px; font-family: Lucida Bright; color: black; text-decoration: none;">DOCTOR LIST</a></div>
			<div class="h"><a href="companylist.php" style="font-size:30px; font-family: Lucida Bright; color: black; text-decoration: none;">COMPANY LIST</a></div>
			<div class="h"><a href="patientlist.php" style="font-size:30px; font-family: Lucida Bright; color: black; text-decoration: none;">PATIENT LIST</a></div>
			<div class="h"><a href="order_list.php" style="font-size:30px; font-family: Lucida Bright; color: black; text-decoration: none;">ORDER LIST</a></div>
			<div class="h"><a href="deletedoctor.php" style="font-size:30px; font-family: Lucida Bright; color: black; text-decoration: none;">DELETE DOCTOR</a></div>
			<div class="h"><a href="deletepatient.php" style="font-size:30px; font-family: Lucida Bright; color: black; text-decoration: none;">DELETE PATIENT</a></div>
			<div class="h"><a href="deletecom.php" style="font-size:30px; font-family: Lucida Bright; color: black; text-decoration: none;">DELETE COMPANY</a></div>
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
	</section>
	<?php
			include "footer1.php";
		?>
</body>
</html>