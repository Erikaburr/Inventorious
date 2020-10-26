<style>
table {
    width: 100px;
    margin-left: auto;
    margin-right: auto;
}
</style>

<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>

<h2> Truck Inventory: </h2>
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
 		<form action="/Truck/1201/1201.php" method="POST">
			<input type="submit" value = "Engine 1201">	
		</form>

		<form action="/Truck/1202/1202.php" method="POST">
			<input type="submit" value = "Engine 1202">	
		</form>

		<form action="/Truck/1203.php" method="POST">
			<input type="submit" value = "Engine 1203">	
		</form>

		<form action="/Truck/1401.php" method="POST">
			<input type="submit" value = "Brush 1401">	
		</form>

		<form action="/Truck/1501.php" method="POST">
			<input type="submit" value = "Squad 1501">	
		</form>

		<form action="/Truck/1502.php" method="POST">
			<input type="submit" value = "Squad 1502">	
		</form>

		<form action="/Truck/1503.php" method="POST">
			<input type="submit" value = "Squad 1503">	
		</form>

		<form action="/Truck/43.php" method="POST">
			<input type="submit" value = "Ladder 43">	
		</form>
		
		<form action="/Truck/UTV.php" method="POST">
			<input type="submit" value = "UTV">	
		</form>
	</h2>

</body>
</html>


<a href="../back.php/">Home</a>
<a href="../logout.php/">Logout</a>

