<html>
<head>
<link href="../CSS/css.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery.js"></script>
 <script> $(document).ready(function() {
 $("tr:even").css("background-color", "#f1f1f1");
 $("tr:odd").css("background-color", "white"); 

 });
 </script>



</head>
<body>
	<div id="wrap">
	<div id="header"><h2>...Car Web Services</h2><h1>C.W.S.</h1>
									
					</div>
					
	<div id="header2"><ul>
						<li><a href="../index.php">Home</a></li>
						<li><a href="search.php">Search</a></li>
						<li><a href="post_client_rpc.php">Xml Rpc Client</a></li>
				</ul>
		</div> 
			<div id="main">
<?php
//if (include("lib/xmlrpc.inc")) {echo "TRUE :xmlrpc";} else { echo "FALSE :xmlrpc";} echo "<br/>";
//if (include("lib/xmlrpc_wrappers.inc")) {echo "TRUE :xmlrpc_wrappers";} else { echo "FALSE :xmlrpc_wrappers";} echo "<br/>";
//if (include("lib/xmlrpcs.inc"))  {echo "TRUE :xmlrpcs";} else { echo "FALSE :xmlrpcs";} echo "<br/>";
//=====================================xml rpc implementation==========
//if (include("utils.php"))  {echo "TRUE :utils.php";} else { echo "FALSE :utils.php";} echo "<br/>";
require_once("utils.php");
//=====================
$host = "localhost";
$uri = "/ws-rpc/server_rpc.php";

//$name = "Alex";
//$result2 = xu_rpc_http_concise(
//array(
//'method' => "greeting",
//'args'  => array($name),
//'host'  => $host,
//'uri'  => $uri,
//'port'  => 80
//)
//);
//print $result2; 


//=============================================================
//$response= xu_rpc_http_concise(
//array(
//'method' => "uptime",
//'host'  => $host,
//'uri'  => $uri,
//'port'  => 80
//)
//);
//print "Check " . $response."<br/>";



///============================================================
if(!empty($_GET["maker"])) { $make=$_GET["maker"]; } else { $make=""; } //echo $make."oriste";
if(!empty($_GET["model"])) { $mod=$_GET["model"]; } else { $mod=""; }
if(!empty($_GET["min_pr"])) { $min_pr=$_GET["min_pr"]; } else { $min_pr=""; }
if(!empty($_GET["max_pr"])) { $max_pr=$_GET["max_pr"]; } else { $max_pr=""; }
if(!empty($_GET["min_eng"])) { $min_e=$_GET["min_eng"]; } else { $min_e=""; }
if(!empty($_GET["max_eng"])) { $max_e=$_GET["max_eng"]; } else { $max_e=""; }
if(!empty($_GET["min_power"])) { $min_p=$_GET["min_power"]; } else { $min_p=""; }
if(!empty($_GET["max_power"])) { $max_p=$_GET["max_power"]; } else { $max_p=""; }
if(!empty($_GET["min_km"])) { $min_km=$_GET["min_km"]; } else { $min_km=""; }
if(!empty($_GET["max_km"])) { $max_km=$_GET["max_km"]; } else { $max_km=""; }
if(!empty($_GET["min_year"])) { $min_y=$_GET["min_year"]; } else { $min_y=""; }
if(!empty($_GET["max_year"])) { $max_y=$_GET["max_year"]; } else { $max_y=""; }
if(!empty($_GET["color"])) { $color=$_GET["color"]; } else { $color=""; }

//============================================================
//Make the array== for the carz
$Car = array("maker" =>$make,
 "model" =>$mod, 
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
'method' => "car_func",
'args'  =>array ($Car),
'host'  => $host,
'uri'  => $uri,
'port'  => 80
)
);
//echo "<br/>Edo vlepoume ta stoixia tou pinaka $CAR <b>Maker Code</b>".$Car['maker']." <b>Model</b> ".$Car['model']."<b>Minimum Price</b>".$Car['min_price']."<br/>";
$i=0;
	//while ($i<5)	
//	{
$filter="reply".$i;
$carz=array();
//echo $results["reply0"];
if ($results["$filter"])
{
		//print_r(explode(' AND ', $results["$filter"])); 
		$carz=explode(' AND ', $results["$filter"]);
		}
		$c=count($carz);
		echo "<br/><center><h3>".$c." ";
		echo "Carz Found Meeting You Criteria</h3></center><br/>";
		echo "<table>";
		echo "<tr><th>image</th><th>maker</th><th>model</th><th>price</th><th>engine</th><th>power</th><th>km runned</th><th>year</th><th>color</th></tr>";	
		for ($j=0; $j<$c; $j++ )
		{  $row=explode('_', $carz[$j]);
		echo "<tr><td><a href=\"".$row[10]."\">";
		if  (!empty($row[9]))
			{
			echo "<a href=\"".$row[10]."\"><img src=".$row[9]." width=\"80px\" height=\"70px\"/></a>";
			} else echo "<b><em>Image Not Available</em></b>";
			echo "</a></td>";
			echo "<td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]." euro </td><td>".$row[3]."cc </td><td>".$row[4]." bhp </td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td></tr>";
			
		} 
		echo "</table>";
//===============Telos Gia Carz==========================

?>
</div>

<div id="footer">Graduation project of  Tecnological Educational Institute of "Serres" Greece  &copy  </div>
			</div>

</body>
</html> 
