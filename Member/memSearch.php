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
	$FirstName = $_SESSION['FirstName'];	
	echo "<br>", $FirstName;
	echo "<br>", $PersonID;		
	echo "<br>";
	echo "<br>";

############################## Member Table #######################################
	$result = mysqli_query($con,"
	SELECT * FROM Member WHERE PersonID = '$PersonID'");
	echo "Member Table";
	echo "<table border='1'>
	<tr>
	<th>PersonID</th>
	<th>Firstname</th>
	<th>Lastname</th>
	<th>Phone</th>
	<th>Sex</th>
	<th>Email</th>
	</tr>";

	while($row = mysqli_fetch_array($result)){
	echo "<tr>";
	echo "<td>" . $row['PersonID'] . "</td>";
	echo "<td>" . $row['FirstName'] . "</td>";
	echo "<td>" . $row['LastName'] . "</td>";
	echo "<td>" . $row['Phone'] . "</td>";
	echo "<td>" . $row['Sex'] . "</td>";
	echo "<td>" . $row['Email'] . "</td>";
	echo "</tr>";
	}
	echo "</table>";
###################################################################################

	echo "<br>";
	echo "<br>";

################################ User Table #######################################
	$result1 = mysqli_query($con,"
	SELECT * FROM users WHERE PersonID = '$PersonID'");
	echo "Member Table";
	echo "<table border='1'>
	<tr>
	<th>SessionID</th>
	<th>Email</th>
	<th>Password</th>
	<th>PersonID</th>
	</tr>";

	while($row = mysqli_fetch_array($result1)){
	echo "<tr>";
	echo "<td>" . $row['id'] . "</td>";
	echo "<td>" . $row['email'] . "</td>";
	echo "<td>" . $row['password'] . "</td>";
	echo "<td>" . $row['PersonID'] . "</td>";
	echo "</tr>";
	}
	echo "</table>";
###################################################################################

	echo "<br>";
	echo "<br>";

############################### Radio Table #######################################
	$result2 = mysqli_query($con,"
	SELECT * FROM Radio WHERE PersonID = '$PersonID'");
	echo "Radio Table";
	echo "<table border='1'>
	<tr>
	<th>PersonID</th>
	<th>Firstname</th>
	<th>Lastname</th>
	<th>Type</th>
	<th>Serial</th>
	</tr>";

	while($row = mysqli_fetch_array($result2)){
	echo "<tr>";
	echo "<td>" . $row['PersonID'] . "</td>";
	echo "<td>" . $row['FirstName'] . "</td>";
	echo "<td>" . $row['LastName'] . "</td>";
	echo "<td>" . $row['Type'] . "</td>";
	echo "<td>" . $row['Serial'] . "</td>";
	echo "</tr>";
	}
	echo "</table>";
###################################################################################

	echo "<br>";
	echo "<br>";

############################## Pager Table #######################################
	$result3 = mysqli_query($con,"
	SELECT * FROM Pager WHERE PersonID = '$PersonID'");
	echo "Pager Table";
	echo "<table border='1'>
	<tr>
	<th>PersonID</th>
	<th>Firstname</th>
	<th>Lastname</th>
	<th>Type</th>
	<th>Serial</th>
	</tr>";

	while($row = mysqli_fetch_array($result3)){
	echo "<tr>";
	echo "<td>" . $row['PersonID'] . "</td>";
	echo "<td>" . $row['FirstName'] . "</td>";
	echo "<td>" . $row['LastName'] . "</td>";
	echo "<td>" . $row['Type'] . "</td>";
	echo "<td>" . $row['Serial'] . "</td>";
	echo "</tr>";
	}
	echo "</table>";
###################################################################################

	echo "<br>";
	echo "<br>";

############################## ForestyGear Table #######################################
	$result4 = mysqli_query($con,"
	SELECT * FROM ForestryGear WHERE PersonID = '$PersonID'");
	echo "ForestryGear Table";
	echo "<table border='1'>
	<tr>
	<th>PersonID</th>
	<th>Firstname</th>
	<th>Lastname</th>
	<th>Type</th>
	<th>Size</th>
	<th>Serial</th>
	<th>Date</th>
	</tr>";

	while($row = mysqli_fetch_array($result4)){
	echo "<tr>";
	echo "<td>" . $row['PersonID'] . "</td>";
	echo "<td>" . $row['FirstName'] . "</td>";
	echo "<td>" . $row['LastName'] . "</td>";
	echo "<td>" . $row['Type'] . "</td>";
	echo "<td>" . $row['Size'] . "</td>";
	echo "<td>" . $row['Serial'] . "</td>";
	echo "<td>" . $row['Date'] . "</td>";
	echo "</tr>";
	}
	echo "</table>";
###################################################################################


	echo "<br>";
	echo "<br>";

############################## StructuralGear Table #######################################
	$result4 = mysqli_query($con,"
	SELECT * FROM StructuralGear WHERE PersonID = '$PersonID'");
	echo "StructuralGear Table";
	echo "<table border='1'>
	<tr>
	<th>PersonID</th>
	<th>Firstname</th>
	<th>Lastname</th>
	<th>Type</th>
	<th>Size</th>
	<th>Serial</th>
	<th>Date</th>
	</tr>";

	while($row = mysqli_fetch_array($result4)){
	echo "<tr>";
	echo "<td>" . $row['PersonID'] . "</td>";
	echo "<td>" . $row['FirstName'] . "</td>";
	echo "<td>" . $row['LastName'] . "</td>";
	echo "<td>" . $row['Type'] . "</td>";
	echo "<td>" . $row['Size'] . "</td>";
	echo "<td>" . $row['Serial'] . "</td>";
	echo "<td>" . $row['Date'] . "</td>";
	echo "</tr>";
	}
	echo "</table>";
###################################################################################
}
require '../database.php';

mysqli_close($con);
?>


<a href="../back.php/">Home</a>
<a href="../logout.php/">Logout</a>
