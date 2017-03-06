<?php
include 'getvalues.php';
session_start();
$gameid=$_POST['gameid'];
$uname=$_SESSION['username'];
//echo$gameid;
//echo"buy";


$servername = "localhost";
$username = "root";
$password = "Asdf@1234";
$dbname = "game";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql="delete from cart  where productid='$gameid' and userid='$uname';";


if ($conn->query($sql) === TRUE) {
header('location:cart.php');
} else {
    echo"error";
	}

mysql_close();
?>
