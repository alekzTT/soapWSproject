<?PHP
if(!$_GET)
{
header('Location:add.php');
}
require_once('../db/dbConn.php');
//==========getValues=======================
//car 9 values===============================
//mkaer code===================================
$maker=$_GET["code"];
/* echo "maker".$maker; */
$sql="SELECT * FROM `carz_db`.`makers` WHERE maker_name = '$maker'";
$result=mysql_query($sql);
if ($result) {
while ($row=mysql_fetch_array($result))
{
$maker_code=$row[0];
} }
/*echo "maker code".$maker_code; */
//==========================================
$model=$_GET["model"];
//============Model Name====================
$query="SELECT model_name FROM models WHERE model_code=$model";
	$res=mysql_query($query);
	while ($row=mysql_fetch_array($res))
	{ $model_name=$row[0]; }
//=========================================
$price=$_GET["price"];
$cc=$_GET["engine"];
$bhp=$_GET["power"];
$km=$_GET["mileage"];
$year=$_GET["regiyear"];
$color=$_GET["color"];
//=====================Price Debatable=================================
	if(!$_GET["debatable"])
		{ 	$debatable=FALSE;}
	else
		{	$debatable=TRUE;	}
//==================================================================
$owner=$_GET["own_code"].$_GET["own_mail"];
$name=$_GET["own_name"];
$mail=$_GET["own_mail"];
$phone=$_GET["own_phone"];

//$addurl="http://localhost/coolcars/public/searched.php?add=";
//==================================================================
?>

<?php
//=====================Database Insertion=========================================
//=====================Insert To Adds=========================================
$sql="INSERT INTO `carz_db`.`adds` (
`add_code` ,
`owner_code` ,
`maker_code` ,
`model_code` ,
`price` ,
`cc` ,
`bhp` ,
`km` ,
`add_year` ,
`add_color` ,
`price_debatable`
)
VALUES (
NULL ,'$owner', '$maker_code', '$model', '$price', '$cc', '$bhp', '$km', '$year', '$color', '$debatable'
);";
$result=mysql_query($sql);
//==============connection refresh============================
//mysql_close($con);
require_once('../db/dbConn.php');
//===========owners insert==============================
$sql2="INSERT INTO `carz_db`.`owners` (
`owner_code`,
`owner_name`,
`owner_phone`,
`owner_email`
)
VALUES (
'$owner', '$name', '$phone', '$mail'
);";
$result2=mysql_query($sql2);
//=============================================================================
?>

			<html>
			<head>
			<link href="../css.css" rel="stylesheet" type="text/css" />
			</head>
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
			<div id="main">

			<?php

				if ($result AND $result2)
			{
			echo "<div id=\"main_left\">";
			echo "<h3>Your Classifield was registered.</h3><br/>";
			echo "<img src=\"../images/ok.png\" widht=250  height=250>";
			echo "</div>";
			echo "<div id=\"main_right\"><fieldset><legend>Registered Data:</legend>";
									echo "<table><tr><td><h4>Field</h4></td><td align=\"right\"><h4>Value</h4></td></tr>";
									echo "<tr><td>"."Maker"."</td><td align=\"right\">".$maker."</td ></tr>";echo "<tr><td>";
									echo "Model"."</td><td align=\"right\">".$model_name."</td></tr>";echo "<tr><td>";
									echo "Price"."</td><td align=\"right\">".$price."</td></tr>";echo "<tr><td>";
									echo "Engine"."</td><td align=\"right\">".$cc."</td></tr>";echo "<tr><td>";
									echo "H.Power"."</td><td align=\"right\">".$bhp."</td></tr>";echo "<tr><td>";
									echo "Kilometers"."</td><td align=\"right\">".$km."</td></tr>";echo "<tr><td>";
									echo  "Year"."</td><td align=\"right\">".$year."</td></tr>";echo "<tr><td>";
									echo "Color"."</td><td align=\"right\">".$color."</td></tr>";
									echo "<tr><td>Debatable</td><td align=\"right\">".$debatable."</td></tr>";
									echo "<tr><td><h4>Owners data</h4></td><td align=\"right\"><h4></h4></td></tr>";
									echo "<tr><td>Owner Code</td><td align=\"right\">".$owner."</td></tr>";
									$sql3="SELECT `add_code` FROM `adds` WHERE `adds`.`owner_code`='$owner'";
									// ===  echo $sql3;
									$result3=mysql_query($sql3);
									while($row3=mysql_fetch_array($result3))
									{
									echo "<tr><td>Classifield Code</td><td align=\"right\">".$row3[0]."</td></tr>";
									}
									echo "</td></tr></table>";
		echo "</fieldset></div>";
		$_GET[]=null;
		} else {
		echo"<center>";
		echo "<h3>Error:Your Add Was Not Registered</h3>";
		if ($result)
		{echo "owner's data indsertion failed";} else if ($result2) {echo "Classifield data insertion failed"; } else echo "Invalid Owner & classifieds Data. Insertion Failed";
		echo "<br/><br/><img src=\"../images/rror.png\" width=150 height=150>";
		echo "</center>";


		}
			?>

			</div>
				<div id="footer">Graduation project of  Tecnological Educational Institute of "Serres" Greece  &copy  <div id="mailme">
				<a href="mailto:alekz.th@gmail.com" title="mail me" >mail me</a>
				</div>
				</div></div>
				</body>
				</html>
