<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>
<h2> Select Option: </h2>

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

	<h2>
		<form action="1201Add.php" method="POST">
			<input type="submit" value = "Add Item to Truck">	
		</form>

		<form action="1201Sub.php" method="POST">
			<input type="submit" value = "Remove Item from Truck">	
		</form>

		<form action="1201All.php" method="POST">
			<input type="submit" value = "View All Item on Truck">	
		</form>
	</h2>

</body>
<a href="../../back.php/">Home</a>
<a href="../../logout.php/">Logout</a>
</html>
