<?php
require_once('../inc/functions.php');

$host = 'localhost';
$database = 'entreprise';
$user = 'root';
$password = '';

$pdoENT = new PDO('mysql:host=' . $host . ';dbname=' . $database, $user, $password);
$pdoENT->exec('SET NAMES utf8');

if (!empty($_POST)) // "!empty" = "is not empty"
{
    $_POST['prenom'] = htmlspecialchars($_POST['prenom']);
    $_POST['nom'] = htmlspecialchars($_POST['nom']);
    $_POST['sexe'] = htmlspecialchars($_POST['sexe']);
    $_POST['service'] = htmlspecialchars($_POST['service']);
    $_POST['date_embauche'] = htmlspecialchars($_POST['date_embauche']);
    $_POST['salaire'] = htmlspecialchars($_POST['salaire']);

    $requete = $pdoENT->prepare("INSERT INTO employes(prenom, nom, sexe, service, date_embauche, salaire) VALUES(:prenom, :nom, :sexe, :service, :date_embauche, :salaire)");
    $requete->execute(array(
        'prenom' => $_POST['prenom'],
        'nom' => $_POST['nom'],
        'sexe' => $_POST['sexe'],
        'service' => $_POST['service'],
        'date_embauche' => $_POST['date_embauche'],
        'salaire' => $_POST['salaire']
    ));
}  // fin de "if" "!empty".
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

    <title>Cours_php2022 - Entreprise et employes</title>
    <!-- Mes styles -->
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <div class="row">
        <!-- JUMBOTRON -->
        <div class="jumbotron bg-secondary text-center">
            <h1 class="display-3 pt-3">Cours_php2022 - Entreprise et employes</h1>
            <hr>
        </div>
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
                    <h2 class="col-sm-12 text-center"><u>1 - Tableau des employes</u></h2>
                    <div class="col-sm-12">
                        <?php
                        $requete = $pdoENT->query("SELECT * FROM employes ORDER BY prenom");
                        $nbr_employes = $requete->rowCount();

                        echo '<p>Nombre d\'employes dans la BDD: ' . $nbr_employes . '</p>';
                        echo "<table class=\"table table-striped table-dark\">";
                        echo "<thead><tr>
                                        <th scope=\"col\">ID</th>
                                        <th scope=\"col\">Civilité</th>
                                        <th scope=\"col\">Prenom</th>
                                        <th scope=\"col\">Nom</th>
                                        <th scope=\"col\">Sexe</th>
                                        <th scope=\"col\">Service</th>
                                        <th scope=\"col\">Date d'embauche'</th>
                                        <th scope=\"col\">Salaire</th>
                                        <th scope=\"col\">Fiche</th>
                                        </tr></thead>";

                        while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td># " . $ligne['id_employes'] . "</td>";
                            echo "<td>";
                            if ($ligne['sexe'] == 'f') {
                                echo 'Mme ';
                            } else {
                                echo 'M.';
                            }
                            "</td>";
                            echo "<td>" . $ligne['prenom'] . "</td>";
                            echo "<td>" . $ligne['nom'] . "</td>";
                            echo "<td>" . $ligne['sexe'] . "</td>";
                            echo "<td>" . $ligne['service'] . "</td>";
                            echo "<td>" . date('d/m/Y', strtotime($ligne['date_embauche']))  . "</td>";
                            echo "<td>" . number_format($ligne['salaire'], 2, ',', ' ')  . " €</td>";
                            echo "<td><a href=\"03-fiche-employes.php?id_employes=". $ligne['id_employes'] . "\" class=\"text-white\">Voir</a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
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