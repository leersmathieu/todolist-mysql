<?php

$jsonURL="todo.json"; //source

$jsonReceived = file_get_contents($jsonURL); //prendre le fichier

$log = json_decode($jsonReceived, true); //décoder ( true = dans un tableau )

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

if (isset($_POST['ajouter']) AND end($log)['nomtache'] != $_POST['tache'] AND ctype_alnum($_POST['tache'])){ //Si on appuie sur le boutton ajouter...

    $add_tache = sanitize($_POST['tache']); //je récupère la valeur que je veux ajouter

    $array_tache = array("nomtache" => $add_tache, // je la met dans un tableau
                         "fin" => false);

    $log[] = $array_tache; // je crée un tableau multi dimensionnel

    $json_enc= json_encode($log, JSON_PRETTY_PRINT); // j'encore pour json ( avec passage à la ligne )

    file_put_contents($jsonURL, $json_enc); // j'envoie les données dans le json

    $log = json_decode($json_enc, true); // je décode le tout pour pouvoir le lire
   
}

if (isset($_POST['boutton'])){ //si j'enregistre ( je check la case )

    $choix=sanitize($_POST['tache']); // je récupère les valeurs checkée ("tache[]") des inputs ( qui sont alors dans un tableau )
// + apelle de la fonction sanitize//
      
    
    for ($init = 0; $init < count($log); $init ++){         // Pour chaque ligne du tableau 

        if (in_array($log[$init]['nomtache'], $choix)){     // Je compare les valeurs checkée avec le tableau 
                                                    // --> Si valeur de "nomtache" se trouve dans le tableau $choix alors...
            $log[$init]['fin'] = true;                // Je transforme False en True
        }
    }

    $json_enc= json_encode($log, JSON_PRETTY_PRINT);       //            ///
                                                    //             //                                                   
    file_put_contents($jsonURL, $json_enc);      //      /// :Same shit: //
                                                    //             //
    $log = json_decode($json_enc, true);                //            ///

}
// var_dump($log);
// echo "<br />";
// if (isset($_POST['clean'])){

//     for ($init = 0; $init < count($log); $init ++){          

//         if ($log[$init]['fin'] == true){   
                                                       
//             unset(($log)[$init]);
            
                                                                // Fonction pour CLEAN l'archive qui ne fonctionne PAS xd
//         }
        
//     }
//     var_dump($log);
//     $json_enc= json_encode($log, JSON_PRETTY_PRINT); 
                                                      
//     file_put_contents($jsonURL, $json_enc);   
                                                   
//     $log = json_decode($json_enc, true);                
    
// }

// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ \\

?>