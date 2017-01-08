<?php 

include ("connexion_bdd.php");


$reponse1 = $bdd->prepare('SELECT nom_piece FROM piece WHERE id_client=?');
$reponse1->execute(array($_SESSION['id_client']));

$reponse2 = $bdd->prepare('SELECT nom_piece FROM piece WHERE id_client=?');
$reponse2->execute(array($_SESSION['id_client']));
$nombredepiece=$reponse2->rowCount();

?>
