<?php
    // 1 - fonction print_r //
    function jeprint_r($mavariable){
        echo "<small class=\"bg-primary text-white p-2\">print_r :</small><pre class=\"alert alert-primary w-50\">";
        print_r($mavariable);
        echo "</pre>";
    }

    // 2 - fonction pour exécuter les prepare //
    function executeRequete($requete, $parametres = array()){
        foreach ($parametres as $indice => $valeur){
            $parametres[$indice] = htmlspecialchars($valeur); // on évite les injections SQL
            global $pdoSITE; // global va nous premettre d'accéder à la variable $pdoSITE ted de dire qu'ell devient globale.
            $resultat = $pdoSITE->prepare($requete); // puis on prépare la requette.
            $success = $resultat->execute($parametres); // et on éxecute celle-ci.
            if ($success === false){
                return false; // si la requette ne s'execute pas, on retourne false.
            } else {
                return $resultat; // sinon on retourne le résultat de la requette.
            } // fin du "if, else".
        }
    } // fermeture de la fonction "executeRequete".
?>
