<?php 

include("modele/fonctions_client.php");

modifier_donnees();
$user = client_info();//recupere toutes les donnees du client dans la table client
redirection();// redirige le client vers la page client...maison ou client....appartement

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="style/client_modifier_profil.css" />
        <link rel="stylesheet" href="style/modifier-profil.css" />
        <link rel="stylesheet" href="style/banniere.css" />

        <title>Modification du profil</title>
    </head>
    	<body>

                <?php include("vue/en_tete_client.php");?>
    		<div id="bloc">

                <div id="id">
                   
                    <?php include("vue/profil_formulaire_d_inscription.php");?>
                    
                </div>
                <?php include("vue/pied_de_page.php");?>
            </div>
        </body>
</html>
