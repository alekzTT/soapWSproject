<?php
require_once('../db/dbConn.php');
session_start();

if ($_POST)
{
	$user=$_POST["user"];
	$pass=$_POST["pass"];

	//TODO change this to DB.
	if($user=="admin" and $pass=="252")
	{
	$_SESSION["user"]="admincarz";
	header("Location:admin.php");
	}
	$sql="SELECT * FROM `adds` WHERE `owner_code` = '$user' AND `add_code` = $pass";
	$result=mysql_query($sql);
	if($result!=null)
	{
		while($row=mysql_fetch_array($result))
		{

			$_SESSION["owner"]=$row["owner_code"];
			$_SESSION["add"]=$row["add_code"];
			header("Location:owners.php");
			echo $row["add_code"];
			echo $row["owner_code"];
		}
	}
}

?>
<html>
<head>
	<link href="../css.css" rel="stylesheet" type="text/css" /></head>
<body>

<div id="loginphp">
	<form action="login.php" method="post" class="loginform">
		<h1>Login</h1>
		<p>User (owner code)</p>
		<input type="text" name="user" id="user" value="admin">
		<p>Pass (classifield code)</p>
		<input type="text" name="pass" id="pass" value="252"><br/><br/><br/>
		<input type="image" name="myclicker" src="../images/button1.jpg" style="width:120px;"  >

	</form>
	<form action="../index.php">
		<input type="image" name="myclicker" src="../images/button2.jpg" style="width:120px;"  >
	</form>
</div>


</body></html>
