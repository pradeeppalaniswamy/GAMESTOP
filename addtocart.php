<?php
session_start();
$productid=$_POST['productid'];

$customerid=$_SESSION['username'];

echo $productid.$customerid;
echo "cart";
$servername = "localhost";
$username = "root";
$password = "Asdf@1234";
$dbname = "game";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql="insert into cart(productid,userid,status)values('$productid','$customerid','new');";



if ($conn->query($sql) === TRUE) {
    header('location:cart.php');
} else {
    header('location:userhome.php');


}

?>
