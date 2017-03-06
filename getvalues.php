<?php
$servername = "localhost";
$username = "root";
$password = "Asdf@1234";
$dbname = "game";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getdesc($imageid)
{

global $conn;
$selquery="select gamename,id,image_name,description,price from product_images where id='$imageid';";

$reslt=mysqli_query($conn,$selquery);;
if(mysqli_num_rows($reslt))
{
while($extract =mysqli_fetch_array($reslt,MYSQLI_ASSOC))
{$img['id']=$extract['id'];

$img['description']=$extract['description'];
$img['price']=$extract['price'];
$img['gamename']=$extract['gamename'];
return $img;
}

}

}

function getbyname($gamename)
{
	global $conn;
$selquery="select id,gamename from product_images where gamename like '%$gamename%';";

$reslt=mysqli_query($conn,$selquery);;
if(mysqli_num_rows($reslt))
{
	$i=0;
while($extract =mysqli_fetch_array($reslt,MYSQLI_ASSOC))

{
	$id[$i++]=$extract['id'];


	}

return $id;
}
}


function getbytype($type)
{
	global $conn;
$selquery="select id from product_images where type like '%$type%';";

$reslt=mysqli_query($conn,$selquery);;
if(mysqli_num_rows($reslt))
{
	$i=0;
while($extract =mysqli_fetch_array($reslt,MYSQLI_ASSOC))

{$id[$i++]=$extract['id'];

}

return $id;

}
}

function getbygenre($genre)
{global $conn;
$selquery="select id from product_images where genre like '%$genre%';";
$i=0;



$reslt=mysqli_query($conn,$selquery);;
if(mysqli_num_rows($reslt))
{
	$id;
while($extract =mysqli_fetch_array($reslt,MYSQLI_ASSOC))
{$id[$i]=$extract['id'];
}
return $id;
}

			}

			function getbydescription($description)
{
	global $conn;
$selquery="select id from product_images where description like '%$description%';";


$reslt=mysqli_query($conn,$selquery);;
if(mysqli_num_rows($reslt))
{
	$i=0;
while($extract =mysqli_fetch_array($reslt,MYSQLI_ASSOC))
{$id[$i++]=$extract['id'];
}
return $id;

}
			}

function getcart($userid)
{
global $conn;
	$selquery="select id,gamename,type, genre ,price ,count(*) as count from product_images p,cart c where c.userid='$userid' and c.status='new' and c.productid=p.id group by gamename,type, genre" ;

	$reslt=mysqli_query($conn,$selquery);;

	$i=0;
	$bigcart=null;
while($extract =mysqli_fetch_array($reslt,MYSQLI_ASSOC))
{
	$cart['gamename']=$extract['gamename'];
    $cart['type']=$extract['type'];
	$cart['genre']=$extract['genre'];
	$cart['price']=$extract['price'];
	$cart['count']=$extract['count'];
	$cart['id']=$extract['id'];
//	echo $extract['count'];
	$bigcart[$i++]=$cart;


}
//if($bigcart!=null)
return $bigcart;

}

function getallgames()
{global $conn;
	$count;
	$selquery="select id,gamename from product_images " ;

	$reslt=mysqli_query($conn,$selquery);;
	$i=0;
while($extract =mysqli_fetch_array($reslt,MYSQLI_ASSOC))
{
$count[$i]=$extract['id'];

	$i++;

}
		return $count;
}
$k=getbytype('pc');
$c=getcart('pradeep');
//echo count($c);
for($i=0;$i<count($c);$i++)
{
	$c1=$c[$i];

	//echo $c1['type'];
	//echo $c1['count'];
}


//for($i=0;$i<count($k);$i++)
	//echo $k[$i]."<br/>";




	?>
