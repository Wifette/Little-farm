<?php 

require_once ('core/common/connectionBase.php');
try {
$query = $connection->query("SELECT * FROM especes"); //On sélectionne tous les champs de la table, ici especes

$resultat = $query->fetchAll();

//Afficher le résultat dans un select (liste déroulante)
// si le nom de la page est : index.php
if(basename($_SERVER['PHP_SELF']) == "index.php")
{
    //on ne met rien dans le select
    print(" <label for=\"espece\">Espèces</label><select id=\"espece\" name=\"espece\" class=\"form-control\">
<option selected></option>
");

foreach ($resultat as $key => $variable) //On indique tous les champs et on affiche le tableau avec une boucle foreach comme les aime papa
{
   
    print("<option>".$resultat[$key]['especes']."</option>");
 
   
}

print("</select>");
}

else
{
    //Sinon page de modification, on met l'espece de l'enregistrement selectionné
    print(" <label for=\"espece\">Espèces</label><select id=\"espece\" name=\"espece\" class=\"form-control\">
    <option selected>".$_SESSION['espece']."</option>
    ");
    
    foreach ($resultat as $key => $variable) //On indique tous les champs et on affiche le tableau avec une boucle foreach comme les aime papa
    {
       
        print("<option>".$resultat[$key]['especes']."</option>");
     
       
    }
    
    print("</select>");
}

}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }


?>