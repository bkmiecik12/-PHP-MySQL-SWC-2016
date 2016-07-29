<!DOCTYPE HTML>
<html lang='pl'>
<head>
	<meta charset="utf-8" />
	<title>Monster Energy FIM Speedway World Cup 2016</title>
</head>
<body>
	<h2>Monster Energy FIM Speedway World Cup 2016</h2>
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
	
	$event="final";
	
	$ask_team= "SELECT team,manager,color,event FROM teams,colors WHERE (teams.semiplace=1 OR teams.roplace=1 OR teams.event='Final') AND colors.idcolor=teams.rh ORDER BY event DESC, sh";
	
	$res=@$connection->query($ask_team);
	
	if($res)
	{
		$counter=0;
		while($row = $res->fetch_array())
		{
			if($counter==0) echo "<h2>Final</h2><form action=addnumbers.php method='post'><input type='submit' value='Clear all' name='ca'/><input type='hidden' value=$event name='event'/></form>";
			//if($counter==4) echo "<h2>Race Off</h2>";
			//if($counter==8) echo "<h2>Final</h2>";
			
			$team = $row['team'];
			$manager = $row['manager'];
			$color = $row['color'];
			$sum=0;
			
				
			
			echo "<h3>".$team." (".$color.") </h3><p> Team Manager: " . $manager."</p>";
			
			
			$ask_rider = "SELECT riders.idrider,riders.name FROM teams,riders WHERE teams.team='$team' AND riders.team=teams.idteam ORDER BY riders.idrider";
			
			$res1 = @$connection->query($ask_rider);
			if($res1)
			{
				$number=1;
				while($row1 = $res1->fetch_array())
				{
					echo "<form action=addnumbers.php method='post' style='font-family: monospace'>";
					//$number=$row1['number'];
					$name=$row1['name'];
					
					$idr=$row1['idrider'];
					
					printf("%'.-30s <input type='number' value='$number' name='number'/><input type='hidden' value=$idr name='idr'/><input type='hidden' value=$event name='event'/><input type='submit' value='Set number'/><input type='submit' value='Remove' name='clr'/>",$name);
					echo "</form>";
					echo "<br/>";
					$number++;
				}
			}
			else echo "skopane";
			echo "<br />";
			$counter++;
		}
	}
	$res->close();

?>

</body>
</html>