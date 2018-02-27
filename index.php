<?php

require "php/funcvar.php"; // j'apelle ma page function et variable

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="stylesheets/style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Pense-bete</title>
    </head>
    <body>
        <div class="page">
            <header>
                <img src="assets/walpap.jpg" alt="Entendue sauvage"> <!-- Je me permet l'ajout d'une image dans le header -->
            </header>
            <section class="afaire">
                <?php
                    require "php/afaire.php" ; // j'apelle ma page "afaire"
                ?>
            </section>
            <section class="archive">
                <?php
                    require "php/archive.php" ; // j'apelle ma page "archive"
                ?>
            </section>
            <footer class="addtache">
                <?php
                    require "php/footer.php" ;  // j'apelle ma page "footer"
                ?>
            </footer>
        </div>
    </body>
</html>
