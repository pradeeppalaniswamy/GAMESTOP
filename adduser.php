<?php

$servername = "localhost";
$username = "root";
$password = "Asdf@1234";
$dbname = "game";

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$emailid=$_POST['emailid'];
$phoneno=$_POST['phoneno'];
$address=$_POST['address'];
$shippingaddress=$_POST['shippingaddress'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$uname=$_POST['username'];
$pass=$_POST['password'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "insert into users(firstname,lastname,emailid,type,address,shippingaddress,gender,dob,username,password) values('$firstname','$lastname','$emailid','$phoneno','$address','$shippingaddress','$gender','$dob','$uname','$pass');";



////window.location.href='admin/ahm/panel';


if ($conn->query($sql) === TRUE) {
  echo "<script>
  alert('user added successfully');
  window.location.href='login.php';
    </script>";}
  //  header('location:login.php');}
   else {
     //window.location.href='admin/ahm/panel';
     echo '<script>
     alert("unable to add user please check the values entered and try again  Error message::'. $conn->error.'");
  window.location.href="register.php";
            </script>';

   //echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
