<?php

session_start();

if( isset($_SESSION['user_id']) ){
	header("Location: /login.php");
}

require 'database.php';

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password'])):

		
		$con = mysqli_connect("localhost", "test", "test", "BEVFR");
		$email = mysqli_real_escape_string($con, $_POST["email"]);

		if(mysqli_connect_errno()) {
            echo "Error MySQL: " .mysqli_connect_errno();
        }

        
        $rsEmails = mysqli_query($con,"SELECT * FROM users WHERE email = '".$email."'");
        $numEmails = mysqli_num_rows($rsEmails);

        if($numEmails > 0) {
            echo "User already exists";
        } else {


	// Enter the new user in the database
	$sql = "INSERT INTO users (PersonID, email, password) VALUES (:PersonID, :email, :password)";
	$stmt = $conn->prepare($sql);
	
	$stmt->bindParam(':PersonID', $_POST['PersonID']);
	$stmt->bindParam(':email', $_POST['email']);
	$stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));
	
	if($stmt->execute()):
		$message = 'Successfully created new user';
		header("Location: /login.php");
	else:
		$message = 'Sorry there must have been an issue creating your account';
	endif;
		}



	$sql_0 = "INSERT INTO Member (Email, PersonID, FirstName, LastName, Phone, Sex) VALUES 
	(:email, :PersonID, :FirstName, :LastName, :Phone, :Sex)";
	$stmt_0 = $conn->prepare($sql_0);
	
	$stmt_0->bindParam(':email', $_POST['email']);
	$stmt_0->bindParam(':PersonID', $_POST['PersonID']);
	$stmt_0->bindParam(':FirstName', $_POST['FirstName']);
	$stmt_0->bindParam(':LastName', $_POST['LastName']);
	$stmt_0->bindParam(':Phone', $_POST['Phone']);
	$stmt_0->bindParam(':Sex', $_POST['Sex']);


	if($stmt_0->execute()):
		$message = 'Successfully created new user';
	else:
		$message = 'Sorry there must have been an issue creating your account';
	endif;


endif;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register Below</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>

	<div class="header">
		<a href="/">Inventorious</a>
	</div>

	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>

	<h1>Register</h1>
	<span>or <a href="login.php">login here</a></span>

	<form action="register.php" method="POST">
		<input type="text" placeholder="Enter your ID number" name="PersonID">
		<input type="text" placeholder="First Name:" name="FirstName">
		<input type="text" placeholder="LastName:" name="LastName">
		<input type="text" placeholder="Phone:" name="Phone">
		<input type="text" placeholder="Sex" name="Sex">
		<input type="text" placeholder="Enter your email" name="email">
		<input type="password" placeholder="and password" name="password">
		<input type="password" placeholder="confirm password" name="confirm_password">
		<input type="submit">

	</form>

</body>
</html>
