<?php
require_once('../inc/functions.php');
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

    <title>Cours_php2022 - BDD "Dialogue"</title>
    <!-- Mes styles -->
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <div class="row">
        <!-- JUMBOTRON -->
        <div class="jumbotron bg-secondary text-center">
            <h1 class="display-3 pt-3">Cours_php2022 - BDD "Dialogue"</h1>
            <p class="lead pb-3">La méthode POST réceptionne les données d'un formulaire, $_POST est une superglobale.</p>
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
                        <div class="col-sm-12 col-md-6">
                            <form action="?action=envoyer" method="GET">
                                <div class="form-group">
                                    <label for="pseudo"></label>
                                    <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Votre pseudo doit contenir mois de 20 caractères.">
                                </div>
                                <div class="form-group">
                                    <label for="commentaire"></label>
                                    <textarea type="message" class="form-control" id="prenom" name="commentaire" rows="5" placeholder="Veuillez laisser-ici votre conmmentaire."></textarea>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="email"></label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Votre email">
                                </div> -->
                                <br>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary text-center">Envoyer</button>
                                </div>
                            </form>
                        </div><!-- fin de la colonne -->
                        <div class="col-sm-12 col-md-6">
                            <p>Création de la BDD "dialogue"</p>
                            <ul>
                                <li>Nonm de la BDD: dialogue.</li>
                                <li>Nom de la table: commentaire.</li>
                                <li>Champs: <ol>
                                        <li>id_commentaire INT PK AT</li>
                                        <li>pseudo VARCHAR(20)</li>
                                        <li>message TEXT</li>
                                        <li>date_enregistrement DATETIME</li>
                                    </ol>
                                </li>
                            </ul>
                            <?php
                            // Connexion à la BDD "dialogue". 
                            $pdoDialogue = new PDO(
                                'mysql:host=localhost;dbname=dialogue',
                                'root',
                                '',
                                array(
                                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
                                )
                            );
                            $requete = $pdoDialogue->query("SELECT * FROM commentaire WHERE pseudo = 'Batman' ");
                            $ligne = $requete->fetch(PDO::FETCH_ASSOC);
                            echo "<ul class=\"alert alert-success\"><li>ID: " . $ligne['id_commentaire'] . "</li> <li>Pseudo: " . $ligne['pseudo'] . "</li> <li>Message: " . $ligne['message'] . "</li></ul>";
                            ?>
                        </div><!-- fin de la colonne -->
                    </div><!-- fin de la rangée -->

                    <hr>

                    <div class="row">
                        <h2 class="col-sm-12 text-center">2 - Exercises</h2>
                        <div class="col-sm-12">
                            <p class="text-center">Compter les commentaires de la base de données dialogue et les afficer dans un tableau.</p>
                            <div class="alert alert-light">
                                <?php
                                $requete = $pdoDialogue->query("SELECT * FROM commentaire");
                                $nbr_commentaires = $requete->rowCount();
                                echo "<p>Il y a " . $nbr_commentaires . " commentaires dans la base de données.</p>";
                                echo "<table class=\"table table-striped table-hover\">";
                                echo "<thead><tr>
                                        <th scope=\"col\">ID</th>
                                        <th scope=\"col\">Pseudo</th>
                                        <th scope=\"col\">Message</th>
                                        <th  scope=\"col\">Date d'enregistrement</th>
                                        </tr></thead>";

                                while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td># " . $ligne['id_commentaire'] . "</td>";
                                    echo "<td>" . $ligne['pseudo'] . "</td>";
                                    echo "<td>" . $ligne['message'] . "</td>";
                                    echo "<td>" . $ligne['date_enregistrement'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                                ?>
                            </div>
                        </div><!-- fin de la colonne -->
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