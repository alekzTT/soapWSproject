<?php
require_once('../db/dbConn.php');
?>
<html>
	<head><link href="../css.css" rel="stylesheet" type="text/css" /></head>
<body>
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
	<div id=main>
	<div id="main_left"><?php
	//echo "The Classifield has code";
	$code=$_GET["add"];
	//echo $code."<br/>";
	?>
	<?php

	echo "<div id=\"noimage\">";
	if (file_exists("../private/upload/add".$code.".png"))
	{
		echo "<img src=\"http://web2.teiser.gr/webservices/carz/private/upload/add".$code.".png\" alt=\"car image\" width=280px height=220px />";
	}else if (file_exists("../private/upload/add".$code.".jpg"))
	{
		echo "<img src=\"http://web2.teiser.gr/webservices/carz/private/upload/add".$code.".jpg\" alt=\"car image\" width=280px height=220px />";
	}else if (file_exists("../private/upload/add".$code.".gif"))
	{
		echo "<img src=\"http://web2.teiser.gr/webservices/carz/private/upload/add".$code.".gif\" alt=\"car image\" width=280px height=220px />";
	}
	echo "</div>";
			?>

		</div>
	<div id="main_right"></div>
	<?php

	$sql="SELECT *
		FROM `adds`
		WHERE add_code = $code";
	$row=0;
		$res= mysql_query($sql);
while($row=mysql_fetch_array($res))
{	$own_code=$row[1];
	$maker_code=$row[2];
	$model_code=$row[3];
	$add_code=$row[0];

$sqlmak="SELECT `maker_name` FROM `makers` WHERE `maker_code`='$maker_code'";
$sqlmod="SELECT `model_name` FROM `models` WHERE `model_code`='$model_code'";
$resmak=mysql_query($sqlmak);
$resmod=mysql_query($sqlmod);
while ($rowmak=mysql_fetch_array($resmak))
{
$maker_name=$rowmak["maker_name"];
}
while ($rowmod=mysql_fetch_array($resmod))
{
$model_name=$rowmod[0];
}
echo "<fieldset><legend>Characteristics</legend><table>".
"<tr><td>Maker :"."</td><td>".$maker_name."</td></tr>".
"<tr><td>Model :"."</td><td>".$model_name."</td></tr>
<tr><td>Engine Size :"."</td><td>".$row[5]."</td></tr>
<tr><td>"."Horse Power :"."</td><td>".$row[6]."</td></tr>".
"<tr><td>"."Killometers :"."</td><td>".$row[7]."</td></tr>".
"<tr><td>"."First Year of Circulation"."</td><td>".$row[8]."</td></tr>".
"<tr><td>"."Color"."</td><td>".$row[9]."</td></tr>";
$debatable=$row[10];
if($debatable==1)
{echo "<tr><td>Price Debatable</td></tr>";}
echo "</table>";
}
echo "</fieldset>";



echo "<fieldset><legend>Communication Information</legend>";
$sql="SELECT *
		FROM `owners`
		WHERE owner_code= '$own_code'";
		$res= mysql_query($sql);
while($row=mysql_fetch_array($res))
{
//echo "Owner's Code :".$row[0]."<br/>";
echo "Name :".$row[1]."<br/>";
echo "Phone :".$row[2]."<br/>";
echo "mail :".$row[3]."<br/>";
}

echo "</fieldset>";
	?>
	<br/>
	</div>

<div id="footer"> Graduation project of  Tecnological Educational Institute of "Serres" Greece  &copy  <div id="mailme">
<a href="mailto:alekz.th@gmail.com" title="mail me" >mail me</a>
</div>
	</div></div>
</body>
</html>
