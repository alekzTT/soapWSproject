<?php
// Pull in the NuSOAP code
require_once('nusoap.php');
//edo ama kaneis 2o require kolaei
// Create the server instance
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('carws', 'urn:carws');
// Register the data structures used by the service
$server->wsdl->addComplexType(
    'Car',
    'complexType',
    'struct',
    'all',
    '',
    array(
        "maker"=>array("name"=>"maker", "type"=>"xsd:int"),
		"model"=>array("name"=>"model", "type"=>"xsd:string"), 	
		"min_price"=>array("name"=>"min_price", "type"=>"xsd:int"),								
		"max_price"=>array("name"=>"max_price", "type"=>"xsd:int"),								
		"min_engine"=>array("name"=>"min_engine", "type"=>"xsd:int"),
		"max_engine"=>array("name"=>"max_engine", "type"=>"xsd:int"),								
		"min_power"=>array("name"=>"min_power", "type"=>"xsd:int"),								
		"max_power"=>array("name"=>"max_power", "type"=>"xsd:int"),								
		"min_km"=>array("name"=>"min_km", "type"=>"xsd:int"),								
		"max_km"=>array("name"=>"max_km", "type"=>"xsd:int"),								
		"min_year"=>array("name"=>"min_year", "type"=>"xsd:int"),								
		"max_year"=>array("name"=>"max_year", "type"=>"xsd:int"),								
		"color"=>array("name"=>"color", "type"=>"xsd:string")																							
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
		//'reply3' => array('name' => 'reply3', 'type' => 'xsd:string'), // alios h posothta tvn reply einai kathorismenh
		
		//'reply4' => array('name' => 'reply4', 'type' => 'xsd:string')
    )
);
// Register the method to expose
$server->register('car',                  					  // method name
    array('Car' => 'tns:Car'),          					// input parameters
    array('reply' => 'tns:reply'),    						// output parameters
    'urn:carws',                       							// namespace
    'urn:carws#car',            						    	  // soapaction
    'rpc',                                  					// style
    'encoded',                              						  // use
    'give back carz'        // documentation
);
// Define the method as a PHP function
function car($Car) {
  //  $reply = 'Hello, ' . $Car['model'] .
              //  '. It is nice to meet a ' . $Car['model'] .
            //    ' year old ' . $Car['price'] . '.';
			//require_once("functions.php");
			$var1=$Car['maker'];   
			$var2=$Car['model'];
			$var3=$Car['min_price'];
			$var4=$Car['max_price'];
			$var5=$Car['min_engine'];
			$var6=$Car['max_engine'];
			$var7=$Car['min_power'];
			$var8=$Car['max_power'];
			$var9=$Car['min_km'];
			$var10=$Car['max_km'];
			$var11=$Car['min_year'];
			$var12=$Car['max_year'];
			$var13=$Car['color'];
//=======================================			
$where = array(); 
$filter=null;
if(!empty($var1)) $where[] = "maker_code = '$var1'"; 
//======================================
$con=mysql_connect("localhost", "root", "");
mysql_select_db("carz_db", $con);
$sqmname="SELECT * FROM `models` WHERE `model_name`='$var2' AND `maker_code` = '$var1'";
$mresult=mysql_query($sqmname);
while ($mrow=mysql_fetch_array($mresult))
{
$mcode=$mrow['model_code'];
}
if(!empty($var2)) $where[] = "model_code = '$mcode'"; 
//========================================
if(!empty($var3)) $where[] = "price >= '$var3'"; 
if(!empty($var4)) $where[] = "price <= '$var4'"; 
if(!empty($var5)) $where[] = "cc >= '$var5'"; 
if(!empty($var6)) $where[] = "cc <= '$var6'"; 
if(!empty($var7)) $where[] = "bhp >= '$var7'"; 
if(!empty($var8)) $where[] = "bhp <= '$var8'"; 
if(!empty($var9)) $where[] = "km >= '$var9'";
if(!empty($var10)) $where[] = "km <= '$var10'";
if(!empty($var11)) $where[] = "add_year >= '$var11'";
if(!empty($var12)) $where[] = "add_year <= '$var12'";
if(!empty($var13)) $where[] = "add_color = '$var13'";
if(count($where)) $filter ="WHERE ".implode(' AND ', $where); 
//====================================================

$sql="SELECT * FROM `adds` ".$filter."";
//=====================================================

//=========================================================
$result=mysql_query($sql);
$i=0;
$reply=array();
while ($row=mysql_fetch_array($result))
{    
//to row 2 prepei na ginei $make_name kai to $row 3 prepei na ginei $model_name
$sqmake="SELECT * FROM `makers` WHERE `maker_code`=$row[2]";
$resmake=mysql_query($sqmake);
while ($rowm=mysql_fetch_array($resmake))
{  $make_name=$rowm[1]; }

$sqmodel="SELECT * FROM `models` WHERE `model_code`='$row[3]'";
$resmodel=mysql_query($sqmodel);
while ($rowm=mysql_fetch_array($resmodel))
{  $model_name=$rowm[1]; }
//$reply[$i]="$row[2]"."_"."$row[3]"."_"."$row[4]"."_"."$row[5]"."_"."$row[6]"."_"."$row[7]"."_"."$row[8]"."_"."$row[9]"."_"."$row[10]"."_"."$row[11]"; $i++; 
$reply[$i]="$make_name"."_"."$model_name"."_"."$row[4]"."_"."$row[5]"."_"."$row[6]"."_"."$row[7]"."_"."$row[8]"."_"."$row[9]"."_"."$row[10]"."_"."$row[11]"."_"."http://www.alekz.eu/carz/public/searched.php?add="."$row[0]";
 $i++; 
}
$count=count($reply);
$i=0;
 //return array(	"reply".$i=>$reply[$i]);
 $rep=array();
	for ($i=0;$i<$count;$i++)	
{   $rep["reply".$i]=$reply[$i]; }
$rep1=array();
$rep1["reply0"]=implode(' AND ', $rep); 
	return $rep1;
	mysql_close($con);

}
// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>
