<html>
<a href="../back.php/">Home</a>
<a href="../logout.php/">Logout</a>
<body>

Welcome: 
<?php
session_start();
$email = $_SESSION['email'];
echo $email;
echo "<br>";
echo "<br>";
?>

</body>
</html>

<?php
$con=mysqli_connect("localhost","test","test","BEVFR");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

session_start();
if( isset($_SESSION['user_id']) ){
	$_SESSION['user_id'] = $results['id'];
	$PersonID = $_SESSION['PersonID'];
	$Category = $_SESSION['category'];
	$Type = $_SESSION['Type'];
	$Serial = $_SESSION['Serial'];
	$Size = $_SESSION['Size'];
	$Date = $_SESSION['Date'];
	$FirstName = $_SESSION['FirstName'];
	$LastName = $_SESSION['LastName'];	
	
	echo "<br>", $Type;
	echo "<br>", $PersonID;	
	echo "<br>", $FirstName;
	echo "<br>", $LastName;	
	echo "<br>", $Serial;
	echo "<br>", $Size;		
	echo "<br>", $Date;
	echo "<br>", $Category;
	
if ($Category == "ForestryGear"){
$result = mysqli_query($con,"INSERT INTO ForestryGear (PersonID, FirstName, LastName, Type, Serial, Size, Date) VALUES 
('".$PersonID."','".$FirstName."','".$LastName."','".$Type."','".$Serial."','".$Size."','".$Date."')");
}

if ($Category == "StructuralGear"){
$result = mysqli_query($con,"INSERT INTO StructuralGear (PersonID, FirstName, LastName, Type, Serial, Size, Date) VALUES 
('".$PersonID."','".$FirstName."','".$LastName."','".$Type."','".$Serial."','".$Size."','".$Date."')");
}


}
require '../database.php';

mysqli_close($con);
?>


<a href="../back.php/">Home</a>
<a href="../logout.php/">Logout</a>
