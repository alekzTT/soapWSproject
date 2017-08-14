<?php
function say()
{
echo "this is a function";
}

function iif($c1, $c2, $t,  $f)
{
  if ($c1==$c2)  { $x=$t; } else {$x=$f;}
  return $x;
}

function  bill($var1, $var2, $var3, $var4, $var5, $var6, $var7, $var8, $var9, $var10, $var11, $var12, $var13)
{

  $where = array();
  $filter=null;
  if(!empty($var1)) $where[] = "maker_code = '$var1'";
  if(!empty($var2)) $where[] = "model_code = '$var2'";
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

  $sql="SELECT * FROM `adds` ".$filter."";
  return $sql;
}

function get_maker_name($code)
{
  require_once('../db/dbConn.php');
  $sql="SELECT * FROM `makers` WHERE `maker_code`=$code";
  $result=mysql_query($sql);
  $name=mysql_fetch_array($result);
  return $name[1];
}

function get_model_name($code)
{
  require_once('../db/dbConn.php');
  $sql2="SELECT * FROM `models` WHERE `model_code`=$code";
  $result2=mysql_query($sql2);
  $name2=mysql_fetch_array($result2);
  return $name2[1];
}

function getHeader()
{
$h='<div id="header"><h2>...free used cars classifieds</h2></div>
<div id="teimage"><img src="../images/teiser.png" width="151" height="151"></div>
<div id="header2"><div id="mainmenu"><ul><li><a href="index.php">Home</a></li>
<li><a href="../public/search.php"> Search</a></li><li><a href="../public/add.php"> Add</a></li>
<li><a href="../private/login.php">Login </a></li></ul></div></div>';
echo $h;
}

function getFooter()
{

}
?>
