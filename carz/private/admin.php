<?php
session_start();
if (isset($_SESSION["user"]))
{

?>
<html>
<head>
<link href="../css.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="wrap">
		<div id="header">
			<h2>...Administration Area</h2></div>
			<div id="header2">
				<div id="mainmenu">
					<ul>
						<li><a href="logout.php">Logout</a></li>
						<li><a href="db2xml.php">XML Publish</a></li>
					</ul>
				</div>
			</div>
			<h3>In order to publish the data export database!!!</h3>
			<p>data will be published for cws search engine</p>
			<div id="footer"> Graduation project of  Tecnological Educational Institute of "Serres" Greece  &copy   <div id="mailme">
				<a href="mailto:alekz.th@gmail.com" title="mail me" >mail me</a>
			</div>
		</div>
	</div>
</body>
</html>
<?php } else { header("Location:login.php"); } ?>
