<?php
//======================================================xml rpc implementation==========
if (include("lib/xmlrpc.inc")) {echo "TRUE :xmlrpc";} else { echo "FALSE :xmlrpc";} echo "<br/>";
if (include("lib/xmlrpc_wrappers.inc")) {echo "TRUE :xmlrpc_wrappers";} else { echo "FALSE :xmlrpc_wrappers";} echo "<br/>";
if (include("lib/xmlrpcs.inc"))  {echo "TRUE :xmlrpcs";} else { echo "FALSE :xmlrpcs";} echo "<br/>";
//======================================================Oi synarthseis  poy tha dhmosieytoun
//function uptime_func($method_name, $params, $app_data)
//{
//return `uptime`;
//}
 //===============================================
//function greeting_func($method_name, $params, $app_data)
//{
//$name = $params;
//return "Hello". $name. "How are you today?";
return "Xml Rpc Client For Carz Web Service Works";
//}
//================================================Synarthsh Gia Aytokinita===============>
function car_func($method_name,$Car,$app_data) {
			$var1=$Car["maker"];
			//$var1=1120;
			$var2=$Car[1];
		    $var3=$Car[2];
			$var4=$Car[3];
			$var5=$Car[4];
			$var6=$Car[5];
			$var7=$Car[6];
			$var8=$Car[7];
			$var9=$Car[8];
			$var10=$Car[9];
			$var11=$Car[10];
			$var12=$Car[11];
			$var13=$Car[12];
//=======================================			
$where = array(); 
$filter=null;
if(!empty($var1)) { $where[] = "maker_code = '$var1'";} 

$con=mysql_connect("localhost", "root", "");
mysql_select_db("carz_db", $con);

$sqlmodel="SELECT * FROM `models` WHERE `model_name` = '$var2'";
$modresult=mysql_query($sqlmodel);
while ($mod1= mysql_fetch_array($modresult))
{
$model_code=$mod1[2];
}
if(!empty($var2)) $where[] = "model_code = '$model_code'"; 
if(!empty($var3)) $where[] = "price >= '$var3'"; 
if(!empty($var4)) $where[] = "price <= '$var4'"; 
if(!empty($var5)) $where[] = "cc >= '$var5"; 
if(!empty($var6)) $where[] = "cc <= '$var6'"; 
if(!empty($var7)) $where[] = "bhp >= '$var7'"; 
if(!empty($var8)) $where[] = "bhp <= '$var8'"; 
if(!empty($var9)) $where[] = "km <= '$var9";
if(!empty($var10)) $where[] = "km <= '$var10'";
if(!empty($var11)) $where[] = "add_year <= '$var11'";
if(!empty($var12)) $where[] = "add_year <= '$var12";
if(!empty($var13)) $where[] = "add_color = '$var13'";
if(count($where)) $filter ="WHERE ".implode(' AND ', $where); 
//====================================================

$sql="SELECT * FROM `adds` ".$filter."";
//=====================================================
$con=mysql_connect("localhost", "root", "");
mysql_select_db("carz_db", $con);
//=========================================================
$result=mysql_query($sql);
$i=0;
$reply=array();
while ($row2=mysql_fetch_array($result))
{    
//to row 2 prepei na ginei $make_name kai to $row 3 prepei na ginei $model_name
$sqmake="SELECT * FROM `makers` WHERE `maker_code`=$row2[2]";
$resmake=mysql_query($sqmake);
while ($rowm=mysql_fetch_array($resmake))
{  $make_name=$rowm[1]; }

$sqmodel="SELECT * FROM `models` WHERE `model_code`=$row2[3]";
$resmodel=mysql_query($sqmodel);
while ($rowm=mysql_fetch_array($resmodel))
{  $model_name=$rowm[1]; }
//$reply[$i]="$row[2]"."_"."$row[3]"."_"."$row[4]"."_"."$row[5]"."_"."$row[6]"."_"."$row[7]"."_"."$row[8]"."_"."$row[9]"."_"."$row[10]"."_"."$row[11]"; $i++; 
$reply[$i]="$make_name"."_"."$model_name"."_"."$row2[4]"."_"."$row2[5]"."_"."$row2[6]"."_"."$row2[7]"."_"."$row2[8]"."_"."$row2[9]"."_"."$row2[10]"."_"."$row2[11]"."_"."http://localhost/carz/public/searched.php?add="."$row2[0]";
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



//====================================================Dhmiourgia Server======
$xmlrpc_server = xmlrpc_server_create();
//====================================================Dimosieysh ton synarthseon===========
//xmlrpc_server_register_method($xmlrpc_server, "greeting", "greeting_func");
//xmlrpc_server_register_method($xmlrpc_server, "uptime", "uptime_func");
xmlrpc_server_register_method($xmlrpc_server, "car_func", "car_func");
//================Otan stelnetai ena request vrisketai ekei=======================
$request_xml = $HTTP_RAW_POST_DATA;
//============================
$response = xmlrpc_server_call_method($xmlrpc_server, $request_xml, '');
print $response;
//===============================Katastrefoume to server kai eleytheronoyme ta resources
xmlrpc_server_destroy($xmlrpc_server);

?>