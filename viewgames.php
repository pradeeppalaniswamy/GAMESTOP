<?php
include 'getvalues.php';
session_start();
if(!isset($_SESSION['username'])){

header("location:login.php");
}?>
<html lang="en">
<head>
<meta charset="UTF-8">

<!-- If IE use the latest rendering engine -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Set the page to the width of the device and set the zoon level -->
<meta name="viewport" content="width = device-width, initial-scale = 1">
<title>GamesStation</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
<style>
.jumbotron{
    background-color:#2E2D88;
    color:white;
}
/* Adds borders for tabs */
.tab-content {
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
    padding: 10px;
}
.nav-tabs {
    margin-bottom: 0;
}
</style>
</head>
<body>

    <div class="container">

<!-- .navbar-fixed-top, or .navbar-fixed-bottom can be added to keep the nav bar fixed on the screen -->
<nav class="navbar navbar-default">
  <div class="container-fluid">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

      <!-- Button that toggles the navbar on and off on small screens -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

      <!-- Hides information from screen readers -->
        <span class="sr-only"></span>

        <!-- Draws 3 bars in navbar button when in small mode -->
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="pull-left" href="#"><img src="images/ealogo.jpg" width='60' height='50'></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="adminhome.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="addgames.php">Addgames</a></li>
        <!--<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contact Us <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Email</a></li>
            <li><a href="#">Phone</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Set Appointment</a></li>
          </ul>
        </li>-->
		<li class="active"><a href="viewgames.php">view games</a></li>
		<li><a href="#">view purchases</a></li>
		<li><a href="logoutmodule.php">Logout</a></li>
     <!-- <li><a href="cart.php">Your cart</a></li>-->
	  </ul>
      <!-- navbar-left will move the search to the left --><!--
      <form class="navbar-form navbar-right" role="search" action="userhome.php" method="post">

        <div class="form-group">
          </div>
		  <input type="text" class="form-control" placeholder="Search" name="search">


        <button type="submit" class="btn btn-default">Submit</button>
      </form>-->
    </div><!-- /.navbar-collapse -->  </div><!-- /.container-fluid -->
</nav>
        <div class="well well-sm" id ="mydiv"><h3 class="text-primary">Welcome  <?php echo $_SESSION['username'];?>!!</h3></well></div>
<div class="container">
    <?php

	//echo getallgames();count[$i]
	$var=getallgames();
	for($i =0;$i<count($var);$i++)
{
	$flag=true;
	//echo $valu[$i]."</br>";
	$val=getdesc($var[$i]);
//	echo $val['gamename'];
	//echo"vari".$var[$i];

	echo " <div class='row'>
  <div class='col-lg-12 col-md-3 col-sm-3 col-xs-3'>
    <div class='thumbnail'>
      <img src='getImage.php?id=$var[$i]'   alt='...' height='20' >
      <!--width='175' height='200' -->
      <div class='caption'>
        <h3 >".$val['gamename'].
		"</h3><p>".$val['description']."</p>

		<p ><h4 class='bg-info'>".$val['price']."$</h4></p>
		<form method='post' action='deletegame.php'>
		<input type='hidden' value=".$val['id']." name='productid' />
        <p><input type='submit' class='btn btn-primary' id=".$val['id']." role='button' value='delete game'></p>
      </form>
	  </div>
      </div>
</div>";
}


	?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
