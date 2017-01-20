<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="style/voir_profil.css" />
        <title>Accueil</title>
    </head>
    	<body>
    		<div id="bloc_page">
                <?php include("en_tete_client.php");?>
                <div id="container_3">
                <?php include("navigation_client.php");?>
                <section class="zone_centre">
                    <?php 
                    include("modele/fonction_traitement_type_capteur.php");
                    include("modele/ajout_capteur_client.php");
                    include("modele/ajout_piece_client.php");


                $reqpiece=$bdd->prepare('SELECT * FROM donnees_capteur WHERE id_capteur=? AND id_client=?');
                $reqpiece->execute(array($_GET['id_donnee_capteur']));?>

                    <?php

                    while($piece = $reqpiece->fetch() )
                    {

                    ?>
                        <?php echo $piece['nom_piece']; ?> 
                        <?php $idpiece=$piece['id_piece'];?>
                    
                        <p class="cadre">Pièces : <br/><br/>
                        Salon: <?php echo $piece['salon'] ?> <br/>
                        Sejour: <?php echo $piece['prenom'] ?><br/>
                        Cuisine: <?php echo $piece['cuisine'] ?><br/>
                        Cellier: <?php echo $piece['cellier'] ?> <br/>
                        Garage: <?php echo $piece['garage'] ?><br/>
                        Bureau: <?php echo $piece['bureau'] ?><br/><p>
                        Entrée: <?php echo $piece['entree'] ?><br/><p>
                        Chambre: <?php echo $piece['chambre'] ?><br/><p>
                        Salle de bain: <?php echo $piece['salle_de_bain'] ?><br/><p>
                        

        
                        <?php
                        if($pieceexist == 1 )
                        {
                            while($capteur = $reqcapteur->fetch() )
                            {
                                ?>
                                <p class="cadre">Fonctionnalités : <br/><br/>
                                Capteur température: <?php echo $capteur['capteur_temperature'] ?> <br/>
                                Capteur humidité: <?php echo $capteur['capteur_humidite'] ?><br/>
                                Capteur de mouvements: <?php echo $capteur['capteur_de_mouvements'] ?><br/>
                                Caméra: <?php echo $capteur['camera'] ?> <br/>
                                Capteur de luminosité: <?php echo $capteur['capteur_de_luminosite'] ?> <br/>
                                Capteur d'intrusion: <?php echo $capteur['capteur_d_intrusion'] ?> <br/></p>
                                Capteur de fumée: <?php echo $capteur['capteur_de_fumee'] ?> <br/></p>
                                
                            
                                <?php
                            }
                        }
                        ?>
                    <?php
                    }
                    ?>
                    </div>
                    <?php
                    
                $reqpiece->closeCursor();
            ?>
          </div>


                </section>
                </div>               
                <?php include("pied_de_page.php");?>
            </div>
        </body>
</html>













