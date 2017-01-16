<?php 

include ("connexion_bdd.php");

$req_piece = $bdd->prepare('SELECT nom_piece FROM piece WHERE id_client=?');
$req_piece->execute(array($_SESSION['id_client']));

/* TYPES DE CAPTEURS PAR SALLE */

while ($toutes_les_pieces = $req_piece -> fetch())
{
	$req_id_pieces = $bdd->prepare('SELECT id_piece FROM piece WHERE id_client=? AND nom_piece=?');
	$req_id_pieces->execute(array($_SESSION['id_client'],$toutes_les_pieces['nom_piece']));

	while ($id_des_pieces = $req_id_pieces -> fetch())
	{
		$req_type_capteur = $bdd->prepare('SELECT type FROM capteur WHERE id_client=? AND id_piece=?');
		$req_type_capteur->execute(array($_SESSION['id_client'],$id_des_pieces['id_piece']));

		while ($type_de_capteur = $req_type_capteur -> fetch())	
	}
}

?>
