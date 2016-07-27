﻿<!DOCTYPE HTML>
<html lang='en'>
<head>
	<meta  charset="utf-8"/>
	<title>Monster Energy FIM Speedway World Cup 2016</title>
</head>

<body>
	<h2>Monster Energy FIM Speedway World Cup 2016 - Race Off (Manchester)</h2>
	
	<p>
		[<a href="index.php">Main page</a>]
		[<a href="vojens.php">Event 1 (Vojens)</a>]
		[<a href="vastervik.php">Event 2 (Västervik)</a>]
		[<a href="final.php">Final (Manchester)</a>]
	</p><b>Race Off (Manchester)</b> [<a href="complete.php">Complete results</a>] </h3>
	
	<form style='font-family: monospace' >
	<font size=4>
<?php
	
	require_once "connect.php";
	
	$connection = new mysqli($host,$db_user,$db_password,$db_name);
	mysqli_set_charset($connection, "utf8");
	
	$venue="raceoff";
	
	if($connection->connect_errno!=0)
	{
		echo "Error: ".$connection->connect_errno . "Description: ".$connection->connect_error;
	}
	
	$ask_team= "SELECT team,manager,color FROM teams,colors WHERE  teams.semiplace BETWEEN 2 AND 3 AND teams.rh=colors.idcolor ORDER BY rh";
	
	$res=@$connection->query($ask_team);
	
	if($res)
	{
		if($res->num_rows==0) {echo "Semis have not raced";}
		else
		{
			while($row = $res->fetch_array())
			{
				$team = $row['team'];
				$manager = $row['manager'];
				$color = $row['color'];
				//$color = "NONE";
				$sumt=0;
			
				$to_sum = "SELECT sum FROM $venue,teams,riders WHERE teams.team='$team' AND riders.team=teams.idteam AND $venue.idrider=riders.idrider";
			
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
			
			
			
				$ask_rider = "SELECT $venue.idrider,riders.name,$venue.number,$venue.points FROM teams,riders,$venue WHERE teams.team='$team' AND riders.team=teams.idteam AND $venue.idrider=riders.idrider AND $venue.number>0 ORDER BY number";
			
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
					
						$update="UPDATE $venue SET sum = '$sumr' WHERE idrider='$idr'";
					
						@$connection->query($update);
					
						printf("%d. %'.-40s %d ",$number,$name,$sumr);
						if(strlen($points)>0)
						{
							printf("(");
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
			
				$updres="UPDATE teams SET ropoints = '$sumt' WHERE team='$team'";		
				@$connection->query($updres);
			
			
			}
				$actualplaces="SELECT team FROM teams WHERE semiplace BETWEEN 2 AND 3 ORDER BY ropoints DESC, idteam ASC";
				$res3=@$connection->query($actualplaces);
				$place=1;
				$prize1="";
				$prize2="";
				echo "Current results</br>";
				while($row3 = $res3->fetch_array())
				{
					$team=$row3['team'];
					if($place==1) {$prize1="<b>"; $prize2="</b>";}
					else if($place>=2 && $place<=4) {$prize1=""; $prize2="";}
					printf("%d. %s%s%s</br>",$place,$prize1,$team,$prize2);
					$newplace="UPDATE teams SET roplace='$place' WHERE team='$team'";
					//@$connection->query($newplace);
					$place++;
				}
				
		}
	}
	else {echo "Skopane";}
			
	$res->close();
	
	
			
		
?>
</font>
</form>
</body>
</html>