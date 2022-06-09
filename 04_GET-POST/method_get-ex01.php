<?php require_once('../inc/functions.php') ?>
<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bad+Script&display=swap" rel="stylesheet">

    <title>Cours PHP7 - Exos pratiques - 1</title>

    <!-- mes styles -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bg-dark">
    <!-- JUMBOTRON -->
    <div class="jumbotron bg-dark text-white text-center">
        <h1 class="display-3">Cours_php2022 - Premier exercice</h1>
        <p class="lead">Première page d'exercice pour le PHP</p>
    </div>

    <!-- RANGÉE PRINCIPALE -->
    <div class="row">
        <!-- LA NAVIGATION EN INCLUDE (penser à ajouter le JS qui va avec en fin de page) -->
        <?php
        require('../inc/sidenav.inc.php')
        ?>

        <!-- ============================================================== -->
        <!-- Contenu principal -->
        <!-- ============================================================== -->
        <div class="col-sm-8">
            <main class="container-fluid">

                <div class="row">
                    <hr>
                    <h2 class="col-sm-12 text-center" id="definition">1 - Tableau créé par la variable $_GET[]</h2>
                    <div class="col-12">
                        <?php
                        // jevar_dump($_GET);
                        if (isset($_GET['article']) && isset($_GET['couleur']) && isset($_GET['prix'])) {
                            // echo "<p>" . $_GET['article']. " - " . $_GET['couleur']. " <br> " . $_GET['prix'] . "€</p>";
                            echo "
                                <div class=\"card text-center\">
                                <div class=\"card-header\">
                                    À la Une !
                                </div>
                                <div class=\"card-body\">
                                    <h3 class=\"card-title\">" . $_GET['article'] .  " " . $_GET['couleur'] . "</h3>
                                    <p class=\"card-text\">Découvrez nos vêtements de qualité en matière 100% naturelle et recyclables. Des questions ? N'hésitez pas à nous contacter, nous sommes disponibles 7j/7 et 24h/24.</p>
                                    <a href=\"#\" class=\"btn btn-primary\">Ajoutez au panier</a>
                                </div>
                                <div class=\"card-footer text-muted\">
                                " . $_GET['prix'] . " €
                                </div>
                                </div>";
                        } else {
                            echo "<p class=\"alert alert-danger w-50 mx-auto text-center\">Désolé, il n'y a pas de produit sur cette page</p>";
                        }
                        ?>
                    </div><!-- fin de la colonne -->
                </div><!-- fin de la rangée -->

                <hr>
                <br><br>

            </main>
        </div> <!-- FIN DE LA PARTIE PRINCIPALE COL-8 -->

        <div class="col-sm-2 aside">
            <ul>
                <!-- DES ANCRES POUR LE COURS ET LES EXOS -->
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li></li>
            </ul>
        </div>
    </div>

    <!-- LE FOOTER EN REQUIRE -->
    <?php
    require("../inc/footer.inc.php")
    ?>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- le js pour la navigation  -->
    <script src="../inc/sidenav.js"></script>

</body>

</html>