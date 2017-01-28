<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" /> 
        <link rel="stylesheet" href="style/banniere.css" />
        <link rel="stylesheet" href="style/generateur_donnee_capteur.css" />
        <title>GENERATEUR</title>
    </head>
    <body>
    	<?php include("en_tete_client.php");



// FORMULAIRE DE RENTREE DES  INFORMATIONS REQUISES ?>

        <form method="post" class='questionnaire' action="index.php?redirection=generateur">
        <p><h6 class='warning'>WARNING !!!  NE MARCHE PAS POUR LES CAPTEURS LUMINOSITE !!!</h6><br /><br /><br />
        Capteur concerné : <br /></p><?


    // Choix du capteur
            ?><select name="id_du_capteur"><?php

                while ($capteur = $req_capteur->fetch())
                {
                
                    ?><option value="<?php echo $capteur['id_capteur'];?>">
                    <?php echo $capteur['numero_capteur'].' - '.$capteur['type']?>
                    </option><?php
                }
            ?></select><?php


    // Choix du nombre de lignes                  
            ?><p><br />Nombre de ligne de valeur que vous voulez générer :<br /></p>
            <p>
                <input type="text" name="nombre" value='50'>
            </p><?php


    // Choix de l'intervalle de mesure
            ?><p><br />Intervalle de mesure (en secondes) :<br /></p>
            <p>
                <input type="text" name="intervalle" value='86400'>
            </p>            
            

            <p><br /><input type="submit" name="valider" value="Valider"/>
            <p><?php
                if(isset($erreur))
                {
                  echo $erreur;
                }?>
            </p>
        </form>






        <?php include("pied_de_page.php");?>   
    </body>
</html> 