<?php

	require_once "connect.php";
	
	$connection = new mysqli($host,$db_user,$db_password,$db_name);
	mysqli_set_charset($connection, "utf8");

$idrider=$_POST['idr'];
$points=$_POST['points'];
$event=$_POST['event'];
$clear=isset($_POST['clr']);



	if($clear==1) 
	{
		$points="";
		$add="UPDATE $event SET points = '$points' WHERE idrider=$idrider;";
		@$connection->query($add);
		printf("Rider no.%d gets points cleared",$idrider);
		header('Location: complete.php');
	}
	
	else if(strlen($points)>0)
	{
		$add="UPDATE $event SET points = '$points' WHERE idrider=$idrider;";
		@$connection->query($add);
		printf("Rider no.%d gets %s points",$idrider,$points);
		header('Location: complete.php');
	}
	else header('Location: complete.php');

	//echo "<p>[<a href='vojens.php'>Event 1 (Vojens)</a>]</p>";




?>