<?php

$req_alarme = $bdd -> prepare('SELECT valeur FROM donnee_capteur WHERE id_client=? AND id_capteur=?');
$req_alarme -> execute(array(
    $_SESSION['id_client'],$id_capteur));
$alarme = $req_alarme -> fetch();

?>