<?php
/*session_start();
$email=$_POST['email'];
$pass1=$_POST['pass'];

echo "username ".$email."  "."password is".$pass1 ."value";

$host="localhost";
$user="root";
$pass="Asdf@1234";
$db="game";
$con= mysql_connect($host,$user,$pass)or die ("could not connect ");
$dbc=@mysqli_connect($host,$user,$pass,$db)or die ("could not connect dbc");

if($dbc==true)
    printf("dbsuccess");
else
    printf("failure");


   $con=mysql_connect("localhost","root","Asdf@1234")or die("couldnotconnect");
mysql_select_db('game',$con);


$res=mysql_query("select firstname,type from users where emailid='$email' and password='$pass1';");
//$res=mysql_query("select * from users;");
if(mysql_num_rows($res))
{
//echo "success  logging";
session_start();

$fetch =mysql_fetch_array($res);

	$_SESSION['username']=$fetch['firstname'];
	if($fetch['type']=='admin')
	{header('location:adminhome.php');}
else{
header("location:userhome.php");}
}
else{
	//echo "failure";

	header("location:login.php");


}*/

$servername = "localhost";
$username = "root";
$password = "Asdf@1234";
$dbname = "game";
$email=$_POST['email'];
$pass1=$_POST['pass'];
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql ="select firstname,type from users where emailid='$email' and password='$pass1';";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result))
{
//echo "success  logging";
session_start();

$fetch=mysqli_fetch_array($result,MYSQLI_ASSOC);

$_SESSION['username']=$fetch['firstname'];
	if($fetch['type']=='admin')
	{header('location:adminhome.php');}
else{
header("location:userhome.php");}
}
else{
	echo "failure";

	//header("location:login.php");


	}
?>
