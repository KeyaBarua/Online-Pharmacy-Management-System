<?php
include "connection.php";
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHARMACY ADMIN</title>

	<style type="text/css">
		.backgroundimg{
			background-image: url(images/52651103-happy-senior-citizen-customer-in-red-standing-at-pharmacy-counter-as-pharmacist-in-eyeglasses-and-la.jpg);
			background-size: cover;
			margin-bottom: -20px;
			margin-right: -20px;
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
			margin-right: -20px;
			margin-left: -10px;
		}
		section{
			height: 650px;
			margin-top: -20px;
			margin-bottom: -20px;
			margin-left: -20px;
		}
		input{
			height: 45px;
    		width: 400px;
		}
		form .login{
    		margin: auto 150px;
    	}
		form .login_button{
    		padding-top: 18px;
    		margin: auto 100px;
    	}
	</style>
</head>
<body>
	<div class="navbar">
		<h1 style="color: orange; font-family: Lucida Bright; font-size: 45px;">ONLINE PHARMACY-ADMIN PANEL</h1>
		<h1 style="color: darkorange; font-family: Lucida Bright; text-align: right; font-size: 20px;">Creating admin account is restricted</h1>
	</div>
	<section>
		<div class="backgroundimg">
			<div class="box1">
				<h1 style="color: white; text-align: center; font-size: 45px; font-family: Lucida Bright; padding-top: 40px;">
							Admin Login Form
				</h1>
				<br>
				<form name="login" action="" method="post">
					<div class="login">
						<input class="form-control" type="text" name="Username" placeholder="Admin Username" required=" " style="font-family: Lucida Bright; font-size: 30px;">
						<br>
						<input class="form-control" type="password" name="Password" placeholder="Password" required=" " style="font-family: Lucida Bright; font-size: 30px;">
						<br>
						<div class="login_button">
							<input class="btn btn-default" type="submit" name="submit" value="Login"  style="color: black; height: 55px; width: 200px; font-size: 25px; background-color: #e8a23d5e; color: white; font-family: Lucida Bright; padding-top: 5px;">
						</div>

					</div>
				</form>
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
		$sql = "SELECT * FROM admin WHERE Username = '$_POST[Username]' && PASSWORD = '$_POST[Password]'";
		$res = mysqli_query($link, $sql);

		$count = mysqli_num_rows($res) ;
		if($count == 0)
		{
	?>

	<script type="text/javascript" style="font-size: 100px; font-family: Lucida Bright; float: left;">
		alert("Invalid Username or Password");	
	</script>

	<?php
		}

		else
		{
			$_SESSION['login_user'] = $_POST['Username'];

	?>

	<script type="text/javascript" style="font-size: 30px; font-family: Lucida Bright; float: left;">
		window.location = "index.php";
			alert("Login Successful !!!");	
	</script>

	<?php
		}				 
	}
mysqli_close($link);
		?>
</body>
</html>