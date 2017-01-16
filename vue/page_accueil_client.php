<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" /> 
        <link rel="stylesheet" href="style/accueil.css" />
        <title>Page d'accueil</title>
    </head>
    <body>
        <?php include("vue/en_tete_client.php");?>
    <div id="container_2">
            <?php include("vue/navigation_client.php");?>
        </div>

    <?php
    while ($toutes_les_pieces = $req_piece -> fetch())
    {
    ?>
        <div class=tous_les_encadres>
            <div class=tous_les_types>
                <div class=nom_piece>
                    <?php echo $toutes_les_pieces['nom_piece']; ?>
                </div>
                

            </div>
        </div>
    <?php
    }
    ?>

        <?php include("vue/pied_de_page.php");?>
    </body>
</html>

<?php
/*
                        echo'<div class="onoffswitch">';
                        echo'<input type="checkbox" name="onoffswitch[]" class="onoffswitch-checkbox" id="myonoffswitch'.$i.'" value="valeur">';
                        echo'<label class="onoffswitch-label" for="myonoffswitch'.$i.'">';
                        echo'<span class="onoffswitch-inner">';
                        echo'</span>';
                        echo'<span class="onoffswitch-switch">';
                        echo'</span>';
                        echo'</label>';
                        echo '</div>';
*/
?>