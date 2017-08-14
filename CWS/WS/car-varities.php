<?php
$dsn = "mysql:host=localhost;dbname=cws";
$username = "root";
$password = "";

$pdo = new PDO($dsn, $username, $password);
$rows = array();
if(isset($_GET['maker'])) {
    $stmt = $pdo->prepare("SELECT `model_name` FROM models WHERE maker_code = ? ORDER BY model_name");
   $stmt->execute(array($_GET['maker']));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
}


$jsonString = json_encode($rows);
	
	header('Content-type: application/json');
	header("Content-Disposition: inline; filename=car-varities.json");
	echo $jsonString;


?>