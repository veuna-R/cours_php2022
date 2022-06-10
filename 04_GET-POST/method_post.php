<?php require_once('../inc/functions.php'); ?>

<!doctype html>
<html lang="en">

<head>
    <title>Cours_php2022 - La méthode GET</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bad+Script&display=swap" rel="stylesheet">

    <title>Cours_php2022 - Introduction</title>
    <!-- Mes styles -->
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <div class="row">
        <!-- JUMBOTRON -->
        <div class="jumbotron bg-secondary text-center">
            <h1 class="display-3 pt-3">Cours_php2022 - La méthode POST</h1>
            <hr>
            <p class="lead pb-3">La méthode POST réceptionne les données d'un formulaire, $_POST est une superglobale.</p>
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
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <h2 class="col-sm-12 text-center" id="definition"><u>1 - Formulaire</u></h2>
                            <ul>
                                <li>Un formulaire doit toujours être dans une balise <code>form</code> pour fonctionner.</li>
                                <li>L'attribut method indique comment les données vont circuler vers le PHP.</li>
                                <li>L'attribut action indique l'URL de destination des données (si l'attribut est vide, les données vont le même script ou la même page).</li>
                                <li>Ensuite sur les names, il ne faut pas les oublier sur les formulaires; ils constituent les indices de $_POST qui réceptionne les données.</li>
                            </ul>
                            <form action="../05_exos/method_form_traitement.php" method="POST" class="w-75 mx-auto">
                                <div class="form-group">
                                    <label for="prenom"></label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" required placeholder="Prenom">
                                </div><!-- fin champs prenom -->

                                <div class="form-group">
                                    <label for="nom"></label>
                                    <input type="nom" class="form-control" id="nom" name="nom" required placeholder="Nom">
                                </div><!-- fin champs nom -->

                                <div class="form-group">
                                    <label for="commentaire"></label>
                                    <textarea class="form-control" id="commentaire" name="commentaire" rows="3" required placeholder="Commentaire"></textarea>
                                </div><!-- fin champs commentaire -->

                                <div class="text-center">
                                    <button type="submit" class="btn btn-info mt-2">Envoyer</button>
                                </div>
                            </form><!-- fin du formulaire -->
                        </div><!-- fin du colonne -->

                        <div class="col-sm-12 col-md-6">
                            <h2 class="col-sm-12 text-center" id="definition"><u>2 - Récupération des données</u></h2>
                            <ul>
                                <li>$_POST est une superglobale ui permet de récupérer les données saisies dans un formulaire.</li>
                                <li>$_POST est donc un tableau (array) et il est disponilbe dans tous les contextes du script.</li>
                                <li>le tableau $_POST se repmlit de la manière suivante: <code>$_POST = array(<br> "name1" => "valeur1" <br> "nameN" => "valeurN"</code></li>
                                <li>Donc soit name1 ou nameN correspondent aux attributs "name" du formulaire, et où valeur1 et valeurN correspondent aux valeurs saisies par l'internaute.</li>
                            </ul>
                            <?php
                            if (!empty($_POST)) {  // si $_POST n'est pas vide, c'est qu'il est rempli et donc que le formulaire a été envoyé, notez qu'en l'état on peut l'envoyer avec des champs vides, les valeurs des $_POST étant alors des strings vides. En effet, on peut avoir des informations non-obligatoires dans un formulaire et les inputs ne seront donc jamais remplis.
                                // jevar_dump($_POST);
                                echo "<div class=\"alert alert-success w-75 mx-auto\"><p>Prénom: " . $_POST['prenom'] . "</p>";
                                echo "<p>Nom: " . $_POST['nom'] . "</p>";
                                echo "<p>Commentaire: " . $_POST['commentaire'] . "</p>";
                            }
                            ?>
                        </div><!-- fin du colonne -->
                    </div><!-- fin de la rangée -->
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