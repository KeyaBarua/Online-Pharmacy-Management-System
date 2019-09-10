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
	<h1 style="color: black; font-family: lucida Bright; text-align: center; padding-top: 20px;"><b>Remove Product</b></h1>
	<form class="navbar-form" method="post" name="form1" style="text-align: center; padding-top: 18px; padding-right: 60px;">
		<input type="text" name="delete" class="form-control" placeholder="Enter Medicine ID" style="font-family: Lucida Bright; font-size: 18px; height: 40px; width: 350px;">
		<button class="btn btn-default" type="submit" name="submit" style="background-color: #e8a23d5e; font-size: 25px; ">
		<span class="	glyphicon glyphicon-check" style="color: white; height: 27.5px;"></span>
		</button>
	

	<?php

		if(isset($_POST['submit'])){
			if(isset($_SESSION['login_user'])){
				$sql = "SELECT * FROM medicine WHERE medicine_id= '$_POST[delete]' ";
				$res=mysqli_query($link, $sql);
				$count=mysqli_num_rows($res);
				if($count==0){
		?>
		<script type="text/javascript">
            alert("Medicine Not Found.");
        </script>

        <?php
    	}
        else
        {
        	$sql = "DELETE FROM medicine WHERE medicine_id= '$_POST[delete]' ";
			$res=mysqli_query($link, $sql);
         ?>
        <script type="text/javascript">
           alert("Medicine deleted successfully!!");
        </script>
        <?php
            }
        }
    }
    mysqli_close($link);
      ?>
      </div>
	</section>
	<?php
		include "footer2.php";
	?>

</body>
</html>