<?php

require_once('../db/dbConn.php');
session_start();

if (isset($_SESSION["owner"]))
{
$owner=$_SESSION["owner"];
$addc=$_SESSION["add"];
} else {
header("Location:login.php");
}?><html>
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
									<li><a href="logout.php">Logout</a></li>
									</ul>
									</div> 
								</div>
								<div id="headerimg"></div>
						<div id="main">
<div id="main_left">
					<h3>Classifield Data </h3><br/>
  				<?php $query="SELECT * FROM adds WHERE add_code = $addc" ;
						$result=mysql_query($query);
						if(!mysql_num_rows ($result))
						{
						  echo "No classifield selected<br/>";
						  echo "Check your data and try again";
						}
						while ($row=mysql_fetch_array($result))
						{
							echo "<br/>Owner's Code :<b>" .$owner. "</b><br/>Classifield code :<b>".$addc."</b><br/>";
						}?></div>
	<div id="main_right">
	<h3>Choose Action</h3><br/>
				 <form action="action.php" method="post">
									<table border="1"> <tr><td><b>To do </b></td><td align="center"><b>Choice</b></td></tr>	
												<tr><td>Delete Classifield</td><td>
												<input type="radio" name="action" value="delete" checked="on" />

												</td></tr>
												<tr><td>Image Upload</td><td>
												<input type="radio" name="action" value="iminput" />
												</td></tr>
												<tr><td colspan="2" align="center">
												<input type="submit" name="submit" value="Choose Action"></td></tr>
									</table>
									</form>
				</div>
			</div>
				<div id="footer"> Graduation project of  Tecnological Educational Institute of "Serres" Greece  &copy  <div id="mailme">
				<a href="mailto:alekz.th@gmail.com" title="mail me" >mail me</a>
				</div>
				</div>
		</div>
	</body>
</html>