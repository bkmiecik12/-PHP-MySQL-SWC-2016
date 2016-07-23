<?php

	require_once "connect.php";
	
	$connection = new mysqli($host,$db_user,$db_password,$db_name);
	mysqli_set_charset($connection, "utf8");

$idrider=$_POST['idr'];
$points=$_POST['points'];

if(strlen($points)>0)
{
	$add="UPDATE vojens SET points = $points WHERE idrider=$idrider;";
	@$connection->query($add);
	printf("Rider no.%d gets %s points",$idrider,$points);
}
else header("complete.php");





?>