<h2> Membership Search </h2>

<?php
session_start();

if( isset($_SESSION['user_id']) ){
	$_SESSION['user_id'] = $results['id'];
	$_SESSION['PersonID'] = $_POST['PersonID'];
	$_SESSION['FirstName'] = $_POST['FirstName'];	
}
require '../database.php';

if(!empty($_POST['PersonID']) && !empty($_POST['FirstName'])):
	
	$records = $conn->prepare('SELECT id, email, password, PersonID FROM users WHERE PersonID = :PersonID');
	$records->bindParam(':PersonID', $_POST['PersonID']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	$message = '';

	if(count($results) > 0){
		header("Location: /Member/memSearch.php");
		$_SESSION['user_id'] = $results['id'];
		$_SESSION['PersonID'] = $_POST['PersonID'];
		$_SESSION['FirstName'] = $_POST['FirstName'];		

	} else {
		$message = 'Sorry, those credentials do not match';
	}

endif;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Member Information</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>

	<form action="FindMember.php" method="POST">
		
		<input type="text" placeholder="Enter users ID number" name="PersonID">
		<input type="text" placeholder="and first name" name="FirstName">

		<input type="submit">

	</form>

</body>
<a href="../back.php/">Home</a>
<a href="../logout.php/">Logout</a>
</html>

