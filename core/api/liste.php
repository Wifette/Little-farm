<?php
require_once('../common/connectionBase.php');



$stmt = $connection->prepare("SELECT * FROM `volailles`");
$stmt->execute();
$resultat = $stmt->fetchall();

$json = json_encode($resultat);

echo $json;




