<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@ TACHE A ACCOMPLIR @@@@@@@@@@@@@@@@@@@@@@@@@@-->

<fieldset>
    <legend><strong>A faire</strong></legend>
    <form action="index.php" method="post" name="formafaire">
        <?php

            $resultat = $bdd->query('SELECT * FROM tache WHERE fin="False"');
            //j'apelle toutes les collones de la table 'tache' qui ont leur valeur de 'fin' sur 'False'
            
            while ($donnees = $resultat->fetch()) // Pour chaque ligne ...
            {
                if (strtotime($datedj) > strtotime($donnees['date'])){

                    echo "<input type='checkbox' name='tache[]' value='".($donnees['nomtache'])."'/>
                            <label for='choix' class='before'>".($donnees['nomtache'])."</label><br />";
                            // ...je crée un input avec la valeur de 'nomtache'   
                }
                elseif (strtotime($datedj) < strtotime($donnees['date'])){

                    echo "<input type='checkbox' name='tache[]' value='".($donnees['nomtache'])."'/>
                            <label for='choix' class='after'>".($donnees['nomtache'])."</label><br />";
                            // ...je crée un input avec la valeur de 'nomtache'   
                }
                elseif (strtotime($datedj) == strtotime($donnees['date'])){

                    echo "<input type='checkbox' name='tache[]' value='".($donnees['nomtache'])."'/>
                            <label for='choix' class='today'>".($donnees['nomtache'])."</label><br />";
                            // ...je crée un input avec la valeur de 'nomtache'   
                }
            }

            $resultat->closeCursor(); // Ferme le curseur, permettant à la requête d'être de nouveau exécutée 
        ?>
        <input type="submit" name="boutton" value="check" id="enregistrer" >
    </form>
</fieldset>

<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->