<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" /> 

        <link rel="stylesheet" href="style/accueil.css" />
        <link rel="stylesheet" href="style/banniere.css" />
        <link rel="stylesheet" href="style/menu.css" />
        <title>Page d'accueil</title>
    </head>
    <body>
    <?php include("en_tete_client.php");
    


// BOUCLE POUR UNE PIECE

    ?><div class='tous_les_encadres'><?php
        $req_id_piece = $bdd->prepare('SELECT id_piece,nom_piece FROM piece WHERE id_client=?');
        $req_id_piece->execute(array($_SESSION['id_client']));

        while ($info_de_la_piece = $req_id_piece -> fetch())
        {   
    // Requetes a la base de donnee pour connaitre les capteurs d une piece ( deux requetes identiques car besoin de deux boucles sur id_capteur par la suite)
            $req_id_capteur_test = $bdd->prepare('SELECT id_capteur FROM capteur WHERE id_client=? AND id_piece=?');
            $req_id_capteur_test->execute(array($_SESSION['id_client'],$info_de_la_piece['id_piece']));

            $req_id_capteur = $bdd->prepare('SELECT id_capteur FROM capteur WHERE id_client=? AND id_piece=?');
            $req_id_capteur->execute(array($_SESSION['id_client'],$info_de_la_piece['id_piece']));

            ?><div class='une_piece'><div class='nom_piece'>
                <?php echo $info_de_la_piece['nom_piece'];?><br />
            </div><?php
 


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
                    $donnee_capteur = $bdd->prepare('SELECT * FROM donnee_capteur WHERE id_client=? AND id_capteur=?');
                    $donnee_capteur->execute(array($_SESSION['id_client'],$id_du_capteur['id_capteur']));

                    $capteur = $bdd->prepare('SELECT * FROM capteur WHERE  id_capteur=?');
                    $capteur->execute(array($id_du_capteur['id_capteur']));



    // Calcul des donnes a afficher
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
                    ?><div class='un_capteur'><br /><?php

                        echo $type_du_capteur ;?><br /><?php

                        ?><div class='boite_pour_un_capteur'><?php


                // Gestion du capteur de temperature
                            if ($type_du_capteur == 'Temperature') 
                            {
                                echo $valeur.' °C' ;?><br /><?php                         
                            }


                // Gestion du capteur de fumee
                            if ($type_du_capteur == 'Fumee') 
                            {
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
                            }


                // Gestion du capteur de presence
                            if ($type_du_capteur == 'Intrusion')
                            {
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
                                echo 'Pas encore pris en charge.';?><br /><br /><?php
                            }


                // Gestion de l etat du capteur
                            echo 'Etat du capteur : ';
                            if ($etat_du_capteur == 0)
                            {
                                ?><div class='pre_circle'>
                                    <div class='circle_green'></div><br />
                                </div><?php
                            }
                            if ($etat_du_capteur == 1)
                            {
                                ?><div class='pre_circle'>
                                    <div class='circle_orange'></div><br />
                                </div><?php
                            }
                            if ($etat_du_capteur == 2)
                            {
                                ?><div class='pre_circle'>
                                    <div class='circle_red'></div><br />
                                </div><?php
                            }
                            if ($etat_du_capteur == 3)
                            {
                                ?><div class='pre_circle'>
                                <div class='circle_black'></div><br />
                                </div><?php
                                echo 'Capteur Hors Service';?><br /><?php
                                echo 'Veuillez remplacer la batterie';
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