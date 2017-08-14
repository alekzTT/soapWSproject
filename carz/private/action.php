<?php
require_once('../db/dbConn.php');

session_start();
if (isset($_SESSION["owner"]))
{
$owner=$_SESSION["owner"];
$addc=$_SESSION["add"];
} else {
header("Location:login.php");
}
?>
<html>
		<head>
			<link href="../css.css" rel="stylesheet" type="text/css" />
</head>
	<body>
		<div id="wrap">
							<div id="header">
	<h2>...free used cars classifieds</h2></div>
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
  <?php
  if($_POST){
  $action=$_POST["action"];
  echo "<h3>Chosen  Action :<br/><br/><u>".$action."</u></h3>";
  }
  ?>
	  </div>
	<div id="main_right">
			<?php /* ======================================================================================== */

if($_POST)
{
if ($_POST["action"]=="delete")
{
echo "<h4>Repeat your code and the code of the classidield tha expired to confirm delete</h4>";
?>
<form action="delete.php" method="post">
<input type="text" name="own_code" class="sub" >own
<input type="text" name="add_code"class="sub">add
<input type="submit"  value="Delete" class="sub">
</form>
<?php
}
else
if ($_POST["action"]=="iminput")
{
echo "<h3>Image size should be otpimized for web at 280px width and 220px height @ 72dpi</h3>";
?>
<form action="uploadfile.php" method="post" enctype="multipart/form-data">

<label for="file">Filename :</label>
<input type="file" name="file" id="file" width="800" class="sub"/>
<input type="submit" name="submit" type ="submit" class="sub" value="upload" />
</form>
<?php } }

if (isset($_SESSION["msg"]))
{
echo "<h2>".$_SESSION["msg"]."</h2>";
session_destroy();
}

?>
				</div>
			</div>
				<div id="footer"> Graduation project of  Tecnological Educational Institute of "Serres" Greece  &copy   <div id="mailme">
				<a href="mailto:alekz.th@gmail.com" title="mail me" >mail me</a>
				</div>
				</div>
		</div>
	</body>
</html>
