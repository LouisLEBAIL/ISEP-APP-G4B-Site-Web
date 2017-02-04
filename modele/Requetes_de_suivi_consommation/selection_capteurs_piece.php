<?php
$req_capteur = $bdd -> prepare('SELECT id_capteur,type FROM capteur WHERE id_client=? AND id_piece=? ');
$req_capteur->execute(array($_SESSION['id_client'], $nom_des_pieces['id_piece']));
?>