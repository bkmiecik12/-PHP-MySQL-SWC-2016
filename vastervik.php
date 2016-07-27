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
	<h2>Monster Energy FIM Speedway World Cup 2016 - Event 2 (Västervik)
	
	</h2>
	<p>
		[<a href="index.php">Main page</a>]
		[<a href="vojens.php">Event 1 (Vojens)</a>]
		[<a href="raceoff.php">Race Off (Manchester)</a>]
		[<a href="final.php">Final (Manchester)</a>]
	</p><b>Event 2 (Västervik)</b> [<a href="complete.php">Complete results</a>] </h3>
	
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
			$sumt=0;
			
			$to_sum = "SELECT sum FROM vastervik,teams,riders WHERE teams.team='$team' AND riders.team=teams.idteam AND vastervik.idrider=riders.idrider";
			
			$res2 = @$connection->query($to_sum);
			if($res2)
			{
				while($row2 = $res2->fetch_array())
				{
					$sumt+=$row2['sum'];
				}
			}
			else echo "skopane";
			
			
			echo "<h4>".$team." (".$color.") "."<bigger>".$sumt."</bigger></h4>" . "<p> Team Manager: " . $manager."</p>";
			
			
			
			$ask_rider = "SELECT vastervik.idrider,riders.name,vastervik.number,vastervik.points FROM teams,riders,vastervik WHERE teams.team='$team' AND riders.team=teams.idteam AND vastervik.idrider=riders.idrider AND vastervik.number>0 ORDER BY number";
			
			$res1 = @$connection->query($ask_rider);
			if($res1)
			{
				while($row1 = $res1->fetch_array())
				{
					$number=$row1['number'];
					$name=$row1['name'];
					$points=$row1['points'];
					$sumr=0;
					$idr=$row1['idrider'];
					
					for($i=0;$i<strlen($points);$i++)
					{
						if($points[$i]>'0' && $points[$i]<='6') $sumr+=$points[$i];
					}
					
					$update="UPDATE vastervik SET sum = '$sumr' WHERE idrider='$idr'";
					
					@$connection->query($update);
					
					printf("%d. %'.-40s %d  ",$number,$name,$sumr);
					if(strlen($points)>0)
					{
						printf(" (");
						for($i=0;$i<strlen($points)-1;$i++)
						{
							printf("%s,",$points[$i]);
						}
						printf("%s)",$points[$i]);
					}
					echo "</br>";
					
					
				}
			}
			else echo "skopane";
			echo "<br />";
			
			$updres="UPDATE teams SET semipoints = '$sumt' WHERE team='$team'";		
			@$connection->query($updres);
			
			
		}
	}
			$actualplaces="SELECT team FROM teams WHERE event='Vastervik' ORDER BY semipoints DESC, idteam ASC";
			$res3=@$connection->query($actualplaces);
			$place=1;
			$prize1="";
			$prize2="";
			echo "Current results</br>";
			while($row3 = $res3->fetch_array())
			{
					$team=$row3['team'];
					if($place==1) {$prize1="<b>"; $prize2="</b>";}
					else if($place==2 || $place==3) {$prize1="<i>"; $prize2="</i>";}
					else if($place==4) {$prize1=""; $prize2="";}
					printf("%d. %s%s%s</br>",$place,$prize1,$team,$prize2);
					$newplace="UPDATE teams SET semiplace='$place' WHERE team='$team'";
					@$connection->query($newplace);
					$place++;
			}
	
	$res->close();
	
			
		
?>
</font>
</form>
</body>
</html>