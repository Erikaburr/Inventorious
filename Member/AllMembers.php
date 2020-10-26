<style>
table {
    width: 200px;
    margin-left: auto;
    margin-right: auto;
}
</style>



<html>
<body>
<h2>
<a href="../back.php/">Home</a>
<a href="../logout.php/">Logout</a>
</h2>
Welcome: 

<?php
session_start();
$email = $_SESSION['email'];
echo $email;

$first = $_SESSION['FirstName'];
echo $first;
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
	$password = $_SESSION['password'];
	$email = $_SESSION['email'];	
	$first = $_SESSION['FirstName'];
	#echo $email;
	#echo $password;

$result = mysqli_query($con,"SELECT * FROM Member;");

echo "<table border='1'>
<tr>
<th>PersonID</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Phone</th>
<th>Sex</th>
<th>Email</th>


</tr>";

while($row = mysqli_fetch_array($result))
{
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
}
require 'database.php';
mysqli_close($con);
?>

