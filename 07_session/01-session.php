<?php
require_once('../inc/functions.php');
session_start(); // permet de créer un fichier de session avec son identifiant ou d'ouvrir la session si l'identifiant existe déjà ou si on a reçu un cookie avec contenat l'identifiant.
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

    <title>Cours_php7 - $_SESSION</title>
    <!-- Mes styles -->
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <div class="row">
        <!-- JUMBOTRON -->
        <div class="jumbotron bg-secondary text-center">
            <h1 class="display-3 pt-3">Cours_php7 - La variable $_SESSION</h1>
            <p class="lead pb-3">Une session est un système mis en oeuvre dans le code PHP permettant de conserver sur le serveur, dans un fichier temporaire, des intformations relatives à un internaute. L'avantage d'une session c'est que lest données seront enregistrées dans un fichier sur le serveur disponible et consultable sur l'ensemble des pages durant toute la navigation de l'internaute.</p>
            <hr>
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
                            <p>Les données du fichier de session sont accessibles et maunipulable à partir de la superglobale $_SESSION.</p>
                            <?php
                            $_SESSION['pseudo'] = 'Tintin';
                            $_SESSION['mdp'] = 'Vol747';
                            $_SESSION['email'] = 'tintin@milou.be';
                            echo "<p class=\"alert alert-success text-center\">La session est bien remplie!</p>";
                            ?>
                            <p>Principe de session: un fichier temporaire appelé session est créé sur le serveur, avec un identifiant unique. Cette session est lié à un internaute dans le même temps avec un cookie est déposé sur le poste de l'internaute avec l'identifiant (au nom PHPSESSID). Ce cookie est détruit lorsque l'on quitte le navigateur.</p>
                            <p>Le fichier de session peut contenir des informations très sensibles!! Il n'est donc pas accessible par l'internaute.</p>
                            <p>Il est possible de vider une partie de la session avec le code suivant <code>unset($_SESSION[mdp])</code>.</p>
                            <?php
                            unset($_SESSION['mdp']);
                            ?>
                            <p>Pour supprimer automatiquement une session: <code>session_destroy()</code>; il supprime totalement la session ainsi que son fichier temporarire.</p>
                            <?php
                            // session_destroy();
                            ?>
                            <p>Nous avons effectué un session_destroy() mais il nérest executé qu'à la fin de notre script. Nous voyons encore ici le contenu de la session mais le fichier temporaire dans le dossier Temp a bien été supprimé. Ce fichier contient les infos de session et elles sont accessibles à <code>session_start()</code>.</p>
                            <p>Si on a besoin des informations de cette page, le code <code>session_start()</code> devra être placé au début de la page.</p>
                            <?php
                            if(isset($_SESSION['pseudo'])){
                                echo "Votre pseudo est: ".$_SESSION['pseudo']. "<br>";
                            }else {
                                echo "<form method ='post' action = '' <label for='pseudo'>Pseudo:</label><br><input type='text' name='pseudo' value= ''><br><input type='submit' value='Envoyer'></form>";
                            }
                            ?>
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