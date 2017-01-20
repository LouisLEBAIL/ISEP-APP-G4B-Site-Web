<?php 

include ("connexion_bdd.php");

$req_piece = $bdd->prepare('SELECT nom_piece FROM piece WHERE id_client=?');
$req_piece->execute(array($_SESSION['id_client']));

/* TYPES DE CAPTEURS PAR SALLE */



?>
