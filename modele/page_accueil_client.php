<?php 

include ("connexion_bdd.php");


$reponse = $bdd->prepare('SELECT nom_piece FROM piece WHERE id_client=?');
$reponse->execute(array($_SESSION['id_client']));

?>
