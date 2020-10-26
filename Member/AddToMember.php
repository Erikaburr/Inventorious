<h2> Select Members</h2>

<?php
session_start();

if( isset($_SESSION['user_id']) ){
	$_SESSION['user_id'] = $results['id'];
	$_SESSION['PersonID'] = $_POST['PersonID'];
	$_SESSION['category'] = $_POST['category'];
		$_SESSION['category'] = $_POST['category'];
		//$_SESSION['Type'] = $_POST['Types'];
		//$_SESSION['Serial'] = $_POST['Serial'];
		$_SESSION['Size'] = $_POST['Size'];
		$_SESSION['Date'] = $_POST['Date'];
		$_SESSION['FirstName'] = $_POST['FirstName'];
		$_SESSION['LastName'] = $_POST['LastName'];
	
}
require '../database.php';

if(!empty($_POST['PersonID'])):
	
	$records = $conn->prepare('SELECT id, email, password, PersonID FROM users WHERE PersonID = :PersonID');
	$records->bindParam(':PersonID', $_POST['PersonID']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	$message = '';
		header("Location: /Member/memAdd_result.php");
		$_SESSION['user_id'] = $results['id'];
		$_SESSION['PersonID'] = $_POST['PersonID'];
		$_SESSION['category'] = $_POST['category'];
		$_SESSION['Type'] = $_POST['Type'];
		$_SESSION['Serial'] = $_POST['Serial'];
		$_SESSION['Size'] = $_POST['Size'];
		$_SESSION['Date'] = $_POST['Date'];
		$_SESSION['FirstName'] = $_POST['FirstName'];
		$_SESSION['LastName'] = $_POST['LastName'];		
endif;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Member Information</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>

	<form action="AddToMember.php" method="POST">
		
		<input type="text" placeholder="Enter users ID number" name="PersonID">
		<input type="text" placeholder="Enter users First Name" name="FirstName">
		<input type="text" placeholder="Enter users Last Name" name="LastName">		
		<input type="text" placeholder="Enter Serial Number" name="Serial">
		<input type="text" placeholder="Enter Size" name="Size">
		<input type="text" placeholder="Enter Manufactored Date" name="Date">		
		

		<br>
		<label for="category">Choose a category:</label>
		  <select id="category" name="category">
		    <option value="Medical"> Medical </option>
		    <option value="StructuralGear"> StructuralGear </option>
		    <option value="ForestryGear"> ForestryGear </option>
		    <option value="Communications"> Communications </option>
		  </select>
		<br><br>
		<label for="Type">Choose a Type:</label>
		  <select id="Type" name="Type">
		    <option value="Gloves"> Gloves </option>
		    <option value="Jacket"> Jacket </option>
		    <option value="Pants"> Pants </option>
		    <option value="Helmet"> Helmet </option>
		    <option value="Boots"> Boots </option>
		  </select>

		<br><br><br>
		<input type="submit">

	</form>

</body>
<a href="../back.php/">Home</a>
<a href="../logout.php/">Logout</a>
</html>
