<?php
$con=mysql_connect("localhost", "root","");
mysql_select_db("cws");

?>
<html>
<head><link href="../CSS/css.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="wrap">
		<div id="header"><h2>...wellcome</h2><h1>C.W.S.</h1>
									
					</div>
		<div id="header2"><ul>
					<li><a href="../index.php">Home</a></li>
					<li><a href="partners.php">Partners</a></li>
					<li><a href="join.php">Join in</a></li>
					<li><a href="../about/about.php">About</a></li>
				</ul> 
				
				</div>
			<div id="main">
				<h3>Partner List of CWS</h3>
				<span class="plist">
			<?php
			$sql="SELECT * FROM `partners`";
			$result=mysql_query($sql);
			while($row=mysql_fetch_array($result))
			{
			echo "<a href=\"".$row[0]."\">".$row[0]."</a><br/>";
			}
			
			?>		
			</span>
				</div>	
		
		<div id="footer">Graduation project of  Tecnological Educational Institute of "Serres" Greece  &copy   </div>
			</div>
	</div>
</body>
</html> 