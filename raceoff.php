<!DOCTYPE HTML>
<html lang='en'>
<head>
	<meta  charset="utf-8"/>
	<title>Monster Energy FIM Speedway World Cup 2016</title>
	<link rel="stylesheet" href="style.css" type="text/css"/>
	<link href="https://fonts.googleapis.com/css?family=Exo:700&subset=latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="Chart.js"></script>
	
	<?php
	echo '<script type="text/javascript">
		google.charts.load("current", {"packages":["corechart"]});
		google.charts.setOnLoadCallback(drawChart1);
		google.charts.setOnLoadCallback(drawChart2);
		google.charts.setOnLoadCallback(drawChart3);
		google.charts.setOnLoadCallback(drawChart4);';
	require_once "connect.php";
	
	$connection = new mysqli($host,$db_user,$db_password,$db_name);
	mysqli_set_charset($connection, "utf8");
	
	if($connection->connect_errno!=0)
	{
		echo "Error: ".$connection->connect_errno . "Description: ".$connection->connect_error;
	}
	
	$ask_team= "SELECT team,manager,color FROM teams,colors WHERE (teams.semiplace BETWEEN 2 AND 3) AND colors.idcolor=teams.rh ORDER BY rh";
	
	$res=@$connection->query($ask_team);
	
	$num=0;
	while($row = $res->fetch_array())
	{
		$num++;
		$team =  $row['team'];
		echo '
		function drawChart'.$num.'() {

        var data'.$num.' = google.visualization.arrayToDataTable([["Rider", "Points"],';
		
		$ask_rider = "SELECT riders.name,raceoff.sum FROM teams,riders,raceoff WHERE teams.team='$team' AND riders.team=teams.idteam AND raceoff.idrider=riders.idrider AND raceoff.number>0 ORDER BY number";
			
			$res1 = @$connection->query($ask_rider);
		$licz=0;
		while($row1 = $res1->fetch_array())
				{
					$licz++;
					$name=$row1['name'];
					$points=$row1['sum'];
					echo '["'.$name.'",'.$points.']';
					if($licz<=4) echo ',';
				}
				$licz=0;
          echo ']);

        var options'.$num.' = {
			title: "'.$team.'"
        };

        var chart'.$num.' = new google.visualization.PieChart(document.getElementById("piechart'.$num.'"));

        chart'.$num.'.draw(data'.$num.', options'.$num.');
      }
    ';
	}
	echo '</script>';
	$res->close();
	?>
</head>

<body>
	<h2>Monster Energy FIM Speedway World Cup 2016 - Race Off (Manchester)</h2>
	
	<p>
		[<a href="index.php" class="link">Main page</a>]
		[<a href="vojens.php" class="link">Event 1 (Vojens)</a>]
		[<a href="vastervik.php" class="link">Event 2 (Västervik)</a>]
		[<a href="final.php" class="link">Final (Manchester)</a>]
	</p><b>Race Off (Manchester)</b>
	
<div id="main">
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
	$num1=0;
	if($res)
	{
		if($res->num_rows==0) {echo "Semis have not raced";}
		else
		{
			while($row = $res->fetch_array())
			{
				$num1++;
				echo '<div class="team">';
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
					
						//@$connection->query($update);
					
						printf("%d. %'.-30s %d ",$number,$name,$sumr);
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
				//@$connection->query($updres);
			
				echo '</div><div id="piechart'.$num1.'" style="width: 500px; height: 219.5px; float:left; margin-top:10px; background-color:0a0b19#; color:#ffffff;"></div><div style=" clear:both;"></div>';
			
			}
				$actualplaces="SELECT team FROM teams WHERE semiplace BETWEEN 2 AND 3 ORDER BY ropoints DESC, idteam ASC";
				$res3=@$connection->query($actualplaces);
				$place=1;
				$prize1="";
				$prize2="";
				echo '</div><div class="results"><u>Results</u></br>';
				while($row3 = $res3->fetch_array())
				{
					$team=$row3['team'];
					if($place==1) {$prize1="<b>"; $prize2=" - FINAL</b>";}
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
</div>
</body>
</html>