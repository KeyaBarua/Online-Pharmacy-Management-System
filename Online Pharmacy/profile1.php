<?php
	session_start();
	$link=mysqli_connect("localhost","root","","mypharmacy");

	if ($link===false){
		die("ERROR: could not connect.".mysqli_connect_error());
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Pharmacy Management</title>
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
			margin-right: -10px;
			margin-left: -10px;
		}
		.wrapper
 		{
 			height: 640px;
 			width: 500px;
 			margin: 0 auto;
 			color: white;
 		}
 		section{
 			background-image: url(images/hospital-patient_SH_589302497.jpg);
 			background-size: cover;
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

			<div class="h"><a href="medicine_doctor.php" style="font-size:30px; font-family: Lucida Bright; color: black; text-decoration: none;">MED CORNER</a></div>
			<div class="h"><a href="com_doctor.php" style="font-size:30px; font-family: Lucida Bright; color: black; text-decoration: none;">COMPANY LIST</a></div>
			<div class="h"><a href="viewappoint.php" style="font-size:30px; font-family: Lucida Bright; color: black; text-decoration: none;">VIEW APPOINTMENTS</a></div>
			<div class="h"><a href="profile1.php" style="font-size:30px; font-family: Lucida Bright; color: black; text-decoration: none;">INFO</a></div>
			<div class="h"><a href="request_doctor.php" style="font-size:30px; font-family: Lucida Bright; color: black; text-decoration: none;">ORDERS</a></div>
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
		<div class="wrapper">
 			<?php
 			if(isset($_SESSION['login_user'])){
 				$sql="SELECT * FROM doctor WHERE Doctor_id LIKE '%$_SESSION[login_user]%'";
 				$res=mysqli_query($link, $sql);
 				?>
 				<div style="color: black; font-size: 35px; font-family: Lucida Bright; ; text-align: center; padding-top: 30px;">
	 				<b><br><br>
	 				<?php 	
	 						echo "<p style='padding-left: 15px;'>"."Welcome  !!!"."</p>" ; echo "</td>";
					?>
					</b>
				</div>
				<?php
 				

			
			
					echo "<b>";
					echo "<table style='font-family: Lucida Bright; font-size:20px; background-color: #3e310e75;' class='table table-bordered'>";

				
	 				while($row=mysqli_fetch_assoc($res)){
					echo "<tr>";
	 				echo "<td>";
	 					echo "<p style='color:black; padding-left: 15px;'>"."Doctor ID"."</p>" ; echo "</td>";
	 				echo "</td>";
	 				echo "<td>";
	 					echo "<p style='color:black; padding-left: 15px;'>".$row['Doctor_id']."</p>" ; echo "</td>";
	 				echo "</td>";
	 				echo "</tr>";

	 				
	 				echo "<tr>";
	 				echo "<td>";
	 					echo "<p style='color:black; padding-left: 15px;'>"."Doctor Name"."</p>" ; echo "</td>";
	 				echo "</td>";
	 				echo "<td>";
	 					echo "<p style='color:black; padding-left: 15px;'>".$row['Name']."</p>" ; echo "</td>";
	 				echo "</td>";
	 				echo "</tr>";

	 				
	 				echo "<tr>";
	 				echo "<td>";
	 					echo "<p style='color:black; padding-left: 15px;'>"."Email"."</p>" ; echo "</td>";
	 				echo "</td>";
	 				echo "<td>";
	 					echo "<p style='color:black; padding-left: 15px;'>".$row['Email']."</p>" ; echo "</td>";
	 				echo "</td>";
	 				echo "</tr>";

	 				
	 				echo "<tr>";
	 				echo "<td>";
	 					echo "<p style='color:black; padding-left: 15px;'>"."Contact"."</p>" ; echo "</td>";
	 				echo "</td>";
	 				echo "<td>";
	 					echo "<p style='color:black; padding-left: 15px;'>".$row['Contact']."</p>" ; echo "</td>";
	 				echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 				echo "<td>";
	 					echo "<p style='color:black; padding-left: 15px;'>"."Specialization"."</p>" ; echo "</td>";
	 				echo "</td>";
	 				echo "<td>";
	 					echo "<p style='color:black; padding-left: 15px;'>".$row['Specialization']."</p>" ; echo "</td>";
	 				echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 				echo "<td>";
	 					echo "<p style='color:black; padding-left: 15px;'>"."Available"."</p>" ; echo "</td>";
	 				echo "</td>";
	 				echo "<td>";
	 					echo "<p style='color:black; padding-left: 15px;'>".$row['available']."</p>" ; echo "</td>";
	 				echo "</td>";
	 				echo "</tr>";
					
					echo "</table>";
 					echo "</b>";

 			}	
 			}
		mysqli_close($link);
 		?>
		</div>
			
	</section>
	
</body>
</html>