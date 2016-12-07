<?php 
session_start();
include("fonctions.php");

modifier_donnees();
$user = client_info();//recupere tout les donnes du client dans la table client
redirection();// redirige le client vers la page client...maison ou client....appartement

?>



<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="style/client_modifier_profil.css" />
        <title>Page de connexion</title>
        <title>Présentation de DomLab</title>
    </head>
    	<body>
    		<div id="bloc_page_3">
                <?php include("en_tete_2.php");?>
                <div id="container_3">
                    <?php include("navigation_client.php");?>
                    <?php include("profil_formulaire_d_inscription.php");?>
                </div>
                <?php include("pied_de_page.php");?>
            </div>
        </body>
</html>


