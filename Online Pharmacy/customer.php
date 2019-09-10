<?php
include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pharmacy Management</title>
	<style type="text/css">
		.navbar{
			background-image: url(images/jik.jpg);
			height: 160px;
			padding-left: 50px;
			padding-top: 50px;
			margin-top: -10px;
			margin-right: -10px;
			margin-left: -10px;
		}
		.navbar2{
			background-color: black;
			height:50px;
			margin-left: -10px;
			margin-right: -10px;
			padding-left: 20px;
			padding-top: 10px;
		}
	</style>
</head>

<body>
	<div class="navbar">
		<h1 style="color: orange; text-align: center; font-family: Lucida Bright; font-size: 45px;">WELCOME TO ONLINE PHARMACY</h1>
	</div>
	<div class="navbar2">
		<a href="doctor.php" style="color: white; text-decoration: none; padding-top: 50px; font-size: 30px; padding-left: 20px; ">Doctor</a>
		<a href="patient.php" style="color: white; text-decoration: none; text-align: center; font-size: 30px; padding-left: 20px;">Patient</a>
		<a href="Company.php" style="color: white; text-decoration: none; text-align: center; font-size: 30px; padding-left: 20px;">Company</a>
	</div>
	<img src="images/62007717-doctor-isolated-on-white-background-holding-digital-tablet-pharmacy.jpg" height="450px;" align="right">
</body>
</html>