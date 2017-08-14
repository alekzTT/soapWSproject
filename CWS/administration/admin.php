<?php
session_start();
if (isset($_SESSION))
{
	if($_SESSION["user"]=="admin")
	{
		


?>
<html>
<head><link href="../CSS/css.css" rel="stylesheet" type="text/css" /></head>
<body>
	<div id="wrap">
		<div id="header">C.W.S.</div>
		<div id="header2"><ul>
					<li><a href="xml2db.php">Update XML DB </a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul></div>
			<div id="main">
			
				<div id="mainleft">
				
				</div>
				<div id="mainright">
					
				</div>
				
				
			</div>
		<div id="footer">Graduation project of  Tecnological Educational Institute of "Serres" Greece  &copy </div>
	</div>
</body>
</html> 
<?php
} else { header("Location:login.php");}   
}


?>