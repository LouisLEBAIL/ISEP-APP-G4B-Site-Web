<?php
session_start();

require '../modele/connexion_bdd.php'; // Connexion a la base de donnee



if(!isset($_SESSION['id_administrateur'])) 
{
	require '../modele/connexion_administrateur.php'; 
	require '../vue/connexion_administrateur.php';
}
else   
{
	require '../modele/preinscription_client_par_administrateur.php';
}

?>
