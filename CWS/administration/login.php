<?php
session_start();
if ($_POST)
{
$_SESSION["user"]=$_POST["user"];
$_SESSION["pass"]=$_POST["pass"];
}
if(isset($_SESSION["user"]))
{
if ($_SESSION["user"] == "admin" && $_SESSION["pass"]="252")
{
header("Location:admin.php");
}
}
?>
<html>
<head><link href="../CSS/css.css" rel="stylesheet" type="text/css" /></head>
<body>
<br/><br/><br/><br/><center>
<br/>
<div id="loginform">


	<form action="login.php" method="post">
			username<br/><input type="text" name="user" id="user"><br/>
			pass<br/><input type="password" name="pass" id="pass"><br/><br/>
			<input type="submit" value="enter">


	</form>
</div>
<br/></center>
</body></html>