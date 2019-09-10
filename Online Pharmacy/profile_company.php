<?php
	session_start();
	include "connection.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Pharmacy Management</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<style type="text/css">
		.navbar{
			background-image: url(images/jik.jpg);
			height: 160px;
			padding-left: 50px;
			padding-top: 50px;
			margin-top: -10px;
			margin-right: -40px;
			margin-left: -10px;
		}
		section{
			background-image: url(images/PID-3541-Steve-Parkinson-Lakewood-Amedex-Clinical-Stage-Pharmaceutical-Company-1600x800-c-default.jpg);
			background-size: cover;
			height: 720px;
			margin-top: -20px;
			margin-right: -40px;
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

			<div class="h"><a href="addmed.php" style="font-size:30px; font-family: Lucida Bright; color: black; text-decoration: none;">ADD MEDICINE</a></div>
			<div class="h"><a href="delmed.php" style="font-size:30px; font-family: Lucida Bright; color: black; text-decoration: none;">DELETE MEDICINE</a></div>
			<div class="h"><a href="viewmed.php" style="font-size:30px; font-family: Lucida Bright; color: black; text-decoration: none;">VIEW PRODUCTS</a></div>
			
			<div class="h"><a href="profile_company.php" style="font-size:30px; font-family: Lucida Bright; color: black; text-decoration: none;">INFO</a></div>
			<div class="h"><a href="order_info.php" style="font-size:30px; font-family: Lucida Bright; color: black; text-decoration: none;">ORDERS</a></div>
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
	<h1 style="color: black; font-family: lucida Bright; text-align: center; padding-top: 20px;"><b>MEDICINES</b></h1>
	

	<?php

		if(isset($_SESSION['login_user'])){
			$sql = "SELECT * FROM company WHERE c_id='$_SESSION[login_user]' ";
			$res=mysqli_query($link, $sql);
			$row=mysqli_fetch_assoc($res);
			echo "<b>";
 			echo "<table style='font-family: Lucida Bright; font-size:20px; background-color: #3e310e75;' class='table table-bordered'>";
	 		echo "<tr>";
	 		echo "<td>";
	 		echo "<p style='color: white; padding-left: 15px;'>"."Company ID"."</p>" ; echo "</td>";
	 		echo "</td>";
	 		echo "<td>";
	 		echo "<p style='color: white; padding-left: 15px;'>".$row['c_id']."</p>" ; echo "</td>";
	 		echo "</td>";
	 		echo "</tr>";
			echo "<tr>";
	 		echo "<td>";
	 		echo "<p style='color: white; padding-left: 15px;'>"."Company Name"."</p>" ; echo "</td>";
	 		echo "</td>";
	 		echo "<td>";
	 		echo "<p style='color: white; padding-left: 15px;'>".$row['c_name']."</p>" ; echo "</td>";
	 		echo "</td>";
	 		echo "</tr>";
			echo "<tr>";
	 		echo "<td>";
	 		echo "<p style='color: white; padding-left: 15px;'>"."Email Address"."</p>" ; echo "</td>";
	 		echo "</td>";
	 		echo "<td>";
	 		echo "<p style='color: white; padding-left: 15px;'>".$row['email']."</p>" ; echo "</td>";
	 		echo "</td>";
	 		echo "</tr>";
			echo "<tr>";
	 		echo "<td>";
	 		echo "<p style='color: white; padding-left: 15px;'>"."Contact no."."</p>" ; echo "</td>";
	 		echo "</td>";
	 		echo "<td>";
	 		echo "<p style='color: white; padding-left: 15px;'>".$row['contact']."</p>" ; echo "</td>";
	 		echo "</td>";
	 		echo "</tr>";
			echo "<tr>";
	 		echo "<td>";
	 		echo "<p style='color: white; padding-left: 15px;'>"."Website"."</p>" ; echo "</td>";
	 		echo "</td>";
	 		echo "<td>";
	 		echo "<p style='color: white; padding-left: 15px;'>".$row['website']."</p>" ; echo "</td>";
	 		echo "</td>";
	 		echo "</tr>";
			echo "</table>";
 			echo "</b>";
		mysqli_close($link);
	}
		?>
	</section>
	<?php
		include "footer2.php";
	?>

</body>
</html>