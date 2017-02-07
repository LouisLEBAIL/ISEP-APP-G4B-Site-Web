<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" /> 

        <link rel="stylesheet" href="style/accueil.css" />
        <link rel="stylesheet" href="style/banniere.css" />
        <title>Page d'accueil</title>
    </head>
    <body>
    <?php include("en_tete_client.php");
 


// BOUTON POUR RAFRAICHIR LA PAGE

    ?><div class="ensemble_refresh">
        <p class="date">
        <?php

    // Affichage de la date exacte actuelle
            echo 'Dernière mise à jour : '; 
            setlocale (LC_TIME, 'fr_FR.utf8','fra');
            $date_donnee = time();
            $date_donnee = date("Y-m-d H:i:s", $date_donnee);
            echo $date_donnee; 

    // Rafraichissemment de la page
            ?>
        </p>
        <p class="refresh">
            <a href="javascript:window.location.reload()">Rafraichir la page</a>
        </p>
    </div><?php



// BOUCLE POUR UNE PIECE

    ?><div class='tous_les_encadres'><?php

        require 'modele/SQL_Page_Accueil/SQL_1.php';
        $increment = 0;  // Increment pour avoir un nom unique par bouton valider
        $i=0;
        while ($info_de_la_piece = $req_id_piece -> fetch())
        {  



    // Requetes a la base de donnee pour connaitre les capteurs d une piece ( deux requetes identiques car besoin de deux boucles sur id_capteur par la suite)

            require 'modele/SQL_Page_Accueil/SQL_2.php';
            $increment++;

            ?><div class='une_piece'><div class='nom_piece' id="nom">
                <?php echo '<h2>'.$info_de_la_piece['nom_piece'];'</h2>';?><br />
            </div><?php
 


    // Test pour detecter si il y a plusieur capteurs du meme type dans la piece

            // Innitialisation des variables qui contiennent le nombre de capteurs de la piece par type
            $temperature = 0;
            $luminosite = 0;
            $fumee = 0;
            $intrusion = 0;
            
            // Decompte des capteurs par type de la piece
            while ($doublon_type = $req_doublon -> fetch())
            {
                if ($doublon_type == 'Temperature')
                {
                    $temperature++;
                }
                if ($doublon_type == 'Luminosite')
                {
                    $luminosite++;
                }
                if ($doublon_type == 'Fumee')
                {
                    $fumee++;
                }
                if ($doublon_type == 'Intrusion')
                {
                    $intrusion++;
                }
            }



    // Test pour savoir si il y a un capteur dans la salle
            if (empty($req_id_capteur_test -> fetch()))
            {
                ?><div class='pas_de_capteur'><br />
                Cette pièce ne comporte pas de capteur.
                <br /><br />
                Vous pouvez ajouter un capteur 
                <a href='index.php?redirection=ajout_capteur_client'> ici </a>.
                <br /><br />
                Vous pouvez lier un capteur à votre pièce 
                <a href='index.php?redirection=ajout_capteur_piece_client'> ici </a>.
                </div><?php
            }



// BOUCLE POUR UN CAPTEUR

            else
            {                       
                ?><div class='tous_les_capteurs'><?php

                while ($id_du_capteur = $req_id_capteur -> fetch())
               {



    // Requetes a la base de donnee
                    require 'modele/SQL_Page_Accueil/SQL_3.php';



    // Calcul des donnes a afficher
                    $increment++;
                    $id_capteur = $id_du_capteur['id_capteur'];

                    while ($infos_de_la_table_capteur = $capteur -> fetch())  // Pour les infos de la table capteur
                    {
                // Sortie: type de capteur
                        $type_du_capteur = $infos_de_la_table_capteur['type'];

                // Sortie: etat du capteur
                        $etat_du_capteur = $infos_de_la_table_capteur['etat'];
                    }
                    while ($infos_de_la_table_donnee_capteur = $donnee_capteur -> fetch()) // Pour les infos de la table donnee_capteur
                    {
                // Sortie: valeur du capteur
                        $valeur = $infos_de_la_table_donnee_capteur['valeur'];
                    }

                    

    // Affichage des informations
                    ?><div class='un_capteur'><?php

                        if ($type_du_capteur != 'Mode_temperature')
                        {
                            echo $type_du_capteur.':'.'<hr />' ;                           
                        }
                        elseif ($type_du_capteur == 'Mode_temperature')
                        {
                            echo 'Chauffage :'.'<hr />' ;
                        }


                        ?><div class='boite_pour_un_capteur'><?php


                // Gestion du capteur de temperature
                            if ($type_du_capteur == 'Temperature') 
                            {
                                ?>
                                <div class="image">
                                    <?php
                                    echo  '<img  src="picture/temperature.png" title="Temperature" />';
                                    echo '<h3>'.$valeur.'°C'.'</h3>' ;?><br />
                                </div><?php   

                            }


                // Gestion du mode eco/confort                            
                            if ($type_du_capteur == 'Mode_temperature')
                                {


                            // Affichage de l etat actuel
                                    echo 'Vous êtes en mode '.$valeur ;?><br />

                                    <div class='mode'><?php
                                    if ($valeur == 'normal')
                                    {
                                        ?><div  class='eco'>
                                            <form method="post"><?php
                                                echo' <input type="submit" name="eco'.$i.'" value="ECO">'?>
                                            </form>
                                        </div>
                                        <div class='confort'>
                                            <form method="post"><?php
                                                echo' <input type="submit" name="confort'.$i.'" value="CONFORT">'?>
                                            </form>
                                        </div><?php
                                    }
                                    elseif ($valeur == 'eco')
                                    {
                                        ?><div  class='normal'>
                                            <form method="post"><?php
                                                echo' <input type="submit" name="normal'.$i.'" value="NORMAL">'?>
                                            </form>
                                        </div>
                                        <div class='confort'>
                                            <form method="post"><?php
                                                echo' <input type="submit" name="confort'.$i.'" value="CONFORT">'?>
                                            </form>
                                        </div><?php
                                    }
                                    elseif ($valeur == 'confort')
                                    {
                                        ?><div  class='eco'>
                                            <form method="post"><?php
                                                echo' <input type="submit" name="eco'.$i.'" value="ECO">'?>
                                            </form>
                                        </div>
                                        <div class='normal'>
                                            <form method="post"><?php
                                                echo' <input type="submit" name="normal'.$i.'" value="NORMAL">'?>
                                            </form>
                                        </div><?php
                                    }
                                    ?></div><?php

                                    if (isset($_POST['eco'.$i.'']))
                                    {

                                        $b = $bdd -> prepare('UPDATE donnee_capteur SET valeur=? WHERE id_capteur=? AND id_client=?');
                                        $var1='eco';
                                        $b -> execute(array(
                                            $var1,
                                            $id_capteur,
                                            $_SESSION['id_client']));

                                        ?><meta http-equiv="refresh" content="0" /><?php
                                    }
                                    elseif (isset($_POST['normal'.$i.'']))
                                    {

                                        $b = $bdd -> prepare('UPDATE donnee_capteur SET valeur=? WHERE id_capteur=? AND id_client=?');
                                        $var1='normal';
                                        $b -> execute(array(
                                            $var1,
                                            $id_capteur,
                                            $_SESSION['id_client']));

                                        ?><meta http-equiv="refresh" content="0" /><?php
                                    }
                                    elseif (isset($_POST['confort'.$i.'']))
                                    {

                                        $b = $bdd -> prepare('UPDATE donnee_capteur SET valeur=? WHERE id_capteur=? AND id_client=?');
                                        $var1='confort';
                                        $b -> execute(array(
                                            $var1,
                                            $id_capteur,
                                            $_SESSION['id_client']));

                                        ?><meta http-equiv="refresh" content="0" /><?php
                                    }
                                }


                // Gestion du capteur de fumee
                            if ($type_du_capteur == 'Fumee') 
                            {
                                ?><div class="image"><?php
                                    echo  '<img  src="picture/fire.png" title="Fumée" />';
                                ?></div><?php

                                /* A REVOIR

                                if ($valeur == 0) // Si il n y a pas de fumée
                                {
                                    ?><div class='pre_circle'>
                                        <div class='circle_green'></div><br />
                                    </div><?php
                                }
                                if ($valeur == 1) // Si il y a de la fumee
                                {
                                    ?><div class='pre_circle'>
                                        <div class='circle_red'></div><br />
                                    </div><?php
                                }

                                */
                            }


                // Gestion du capteur d intrusion
                            if ($type_du_capteur == 'Intrusion') 
                            {
                                ?>
                                <div class="image">
                                    <?php
                                    echo  '<img  src="picture/house.png" title="Sécurité" />';?>
                                </div><?php   
                            
                                if ($valeur == 0) // Si il n y personne
                                {
                                    ?><div class='pre_circle'>
                                        <div class='circle_green'></div><br />
                                    </div><?php
                                }
                                if ($valeur == 1) // Si il y a un intru
                                {
                                    ?><div class='pre_circle'>
                                        <div class='circle_red'></div><br />
                                    </div><?php
                                }                            
                            }


                // Gestion du capteur de luminosite
                            if ($type_du_capteur == 'Luminosite') 
                            {
                                ?><div class="image"><?php
                                    echo '<img  src="picture/luminiosity.png" title="Luminosité" />';
                                    echo ' ';?><br /><br />
                                </div><?php
                            }


                // Gestion de l actionneur des volets
                            if ($type_du_capteur == 'Volet')
                            {
                                ?><div class="image"><?php
                                    echo '<img  src="picture/volet.png" title="Volets" />';
                                    echo ' ';?><br /><br />
                                </div><?php

                                if ($valeur == 1)
                                {
                                    ?><br /><?php
                                    echo 'Volet ouvert';
                                }
                                elseif ($valeur == 0)
                                {
                                    ?><br /><?php
                                    echo 'Volet fermé';
                                }
                                
                                
                            }


                // Gestion de l actionneur de l alarme

                            require 'modele/SQL_Page_Accueil/SQL_4.php';

                            if ($type_du_capteur == 'Alarme')
                            {
                                if ($alarme['valeur'] == 1)
                                {
                                ?><div class="image"><?php
                                    echo '<img  src="picture/padlock.png" title="Alarme" />';
                                    echo ' ';?><br /><br />
                                </div><?php                    
                                }
                                elseif ($alarme['valeur'] == 0)
                                {
                                ?><div class="image"><?php
                                    echo '<img  src="picture/unlocked.png" title="Alarme" />';
                                    echo ' ';?><br /><br />
                                </div><?php                                
                                }
                            }


                // Gestion de l etat du capteur SI CAPTEUR
                            if ($type_du_capteur == 'Luminosite' OR $type_du_capteur == 'Presence' OR $type_du_capteur == 'Fumee' OR $type_du_capteur == 'Temperature')
                            {
                                echo '<hr /  class="vertical">';
                                ?><div class='batterie'><?php
                                    if ($etat_du_capteur == 0)
                                    {
                                        echo '<img  src="picture/battery_1.png" title="Batterie" />';
                                    }
                                    elseif ($etat_du_capteur == 1)
                                    {
                                        echo '<img  src="picture/battery_2.png" title="Batterie" />';                                    
                                    }
                                    elseif ($etat_du_capteur == 2)
                                    {
                                        echo '<img  src="picture/battery_3.png" title="Batterie" />';
                                    }
                                    elseif ($etat_du_capteur == 3)
                                    {
                                        echo '<img  src="picture/battery_4.png" title="Batterie" />';
                                    }
                                ?></div> <?php                                
                            } 
                            

                // Bouton ON/OFF NE METTRE QUE SI PAS DE BATTERIE CAPTEUR (Pb CSS)
                            if ($type_du_capteur == 'Volet' OR $type_du_capteur == 'Alarme' OR $type_du_capteur == 'Intrusion')
                            {
                                echo '<hr /  class="vertical">';

                                if ($alarme['valeur'] == 1)
                                {
                                    ?>
                                    <form method="post" class='onoff'>
                                    <?php

                                  echo' <input type="submit" name="padlockoff'.$i.'" value="OFF">'?>
                                    </form><?php
                                    

                                    if (isset($_POST['padlockoff'.$i.'']))
                                    {
                                        $a = $bdd -> prepare('UPDATE donnee_capteur SET valeur=? WHERE id_capteur=? AND id_client=?');
                                        $var=0;
                                        $a -> execute(array(
                                            $var,
                                            $id_capteur,
                                            $_SESSION['id_client']));

                                        ?><meta http-equiv="refresh" content="0" /><?php
                                    }
                                }
                                elseif ($alarme['valeur'] == 0)
                                {
                                    ?><form method="post" class='onoff'>
                                        <?php echo'<input type="submit" name="padlockon'.$i.'" value="ON">'?>
                                    </form><?php

                                    if (isset($_POST['padlockon'.$i.'']))
                                    {

                                        $b = $bdd -> prepare('UPDATE donnee_capteur SET valeur=? WHERE id_capteur=? AND id_client=?');
                                        $var1=1;
                                        $b -> execute(array(
                                            $var1,
                                            $id_capteur,
                                            $_SESSION['id_client']));

                                        ?><meta http-equiv="refresh" content="0" /><?php
                                    }
                                }
                                $i++;
                            }                      
                        ?></div>
                    </div><?php                 
                }
                ?></div><?php
            }         
            ?></div><?php
            
        }
    ?></div>
    <?php include("pied_de_page.php");?>   
    </body>
</html>