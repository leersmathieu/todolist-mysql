<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@ ARCHIVE @@@@@@@@@@@@@@@@@@@@@@@@@@-->

<fieldset>
    <legend><strong>Archive</strong></legend>
    <form action="index.php" method="post" name="formchecked">
        <?php
            foreach ($log as $key => $value){

                if ($value["fin"] == true){

                    echo "<input type='checkbox' name='tache[]' value='".$value."'checked disabled/>
                        <label class='line' for='choix'>".$value["nomtache"]."</label><br />";
                }
            }
        ?>
        <!-- <input type="submit" name="clean" value="clean" id="clean" > --> 
    </form>
</fieldset>

<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->