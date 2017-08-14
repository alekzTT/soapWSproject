<?php
include ('../functions/functions.php');
$con=mysql_connect("localhost", "root", "");
mysql_select_db("cws");

if(!empty($_GET["d"]))
{
$des=$_GET["d"];
$sql="SELECT * FROM `cws`.`products` WHERE `description` LIKE '%$des%' ORDER BY `price`";
$result=mysql_query($sql);
$resultcheck=mysql_query($sql);
$carnum=mysql_num_rows($resultcheck);
} else {
if(!empty($_GET["maker"])) {$maker=$_GET["maker"];
//$maker=$_GET["maker"];
$sequel="SELECT * FROM `makers` WHERE `maker_code` = '$maker'";
$rezult=mysql_query($sequel);
while ($rowz=mysql_fetch_array($rezult))
{
$maker_name=$rowz[1];
} } else $maker_name="";


if(!empty($_GET["model"])) $model=$_GET["model"]; else $model="";
if(!empty($_GET["min_pr"]))  $min_price=$_GET["min_pr"]; else $min_price="";
if(!empty($_GET["max_pr"])) $max_price=$_GET["max_pr"]; else $max_price="" ;
if(!empty($_GET["min_eng"])) $min_cc=$_GET["min_eng"]; else $min_cc="";
if(!empty($_GET["max_eng"])) $max_cc=$_GET["max_eng"]; else $max_cc="";
if(!empty($_GET["min_power"])) $min_bhp=$_GET["min_power"]; else $min_bhp="" ;
if(!empty($_GET["max_power"])) $max_bhp=$_GET["max_power"]; else $max_bhp="";
if(!empty($_GET["min_km"])) $min_km=$_GET["min_km"]; else $min_km="";
if(!empty($_GET["max_km"])) $max_km=$_GET["max_km"]; else $max_km="";
if(!empty($_GET["min_year"])) $min_year=$_GET["min_year"]; else $min_year="";
if(!empty($_GET["max_year"])) $max_year=$_GET["max_year"]; else $max_year="";
if(!empty($_GET["color"])) $color=$_GET["color"]; else $color="";
//============kauorizoume thn posothta ton apotelesmaton=========================
$start=0;
$end=100;
//========================================================================
$sql=dynamic_sql($maker_name, $model, $min_price, $max_price, $min_cc, $max_cc, $min_bhp, $max_bhp, $min_km, $max_km, $min_year, $max_year, $color, $start, $end);
$result=mysql_query($sql);
$carnum=mysql_num_rows($result); // Edo einai ta total results

$resultcheck=mysql_query($sql);
}

?>
<html>
<head>
<link href="../CSS/css.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery.js"></script>
 <script> $(document).ready(function() {
 $("tr:even").css("background-color", "#d3d3d3");
$("tr:odd").css("background-color", "white"); 
 
 });
 </script>
</head>
<body>
	<div id="wrap">
		<div id="header"><h2>...Car Web Services</h2><h1>C.W.S.</h1>
									
					</div>
					
		<div id="header2"><ul>
						<li><a href="../index.php">Home</a></li>
						<li><a href="search.php">Search</a></li>
						<li><a href="hsearch.php">Jquery Search</a></li>
				</ul>
		</div> 
			<div id="main">
					
					<div id="searchfield">
                        <form action="search.php" method="get">
						<input type="text" name="d" id="thesearchbox">
						<input type="submit" name="submit" id="thesearchbutton">
						</form>
                     </div>
				<br/>
					 <?php echo "<center><h3>Total resuls = ".$carnum."</h3></center>"; ?>
					 <div id="results">
					
					 <?php		   
echo "<center><table>";					echo "<tr><th>image</th><th>maker</th><th>model</th><th>price</th><th>engine</th><th>power</th><th>km runned</th><th>year</th><th>color</th></tr>";	 
					  if (($rowcheck=mysql_fetch_array($resultcheck)) == null)
							{ 
							//echo "<div class=\"row\">";
							echo "no cars found meeting your search options";
							//echo "</div>";
							} 
						while ($row=mysql_fetch_array($result))
						{ 
							//echo "<div class=\"row\">";
							if($row[12]== null)
							{
							echo"<tr><td><img  src=\"../images/nocar.png\" width=80px height=60px/></td>"; 
							} else {
							echo"<tr><td><a href=\"".$row[2]."\"><img  src=\"$row[12]\" width=80px height=60px/></a></td>"; 
							}
							echo "<td>"."".$row[3].""."</td><td>".$row[4]."</td><td>".$row[5]." euro</td><td>".$row[6]." cc </td><td>".$row[7]." hp </td><td>".$row[8]." km </td><td>".$row[9]."</td><td>".$row[10]."</td></tr>";
							//echo "</div>";
							} echo "</table><br/></center>";
						
					 ?>
					 </div>
				</div>	
		
		<div id="footer">Graduation project of  Tecnological Educational Institute of "Serres" Greece  &copy   </div>
			</div>
	</div>
</body>
</html> 