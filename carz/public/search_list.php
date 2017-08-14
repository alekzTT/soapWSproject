<?php
require_once('../db/dbConn.php');
require ('../functions/fun.php');

$maker=$_GET["maker"];
$model=$_GET["model"];
$min_price=$_GET["min_price"];
$max_price=$_GET["max_price"];
$min_cc=$_GET["min_engine_size"];
$max_cc=$_GET["max_engine_size"];
$min_bhp=$_GET["min_bhp"];
$max_bhp=$_GET["max_bhp"];
$min_km=$_GET["min_km"];
$max_km=$_GET["max_km"];
$min_year=$_GET["min_date"];
$max_year=$_GET["max_date"];
$color=$_GET["color"];
?>
<html><head>
<script type="text/javascript">
function checksql()
{
if(document.getElementById("checkbox").checked==true)
document.getElementById("query").style.display="block"
else if(document.getElementById("checkbox").checked==false)
document.getElementById("query").style.display="none";
};
</script>

<link href="../css.css" rel="stylesheet" type="text/css" /></head><body>
<div id="wrap">
		<div id="header">
	<h2>...free used cars classifieds</h2>
	</div>
		<div id="header2">
			<div id="mainmenu">
				<ul>
				<li><a href="../index.html">Home</a></li>
				<li><a href="search.php">Search</a></li>
				<li><a href="add.php">Add</a></li>
				<li><a href="../private/admin.php">Login</a></li>
				</ul>
			</div>

		</div>
		<!--<div id="headerimg"></div>-->
	<div id="main">
		<div id="main_left">

<?php
echo "<center><img src=\"../images/coolcars.png\">";
echo "<h3>"."Search Critiria</h3>";
echo "<table  class=\"data\">";
echo "<tr><th> Critiria </th><th> Value </th></tr>";
if ($maker) {
$sql="SELECT * FROM `carz_db`.`makers` WHERE maker_code=$maker";
	$re=mysql_query($sql);
	if ($re) {
	while($row_m=mysql_fetch_array($re))
	{
	$make_name=$row_m[1];
	}
echo "<tr><td>Maker:</td><td>".$make_name."</td></tr>"; }
//$rem=(mysql_query("SELECT * FROM `makers` WHERE maker_name=$maker
//$maker_code=
 } else {
  echo "<tr><td>Maker:</td><td>"."All Makers"."</td></tr>";
 }
if($model)
{
	$query="SELECT `model_name` FROM `carz_db`.`models` WHERE model_code = $model";
	$data=mysql_query($query);
	if ($data) {
	while ($apot=mysql_fetch_array($data))
	{ $model_name=$apot["model_name"]; }
} else {
$model_name=null;
} }
if($model_name) {	echo "<tr><td>"."Model"."</td><td>".$model_name."</td></tr>";} else { echo "<tr><td>"."Model"."</td><td>"."All Models"."</td></tr>";}
if ($min_price) { echo "<tr><td>Price from</td><td>".$min_price."</td></tr>"; } else { echo "<tr><td>"."Price from"."</td><td>"."All "."</td></tr>";}
if ($max_price) { echo "<tr><td>Price to</td><td>". $max_price."</td></tr>"; } else { echo "<tr><td>"."Price to"."</td><td>"."All "."</td></tr>";}
if ($min_cc) { echo "<tr><td>Engine from :</td><td> ".$min_cc."</td></tr>";} else { echo "<tr><td>"."Engine from :"."</td><td>"."All "."</td></tr>";}
if ($max_cc) { echo "<tr><td>Engine to :</td><td>".$max_cc."</td></tr>"; } else { echo "<tr><td>"."Engine to"."</td><td>"."All "."</td></tr>";}
if ($min_bhp) { echo "<tr><td>Power from</td><td>".$min_bhp."</td></tr>"; } else { echo "<tr><td>"."Power from"."</td><td>"."All "."</td></tr>";}
if($max_bhp) { echo "<tr><td>Power to</td><td>".$max_bhp."</td></tr>";} else { echo "<tr><td>"."Power to"."</td><td>"."All "."</td></tr>";}
if($min_km) {echo "<tr><td>Km frrom</td><td>".$min_km."</td></tr>"; } else { echo "<tr><td>"."Km frrom"."</td><td>"."All "."</td></tr>";}
if($max_km) {echo "<tr><td>Km to</td><td>".$max_km."</td></tr>" ; } else { echo "<tr><td>"."Km to"."</td><td>"."All "."</td></tr>";}
if($min_year) {echo "<tr><td>Year from</td><td>".$min_year."</td></tr>";} else { echo "<tr><td>"."Year from"."</td><td>"."All "."</td></tr>";}
if ($max_year) { echo"<tr><td>Year To</td><td>".$max_year."</td></tr>"; } else { echo "<tr><td>"."Year To"."</td><td>"."All "."</td></tr>";}
if($color){ echo"<tr><td>Color :</td><td>".$color."</td></tr>";}
echo "</table>";
echo "<br/><br/>";


$sql=bill($maker, $model, $min_price, $max_price, $min_cc, $max_cc, $min_bhp, $max_bhp, $min_km, $max_km, $min_year, $max_year, $color); ?>
<div id="sqlcheck">
<br/><span class="blue">Show Sql Query :</span><br/><input type="checkbox" id="checkbox" checked="true" onchange="checksql()"/>
<div id="query">
<?php echo "<span class=\"orange\">SQL :".$sql."</span>"; ?>
</div>
</div>
</center>
</div>
<div id="main_right">

<?php



echo "<table>";
//$a= iif($color,NULL, ""," WHERE `add_color` ='".$color."'");
//$sql="SELECT *
	//	FROM `adds` ".  $a;
//echo  "panos++++++".$sql."++++++++";
//say();

		$res= mysql_query($sql);
		$rez =mysql_query($sql);
		if($row=mysql_fetch_array($rez)==null)
		{
		echo "<center><span class=\"red\">No carz found meeting your criteria !!!</span>";
		echo"<br/> <br/><img src=\"../images/junkcar.jpg\"></center>";
		} else{ echo "<h3>Search results :</h3>";
		$row=0;

while($row=mysql_fetch_array($res))
{$code=$row[0];
echo "<tr><td class=\"searchimage\">";
	if (file_exists("../private/upload/add".$code.".png"))
	{
		echo "<a href=\"http://web2.teiser.gr/webservices/carz/public/searched.php?add=$row[0]\"> <img src=\"http://web2.teiser.gr/webservices/carz/private/upload/add".$code.".png\" alt=\"car image\" width=300px height=240px/> </a>";
	}else if (file_exists("../private/upload/add".$code.".jpg"))
	{
		echo "<a href=\"http://web2.teiser.gr/webservices/carz/public/searched.php?add=$row[0]\"> <img src=\"http://web2.teiser.gr/webservices/carz/private/upload/add".$code.".jpg\" alt=\"car image\" width=300px height=240px/> </a>";
	}else if (file_exists("../private/upload/add".$code.".gif"))
	{
	   echo "<a href=\"http://web2.teiser.gr/webservices/carz/public/searched.php?add=$row[0]\"> <img src=\"http://web2.teiser.gr/webservices/carz/private/upload/add".$code.".gif\" alt=\"car image\" width=300px height=240px/> </a>";
		//echo "<img src=\"http://web2.teiser.gr/webservices/carz/private/upload/add".$code.".jpg\" alt=\"car image\" width=300px height=240px/> <img src=\"http://web2.teiser.gr/webservices/carz/private/upload/add".$code.".gif\" alt=\"car image\" width=300px height=240px/> </a>";
	} else echo " <a href=\"http://web2.teiser.gr/webservices/carz/public/searched.php?add=$row[0]\"> <img src=\"http://web2.teiser.gr/webservices/carz/images/noimage.png\" alt=\"car image\" width=300px height=240px/> </a>";

//"add_code ".$row[0].
//"owner_code ".$row[1].
//"maker_code ".$row[2]."<br/>".
//"model_code ".$row[3].
$make_name=get_maker_name($row[2]);
$model_name=get_model_name($row[3]);
echo "</td>";
echo "<td class=\"searchlist\">".
"<b>".$make_name." ".$model_name."</b><br/>".
"<u>Price :</u>:".$row[4]."<br/> ".
"<u>Engine :</u>".$row[5]."<br/>".
"<u>Power :</u>".$row[6]."<br/>".
"<u>Km :</u>".$row[7]."<br/>".
"<u>Year :</u>".$row[8]."<br/>".
"<u>Color :</u>".$row[9];
if ($row[10]==0)
{ echo " <br/><u>Price NOT Debatable</u>"; }
 else { echo " <br/><u>Price&nbspDebatable</u>"; }
echo "</td></tr>";
echo "<tr height=5px><td</td><td></td></tr>";
}}
echo "<br>";
echo "</table>";
?></div>
</div>
<div id="footer"> Graduation project of  Tecnological Educational Institute of "Serres" Greece  &copy  <div id="mailme">
<a href="mailto:alekz.th@gmail.com" title="mail me" >mail me</a>
</div>
	</div>
	</body>
	</html>
