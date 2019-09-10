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
    		height: 600px;
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
		form .registration{
    		margin: auto 220px;
    	}
		form .register_button{
    		padding-top: 18px;
    		margin: auto 35px;
    	}
	</style>
</head>

<body>
	<div class="navbar">
		<h1 style="color: orange; text-align: center; font-family: Lucida Bright; font-size: 45px;">ONLINE PHARMACY</h1>
		<a href="doctor.php" style="color: orange; text-decoration: none; font-family: Lucida Bright; font-size: 25px;padding-right: 25px;">LOGIN</a>
	</div>

	<section>
		<div class="backgroundimg">
			<div class="box1">
				<h1 style="color: white; text-align: center; font-size: 45px; font-family: Lucida Bright; padding-top: 40px;">
							Doctor Registration Form
				</h1>
				<br>
				<form name="registration" action="" method="post">
					<div class="registration">
						<input class="form-control" name="Doctor_Name" type="text" placeholder="Doctor Name" required=" " style="font-family: Lucida Bright; font-size: 30px;">
						<br>
						<input class="form-control" name="Doctor_id" type="text" placeholder="Doctor ID" required=" " style="font-family: Lucida Bright; font-size: 30px;">
						<br>
						<input class="form-control" name="Email" type="text" placeholder="Email" required=" " style="font-family: Lucida Bright; font-size: 30px;">
						<br>
						<input class="form-control" name="Contact" type="text" placeholder="Contact" required=" " style="font-family: Lucida Bright; font-size: 30px;">
						<br>
						<input class="form-control" name="Specialization" type="text" placeholder="Specialization" required=" " style="font-family: Lucida Bright; font-size: 30px;">
						<br>
						<input class="form-control" name="Password" type="Password" placeholder="Password" required=" " style="font-family: Lucida Bright; font-size: 30px;">
						<br>
						<input class="form-control" name="Available" type="text" placeholder="Available Time" required=" " style="font-family: Lucida Bright; font-size: 30px;">
						<br>
						<div class="register_button">
							<input class="btn btn-default" type="submit" name="submit" value="Register"  style="color: black; height: 55px; width: 200px; font-size: 25px; background-color: #e8a23d5e; color: white; font-family: Lucida Bright; padding-top: 5px;">
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
		if(isset($_POST['submit'])){
			$count=0;
			$res=mysqli_query($link,"SELECT Doctor_id from doctor");
			while ($row=mysqli_fetch_assoc($res)) {
				if($row['Doctor_id']==$_POST['Doctor_id']){
					$count=$count+1;
				}
			}

			if($count==0){
				$Doctor_id = mysqli_real_escape_string($link, $_REQUEST['Doctor_id']);
				$Doctor_Name = mysqli_real_escape_string($link, $_REQUEST['Doctor_Name']);
				$Email = mysqli_real_escape_string($link, $_REQUEST['Email']);
				$Contact = mysqli_real_escape_string($link, $_REQUEST['Contact']);
				$Specialization = mysqli_real_escape_string($link, $_REQUEST['Specialization']);
				$Password = mysqli_real_escape_string($link, $_REQUEST['Password']);
				$Available = mysqli_real_escape_string($link, $_REQUEST['Available']);
	
				$sql = "INSERT INTO doctor (Doctor_id, Name, Email, Contact, Specialization, PASSWORD, available) VALUES ('$Doctor_id', '$Doctor_Name', '$Email', '$Contact', '$Specialization', '$Password', '$Available')";

				mysqli_query($link, $sql);
	?>

	<script type="text/javascript" style="font-size: 30px; font-family: Lucida Bright;">
        alert("Congratulations!!!\nYour Account is Created Successfully!");
    </script>

	<?php
    	}
        else
        {

    ?>

    <script type="text/javascript" style="font-size: 30px; font-family: Lucida Bright;">
    	alert("The username already exists! ");
    </script>

    <?php
    	}
    }

    mysqli_close($link);
    ?>
	
</body>
</html>