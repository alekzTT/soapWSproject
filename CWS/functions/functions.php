<?php
function checkpartner($dom,$url, $pers, $country)
{ 	
	$sql="SELECT * FROM `partners`";
	$result=mysql_query($sql);
	$send=null;
	while($row=mysql_fetch_array($result))
	{
		if ($row[0] == $dom)
		{
			$send="Domain Exists";
		} 
		if ($row[1] == $url)
		{
			$send.=" URL exists";
		}		
		if ($send==null)
		{
		$send="ok";
		}
	}
	return $send;
	}

function inputpartner($dom,$url, $pers, $country)
{
$sql="INSERT INTO `cws`.`partners` (`domain`, `xml_url`, `org_name`, `country`)
VALUES ('$dom', '$url', '$pers', '$country');";
$result=mysql_query($sql);
return $result;

}
function  dynamic_sql($var1, $var2, $var3, $var4, $var5, $var6, $var7, $var8, $var9, $var10, $var11, $var12, $var13,$start, $end)
{

$where = array(); 
$filter=null;
if(!empty($var1)) $where[] = "maker = '$var1'"; 
if(!empty($var2)) $where[] = "model = '$var2'"; 
if(!empty($var3)) $where[] = "price >= '$var3'"; 
if(!empty($var4)) $where[] = "price <= '$var4'"; 
if(!empty($var5)) $where[] = "engine >= '$var5"; 
if(!empty($var6)) $where[] = "engine<= '$var6'"; 
if(!empty($var7)) $where[] = "power >= '$var7'"; 
if(!empty($var8)) $where[] = "power <= '$var8'"; 
if(!empty($var9)) $where[] = "km_hist <= '$var9";
if(!empty($var10)) $where[] = "km_hist <= '$var10'";
if(!empty($var11)) $where[] = "bought <= '$var11'";
if(!empty($var12)) $where[] = "bought <= '$var12";
if(!empty($var13)) $where[] = "color = '$var13'";
if(count($where)) $filter ="WHERE ".implode(' AND ', $where); 

$sql="SELECT * FROM `products` ".$filter."ORDER BY `price` LIMIT ".$start.",".$end."";
return $sql;
}


?> 