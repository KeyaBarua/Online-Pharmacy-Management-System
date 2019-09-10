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
			background-image: url(images/Building-a-new-type-of-pharmaceutical-company-605x340.jpg);
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
		.form-control
		{
			padding-left: 20px;
			width: 500px;
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
							Change your password
				</h1>
				<br>
				<form action="" method="post" style="padding-left: 89px;">
				<input style="height: 40px; font-family: Lucida Bright; font-size: 25px;" type="text" name="c_id" class="form-control" placeholder="Company ID" required=""><br>
				<input style="height: 40px; font-family: Lucida Bright; font-size: 25px;" type="text" name="email" class="form-control" placeholder="Email" required=""><br>
				<input style="height: 40px; font-family: Lucida Bright; font-size: 25px;" type="text" name="password" class="form-control" placeholder="New Password" required=""><br>

					<div style="padding-left: 110px; padding-top: 30px;">
				<input class="btn btn-default" type="submit" name="submit" value="Update Password"  style="color: black; height: 55px; width: 260px; font-size: 25px; background-color: #e8a23d5e; color: white; font-family: Lucida Bright; ">
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
			$sql = "UPDATE company SET PASSWORD='$_POST[password]' WHERE c_id = '$_POST[c_id]'&& email = '$_POST[email]' ";
			if(mysqli_query($link, $sql)){

			?>

			<script type="text/javascript" style="font-size: 100px; font-family: Lucida Bright; float: left;">
				alert("Password is updated!!");	
				window.location = "Company.php";
			</script>

			<?php
				}

				else
				{

			?>

			<script type="text/javascript" style="font-size: 30px; font-family: Lucida Bright; float: left;">
				alert("Invalid Username or Email!!!");	
			</script>

			<?php
				}	
				}			 
			
			mysqli_close($link);
		?>
	
</body>
</html>