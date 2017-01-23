<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" /> 
        <link rel="stylesheet" href="style/nouvel_accueil.css" />
        <title>Page d'accueil</title>
    </head>
    <body>
    <?php include("en_tete_client.php");?>
    <div id="container_2">
        <?php include("vue/navigation_client.php");?>

    <div class='tous_les_encadres'>
        <?php
        $req_piece = $bdd->prepare('SELECT * FROM piece WHERE id_client=?');
        $req_piece->execute(array($_SESSION['id_client']));
        while ($toutes_les_infos_des_pieces = $req_piece -> fetch()) // boucle pour toutes les pieces
        {
            ?><div class=un_encadre>
            <div class='nom_piece'>
                <?php echo $toutes_les_infos_des_pieces['nom_piece']; ?>
            </div>

            <?php
            $toutes_les_infos_des_capteurs = $bdd->prepare('SELECT * FROM capteur WHERE id_client=? AND id_piece=?');
            $toutes_les_infos_des_capteurs->execute(array($_SESSION['id_client'],$toutes_les_infos_des_pieces['id_piece']));
            ?>

            <div class='tous_les_capteurs'>
                <?php

                while ($types_de_capteurs = $toutes_les_infos_des_capteurs -> fetch())
                {
                    ?>
                    <div class='boite_pour_un_capteur'>
                    <?php
                    echo $types_de_capteurs['type'];
                    ?>
                    </div>
                    <?php
                }


                /*

                while ($id_des_capteurs = $req_id_capteurs -> fetch()) // boucle pour tous les capteurs par piece
                {
                    // Requetes a la base de donnee
                    $donnee_capteur = $bdd->prepare('SELECT * FROM donnee_capteur WHERE id_client=? AND id_capteur=?');
                    $donnee_capteur->execute(array($_SESSION['id_client'],$id_des_capteurs['id_capteur']));

                    $capteur = $bdd->prepare('SELECT * FROM capteur WHERE  id_capteur=?');
                    $capteur->execute(array($id_des_capteurs['id_capteur']));

                    // Calcul
                    while ($valeur = $donnee_capteur -> fetch())
                    {
                        $afficher_valeur = $valeur['valeur'];
                    }

                    // Affichage
                    ?>
                    <div class='capteurs'>
                    <?php
                        echo $afficher_valeur;
                    ?>
                    </div>
                    <?php                                              
                }

                */


            ?></div>
            </div><?php
        }
    ?></div></div>
    <?php include("pied_de_page.php");?>   
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