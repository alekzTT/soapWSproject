<?php

//=====================================xml rpc implementation==========
if (include("utils.php"))  {echo "TRUE :utils.php";} else { echo "FALSE :utils.php";} echo "<br/>";
//=====================
$host = "localhost";
$uri = "/ws-rpc/server_rpc.php";

$name = "Alex";
$result2 = xu_rpc_http_concise(
array(
'method' => "greeting",
'args'  => array($name),
'host'  => $host,
'uri'  => $uri,
'port'  => 80
)
);
echo $result2; 
 ?>
<?php

//=============================================================
$response= xu_rpc_http_concise(
array(
'method' => "uptime",
'host'  => $host,
'uri'  => $uri,
'port'  => 80
)
);
print "The uptime on " . $host . " is " . $response."<br/>";



///============================================================
if(!empty($_POST["maker"])) { $make=$_POST["maker"]; } else { $make=""; }
if(!empty($_POST["model"])) { $mod=$_POST["model"]; } else { $mod=""; }
if(!empty($_POST["min_price"])) { $min_pr=$_POST["min_price"]; } else { $min_pr=""; }
if(!empty($_POST["max_price"])) { $max_pr=$_POST["max_price"]; } else { $max_pr=""; }
if(!empty($_POST["min_engine"])) { $min_e=$_POST["min_engine"]; } else { $min_e=""; }
if(!empty($_POST["max_engine"])) { $max_e=$_POST["max_engine"]; } else { $max_e=""; }
if(!empty($_POST["min_power"])) { $min_p=$_POST["min_power"]; } else { $min_p=""; }
if(!empty($_POST["max_power"])) { $max_p=$_POST["max_power"]; } else { $max_p=""; }
if(!empty($_POST["min_km"])) { $min_km=$_POST["min_km"]; } else { $min_km=""; }
if(!empty($_POST["max_km"])) { $max_km=$_POST["max_km"]; } else { $max_km=""; }
if(!empty($_POST["min_year"])) { $min_y=$_POST["min_year"]; } else { $min_y=""; }
if(!empty($_POST["max_year"])) { $max_y=$_POST["max_year"]; } else { $max_y=""; }
if(!empty($_POST["color"])) { $color=$_POST["color"]; } else { $color=""; }

//============================================================
//Make the array== for the carz
$Car = array('maker' =>$make,
 'model' =>$mod, 
 "min_price"=>$min_pr,
 "max_price"=>$max_pr, 
"min_engine"=>$min_e,
 "max_engine"=>$max_e, 
"min_power"=>$min_p, 
"max_power"=>$max_p,
"min_km"=>$min_km, 
"max_km"=>$max_km, 
"min_year"=>$min_y, 
"max_year"=>$max_y,
 "color"=>$color
);
//========================================================
$results = xu_rpc_http_concise(
array(
'method' => "carz",
'args'  => $Car,
'host'  => $host,
'uri'  => $uri,
'port'  => 80
)
);
$i=0;
	//while ($i<5)	
//	{
$filter="reply".$i;
$carz=array();
if ($results["$filter"])
{
		//print_r(explode(' AND ', $results["$filter"])); 
		$carz=explode(' AND ', $results["$filter"]);
		}
		$c=count($carz);
		echo $c." ";
		echo "Carz Found Meeting You Criteria<br/>";
		echo "<table>";
		for ($j=0; $j<$c; $j++ )
		{  $row=explode('_', $carz[$j]);
		echo "<tr><td><a href=\"".$row[10]."\">";
		if  (!empty($row[9]))
			{
			echo "<img src=".$row[9]." width=\"80px\" height=\"70px\"/>";
			} else echo "<b><em>Image Not Available</em></b>";
			echo "</a></td>";
			echo "<td><b>maker :</b>".$row[0]."<b> model </b> :".$row[1]."<b> price :</b>".$row[2]."<b>euro <br/>Engine Size :</b>".$row[3]."<b> horsepower :</b>".$row[4]."<b> Kilometers :</b>".$row[5]."<br/> <b>First Year:</b>".$row[6]." <b>Color :</b>".$row[7];
			echo "</td></tr>";
		} 
		echo "</table>";
//===============Telos Gia Carz==========================

?>