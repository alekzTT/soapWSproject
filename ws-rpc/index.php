<html><body>


<!-- <a href="client_rpc.php">Client</a><br/>
<a href="server_rpc.php">Server</a><br/>
-->
<h1>There is no such tool as WSDL for Xml Rpc </h1>
<h2> This is an example code instead for xml rpc service on this Site</h2>
<table style="font-size:8pt; background-color:#f9f9f9; border:black thin solid; width:800px"><tr><td width="800px"><pre>

//=====================================xml rpc implementation==========
if (include("utils.php"))  {echo "TRUE :utils.php";} else { echo "FALSE :utils.php";} echo "&lt;br/&gt;";
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


//=============================================================
$response= xu_rpc_http_concise(
array(
'method' => "uptime",
'host'  => $host,
'uri'  => $uri,
'port'  => 80
)
);
print "The uptime on " . $host . " is " . $response."&lt;br/>";



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
		echo "Carz Found Meeting You Criteria&lt;br/&gt;";
		echo "&lt;table&gt;";
		for ($j=0; $j<$c; $j++ )
		{  $row=explode('_', $carz[$j]);
		echo "&lt;tr&gt;&lt;td&gt;&lt;a href=\"".$row[10]."\"&gt;";
		if  (!empty($row[9]))
			{
			echo "&lt;img src=".$row[9]." width=\"80px\" height=\"70px\"/&gt;";
			} else echo "&lt;b&gt;&lt;em&gt;Image Not Available &lt;/em&gt; &lt;/b&gt;";
			echo "&lt;/a&gt;&lt;/td&gt;";
			echo "&lt;td&gt;&lt;b&gt;maker :&lt;/b&gt;".$row[0]."&lt;b&gt; model &lt;/b&gt; :".$row[1].
			"&lt;b&gt; price :&lt;/b&gt;".$row[2]."&lt;b&gt;euro &lt;br/&gt;Engine Size &lt;/b&gt;".$row[3].
			"&lt;b&gt; horsepower :&lt;/b&gt;".$row[4]."&lt;b&gt; Kilometers :&lt;/b&gt;".$row[5]."&lt;br/&gt; 
			&lt;b&gt;First Year:&lt;/b&gt;".$row[6]." &lt;b&gt;Color :&lt;/b&gt;".$row[7];
			echo "&lt;/td&gt;&lt;/tr&gt;";
		} 
		echo "&lt;/table&gt;";
//===============Telos Gia Carz==========================

</pre></td></tr></table>


</body></html>