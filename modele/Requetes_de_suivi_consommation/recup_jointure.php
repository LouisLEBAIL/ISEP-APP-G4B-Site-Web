<?php
$recup_jointure=$bdd->('SELECT * FROM jointure WHERE id_client=?, type=Temperature, id_piece=?, id_capteur=?');
$recup_jointure->execute(array(S_SESSION['id_client'],$nom_des_pieces['id_piece'] , $donnees_capteurs['id_capteur']));
?>
