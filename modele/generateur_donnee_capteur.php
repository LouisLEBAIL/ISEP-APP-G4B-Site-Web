<?php

require 'modele/connexion_bdd.php';

$req_capteur = $bdd -> prepare('SELECT * FROM capteur WHERE id_client=?');
$req_capteur -> execute(array($_SESSION['id_client']));

if(isset($_POST['valider']))
{
	$nom_capteur=htmlspecialchars($_POST['id_du_capteur']);
	$nb_lignes=htmlspecialchars($_POST['nombre']);

	creation_donnees($nom_capteur,$nb_lignes,$_SESSION['id_client']);
	
	$erreur="Fait !";
}