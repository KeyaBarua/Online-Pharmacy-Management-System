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
	<style type="text/css">
		.navbar{
			background-image: url(images/jik.jpg);
			height: 160px;
			padding-left: 50px;
			padding-top: 50px;
			margin-top: -10px;
			margin-right: -58px;
			margin-left: -10px;
		}
		section{
			background-image: url(images/makingmedicines784.jpg);
			background-size: cover;
			height: 600px;
			margin-right: -58px;
			margin-left: -20px;
			margin-top: -25px;
		}
	</style>
</head>
<body>
	<div class="navbar">
		<h1 style="color: orange; text-align: center; font-family: Lucida Bright; font-size: 45px;">ONLINE PHARMACY</h1>
	</div>

	<section>
		<?php
		
		
			if(isset($_SESSION['login_user']))
			{
				$sql = "SELECT * FROM medicine";
				$res=mysqli_query($link, $sql);

				while ($row=mysqli_fetch_assoc($res)) {
					echo "<h1 style='color:black; text-align:center; font-family: Lucida Bright; padding-top:25px; font-size:30px;'>".$row['med_name']."</h1>";
					echo "<p style='color:black; font-family:Lucida Bright; font-size:25px; padding-left:20px;'><strong>Generic Name:</strong></p> ";
					echo "<p style='color:black; font-family:Lucida Bright; font-size:25px; padding-left:20px;'>".$row['Generic']."</p>";
					echo "<p style='color:black; font-family:Lucida Bright; font-size:25px; padding-left:20px;'><strong>Brand Name:</strong></p> ";
					echo "<p style='color:black; font-family:Lucida Bright; font-size:25px; padding-left:20px;'>".$row['med_name']."</p>";
					echo "<p style='color:black; font-family:Lucida Bright; font-size:25px; padding-left:20px;'><strong>Treatment:</strong></p> ";
					echo "<p style='color:black; font-family:Lucida Bright; font-size:25px; padding-left:20px;'>".$row['treatment']."</p>";
					echo "<p style='color:black; font-family:Lucida Bright; font-size:25px; padding-left:20px;'><strong>Manufacturer:</strong></p> ";
					echo "<p style='color:black; font-family:Lucida Bright; font-size:25px; padding-left:20px;'>".$row['manufacture']."</p>";
					echo "<p style='color:black; font-family:Lucida Bright; font-size:25px; padding-left:20px;'><strong>Cost Per unit:</strong></p> ";
					echo "<p style='color:black; font-family:Lucida Bright; font-size:25px; padding-left:20px;'>".$row['price']."</p>";
					
				}
			

			
			}
		mysqli_close($link);
		?>
	</section>
	<?php
		include "footer1.php";
	?>
</body>
</html>