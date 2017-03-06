<?php

$servername = "localhost";
$username = "root";
$password = "Asdf@1234";
$dbname = "game";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);}/////]
//$con=mysql_connect("localhost","root","Asdf@1234")or die("couldnotconnect");


  $id = $_GET['id'];
  // do some validation here to ensure id is safe


  $sql = "SELECT image FROM product_images WHERE id=$id";
$result=mysqli_query($conn,$sql);
  $row =$result->fetch_assoc();
  mysqli_close($conn);

  header("Content-type: image/jpeg");
  echo $row['image'];
?>
