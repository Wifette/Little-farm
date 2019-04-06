<?php 

require_once ('core/common/connectionBase.php');
try{
$query = $connection->query("SELECT * FROM sexe"); //On sélectionne tous les champs de la table, ici sexe

$resultat = $query->fetchAll();

//Afficher le résultat dans un select (liste déroulante)
// si le nom de la page est : index.php
if(basename($_SERVER['PHP_SELF']) == "index.php")
{
print(" <label for=\"sexe\">Sexe</label><select id=\"sexe\" name=\"sexe\" class=\"form-control\">
<option selected></option>
");

foreach ($resultat as $key => $variable) //On indique tous les champs et on affiche le tableau avec une boucle foreach comme les aime papa
{
   
    print("<option>".$resultat[$key]['sexe']."</option>");
 
   
}

print("</select>");
}else{
//Sinon page de modification, on met le sexe de l'enregistrement selectionné

print(" <label for=\"sexe\">Sexe</label><select id=\"sexe\" name=\"sexe\" class=\"form-control\">
<option selected>".$_SESSION['sexe']."</option>
");

foreach ($resultat as $key => $variable) //On indique tous les champs et on affiche le tableau avec une boucle foreach comme les aime papa
{
   
    print("<option>".$resultat[$key]['sexe']."</option>");
 
   
}

print("</select>");

}
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
?>