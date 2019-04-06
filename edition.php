<?php session_start(); ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="js/lib/jquery-3.3.1.js"></script>
    <script src="js/appelAjax.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <title>My little farm</title>
    <link rel="icon" href="img/chicken.png" />
</head>
<body class="bg-danger opa">


<header class="container-fluid">

    <div class="row">

        <div class="container text-warning bg-danger opa pt-4 pb-2">

            <div class="row justify-content-center">

                <div class="col-12"><h1 class="text-center"><span class="coq">l</span> My little farm <span class="poule">h</span></h1></div>

                <ul class="nav ">
                    <li class="nav-item active ">
                        <a class="nav-link text-white font-weight-bold" href="index.php">HOME<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white font-weight-bold" href="#">PHOTOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white font-weight-bold" href="#">CONTACT</a>

                </ul>

            </div>

        </div><!--container-->
    </div>
</header>




    <?php

require_once ('core/common/connectionBase.php');

$id=$_GET['id'];


$stmt = $connection->prepare("SELECT * FROM `volailles` WHERE `volailles`.`id_volaille` = :id ;");
$stmt->bindParam(':id', $id);
$stmt->execute();
$resultat = $stmt->fetchall();

foreach ($resultat as $item) {
$nom=$item['nom_volaille'];
$age=$item['age'];
$sexe=$item['sexe'];
$couleur=$item['couleur'];
$espece=$item['espece'];
$id=$item['id_volaille'];
}

$_SESSION['espece'] = $espece;
$_SESSION['sexe'] = $sexe;
?>

<section class="container bg-warning">
<form class="row justify-content-center text-white py-5" action="core/api/modifier.php" method="POST">
    <input type="hidden" name="id" value="<?=$id?>">
    <div class="col-12">

        <div class="row">

            <div class="form-group col-md-3"></div>

            <div class="form-group col-md-6">
                <div class="row">
                    <div class="form-group col-md-4">
    <label for="nom">Nom</label>
    <input type="text" class="form-control" name="nom" id="nom" value="<?=$nom?>">
                    </div>

                    <div class="form-group col-md-4">
    <label for="age">Age</label>
    <input type="number" min="0" max="10" class="form-control" name="age" id="age" value="<?=$age?>">
                    </div>

                    <div class="form-group col-md-4">
                    <?php require ('core/api/sexe.php'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
    <label for="couleur">Couleur</label>
    <input type="text" class="form-control" name="couleur" id="couleur" value="<?=$couleur?>">
                    </div>

                   

                    <div class="form-group col-md-6">
                    <?php require ('core/api/espece.php'); ?>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-3"></div>

        </div>
        <div class="row">

            <div class="form-group col-md-3"></div>

            <div class="form-group col-md-6 d-flex justify-content-end">
<!--    <label for="image">Image:</label>
    <input type="file" name="image" id="image">-->
    <input type="submit" class="btn btn-danger w-100 rounded-0" value="Modifier">
            </div>

            <div class="form-group col-md-3"></div>

        </div>



    </div>
</form>
</section>

<footer class="container-fluid bg-success ">
    <div class="row">
        <div class="container bg-danger text-white opa">
            <div class="row">
                <div class="col">
                <p class="text-center py-5 font-weight-bold">Site Demo - La fermière®</p>
                </div>
            </div>
        </div>
    </div>
    
</footer>
</body>
</html>