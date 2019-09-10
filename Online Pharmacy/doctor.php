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
			background-image: url(images/17-Everyday-Medication-Mistakes-That-Could-Make-You-Sick.jpg);
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
			height: 650px;
			margin-top: -20px;
			margin-bottom: -20px;
		}
		input{
			height: 45px;
    		width: 620px;
		}
		form .login{
    		margin: auto 220px;
    	}
		form .login_button{
    		padding-top: 18px;
    		margin: auto 35px;
    	}
		p{
    		padding-right: 30px;
    	}
	</style>
</head>

<body>
	<div class="navbar">
		<h1 style="color: orange; text-align: center; font-family: Lucida Bright; font-size: 45px;">ONLINE PHARMACY</h1>
	</div>

	<section>
		<div class="backgroundimg">
			<div class="box1">
				<h1 style="color: white; text-align: center; font-size: 45px; font-family: Lucida Bright; padding-top: 40px;">
							Doctor Login Form
				</h1>
				<br>
				<form name="login" action="" method="post">
					<div class="login">
						<input class="form-control" type="text" name="Doctor_id" placeholder="Doctor ID" required=" " style="font-family: Lucida Bright; font-size: 30px;">
						<br>
						<input class="form-control" name="Password" placeholder="Password" type="password" required=" " style="font-family: Lucida Bright; font-size: 30px;">
						<br>
						<div class="login_button">
							<input class="btn btn-default" type="submit" name="submit" value="Login"  style="color: black; height: 55px; width: 200px; font-size: 25px; background-color: #e8a23d5e; color: white; font-family: Lucida Bright; padding-top: 5px;">
						</div>

					</div>
				</form>
				<p style="font-family: Lucida Bright;">
					<br><br>
					<a style="font-size: 20px; color: white; padding-left: 270px; text-decoration: none; " href="update_passworddoc.php">Forgot Password?</a><br>
					<a  style="font-size: 25px; color: orange; padding-left: 230px;text-decoration: none; " href="doctor_registration.php">New Here? Sign-Up</a>	
				</p>
			</div>						
		</div>
		<?php
			include "footer_bootstrap.php";
			?>
	</section>
	<?php
		if(isset($_POST['submit']))
		{
			$count = 0 ;
			$sql = "SELECT * FROM doctor WHERE Doctor_id = '$_POST[Doctor_id]' && PASSWORD = '$_POST[Password]'";
			$res = mysqli_query($link, $sql);

			$count = mysqli_num_rows($res) ;
			if($count == 0)
			{
				?>

			<script type="text/javascript" style="font-size: 100px; font-family: Lucida Bright; float: left;">
				alert("Invalid ID or Password");	
			</script>

			<?php
				}

				else
				{
					$_SESSION['login_user'] = $_POST['Doctor_id'];

			?>

			<script type="text/javascript" style="font-size: 30px; font-family: Lucida Bright; float: left;">
				window.location = "index_doctor.php";
				alert("Login Successful !!!");	
			</script>

			<?php
				}				 
			}
			mysqli_close($link);
		?>
	
</body>
</html>