<!DOCTYPE HTML>
<html lang='pl'>
<head>
	<meta charset="utf-8" />
	<title>Monster Energy FIM Speedway World Cup 2016</title>
</head>
<body>
	<h1>Monster Energy FIM Speedway World Cup 2016</h1>
	<form>
		<p>[<a href="vojens.php">Event 1 (Vojens)</a>] 
		[<a href="vastervik.php">Event 2 (Västervik)</a>] 
		[<a href="raceoff.php">Race Off (Manchester)</a>] 
		[<a href="final.php">Final (Manchester)</a>] </p>
	</form>
	<?php
	require_once "connect.php";
	
	$connection = new mysqli($host,$db_user,$db_password,$db_name);
	mysqli_set_charset($connection, "utf8");
	
	if($connection->connect_errno!=0)
	{
		echo "Error: ".$connection->connect_errno . "Description: ".$connection->connect_error;
	}
	
	$ask_team= "SELECT team,manager,color,event FROM teams,colors WHERE (event='Vojens' OR event='Vastervik') AND colors.idcolor=teams.sh ORDER BY event DESC, sh";
	
	$res=@$connection->query($ask_team);
	
	if($res)
	{
		$counter=0;
		while($row = $res->fetch_array())
		{
			if($counter==0) echo "<frame>Vojens";
			if($counter==3) echo "</frame><frame>Västervik";
			$event=$row['event'];
			$team = $row['team'];
			$manager = $row['manager'];
			$color = $row['color'];
			$sum=0;
			
				
			
			echo "<h3>".$team." (".$color.") </h3><p> Team Manager: " . $manager."</p>";
			
			
			$ask_rider = "SELECT $event.idrider,riders.name,$event.number,$event.points FROM teams,riders,$event WHERE teams.team='$team' AND riders.team=teams.idteam AND $event.idrider=riders.idrider AND $event.number>0 ORDER BY number";
			
			$res1 = @$connection->query($ask_rider);
			if($res1)
			{
				while($row1 = $res1->fetch_array())
				{
					echo "<form action=add.php method='post' style='font-family: monospace'>";
					$number=$row1['number'];
					$name=$row1['name'];
					$points=$row1['points'];
					$idr=$row1['idrider'];
					
					printf("%d. %'.-30s <input type='text' name='points'/><input type='hidden' value=$idr name='idr'/><input type='submit' value='Add points'/>",$number,$name,$name);
					echo "</form>";
					echo "</br>";
				}
			}
			else echo "skopane";
			echo "<br />";
			$counter++;
		}
		echo "</frame>";
	}
	$res->close();

?>

</body>
</html>