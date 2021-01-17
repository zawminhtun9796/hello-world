<!DOCTYPE html>

<html>

<head>
  <title>Hello!</title>
</head>

<body>

<?php



$servername = "localhost";
$username = "zawminhtun";
$password = "P@ssc0dekozaw$";
$dbname = "internshipDatabase";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
            }
else {

      $id=$_REQUEST["userid"];
$sql = "DELETE FROM myUser WHERE id='" . $id. "'";
if (mysqli_query($conn, $sql)) {
    //echo "Record deleted successfully";
    header("Location: userList.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
}

?>

</body>
</html>