<?php
session_start();
if (isset($_SESSION["user"]))
{
$con=mysql_connect("localhost", "root","");
mysql_select_db("cws");
$rem="DELETE FROM `cws`.`products`";
					$removed=mysql_query($rem);
$sql="SELECT * FROM `cws`.`partners`";
$result=mysql_query($sql);
?>
<html>
<head><link href="../CSS/css.css" rel="stylesheet" type="text/css" /></head>
<body>
	<div id="wrap">
		<div id="header">C. W. S.</div>
		<div id="header2"><ul>
					<li><a href="admin.php">Admin</a></li>
				</ul></div>
			<div id="main">
				<div id="mainleft">
				Partner List:</p>
				<?php
				echo "<table class=\"partners\">";
				echo "<tr><th><u><b>Company</b></u></th><th><u><b>Country</b></u></th><th align=right><u><b>domain</b></u></th></tr>";
				while ($row1=mysql_fetch_array($result))
				{
				echo"<tr><td>". $row1[2]."</td><td align=right>".$row1[3]."</td><td align=right><a href=\"".$row1[0]."\">".$row1[0]."</a></td></tr>";
				}
				echo "</table>";
				
				?>
				</div>
				<div id="mainright">
				<?php
				$result=mysql_query($sql);
				while ($row=mysql_fetch_array($result))
				{
					echo "<h3>xml_url= ".$row[1]."</h3>";
					if($cars=simplexml_load_file($row[1]))
					{
					foreach ($cars as $car)
					{
					$code=$car->add_code;
					$url=$car->url;
					$maker=$car->maker;
					$model=$car->model;		
					$price=$car->price;
					$cc=$car->cc;
					$bhp=$car->bhp;
					$km=$car->km;
					$year=$car->year;
					$color=$car->color;
					$descr=$car->description;
					$imgurl=$car->imgurl;
				
					echo "<br/>".$code." ".$url." ".$descr;
					
					$sql="INSERT INTO  `cws`.`products` (
`u_id` ,
`prod_id` ,
`prod_url` ,
`maker` ,
`model` ,
`price` ,
`engine` ,
`power` ,
`km_hist` ,
`bought` ,
`color` ,
`description`,
`imgurl`
)
VALUES (
NULL ,  '$code',  '$url',  '$maker',  '$model',  '$price',  '$cc',  '$bhp',  '$km',  '$year',  '$color',  '$descr', '$imgurl'
);";


						
						$res=mysql_query($sql);
						if($res==1)
						{
						echo "<span class=\"new\"> <b>ENTRY</b></span>";
						}
					}
				} 
				else { echo"<span class=\"error\">	Error problem encountered with :".$row[1]."<br/>
				
				Please Contact Site owner</span>";} } 
				?>				
				</div>	
			</div>
		<div id="footer">Graduation project of  Tecnological Educational Institute of "Serres" Greece  &copy </div>
	</div>
</body>
</html> 
<?php
} else { header("Location:login.php"); }

?>