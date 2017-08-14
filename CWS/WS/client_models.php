<html>
<head><link href="../CSS/css.css" rel="stylesheet" type="text/css" /></head>
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
$client = new  soapclient('http://localhost/ws_model/modelws.php?wsdl', true);
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

$make=1112;

//============================================================
// Call the SOAP method
$Maker = array("maker_code" =>$make
);
$results = $client->call('models', array('Maker' =>$Maker));
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
$filter="reply_models".$i;
$carz=array();

if ($results["$filter"])
{
		//print_r(explode(' AND ', $results["$filter"])); 
		$carz=explode(' AND ', $results["$filter"]);
		}
		
		$c=count($carz);
		echo "<br/></pre><h4>".$c." ";
		echo " Carz Found Meeting Your Criteria </h4><pre><br/><br/>";
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

<div id="footer">Graduation project of  Tecnological Educational Institute of "Serres" Greece  &copy  </div>
			</div>

</body>
</html> 
