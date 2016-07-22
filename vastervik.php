<!DOCTYPE HTML>
<html lang='pl'>
<head>
	<meta  charset="utf-8"/>
	<title>Monster Energy FIM Speedway World Cup 2016</title>
	<script type="text/javascript">
// <![CDATA[
function flash(id, kolor, czas, kolor2, czas2)
{
	document.getElementById(id).style.color = kolor;
	setTimeout('flash("' + id + '","' + kolor2 + '",' + czas2 + ',"' + kolor + '",' + czas + ')', czas);
}
// ]]>
</script>
</head>
<body>
	<h1>Monster Energy FIM Speedway World Cup 2016 - Event 2 (Västervik)
	
	</h1>
	<p>
		[<a href="index.php">Main page</a>]
		[<a href="vojens.php">Event 1 (Vojens)</a>]
		[<a href="raceoff.php">Race Off (Manchester)</a>]
		[<a href="final.php">Final (Manchester)</a>]
	</p><h2>Event 2 (Västervik)</h2>
	<form style='font-family: monospace' >
	<font size=4>
<?php
	
	require_once "connect.php";
	
	$connection = new mysqli($host,$db_user,$db_password,$db_name);
	mysqli_set_charset($connection, "utf8");
	
	if($connection->connect_errno!=0)
	{
		echo "Error: ".$connection->connect_errno . "Description: ".$connection->connect_error;
	}
	
	$ask_team= "SELECT team,manager,color FROM teams,colors WHERE event='Vastervik' AND colors.idcolor=teams.sh ORDER BY sh";
	
	$res=@$connection->query($ask_team);
	
	if($res)
	{
		while($row = $res->fetch_array())
		{
			$team = $row['team'];
			$manager = $row['manager'];
			$color = $row['color'];
			$sum=0;
			
			$to_sum = "SELECT sum FROM vastervik,teams,riders WHERE teams.team='$team' AND riders.team=teams.idteam AND vastervik.idrider=riders.idrider";
			
			$res2 = @$connection->query($to_sum);
			if($res2)
			{
				while($row2 = $res2->fetch_array())
				{
					$sum+=$row2['sum'];
				}
			}
			else echo "skopane";
			
			
			echo "<h3>".$team." (".$color.") "."<bigger>".$sum."</bigger></h3>" . "<p> Team Manager: " . $manager."</p>";
			
			$ask_rider = "SELECT riders.name,riders.number,vastervik.points,vastervik.sum FROM teams,riders,vastervik WHERE teams.team='$team' AND riders.team=teams.idteam AND vastervik.idrider=riders.idrider ORDER BY number";
			
			$res1 = @$connection->query($ask_rider);
			if($res1)
			{
				while($row1 = $res1->fetch_array())
				{
					printf("%d. %'.-40s %d (%s)",$row1['number'],$row1['name'],$row1['sum'],$row1['points']);
					echo "</br>";
				}
			}
			else echo "skopane";
			echo "<br />";
			
		}
	}
	
	$res->close();
	
			
		
?>
</font>
</form>
</body>
</html>