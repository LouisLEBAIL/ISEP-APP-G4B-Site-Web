<?php

$req_id_capteur_test = $bdd->prepare('SELECT id_capteur FROM capteur WHERE id_client=? AND id_piece=?');
$req_id_capteur_test->execute(array($_SESSION['id_client'],$info_de_la_piece['id_piece']));

$req_id_capteur = $bdd->prepare('SELECT id_capteur FROM capteur WHERE id_client=? AND id_piece=?');
$req_id_capteur->execute(array($_SESSION['id_client'],$info_de_la_piece['id_piece']));

$req_doublon = $bdd->prepare('SELECT type FROM capteur WHERE id_client=? AND id_piece=?');
$req_doublon->execute(array($_SESSION['id_client'],$info_de_la_piece['id_piece']));

?>