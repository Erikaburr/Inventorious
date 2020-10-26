<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>

	<h2> Select Inventory Type: </h2>

	<?php
	session_start();
	$email = $_SESSION['email'];
	echo "User: ";

	$con=mysqli_connect("localhost","test","test","BEVFR");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$result = mysqli_query($con,"SELECT LastName, FirstName FROM Member WHERE Email = '$email'");
	while($row = mysqli_fetch_array($result)) {
		echo "<tr>";  
		echo '<td>' . $row['FirstName'] . '</td>';
		echo " ", '<td>' . $row['LastName'] . '</td>';
		echo "</tr>";
	}
	echo "</table>";
	echo "<br>";
 	echo "Email: ";
	echo $email;
	?>

<br><br>
	<h2>
		<form action="/Truck/TruckInventory.php" method="POST">
			<input type="submit" value = "Truck Inventory">	
		</form>

		<form action="/Station/StationInventory.php" method="POST">
			<input type="submit" value = "Station Inventory">	
		</form>

		<form action="/Member/MemberInventory.php" method="POST">
			<input type="submit" value = "Member Inventory">	
		</form>
	</h2>

</body>
<a href="back.php/">Home</a>
<a href="logout.php/">Logout</a>
</html>

