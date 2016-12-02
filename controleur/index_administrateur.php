<?php
session_start();

require '../modele/connexion_bdd.php'; // Connexion a la base de donnee
$etat_connection = 'non_connecte';

if ($etat_connection == 'connecte') // Si l'administrateur est connecté
{
	require '../modele/preinscription_client_par_administrateur.php'; // Page qui permet de preinscrire le client sur la base de donnee
	require '../vue/preinscription_client_par_administrateur.php'; // On affiche la page 
}

if ($etat_connection == 'non_connecte') // Si l'administrateur n'est pas connecté
{
	require '../modele/connexion_administrateur.php'; // Page qui permet de verifier l'identite de l'administrateur dans la base de donnee
	require '../vue/connexion_administrateur.php'; // On affiche la page 
}

?>