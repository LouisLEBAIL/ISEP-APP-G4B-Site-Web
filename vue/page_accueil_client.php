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
    $req_piece1 = $bdd->prepare('SELECT * FROM piece WHERE id_client=?');
$req_piece1->execute(array($_SESSION['id_client']));
    while ($toutes_les_pieces = $req_piece1 -> fetch())
    {
    ?>
        <div class='tous_les_encadres'>
            <div class='tous_les_types'>
                <div class='nom_piece'>
                    <?php echo $toutes_les_pieces['nom_piece']; ?>
                </div>
                <div class='tous_les_capteurs'>
                    <?php
                    while ($b = $req_piece1 -> fetch()) // boucle pour toutes les pieces
                    {
                        $req1 = $bdd->prepare('SELECT * FROM capteur WHERE id_client=? AND id_piece=?');
                        $req1->execute(array($_SESSION['id_client'],$b['id_piece']));

                        while ($c = $req1 -> fetch()) // boucle pour tous les capteurs par piece
                        {
                            // Requetes a la base de donnee
                            $req2 = $bdd->prepare('SELECT * FROM capteur WHERE  id_capteur=?');
                            $req2->execute(array($c['id_capteur']));


                            // Remplissage des variables a afficher par pices et par capteurs
                            while ($z = $req1 -> fetch()) // Sortie: id de la piece ou est le capteur
                            {
                                $id_de_la_piece = $z['id_piece']; 
                            }

                            while ($a = $req2 -> fetch()) // Sortie: variable ou est l etat du capteur & type de capteur
                            {
                                $type_du_capteur = $a['type'];
                            }

                            
                                ?>
                                <div class='capteurs'>
                                <?php

                                echo $type_du_capteur.$id_de_la_piece;

                                substr($type_du_capteur.$id_de_la_piece,0)

                                ?>
                                </div>
                                <?php
                                                                      
                        }
                    }
                    ?>
                </div>
            </div>
            <div class='bouton_de_synchronisation'></div>
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