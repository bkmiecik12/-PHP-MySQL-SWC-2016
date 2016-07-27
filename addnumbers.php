<?php

	require_once "connect.php";
	
	$connection = new mysqli($host,$db_user,$db_password,$db_name);
	mysqli_set_charset($connection, "utf8");

	$event=$_POST['event'];
	
	if(isset($_POST['ca']))
	{
		$add="DELETE FROM $event ";
		@$connection->query($add);
		printf("Database deleted");
		header('Location: setnumbers.php');
	}
	else
	{
		$idrider=$_POST['idr'];
		$number=$_POST['number'];
		
		$clear=isset($_POST['clr']);



		if($clear==1) 
		{
			$points="";
			$add="UPDATE $event SET number = 0 WHERE idrider=$idrider;";
			@$connection->query($add);
			printf("Rider no.%d number cleared",$idrider);
			header('Location: setnumbers.php');
		}
	
		else if(strlen($number)>0)
		{
			$add="INSERT INTO $event (`idrider`, `points`, `sum`, `number`) VALUES ('$idrider','','','$number');";
			@$connection->query($add);
			printf("Rider no.%d starts with %s ",$idrider,$number);
			header('Location: setnumbers.php');
		}
		
	
	//else header('Location: complete.php');

	//echo "<p>[<a href='vojens.php'>Event 1 (Vojens)</a>]</p>";
		
	}





?>