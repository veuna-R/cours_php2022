<?php 
require_once('../inc/functions.php');

// si une langue est passée dans l'URL (L'inernaute a cliqué sur un lien), on everra cette langue dans le cookie.
if(isset($_GET['langue'])){
    $langue =($_GET['langue']);
}elseif(isset($_COOKIE['langue'])){ // inon si on a reçu un cookie appelé langue, on a la valeur du site qui prendra la valeur de la langue.
    $langue = $_COOKIE['langue'];
}else { // sinon par défaut.
    $langue = 'fr';
}
// Envoie du cooke avec l'info sur la langue à l'intérieur.

$expiration = time() + 365*24*60*60; // va nous donner la date actuelle exprimée en secondes.
// time nous donne la date du jour depuis le début de UNIX (1970), date exprimée en secondes.
setcookie('langue', $langue, $expiration); // fonction qui fabriue le cookie, ce cookie est appelé langue avec la valeur de $langue et al valeur de $expiration.

//Il n'existe pas de fonction prédéfinie qui permette de supprimer un cookie. Pour rendre un cookie invalide, on utilise 'setcookie' avec le nom concerné et en mettant la date d'expiration à zero ou antérieur à la date actuelle.
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bad+Script&display=swap" rel="stylesheet">

    <title>Cours_php7 - $_COOKIE</title>
    <!-- Mes styles -->
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <div class="row">
        <!-- JUMBOTRON -->
        <div class="jumbotron bg-secondary text-center">
            <h1 class="display-3 pt-3">Cours_php7 - Cookies</h1>
            <hr>
            <p class="lead pb-3">La superglobale $_COOKIE: un cookie est un petit fichier de 4ko maxi déposé par le serveur web sur le poste de l'internaute et qui contient des informations.</p>
        </div>
        <div class="row">
            <!-- LA ROW PRINCIPALE -->

            <?php
            require('../inc/sidenav.inc.php');
            ?>

            <!-- ========================================================= -->
            <!-- Contenu principal -->
            <!-- ========================================================= -->
            <div class="col-sm-8">
                <main class="container-fluid">
                    <div class="row">
                        <hr>
                        <h2 class="col-sm-12 text-center" id="definition"><u>1. Introduction</u></h2>
                        <div class="col-sm-12">
                            <p>Les cookies sont automatiquement renvoyés au serveur web par le navigateur. Lorsque l'internaute navigue dans le pages concernées par le ou les cookies, PHP permet de récupérer très facilement les données contenues dnas un cookie. Non seulement on peut le fabriquer mais on per aussi le récupérer. Les informations sont stockées dans une superglobale: $_COOKIE.</p>
                            <p class="alert alert-danger w-50 mx-auto">Un cookie étant suavegardé sur le poste d l'internaute, il peut être modifié, détourné ou volé!! On n'y met aucune information sensible, comme les références bancaires, le numéro de sécu, le mot de passe, ni même le contenu d'n panier d'achat.</p>
                            <div class="w-75 text-center mx-auto">
                            <!-- On envoie la langue choisi par l'URL: la valeur "fr" par exemple est récupérée dans la superglobale $_GET. -->

                            <a href="?langue=fr" class="btn btn-outline-danger">Français</a> -
                            <a href="?langue=es" class="btn btn-outline-warning">Espagnol</a> -
                            <a href="?langue=it" class="btn btn-outline-success">Italien</a> -
                            <a href="?langue=en" class="btn btn-outline-info">Anglais</a>

                            <?php
                            echo "<h3><br>Langue du site : $langue</h3>";
                            echo time() ." : La date du jour exprimée en secondes depuis le 1er janvier 1970.";
                            ?>
                            </div>
                        </div><!-- fin de la colonne -->
                    </div><!-- fin de la rangée -->
                    <hr>
                </main>
            </div>
            <!-- FIN DU CONTENU PRINCIPAL -->





            <!-- LE FOOTER ON REQUIRE -->
            <?php
            require("../inc/footer.inc.php");
            ?>

            <!-- Bootstrap JavaScript Libraries -->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>