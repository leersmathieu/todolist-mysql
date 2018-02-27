<?php

try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=todolist;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}



// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ \\
                                // SANITIZATION \\

function sanitize($key, $filter=FILTER_SANITIZE_STRING){ 

    $sanitized_variable = null;

    if(isset($_POST['tache'])OR isset($_POST['boutton'])){

        if(is_array($key)){                 // si la valeur est un tableau...
        $sanitized_variable = filter_var_array($key, $filter);
        }
        else {                              // sinon ...
        $sanitized_variable = filter_var($key, $filter);
        }
    }

    return $sanitized_variable;
}

// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ \\
                                // CONDITION \\

if (isset($_POST['ajouter']) AND end($log)['nomtache'] != $_POST['tache'] ){ //Si on appuie sur le boutton ajouter...

    $add_tache = sanitize($_POST['tache']); //je récupère la valeur que je veux ajouter

    $dbadd = "INSERT INTO tache (nomtache, fin)
            VALUES ('".$add_tache."', 'False')";

    $resultat = $bdd->exec($dbadd);

    
   
}

if (isset($_POST['boutton'])){ //si j'enregistre ( je check la case )

    $choix=sanitize($_POST['tache']); // je récupère les valeurs checkée ("tache[]") des inputs ( qui sont alors dans un tableau )
// + apelle de la fonction sanitize //
    foreach ($choix as $key){
        

    $dbup = "UPDATE tache
            SET fin = 'True'
            WHERE nomtache='".$key."'";
    
    $resultat = $bdd->exec($dbup);
    }
}

?>