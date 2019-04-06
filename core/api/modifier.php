<?php
session_start();
require_once ('../common/connectionBase.php');

    $nom= $_POST['nom'];
    $age=$_POST['age'];
    $sexe = $_POST['sexe'];
    $couleur = $_POST['couleur'];
    $espece = $_POST['espece'];
    $id = $_POST['id'];
try {
    
    $sql = $connection->prepare("UPDATE `volailles` SET `nom_volaille` = :nom, `age` = :age, `sexe` = :sexe, `couleur` = :couleur, `espece` = :espece WHERE `volailles`.`id_volaille` = '$id';");
    
    $sql->bindParam(':nom', $nom);
    $sql->bindParam(':age', $age);
    $sql->bindParam(':couleur', $couleur);
    $sql->bindParam(':sexe', $sexe);
    $sql->bindParam(':espece', $espece);
    $sql->execute();
        
        $message = "Enregistrement modifié avec succés";
        $_SESSION['message'] = $message;

        require_once ('../common/redirection.php');
        redirection('accueil'); 
       
            }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }
        
        ?>

    

