<?php require_once('../inc/functions.php'); ?>

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

    <title>Cours_php7 - PDO</title>
    <!-- Mes styles -->
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <div class="row">
        <!-- JUMBOTRON -->
        <div class="jumbotron bg-secondary text-center">
            <h1 class="display-3 pt-3">Cours_php7 - PDO</h1>
            <hr>
            <p class="lead pb-3">La variable "$pdo" est un objet qui répresente la connexidon à une BDD.</p>
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
                        <h2 class="col-sm-12 text-center" id="definition">1 - Connexion à la BDD</h2>

                        <div class="col-sm-12">
                            <p><abbr title="PHP Data Object">PDO</abbr> est l'accronyme de PHP Data</p>

                            <?php
                            $pdoENT = new PDO(
                                'mysql:host=localhost;dbname=entreprise', // on a premier lieu le driver mysql (IBM, ORACLE, ODBC, etc...), le nom du serveur, le nom de la BDD.
                                'root', // l'utilsateur pour la BDD
                                '', // le mot de passe de l'utilisateur pour la BDD
                                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
                            ); // pour definir le charset des échanges avec la BDD.

                            // jevar_dump($pdoENT); // l'objet est vide car il n'y pas de propriétés.
                            // jevar-dump(get_class_methods($pdoENT)); // affiche les méthodes présentes dans l'objet PDO.
                            ?>

                        </div><!-- fin de la colonne -->

                        <hr>


                        <div class="col-sm-12">
                            <h2 class="text-center"><span>2 -</span> Faire des requêtes avec <code>exec()</code></h2>
                            <p>La méthode exec() est utilisé pour faire des requêtes qui ne retourne pas des résultats: INSERT, UPDATE, DELETE.</p>
                            <p>Valeurs de retour: <br> Succès: dans le jevar_dump de $requête on aura le nombre de lignes affectées par la requête, 3 delete = int(3) <br> Echec: false = 0</p>

                            <?php

                            // $requete = $pdoENT->exec("INSERT INTO employes ( prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Jean', 'Bernard', 'm', 'informatique', '2022-03-18', 2000)"); // on la commente pour ne pas insérer cette requête chque fois que l'on recharge la page.

                            echo "<p>Dernier id généré par la BDD: " . $pdoENT->lastInsertId() . "</p>";

                            ?>

                        </div><!-- fin de la colonne -->
                        <hr>

                        <div class="col-sm-12">
                            <h2 class="text-center"><span>3 -</span> Faires des requête avec <code>query()</code></h2>
                            <p><code>query()</code> est utiliée pour faire des requêtes qui retournent un ou plusieurs résultats: SELECT mais aussi DELETE, UPDATE and INSERT.</p>
                            <p>En cas de succès: query() retourne un nouveau objet qui provient de la classe PDOstatament. <br> En cas d'échec: FALSE.</p>
                            <ul>
                                <li>Pour information, on peut mettre les paramètres () de fetch ()</li>
                                <li>PDO::FETCH_NUM : pour obternir un tableau aux indices numériques.</li>
                                <li>PDO::FETCH_OBJ : pour obtenir un dernier objet.</li>
                                <li>Ou encore des () vides; pour obtenir un mélange de tableau associatif et numérique.</li>
                            </ul>

                            <?php
                            //1 - on demandes les informations à la BDD car il ya un ou plusierurs résultats avec query().
                            $requete = $pdoENT->query("SELECT * FROM employes WHERE prenom = 'Bruce' ");
                            //2 - dans cet objet $requette, nous ne voyons pas les données concernant 'Bruce' pourtant elles s'y trouvent. Pour y acceder, nous devons utliser un méthode de $requete qui s'appelle fetch().

                            $ligne = $requete->fetch(PDO::FETCH_ASSOC);
                            //3 - avec cette mode 'fetch' on transform l'objet $requête
                            //4 - fetch(), avec le paramètre PDO::FETCH_ASSOC permet de transformer l'objet de la requête en un array associatif appelé ici $ligne: on y trouve en indices les noms des champs de la requête SQL.

                            echo "<ul><li>ID: " . $ligne['id_employes'] . "<li>Prénom: " . $ligne['prenom'] . "</li> <li>Nom: " . $ligne['nom'] . "</li> <li>Sexe: " . $ligne['sexe'] . "</li> <li>Service: " . $ligne['service'] . "</li> <li>Date d'entrée: " . $ligne['date_embauche'] . "</li> <li>Salaire: " . $ligne['salaire'] . " €</li></ul>";

                            // exo: afficher le service de l'employé dont l'ID est 417 ainsi que son nom et son prénom.
                            $requete = $pdoENT->query("SELECT id_employes, service, prenom, nom FROM employes WHERE id_employes = '417' ");
                            $ligne = $requete->fetch(PDO::FETCH_ASSOC);
                            echo "<ul><li>ID: " . $ligne['id_employes'] . "<li>Service: " . $ligne['service'] . "</li> <li>Prénom: " . $ligne['prenom'] . "</li> <li>Nom: " . $ligne['nom'] . "</li></ul>";

                            ?>
                        </div><!-- fin de la colonne -->
                        <hr>

                        <div class="col-sm-12">
                            <h2 class="text-center"><span>4 - </span>Faire des requetes avec <code>query()</code></h2>
                            <p>Faire des requetes avec <code>query()</code> et afficher plusieurs résultats.</p>
                            <?php
                            $requete = $pdoENT->query("SELECT * FROM employes ORDER BY prenom");
                            // jevar_dump($requete);
                            // $ligne = $requete->fetchALL(PDO::FETCH_ASSOC);
                            $nbr_employes = $requete->rowCount(); // cette méthode "rowCount()" permet de compter le nombre de lignes qui sont retournées par la requête.
                            echo "<p>Il y a " . $nbr_employes . " employés dans la BDD.</p>";
                            // comme nous avons plusieurs résultats dans "$requete", nous devons faire une boucle pour les parcourir.
                            // "fetch()" va chercher la ligne suivante du jeu de résultats à chaque tour de boucle et le transforme en objet. l boucle "while" permet de faire avancer le curseur dans l'objet. Quand il arrive à la fin, "fecth()" renvoie FALSE et la boucle s'arrête.
                            echo "<ul>";
                            while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
                                echo "<li>" . $ligne['prenom'] . " " .$ligne['nom']. " - "  . $ligne['sexe'] . " - " .$ligne['service']. " - " . $ligne['date_embauche'] . " - " .$ligne['salaire']. " €</li>";
                            }
                            echo "</ul>";
                            // exo: afficher la liste des différents services dans une ul mettant un service par li.
                            $requete = $pdoENT->query("SELECT DISTINCT (service) FROM employes ORDER BY service");
                            $nbr_services = $requete->rowCount();
                            echo "<div class=\"bg-info rounded w-50 text-white mt-4 mx-auto\">";
                            echo "<p class=\"p-2 text-white\">Il y a " . $nbr_services . " services dans l'entreprise: </p>";
                            echo "</div>";

                            echo "<div class=\"border border-info rounded w-50 pt-3 mx-auto\">";
                            echo "<ul>";
                            while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
                                echo "<li>" . $ligne['service'] . "</li>";
                            }
                            echo "</ul>";
                            echo "</div>";

                            // <!-- EXO: dans un h2, compter le nombre d'employés
                            // 2/ puis afficher toutes les informations des employés dans un tableau HTML triés par ordre alphabétique de nom
                            $requete = $pdoENT->query("SELECT * FROM employes ORDER  BY nom ASC");
                            $nbr_employes = $requete->rowCount();
                            echo "<h2 class=\"text-center\">Il y a " . $nbr_employes . " employés dans l'entreprise.</h2>";
                            ?>
                        </div>

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