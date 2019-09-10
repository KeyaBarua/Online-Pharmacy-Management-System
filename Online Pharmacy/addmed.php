<?php
$link=mysqli_connect("localhost","root","","mypharmacy");
session_start();
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
			margin-left: -10px;
		}
		section{
			height: 650px;
			margin-top: -20px;
			margin-bottom: -20px;
			background-image: url(images/PID-3541-Steve-Parkinson-Lakewood-Amedex-Clinical-Stage-Pharmaceutical-Company-1600x800-c-default.jpg);
			background-size: cover;
		}
		input{
			height: 45px;
    		width: 400px;
    		padding: 15px;
    		margin: -5px 0 10px 0;
    		
		}
		.container{
			padding: 16px;
		}
		form .register_button{
    		padding-top: 18px;
    		margin: auto 90px;
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
		.form-control
    	{
      		background-color: #080707;
      		color: white;
      		height: 40px;
    	}
    	.box2
		{
    		height: 520px;
    		width: 500px;
    		background-color: #00000078;
    		margin: 20px auto;
   			 opacity: 0.75;    
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
						if(isset($_SESSION['login_user']))
							echo "Welcome ".$_SESSION['login_user'];
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
			<div class="box2" style="text-align: center;">
            <br>
            <h1 style="color: white; text-align: center; font-size: 25px; font-family: Lucida Bright;">
              Add Medicine
            </h1>
            <br>
			<form name="registration" action="" method="post" style="color: white;">
            <div class="registration">
            <input class="form-control" type="text" name="med_id" placeholder="   Medicine ID" required="" style="font-family: Lucida Bright; font-size: 20px; height: 30px; width: 350px; margin-left: 70px;">
                <br>
                <input class="form-control" type="text" name="med_name" placeholder="   Medicine Name" required="" style="font-family: Lucida Bright; font-size: 20px; height: 30px; width: 350px; margin-left: 70px;" >
                <br>
                <input class="form-control" type="text" name="treatment" placeholder="   Treatment" required="" style="font-family: Lucida Bright; font-size: 20px; height: 30px; width: 350px; margin-left: 70px;" >
                <br>
                <input class="form-control" type="text" name="manufacture" placeholder="   Manufacturer" required="" style="font-family: Lucida Bright; font-size: 20px; height: 30px; width: 350px; margin-left: 70px;" >
                <br>
                <input class="form-control" type="text" name="cost" placeholder="   Price" required="" style="font-family: Lucida Bright; font-size: 20px; height: 30px; width: 350px; margin-left: 70px;" >
                <br>
                <input class="form-control" type="text" name="generic" placeholder="   Generic Name" required="" style="font-family: Lucida Bright; font-size: 20px; height: 30px; width: 350px; margin-left: 70px;" >
                <br>
                <div class="reg_button">
                  <input class="btn btn-default" type="submit" name="submit" value="Add to Library"  style="color: black; height: 45px; width: 260px; font-size: 25px; background-color: black; color: white; font-family: Lucida Bright; ">
                </div>
                
              </div>
            </form>
          </div>
		

	<?php
          if(isset($_POST['submit']))
          {
            if(isset($_SESSION['login_user']))
            {
            	$count=0;
            	$sql="SELECT * from medicine WHERE medicine_id='$_POST[med_id]' ";
            	$res=mysqli_query($link,$sql);
            	$count=mysqli_num_rows($res);
            	if($count==0){
              		$sql="INSERT INTO medicine(c_id, medicine_id, med_name, treatment, manufacture, price, Generic) VALUES('$_SESSION[login_user]', '$_POST[med_id]','$_POST[med_name]','$_POST[treatment]', '$_POST[manufacture]', '$_POST[cost]', '$_POST[generic]')";
					$res=mysqli_query($link, $sql);
              ?>
                <script type="text/javascript">
                  alert("Medicine Added Successfully.");
                </script>

              <?php

            }
            else
            {
              ?>
                <script type="text/javascript">
                  alert("Medicine already exists!!");
                </script>
              <?php
            }
        }
    }
      ?>
      </div>

	
	<?php
			include "footer_bootstrap.php";
			?>
</section>
</body>
</html>