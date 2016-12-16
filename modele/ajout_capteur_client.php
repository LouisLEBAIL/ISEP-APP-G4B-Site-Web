<?php
include("modele/connexion_bdd.php");
$reqpiece=$bdd->prepare('SELECT * FROM piece WHERE id_client=? AND id_piece=? ');
$reqpiece=execute(array($_SESSION['id_client'],$piece['id_piece']
	));


?>