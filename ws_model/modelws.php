<?php
// Pull in the NuSOAP code
require_once('nusoap.php');
//edo ama kaneis 2o require kolaei
// Create the server instance
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('modelws', 'urn:modelws');
// Register the data structures used by the service
$server->wsdl->addComplexType(
    'Maker',
    'complexType',
    'struct',
    'all',
    '',
    array(
        "maker"=>array("name"=>"maker", "type"=>"xsd:int"),
																						
    )
);
$server->wsdl->addComplexType(
    'reply',
    'complexType',
    'struct',
    'all',
    '',
    //array( 
       // 'reply' => array('name' => 'reply', 'type' => 'xsd:string'),
	   array( 'reply0' => array('name' => 'reply', 'type' => 'xsd:string'),
		//'reply1' => array('name' => 'reply1', 'type' => 'xsd:string'),
		//'reply2' => array('name' => 'reply2', 'type' => 'xsd:string'),// an einai olla string tote den exoume thema me thn posothta
		//'reply3' => array('name' => 'reply3', 'type' => 'xsd:string'),
		//'reply4' => array('name' => 'reply4', 'type' => 'xsd:string')
    )
);
// Register the method to expose
$server->register('models',                  					  // method name
    array('Maker' => 'tns:Maker'),          					// input parameters
    array('reply' => 'tns:reply'),    						// output parameters
    'urn:modelws',                       							// namespace
    'urn:modelws#models',            						    	  // soapaction
    'rpc',                                  					// style
    'encoded',                              						  // use
    'give back carz'        // documentation
);
// Define the method as a PHP function
function models($Maker) {
//$rep= array();
//$rep[1]="LALALALA";
//$rep[2]="NANANAN";
//$rep1["reply0"]=implode(' AND ', $rep); 
//	return $rep1;
$con=mysql_connect("localhost", "root", "");
mysql_select_db("carz_db", $con);
//-===============================
$var1=$Maker['maker'];
$sql="SELECT * FROM `models` WHERE `maker_code` = '$var1'";
$result=mysql_query($sql);
$i=0;
$rep= array();
while ($row=mysql_fetch_array($result))
{
	$rep[$i]="$row[1]"."_"."$row[2]";
	$i++;

}

$rep1['reply0']=implode('&', $rep); 
return $rep1;
	mysql_close($con);

}
// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>
