<?php
session_start();
require_once ('../common/connectionBase.php');

$id = $_GET['id'];

try {
$sql = $connection->prepare("DELETE FROM `volailles` WHERE `volailles`.`id_volaille`=:id;");
$sql->bindParam(':id', $id);
$sql->execute();


    $message = "Enregistrement supprimé avec succés";
    $_SESSION['message'] = $message;

    require_once ('../common/redirection.php');
    redirection('accueil');
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}