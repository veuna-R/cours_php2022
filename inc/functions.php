<?php
    // une première fonction
    function minpap() {
        echo "<p class\"lead\">Minute papilon !</p>";
    }
    // fonction pour afficher le jour de la semaine
    function quelJour() {
        setlocale(LC_ALL, 'fr_FR');
        echo "<p class=\"alert alert-primary w-75 mx-auto text-center\">Nous sommes le " . strftime(" %A %e %B %Y") . "</p>";
        echo "<p class=\"alert alert-primary w-75 mx-auto text-center\">It is the" . date("l j F Y") . "</p>";
    }
    // création d'une fonction qui var_dump une variable. Très utile pour un tableau
    function jevar_dump($mavariable) { //la fonction nommée avec son paramètre: une variable qu'on va pouvoir modifier pour mettre le nom de celle qu'on veut afficher
        echo "<small class=\"bg-success text-white p-2\">var_dump: <pre class=\"alert alert-success w-75 text-center\">";
        var_dump($mavariable);
        echo "</pre>";
    }
    function jeprint_r($mavariable) { 
        echo "<small class=\"bg-primary text-white p-2\">var_dump: <pre class=\"alert alert-primary w-75 text-center\">";
        jeprint_r($mavariable);
        echo "</pre>";
    }
?>