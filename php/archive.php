<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@ ARCHIVE @@@@@@@@@@@@@@@@@@@@@@@@@@-->

<fieldset>
    <legend><strong>Archive</strong></legend>
    <form action="index.php" method="post" name="formchecked">
        <?php
            $resultat = $bdd->query('SELECT * FROM tache WHERE fin="True"');

            while ($donnees = $resultat->fetch()) // Pour chaque ligne ...
            {
                echo "<input type='checkbox' name='tache[]' value='".($donnees['nomtache'])."'checked disabled/>
                        <label for='choix'>".($donnees['nomtache'])."</label><br />";
                
            }

            $resultat->closeCursor(); // Ferme le curseur, permettant à la requête d'être de nouveau exécutée 
        ?>
    </form>
</fieldset>

<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->