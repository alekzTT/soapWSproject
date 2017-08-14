<?php
// Pull in the NuSOAP code
require_once('nusoap.php');
// Create the client instance
$client = new  soapclient('http://web2.teiser.gr/ws/carws.php?wsdl', true);
// Check for an error
$err = $client->getError();
if ($err) {
    // Display the error
    echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
    // At this point, you know the call that follows will fail
}
//Read the Post variables to send to soap method
//=============================================================

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
// Call the SOAP method
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
        echo '<h2>Result</h2><pre>';
		  print_r($results);
		//foreach ($results as $result) { echo $result;}
	echo "<h2>Expload</h2>";
$i=0;
	//while ($i<5)	
//	{
$filter="reply".$i;
$carz=array();
echo "SAKAAAKAAKAK";
if ($results["$filter"])
{
		print_r(explode(' AND ', $results["$filter"])); 
		$carz=explode(' AND ', $results["$filter"]);
		}
		echo "Carz<br/>";
		$c=count($carz);
		echo $c."<br/>";
		for ($j=0; $j<$c; $j++ )
		{  $row=explode('_', $carz[$j]);
		if  (!empty($row[9]))
			{
			echo "<img src=".$row[9]." width=\"80px\" height=\"70px\"/>";
			} else echo "<b><em>Image Not Available</em></b>";
			echo "<b>maker :</b>".$row[0]."<b> model </b> :".$row[1]."<b> price :</b>".$row[2]."<b>euro Engine Size :</b>".$row[3]."<b> horsepower :</b>".$row[4]."<b> Kilometers :</b>".$row[5]." <b>First Year:</b>".$row[6]." <b>Color :</b>".$row[7];
			
			 echo "<a href=\"".$row[10]."\">Link</a>";
			echo "<br/>";
		}
		
$i++;
}
//echo "CARZ".print_r($carz);
    echo '</pre>';
    } 
	/*
//}
*/
//Display the request and response
echo '<h2>Request</h2>';
echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
/* Display the debug messages
echo '<h2>Debug</h2>';
echo '<pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';
*/
?>
