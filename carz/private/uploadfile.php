<center>
<?php
session_start();
if (isset($_SESSION["owner"]))
{
$owner=$_SESSION["owner"];
$addc=$_SESSION["add"];
} else {
header("Location:login.php");
}
if ( ($_FILES["file"]["type"] == "image/gif") ||  ($_FILES["file"]["type"] == "image/png") ||
	($_FILES["file"]["type"] == "image/jpeg") &&
	($_FILES["file"]["size"]  <= 2000000) )
{
if ($_FILES["file"]["error"] > 0)
{
echo "Error: ".$_FILES["file"]["error"]."<br/>";
}
else
{
		if($_FILES["file"]["type"] == "image/jpeg")
		{
			$type=".jpg";
		} else if ($_FILES["file"]["type"] == "image/gif")
		{
			$type=".gif";	
		} else 
		{
			$type=".png";
		}
$imgname="add".$addc.$type;
$_FILES["file"]["name"]=$imgname;
echo "Add :".$imgname."<br/>";
echo "Upload: ".$_FILES["file"]["name"]."<br/>";

echo "Type: ".$_FILES["file"]["type"]."<br/>";
echo "Size:".$_FILES["file"]["size"]."Byte <br/>";
echo "Temp File :".$_FILES["file"]["tmp_name"]. "<br/>";

	if (file_exists("upload/" . $_FILES["file"]["name"]))
	{
		echo $_FILES["file"]["name"] . " already exists. ";
	}
	else
	{
	move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" .$_FILES["file"]["name"]);
	echo "Stored In : " ."upload/" . $_FILES["file"]["name"];
	//============================================
require_once('../db/dbConn.php');
$imgurl="http://web2.teiser.gr/webservices/carz/private/upload/" . $_FILES["file"]["name"];
echo "<br/> Path ".$imgurl;
mysql_query("UPDATE adds SET imgurl= '$imgurl'
WHERE add_code = $addc");

//TODO: Replace mySqlClose
mysql_close($con);
	
	//============================================
	echo "<html><body><br/>";
	echo "<img src=\"upload/".$imgname."\"\>";
	session_destroy();
	?>
	
	<form action="../index.html">
		<input type="image" name="myclicker" src="../images/button2.jpg" style="width:120px;"  > 
	</form>
  
  <?php
	echo "</body></html>";
}

}
} else 
{
echo "Invalid File : Only jpg or gifs or png< 20000 bytes - size";
}  
?>
</center>