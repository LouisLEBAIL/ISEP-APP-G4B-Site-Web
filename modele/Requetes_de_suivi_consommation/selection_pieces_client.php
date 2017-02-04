<?php
$req_id_piece = $bdd->prepare('SELECT id_piece,nom_piece FROM piece WHERE id_client=?');
$req_id_piece->execute(array($_SESSION['id_client']));
?>