<?php 

include ("connexion_bdd.php");


$reponse1 = $bdd->prepare('SELECT nom_piece FROM piece WHERE id_client=?');
$reponse1->execute(array($_SESSION['id_client']));

$reponse2 = $bdd->prepare('SELECT nom_piece FROM piece WHERE id_client=?');
$reponse2->execute(array($_SESSION['id_client']));

$etat = $bdd->prepare('SELECT etat FROM capteur WHERE id_client=?');
$etat->execute(array($_SESSION['id_client']));
$etat_capteur = $etat->fetch();

?>
