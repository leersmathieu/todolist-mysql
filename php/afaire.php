<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@ TACHE A ACCOMPLIR @@@@@@@@@@@@@@@@@@@@@@@@@@-->

<fieldset>
    <legend><strong>A faire</strong></legend>
    <form action="index.php" method="post" name="formafaire">
        <?php
            foreach ($log as $key => $value){
                                                //récupération valeur tableau multi dimension
                if ($value["fin"] == false){    // Si la valeur "fin" == false alors ...
                        
                    echo "<input type='checkbox' name='tache[]' value='".$value["nomtache"]."'/>
                        <label for='choix'>".$value["nomtache"]."</label><br />"; // injecter input.//
                }                                                                 // 'tache[]' en name pour..
            }                                                        // ..récupérer valeur checkée en tableau.
        ?>
        <input type="submit" name="boutton" value="check" id="enregistrer" >
    </form>
</fieldset>

<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->