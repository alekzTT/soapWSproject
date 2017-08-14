<?php 
session_start();
if (isset($_SESSION["owner"]))
{
$owner1=$_SESSION["owner"];
$add1=$_SESSION["add"];
} else { echo "h1";
header("Location:login.php");
}
require_once('../db/dbConn.php');
$add2=$_POST["add_code"];

$owner2=$_POST["own_code"];
if ($owner1 == $owner2 and $add1==$add2)
{
$sql="DELETE FROM `adds` WHERE `add_code`=$add1";
$result=mysql_query($sql);
$sql2="DELETE FROM `owners` WHERE `owner_code`=$owner1";
$result2=mysql_query($sql2);
$_SESSION["msg"]="Your Account as an owner and you classifield was Deleted";
header('Location: action.php');
}
else {
$_SESSION["msg"]="Could not confirm user name and pass to delete";
header('Location: action.php');
}
?>