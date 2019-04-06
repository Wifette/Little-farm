<?php
require_once ('../common/connectionBase.php');


$nom=$_POST['nom'];
$age = $_POST['age'];
$sexe = $_POST['sexe'];
$couleur = $_POST['couleur'];
$espece = $_POST['espece'];

try {
    
    $sql = $connection->prepare("INSERT INTO `volailles` (`nom_volaille`, `age`, `couleur`, `sexe`, `espece`) VALUES (:nom, :age, :couleur, :sexe, :espece);");
    
    $sql->bindParam(':nom', $nom);
    $sql->bindParam(':age', $age);
    $sql->bindParam(':couleur', $couleur);
    $sql->bindParam(':sexe', $sexe);
    $sql->bindParam(':espece', $espece);
    $sql->execute();
        
        $message = "Enregistrement ajouté avec succés";
        $_SESSION['message'] = $message;

        require_once ('../common/redirection.php');
        redirection('accueil'); 
       
            }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }
        
        ?>


