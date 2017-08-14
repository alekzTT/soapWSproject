<html>
<head><link href="../CSS/css.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery.js"></script>
 <SCRIPT> $(document).ready(function() {
 $("tr:even").css("background-color", "#f1f1f1");
 $("tr:odd").css("background-color", "white"); 

 });
 </SCRIPT>

</head>
<body>
	<div id="wrap">
	<div id="header"><h2>...Car Web Services</h2><h1>C.W.S.</h1>
									
					</div>
					
	<div id="header2"><ul>
						<li><a href="../index.php">Home</a></li>
						<li><a href="search.php">Search</a></li>
						<li><a href="post_client.php">Soap Client</a></li>
				</ul>
		</div> 
			<div id="main">
<?php
// Pull in the NuSOAP code
require_once('nusoap.php');
// Create the client instance
$client = new  soapclient('http://web2.teiser.gr/webservices/ws/carws.php?wsdl', true);
// Check for an error   http://web2.teiser.gr/webservices/ws/carws.php?wsdl
//http://web2.teiser.gr/webservices/ws/carws.php?wsdl
$err = $client->getError();
if ($err) {
    // Display the error
    echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
    // At this point, you know the call that follows will fail
}
//Read the Post variables to send to soap method
//=============================================================

if(!empty($_GET["maker"])) { $make=$_GET["maker"]; } else { $make=""; }
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
// Call the SOAP method
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
$results = $client->call('car', array('Car' =>$Car));
// Check for a fault
if ($client->fault) {
    echo '<h2>Fault</h2><pre>';
    print_r($results);
    echo '</pre>';
} else {
    // Check for errors
    $err = $client->getError();
    if ($err) {
        // Display the error
        echo '<h2>Error</h2><pre>' . $err . '</pre>';
    } else {
        // Display the result
       // echo 'Result<pre>';
		//  print_r($results);
		//foreach ($results as $result) { echo $result;}
	//echo "<h2>Expload</h2>";
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
		echo "<br/></pre><center><h3>".$c." ";
		echo " Carz Found Meeting Your Criteria </h3></center>";
	?><div id= "results"> <?php
		echo "<table>";		echo "<tr><th>image</th><th>maker</th><th>model</th><th>price</th><th>engine</th><th>power</th><th>km runned</th><th>year</th><th>color</th></tr>";
		for ($j=0; $j<$c; $j++ )
		{  $row=explode('_', $carz[$j]);
		if  (!empty($row[9]))
			{
			echo "<tr><td><a href=\"".$row[10]."\"><img src=".$row[9]." width=\"80px\" height=\"60px\"/></a></td>";
			} else echo "<tr><td><b><u>Image Not Available</u></b></td>";
			echo "<td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]." euro </td><td>".$row[3]." cc </td><td>".$row[4]." hp </td><td>".$row[5]." km </td><td>".$row[6]."</td><td>".$row[7]."</td></tr>";
		}
		
$i++;
}
    echo '</table>';
    } 
	/*
//}
// Display the request and response
echo '<h2>Request</h2>';
echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
/* Display the debug messages
echo '<h2>Debug</h2>';
echo '<pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';
*/
?>
 </div>
</div>
<div id="footer">Graduation project of  Tecnological Educational Institute of "Serres" Greece  &copy    </div>
			</div>

</body>
</html> 
