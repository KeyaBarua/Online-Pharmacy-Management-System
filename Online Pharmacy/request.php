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
			background-image: url(images/makingmedicines784.jpg);
			background-size: cover;
			height: 1000px;
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
			<h1 style="font-size: 40px; font-family: Lucida Bright; color: orange; padding-left: 40px; padding-top: 10px;">
			
			<?php
			if(isset($SESSION['login_user']))
			echo $SESSION['login_user']."'s Cart";
			?>

			</h1>
				<?php
					if(isset($_SESSION['login_user']))
					{
						$q="SELECT cart.Med_id, medicine.med_name as mname, cart.Username, medicine.price from cart,medicine WHERE cart.Username='$_SESSION[login_user]' AND cart.Med_id=medicine.medicine_id";
						$res=mysqli_query($link, $q);
						if(mysqli_num_rows($res)==0)
						{
							echo "<p style='color: black; font-size:30px; text-align: center; font-family: Lucida Bright; padding-top: 0px;'> <strong> <b>The Cart is Empty ... </b> </strong> </p>";
						}
						else
						{
							echo "<table class='table table-bordered table-hover' style='padding-top: 15px;'>";
								echo "<tr style='background-color: #fff4d6ba; font-family: Lucida Bright; font-size: 20px;'>";
									//Table header
									
									echo "<th style='text-align: center;' >"; echo "Medicine ID";  echo "</th>";
									echo "<th style='text-align: center;' >"; echo "Medicine Name";  echo "</th>";
									echo "<th style='text-align: center;' >"; echo "Customer Username";  echo "</th>";
									echo "<th style='text-align: center;' >"; echo "Medicine Cost";  echo "</th>";
									
								echo "</tr>";	

							while($row=mysqli_fetch_assoc($res))
							{
								echo "<tr style='background-color:#ffedc7bd '>";
									echo "<td style='text-align: center; font-family: Lucida Bright; font-size: 18px; '>"; echo $row['Med_id']; echo "</td>";
									echo "<td style='text-align: center; font-family: Lucida Bright; font-size: 18px; '>"; echo $row['mname']; echo "</td>";
									echo "<td style='text-align: center; font-family: Lucida Bright; font-size: 18px; '>"; echo $row['Username']; echo "</td>";
									echo "<td style='text-align: center; font-family: Lucida Bright; font-size: 18px; '>"; echo $row['price']; echo "</td>";
								
								echo "</tr>";
							}

							echo "</table>";
							$q2="SELECT sum(medicine.price) as total FROM cart, medicine WHERE Username='$_SESSION[login_user]' AND cart.Med_id=medicine.medicine_id";
							$res1=mysqli_query($link, $q2);
							while($row = mysqli_fetch_assoc($res1))
							{
								echo "<p style='color: black; font-size:30px; text-align: center; font-family: Lucida Bright; padding-top: 0px;'> <strong> <b>"; echo "The Total Cost(tk) is : ".$row['total']; echo "</b> </strong> </p>";
							}
							

							echo"<a href='medicine.php' style='padding-left:20px; text-decoration: none; color: darkblue; font-size: 30px; font-family: Lucida Bright'><strong>Shop More?</strong></a>'";
							echo"<a href='confirm.php' style='padding-left:500px; text-decoration: none; color: darkblue; font-size: 30px; font-family: Lucida Bright'><strong> Confirm Order</strong></a>";

						}

					}

					else
					{
						echo "<p style='color: black; font-size:30px; text-align: center; font-family: Lucida Bright; padding-top: 0px;'> <strong> <b>There's no pending request ... </b> </strong> </p>";
						
					}

				?>

			</div>
		</div>
		

	</section>

	<?php
			include "footer1.php";
	?>
</body>
</html>