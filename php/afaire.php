<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@ TACHE A ACCOMPLIR @@@@@@@@@@@@@@@@@@@@@@@@@@-->

<fieldset>
    <legend><strong>A faire</strong></legend>
    <form action="index.php" method="post" name="formafaire">
        <?php

            $resultat = $bdd->query('SELECT * FROM tache WHERE fin="False"');

            while ($donnees = $resultat->fetch()) // Pour chaque ligne ...
            {
                echo "<input type='checkbox' name='tache[]' value='".($donnees['nomtache'])."'/>
                        <label for='choix'>".($donnees['nomtache'])."</label><br />";
                
            }

            $resultat->closeCursor(); // Ferme le curseur, permettant à la requête d'être de nouveau exécutée 

        ?>
        <input type="submit" name="boutton" value="check" id="enregistrer" >
    </form>
</fieldset>

<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->