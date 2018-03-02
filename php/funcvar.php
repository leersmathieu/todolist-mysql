<?php
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ \\
                                // CONNECTION DB \\

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

function sanitize($key, $filter=FILTER_SANITIZE_STRING){ // je crée une fonction que j'apelle sanitize

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
                                // FUNCTION-VARIABLE-CONDITION \\

$datedj = date("Y-m-d");
                                
$sqlobject = $bdd->query('SELECT * FROM tache ORDER BY id DESC LIMIT 1 '); //
                                                                          //Pour éviter les doublons en rafraichissant la page...
$sqlobject = $sqlobject->fetch();                                        //Je veux récupéré la valeur (nomtache) du dernier élément inséré via son id
                                                                        //pour pouvoir la comparer ( juste en dessous )
// echo ($sqlobject['nomtache']);                                      //

if (isset($_POST['ajouter']) AND !empty($_POST['tache']) AND $sqlobject['nomtache'] != $_POST['tache']){ //Si on appuie sur le boutton ajouter... ( + comparaison )

    $add_tache = ($_POST['tache']); //je récupère la valeur que je veux ajouter


    if (!empty($add_tache) AND $add_tache[0] != '<'){ // Si addtache n'est pas vide et qu'elle ne commence pas par '<'...
        
        $add_tache = sanitize($_POST['tache']); // appelle de la sanitisation

        $add_date = !empty($_POST['date']) ? $_POST['date'] : $datedj; // date du jour par défaut ( si aucune date entrée )

        $dbadd = "INSERT INTO tache (nomtache, fin, `date`) 
                VALUES ('".$add_tache."', 'False','".$add_date."')";
            //Ajout de la tache ( et de la date ) dans la database avec la valeur de 'fin' sur 'False'

         $resultat = $bdd->exec($dbadd);
            //execution de la requête sur la base de donnée

            

    }
    else { // Sinon, grosse loop pour faire ramer la page du méchant qui tente une manip chelou + affichage d'un message sympathique

        echo '<form class="protect"><input type="submit" name="refresh" value="Skip" id="refresh"><span class="hacker"><br />';

            for ($x = 0; $x <= 99999; $x++) {

                echo "don't try to hack my site nab<br />";

            }

        echo '</span></from>';
    }

}

if (isset($_POST['boutton'])){ //si j'enregistre ( je check la case.. )

    $choix=sanitize($_POST['tache']); // je récupère les valeurs checkée ("tache[]") des inputs ( qui sont alors dans un tableau )

    foreach ($choix as $key){ // pour chaque ligne ...

    // var_dump($choix)."<br />";
    // var_dump($key."<br />");
    //                                    // <====          ====            ====            ==
    // echo "<br />";                   // <==== CECI PEUT VOUS AIDEZ A Y VOIR PLUS CLAIRE !!! \\
    //                                   // <====           ====            ====            ==
    // echo($choix)."<br />";
    // echo($key)."<br />";
        

    $dbup = "UPDATE tache
            SET fin = 'True'
            WHERE nomtache='".$key."'";
            //La où "nomtache" est égale à une valeur de $choix, je remplace "fin". False devient True
    
    $resultat = $bdd->exec($dbup); // Exécution... ( query )

    }
}

?>