<!doctype html>
<html lang="fr">

<head>

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
    <div class="jumbotron bg-secondary text-center">
        <h1 class="display-3 pt-3">Cours_php2022</h1>
        <p class="lead pb-3">PHP signifie aujourd'hui Hypertext Preprocessor</p>
    </div>

    <div class="row">

        <?php
        require('../inc/sidenav.inc.php'); //ici on appelle le fichier sidenav.inc.php
        ?>

        <!-- ========================================================= -->
        <!-- Contenu principal -->
        <!-- ========================================================= -->
        <div class="col-sm-8">
            <main class="container-fluid">

                <!-- ouverture de la row -->
                <div class="row">
                    <hr>
                    <h2 class="col-sm-12 text-center" id="definition"><u>1 - Definition</u></h2>
                    <div class="col-sm-12 col-lg-4">
                        <p>Chaque variable possède un identifiant particulier, qui commence toujours par le caractère dollar($) suivi le nom de la variable. Les règles de création des noms de variables sont les suivants:</p>
                        <ul>
                            <li>Le nom commnence par un caractère alphabétique, pris dans les ensembles de [a-z], [A-Z] ou par le tiret bas ( _ ).</li>
                            <li>Les caractères suivant peuvent être les mêmes plus des chiffres.</li>
                            <li>Les functions n'ont pas les mêmes attentes, par exemple: <code> __FILE__ </code>, qui permet d'afficher le chemin complet:
                                <?php
                                echo "Nom du fichier inclus:" . __FILE__;
                                ?>
                            </li>
                            <li>La longuer du nom n'est pas limité mais il convient d'être raisonnable sous peine de confusion dans la saisie du code. Il est conseillé de créer des noms variables le plus "parlant" possilbe en réalisant le code contenant la variable <code>$nomClient</code>, par exemple, vous comprenez davantage ce que vous manipulez que si vous aviez écrit <code>$x</code><code>$y</code>.</li>
                        </ul>
                    </div>

                    <div class="col-sm-12 col-lg-4">
                        <ul>
                            <li>La déclaration des variables n'est pas obligatoire en début de script. C'est là une différence notable avec les langages fortement typés comme Java ou C. Vous pouvez créer des variables n'importe où, à condition bien sûr de les créer avant de les utiliser, même s'il reste possible d'appeler une variable qui n'existe pas sans provoquer d'erreur.</li>
                            <li>L'initialisation des variables n'est pas non plus obligatoire et une variable non initialisée n'a pas de type précis.</li>
                            <li>Les noms des variables sont sensibles à la casse (majuscules et minuscules). $mavar et $MaVar ne désignent donc pas la même variable.</li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <h5>a. Les noms de variables suivants sont corrects</h5>
                        <ul>
                            <li>$mavar</li>
                            <li>$_mavar</li>
                            <li>$mavar2</li>
                            <li>$M1</li>
                            <li>$_123</li>
                        </ul>
                        <h5>b. Les noms de variables suivants sont illégaux</h5>
                        <ul>
                            <li>$*mavar</li>
                            <li>$5_mavar</li>
                            <li>$mavar2+</li>
                        </ul>
                    </div>
                    <!-- fermeture de la row -->

                    <hr>

                    <!-- ouverture de la row -->
                    <div class="row">
                        <h2 class="col-sm-12 text-center u" id="affection"><u>2 - Affectation de variables</u></h2>
                        <div class="col-sm-12">
                            <p>L'affection consiste à donner une valeur à une variable. Lors de la création de variable, vous ne déclarez pas son type. C'est la valeur que vous lui affectez qui détermine ce type. Dans PHP, vous pouvez affecter une variable par valeur ou par référence.</p>
                        </div>
                        <ul>
                            <li>$mavar=75;</li>
                            <li>$mavar="Paris";</li>
                            <li>$mavar=7*3+2/5-91%7; // PHP évalue l'expression puis affecte le résultat</li>
                            <li>$mavar=mysql_connect($a,$b,$c); // La function retourne une resource</li>
                            <li>$mavar=isset($var&&($var==9)); // La function retourne une valeur booléenne</li>
                        </ul>
                    </div><!-- fin de la colonne -->
                </div><!-- fermeture de la row -->

                <hr>

                <div class="row">
                    <h2 class="text-center col-sm-12" id="variablesPredefinies"><u>" - Les variables prédéfinies</u></h2>
                    <div class="col-sm-12">
                        <p>Le PHP dispose d'un grand nombre de variables prédéinies qui contiennent des informations à la fois sur le serveur et sur toutes les données qui peuvent transiter entre le post, client et le serveur, comme les valeurs saisies dans un formulaire, les cookies ou les sessions.</p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Variable</th>
                                    <th scope="col">Utilisation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="col">$GLOBALS</th>
                                    <td>Contient le nom et la valeur de toutes les variables globales du script. Les noms des variables sont les clés de ce tableau. <code>$GLOBALS["mavar"]</code> récupère la valeur de la variable $mavar en dehors de sa zone de visibilité (dans les fonctions par exemple).</td>
                                </tr>
                                <tr>
                                    <th scope="col">$_COOKIE</th>
                                    <td>Contient le nom et la valeur des cookies enregistrés sur le poste client. Les noms des cookies sont les clés de ce tableau.</td>
                                </tr>
                                <tr>
                                    <th scope="col">$_ENV</th>
                                    <td>Contient le nom et la valeur des variables d'environnements qui sont changeantes selon les serveurs</td>
                                </tr>
                                <tr>
                                    <th scope="col">$_FILES</th>
                                    <td>Contient le nom des fichiers tétéchargés à partir du poste client</td>
                                </tr>
                                <tr>
                                    <th scope="col">$_GET</th>
                                    <td>Contient le nom et la valeur des données issues d'un formulaire envoyé par la méthode GET. Les noms des champs du formulaire sont les clés dans ce tableau.</td>
                                </tr>
                                <tr>
                                    <th scope="col">$_POST</th>
                                    <td>Contient le nom et la valeur des données issues d'un formulaire envoyé par la méthode POST. Les noms des champs du formulaire sont les clés dans ce tableau.</td>
                                </tr>
                                <tr>
                                    <th scope="col">$_REQUEST</th>
                                    <td>Contient l'ensemble des variables superglobales: $_GET, $_POST, $_COOKIE et $_FILES </td>
                                </tr>
                                <tr>
                                    <th scope="col">$_SERVER</th>
                                    <td>Contient les informations liées au serveur web, tel le contenu des en-têtes HTTP ou le nom du script en cours d'execution. Retonons les variables suivantes:
                                        <ul>
                                            <li><code>$_SERVER["HTTP_ACCESS_LANGUAGE"]</code>, qui contient le code de langue du navigateur client.</li>
                                            <li><code>$_SERVER["HTTP_COOKIE"]</code>, qui contient le nom e la valeur des cookies lus sur le poste client.</li>
                                            <li><code>$_SERVER["HTTP_POST"]</code>, qui donne le nom de domaine</li>
                                            <li><code>$_SERVER["PHP_SELF"]</code>, qui contient le nom du sript en cours. Nous l'utiliserons souvent dans les formulaires.</li>
                                            <li><code>$_SERVER["SERVER_ADDR"]</code>, qui indique l'adresse IP du serveur.</li>
                                            <li><code>$_SERVER["QUERY_STRING"]</code>, qui contient la chaine de la requête utilisée pour accéder au script.</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">$_SESSION</th>
                                    <td>Contient l'ensemble des noms des variables de session et leurs valeurs.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!-- fin de la colonne -->
                </div>

                <hr>

                <div class="row">
                    <div class="col-sm-12 px-4">
                        <h2 class="text-center"><u>4 - Les opérateurs d'affection combinés</u></h2>
                        <p>En plus de l'opérateur classique d'affectation "=", il existe plusieurs opérateurs d'affectation combinés. Ces opérateurs réalisent à la fois une opération entre deux opérandes et l'afféctation du résultt à l'opérande de gauche.</p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Opérateur</th>
                                    <th scope="col">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">+=</th>
                                    <td>Addition puis affectation: <br>
                                        $x += $y équivaut à $x = $x + $y <br>
                                        $y peut être une expréssion complexe dont la valeur est un nombre.</td>
                                </tr>
                                <tr>
                                    <th scope="row">-=</th>
                                    <td>Soustraction puis affectation: <br>
                                        $x -= $y équivaut à $x = $x - $y <br>
                                        $y peut être une expréssion complexe dont la valeur est un nombre.</td>
                                </tr>
                                <tr>
                                    <th scope="row">*=</th>
                                    <td>Multiplication puis affectation: <br>
                                        $x *= $y équivaut à $x = $x * $y <br>
                                        $y peut être une expréssion complexe dont la valeur est un nombre.</td>
                                </tr>
                                <tr>
                                    <th scope="row">**=</th>
                                    <td>Puissance puis affectation: <br>
                                        $x**=2 équivaut à $x=($x)²<br>
                                </tr>
                                <tr>
                                    <th scope="row">/=</th>
                                    <td>Division puis affectation: <br>
                                        $x /= $y équivaut à $x = $x / $y <br>
                                        $y peut être une expréssion complexe dont la valeur est un nombre différent de 0.</td>
                                </tr>
                                <tr>
                                    <th scope="row">%=</th>
                                    <td>Modulo puis affectation: <br>
                                        $x %= $y équivaut à $x = $x % $y <br>
                                        $y peut être une expréssion complexe dont la valeur est un nombre.</td>
                                </tr>
                                <tr>
                                    <th scope="row">.=</th>
                                    <td>Concaténation puis affectation: <br>
                                        $x .= $y équivaut à $x = $x . $y <br>
                                        $y peut être une expréssion littérale dont la valeur est uen chaine de caractère.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!-- fin de la colonne -->
                </div><!-- fin de la row -->

                <hr>

                <div class="row">
                    <div class="col-sm-12 px-4">
                        <h2 class="text-center"><u>5 - Les constantes</u></h2>
                        <p>Vous erez parfois amenés à utiliser de manière répétitive des informations devant rester constantes dans toutes les pages d'un même site. Il peut s'agir de texte ou de nombres qui reviennent souvent. Pour ne pas risquer l'écrasement accidentel de ces valeurs, qui pourrait produire si elles étaient contenues dans des variables, vous avez tout intérêt à les enregistrer sous forme de constantes personnalisées.</p>
                        <p>On peut définir ses constantes soi-même cf. ; pour définir des constantes personnalisées, utilisez la fonction define(), dont la syntaxe est la suivante:
                            <strong>boolean define(string nom_cte, divers valeur_cte, boolean casse)</strong>Suivante<a href="../00_pages/03-page.php" target="_blank">suivante</a>
                        </p>
                    </div><!-- fin de la colonne -->
                    <div class="col-sm-12 col-md-6">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Constantes</th>
                                    <th scope="col">Résultats</th>
                                </tr>
                            <tbody>
                                <tr>
                                    <th scope="row">PHP_VERSION</th>
                                    <td>Version de PHP installé sur le serveur:
                                        <?php
                                        echo PHP_VERSION;
                                        ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">PHP_OS</th>
                                    <td>Non du système d'exploitation du serveur:
                                        <?php
                                        echo PHP_OS;
                                        ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">DEFAULT_INCLUDE_PATH</th>
                                    <TD>Chemin d'acces aux fichiers par defaut:
                                        <?php
                                        echo DEFAULT_INCLUDE_PATH;
                                        ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">__FILE__</th>
                                    <td>Nom du fichier encours d'execution:
                                        <?php
                                        echo __FILE__;
                                        ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">__LINE__</th>
                                    <td>Numéro de la ligne en cours d'execution:
                                        <?php
                                        echo __LINE__;
                                        ?></td>
                                </tr>
                            </tbody>
                            </thead>
                        </table>
                    </div><!-- fin de la colonne -->
                </div><!-- fin de la row -->

                <hr>

                <div class="row">
                    <div class="col-sm-12 px-4">
                        <h2 class="text-center"><u>6 - Les types de données</u></h2>
                        <p>Dans PHP, il n'existe pas de déclaration explicite du type variable lors de sa création. Même PHP 7 reste un language pauvrement typé comparé à Java ou à C.</p>
                    </div><!-- fin de la colonne -->
                    <div class="col-sm-12">
                        <h5>Les types de bases: </h5>
                        <ul>
                            <li>Entiers, avec le type integer, qui permet de représenter les nombres entiers dans les bases 10, 8 et 16.</li>
                            <li>Elottants, avec le type double ou float, au choix, qui représente les nombres réels, ou plutôt décimaux au sens mathématique.</li>
                            <li>Chaines de caractères, avec le type string.</li>
                            <li>Booléens, avec le type boolean, qui contient des valeurs de vérité TRUE ou FALSE (soit les valeurs 1 ou 0 si on veur les afficher).</li>
                        </ul>
                        <h5>Les types composés:</h5>
                        <ul>
                            <li>Tableaux, avec les types array, qui peut contenir plusieurs valeurs.</li>
                            <li>Objets, avec le type object.</li>
                        </ul>
                        <h5>Les types spéciaux</h5>
                        <ul>
                            <li>Objets, avec le type object.</li>
                            <li>Type null.</li>
                        </ul>
                    </div>
                </div> <!-- fin de la row -->

                <div class="row">
                    <div class="col-sm-12 col-md-9">
                        <h3 class="text-center"><u>A. Les opérateurs numériques</u></h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Opérateurs</th>
                                    <th scope="col">Description</th>
                                </tr>
                            <tbody>
                                <tr>
                                    <th scope="row">+</th>
                                    <td>Addition</td>
                                </tr>
                                <tr>
                                    <th scope="row">-</th>
                                    <td>Soustraction</td>
                                </tr>
                                <tr>
                                    <th scope="row">*</th>
                                    <td>Multiplication</td>
                                </tr>
                                <tr>
                                    <th scope="row">**</th>
                                    <td>Puissance (associatif à droite) <br>
                                        $a = 3; <br>
                                        echo $a**2; Affiche 9 <br>
                                        echo $a**2**4; Affiche 43046721 soit 3**(2**4) ou 3**16</td>
                                </tr>
                                <tr>
                                    <th scope="row">%</th>
                                    <td>Modulo: reste de la division du premier opérande par le deuxième. Fonctione aussi avec des opérandes décimaux. Dans ce cas, PHP ne tient compte que des parties entières de chaque opérandes.

                                        <?php
                                        $var = 159;
                                        echo "<br>";
                                        echo "<div class=\" alert alert-success w-50\"> La variable \$var contient " . $var . " <br>";
                                        echo "Le resultat du modulo de $var%7 = " . $var % 7;
                                        echo "</div>";
                                        ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">--</th>
                                    <td>Décrementation: soustrait une unité à la variable. Il existe deux poosibilités, la prédécrémentation, qui soustrait avant d'utiliser la variable, et la postdécrémentation, qui soustrait après avoir utlisé la variable. <br>
                                        $var = 256;
                                        echo $var--; // affiche 56 puis décrémente $var. <br>
                                        echo $var; // affiche 55. <br>
                                        echo --$var; // décrémente $var puis affiche 54.</td>
                                </tr>
                                <tr>
                                    <th scope="row">++</th>
                                    <td>Incrémenation: ajoute une unité à la variable. Il existe deux possibilités, la préincrémentation, qui ajoute 1 avant d'utiliser la variable et la postincrémentation qui ajoute 1 après avoir utiliser la variable.
                                        <?php
                                        $var = 56;
                                        echo "<br><div class=\" alert alert-success w-50\">" . $var++ . " et, avec post-incrémentation = " . $var . "<br> Avec le pré-incrémentation = " . ++$var . "</div>";
                                        ?></td>
                                </tr>
                            </tbody>
                            </thead>
                        </table>
                    </div> <!-- fin de la collone -->
                    <div class="col-sm-12 col-md-3">
                        <h3><u>B. Le type booléen</u></h3>
                        <p>Le type booléen ne peut contenir que deux valeurs différentes FALSE (0) ou TRUE (1), c'est un système binaire.</p>

                        <?php
                        $a = 89;
                        $b = ($a < 100);
                        echo "<p class=\" alert alert-success\">La variable \$a, est-elle inférieure à 100? La réponse est " . $b . ".</p>";
                        ?>
                        <p>Ici la variable $b nous revoie le booléen 1 qui signifie vrai. Dans le cas où la variable doit renvoyer un booléen faux (FALSE), il ya aura une chaîne vide à la place de 0.</p>
                    </div>

                    <hr>

                    <div class="col-sm-12">
                        <h3 class="text-center"><u>C. Les opérateurs booléens</u></h3>
                        <p>Quand ils sont associés, les opérateurs booléens servent à écrire des expressions simples ou complexes, qui sont évalués par une valeur booléenes TRUE ou FALSE. Ils seront utilisés dans les instructions conditionelles.</p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Opérateur</th>
                                    <th scope="col">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">==</th>
                                    <td>
                                        Teste l'égalité de deux valeurs. L'expression $a == $b vaut TRUE si la valeur de $a est égale à celle de $b et FALSE dans le cas contraire: <br>
                                        $a = 345; <br>
                                        $b = "345"; <br>
                                        $c = ($a==$b); <br>
                                        $c est un booléen qui vaut TRUE car dans un contexte de comparision numérique, la chaîne "345" est évaluée comme le nombre 345. Si $b = "345 éléphants" nous obtenons le même résultat.
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">!= ou &lt;</th>
                                    <td>
                                        Teste l'inégalité de deux valeurs. <br>
                                        L'expression $a != $b vaut TRUE si la valeur de $a est différente de celle de $b et FALSE dans le cas contraire.
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">===</th>
                                    <td>
                                        Teste l'indentité des valeurs et des types de deux expressions. <br>
                                        L'expression $a === $b vaut TRUE si la valeur de $a est égale à celle de $b mais à condition que ces deux valeurs aient le même type. Elle vaut FALSE dans le cas contraire: <br>
                                        $a = 345; <br>
                                        $b = "345"; <br>
                                        $c = ($a===$b); <br>
                                        $c est un booléen qui vaut FALSE car si les valeurs sont égales, les types sont différents (integer et string).
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">!==</th>
                                    <td>
                                        Teste la non-identité de deux expressions. <br>
                                        L'expression $a !== $b vaut TRUE si la valeur de $a est différente de celle de $b et que leurs type sont différents. Dans le cas contraire elle vaut FALSE: <br>
                                        $a = 345; <br>
                                        $b = "345"; <br>
                                        $c = ($a!==$b); <br>
                                        $c est un booléen qui vaut TRUE car si les valeurs sont égales, les types sont différents (integer et string).
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">&lt;</th>
                                    <td>
                                        Teste si le premier opérande est strictement inférieur au second.
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">></th>
                                    <td>
                                        Teste si le premier opérande est supèrieur au second.
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">>=</th>
                                    <td>
                                        Teste si le premier opérande est supèrieur ou égal au second.
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">=></th>
                                    <td>
                                        Avec $a=>$b, retourne -1, 0 ou 1 respectivement si $a<$b, $a=$b ou $a>$b ($a et $b peuvent être des chaînes)
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!-- fin de la colonne -->
                    <div class="col-sm-12">
                        <h3 class="text-center"><u>D. Les opérateurs logiques</u></h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Opérateur</th>
                                    <th scope="col">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">OR</th>
                                    <td>Teste si l'un au moins des opérandes à la valeur TRUE: <br>
                                        $a = true; <br>
                                        $b = false; <br>
                                        $c = false; <br>
                                        $d = ($a OR $b); // $d vaut TRUE. <br>
                                        $e = ($b OR $c); // $e vaut FALSE. </td>
                                </tr>
                                <tr>
                                    <th scope="row">||</th>
                                    <td>Equivaut à l'opérateur OR mais n'a pas la même priorité. </td>
                                </tr>
                                <tr>
                                    <th scope="row">XOR</th>
                                    <td>Teste si un et un seul des opérandes à la valeur TRUE: <br>
                                        $a = true; <br>
                                        $b = false; <br>
                                        $c = false; <br>
                                        $d = ($a XOR $b); // $d vaut FALSE. <br>
                                        $e = ($b XOR $c); // $e vaut TRUE. </td>
                                </tr>
                                <tr>
                                    <th scope="row">AND</th>
                                    <td>Teste si les deux opérandes valent TRUE en même temps: <br>
                                        $a = true; <br>
                                        $b = true; <br>
                                        $c = false; <br>
                                        $d = ($a AND $b); // $d vaut TRUE. <br>
                                        $e = ($b AND $c); // $e vaut FALSE. </td>
                                </tr>
                                <tr>
                                    <th scope="row">&&</th>
                                    <td>Equivaut à l'opérateur AND mais n'a pas la même priorité.</td>
                                </tr>
                                <tr>
                                    <th scope="row">!</th>
                                    <td>Opérateur de négation, qui inverse la valeur de l'opérande: <br>
                                        $a = true; <br>
                                        $b = false; <br>
                                        $c = !$a; //$c vaut false. <br>
                                        $d = !$b; //$c vaut true. </td>
                                </tr>
                            </tbody>
                        </table>
                        <p>Attention, une erreur classique dans l'ecriture des expressions conditionelles consiste à confondre l'opérateur de comparaison == avec l'opérateur d'affectiation =. L'usage des parenthèses dans la rédaction des expressions booléennes est souvent indispensable et toujours recommandé pour éviter les problèmes liés à l'ordre d'évaluation des opérateurs.</p>
                    </div> <!-- fin de la colonne -->
                </div><!-- fin de la rangé (row) -->

                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="text-center"><u>E. Les chaînes de caractères</u></h3>
                        <p>Les chaînes de caractères sont avec les nombres les types de données les plus manipulées sur un site web. De surcroît, dans les échanges entre le client et le serveur au moyen de formulaires, toutes les données sont transmises sous frome de chaînes, d'où leur importance.</p>
                        <p>Une chaîne de caractères est une suite de caractères alphanumérique contenue entre des guillements simples (apostrophes) ou doubles. Si une chaine contient une variable, celle-ci est évaluée et sa valeur incorporée à la chaîne uniquement si vous utilisez des guillemets et non des apostrophes. <br></p>
                        <?php
                        $vartest = "Good day";
                        echo "<p class=\"alert alert-success w-50 text-center mx-auto\">I say $vartest!</p>";
                        // var_dump($vartest);  var_dump affiche les informations structurées d'une variable, y comris son type et sa valeur.
                        ?>
                        <ul>
                            <li>$a = "PHP"; </li>
                            <li>$b = "MYSQL";</li>
                            <li>$c = "PHP et $b"; //affiche PHP and MYSQL</li>
                            <li>$d = "PHP et $b; //affiche $b car $ et b sont considérés comme des caractères sans signification particulière.</li>
                        </ul>
                        <?php
                        $devise = "La devise de la République Française est: \"Liberté, Egalité, Fraternité\"";
                        echo "<p class=\"alert alert-success w-75 text-center mx-auto\">" . $devise . "!</p>";
                        $a = 45672333;
                        // var_dump($a); 
                        ?>

                        <h4 class="text-center"><u>a) Les caractères d'échappements</u></h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="row">\</th>
                                    <td>Affiche des guillements</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">\$</th>
                                    <td>Affiche le signe $</td>
                                </tr>
                                <tr>
                                    <th scope="row">\\</th>
                                    <td>Affiche antislash</td>
                                </tr>
                                <tr>
                                    <th scope="row">\n</th>
                                    <td>Nouvelle ligne (code ASCII 0x0A).</td>
                                </tr>
                                <tr>
                                    <th scope="row">\r</th>
                                    <td>Retour chariot (code ASCII 0x0D).</td>
                                </tr>
                                <tr>
                                    <th scope="row">\t</th>
                                    <td>Tabulation horizontale (code ASCII 0x09).</td>
                                </tr>
                                <tr>
                                    <th scope="row">\[0-7] {1,3}</th>
                                    <td>Séquence de caractères désignant un nombre octal (de 1 à 3 caractères 0 à 7)et affichant le caractère correspondant:
                                        echo "\115\171\123\121\114"; Affiche MYSQL.</td>
                                </tr>
                                <tr>
                                    <th scope="row">\[0-9 A-F] {1,2}</th>
                                    <td>Séquence de caractères désignant un nombre héxadécimal (de 1 à 2 caractères 0 à 9 et A à F ou a à f)et affichant le caractère correspondant:
                                        echo "\x4D\x79\x53\x51\x4C"; Affiche MYSQL.</td>
                                </tr>
                            </tbody>
                        </table>

                        <hr>

                        <h4 class="text-center">b) Concaténer des chaînes de caractères</h4>
                        <p>L'opérateur PHP de concaténation est le point (.), qui fusionne deux chaînes littérales ou contenues dans des variables en une seule chaîne</p>
                        <p class="alert alert-success w-75 mx-auto text-center">
                            <?php
                                $langage1 = "PHP";
                                $langage2 = "MYSQL";
                                $phrase = "Utilisez " .$langage1. " et " .$langage2. " pour construire un site dynamique. <br>";
                                echo $phrase;
                                // echo "Utilisez $langage1 et $langage2 pour construire un site dynamique. <br>"; (same command as above but longer)
                                // echo "<strong> on concatène avec un point . </strong>";
                            ?>
                        </p>
                    </div><!-- fin de la colonne -->
                </div><!-- fin de la rangé (row) -->

                <hr>

                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="text-center"><u>7 - Les tableaux</u></h2>
                        <p>Les tableaux représentent un type composé car ils permettent de stocker sous un même non de variable plusieurs valeurs indépendantes d'un des types de base que vous venez de voir. C'est comme un tiroir divisé en compartiments. Chaque compartiment, que nous nommerons un élément du tableau, est repéré par un indice numérique (le premier ayant une variable amélioré dans laquelle on stocke une multitude de valeurs. Ces valeurs peuvent être de n'importe quel type. Elles possèdent un indice dont la numérotation commence à zéro.</p>
                        <blockquote>
                            <?php
                                $tab[0] = 2004; //la variable $tab est un tableau par le simple fait que son nom est suivi de crochets
                                $tab[1] = 3.14;
                                $tab[2] = "PHP 7";
                                $tab[35] = $tab[2]. " et MYSQL";  //les éléments indicés entre 2 et 35 n'existent pas
                                $tab[] = "COUCOU!"; //son indice sera 36, il prend automatiquement la suite de dernier indice utilisé
                                echo "<p class=\"alert alert-success w-50 mx-auto\">Nombre d'élements du tableau : ". COUNT($tab). ".<br>Le langage préféré de l'open source est $tab[2]. <br> Utilisez $tab[35].</p>";
                                // var_dump($tab); details each element that is present
                                // print_r($tab); same as var_dump but with less details
                            ?>
                        </blockquote>
                    </div>><!-- fin de la colonne -->
                    <div class="col-sm-12">
                    <h3 class="text-center">1 - Les tableaux associatifs</h3>
                    <p>Dans un tableau associatif, nous pouvons choisir le nom des indices ou des index, c'est-à-dire que nous associons un indice décidé par nous à une valeur. </p>

                    <?php 
                        $couleurs = array(
                            'b' => 'bleu',
                            'bl' => 'blanc',
                            'r' => 'rose',
                        );
                        var_dump($couleurs);
                        print_r($couleurs);

                        echo "<p class=\"alert alert-success w-50 mx-auto\">1 - La première couleur du tableau \$couleurs est : ". $couleurs['b'] ."</p>"; // dan sde squotes il orend des quotes autour de son indice

                        echo "<p class=\"alert alert-success w-50 mx-auto\">2 - La première couleur du tableau \$couleurs est : $couleurs[b].</p>"; // exception avec les guillamets, l'indice ne prend plus de quotes !

                        // mini exo :  compter le nombre d'éléments du tableau
                        echo "<p class=\"alert alert-success w-75 mx-auto text-center\">Nombre d'élements du tableau \$couleurs : ". count($couleurs). ".<br></p>.";

                        echo "<p class=\"alert alert-success w-75 mx-auto text-center\">Nombre d'élements du tableau \$couleurs : ". sizeof($couleurs). ".<br></p>.";

                        print_r(count($couleurs));
                    ?> 
                </div><!-- fin de la colonne -->

                <div class="col-sm-12">
                    <h3 class="text-center">2 - Les tableaux multi-dimensionnels</h3>
                    <p>Un tableau multi-dimensionnel est un tableau qui contiendra une suite de tableaux. Chaque tableau présente une "dimension".</p>
                    <?php 
                        $tableauMulti = array(
                            0 => array(
                                'prenom' => 'Jean',
                                'nom' => 'Castex',
                                'tel' => '01 25 26 26 90',
                            ),
                            1 => array(
                                'prenom' => 'Marc',
                                'nom' => 'Fesneau',
                                'tel' => '01 25 45 96 36',
                            ),
                            2 => array(
                                'prenom' => 'Élisabeth',
                                'nom' => 'Moreno',
                                'tel' => '01 78 65 96 36',
                            ),
                            3 => array(
                                'prenom' => 'Sophie',
                                'nom' => 'Cluzel',
                                'tel' => '01 45 14 56 35',
                            ),
                        );
                        var_dump($tableauMulti);
                        // affichez Jean :
                        // echo $tableauMulti[0]['prenom'];
                    ?> 
                    <p>Pour parcourir le tableau multi-dimensionnel, on peut faire une boucle for car ces indices sont numériques, il suffit d'incrémenter</p>
                    <ul class="alert alert-success w-50 mx-auto">
                        <?php 
                            for ($i = 0; $i < count($tableauMulti); $i++) {
                                echo "<li>" . $tableauMulti[$i]['prenom']. " "  .$tableauMulti[$i]['nom']. "</li>";
                            }
                        ?> 
                    </ul>
                </div>

            </div>
            <br><br>

                </div><!-- fin de la rangé (row) -->


            </main>
        </div>




        <!-- fin de la partie principale, col-8 -->




    </div>

    <?php
    require('../inc/footer.inc.php'); //ici on appelle le fichier footer.inc.php
    ?>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

    <!-- mon script js pour la navigation -->
    <script src="../inc/sidenav.js"></script>
</body>

</html>