<?php

$donnee_capteur = $bdd->prepare('SELECT * FROM donnee_capteur WHERE id_client=? AND id_capteur=?');
$donnee_capteur->execute(array($_SESSION['id_client'],$id_du_capteur['id_capteur']));

$capteur = $bdd->prepare('SELECT * FROM capteur WHERE  id_capteur=?');
$capteur->execute(array($id_du_capteur['id_capteur']));

?>