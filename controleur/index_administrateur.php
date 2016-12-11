<?php
session_start();

require '../modele/connexion_bdd.php'; // Connexion a la base de donnee

if(!isset($_GET['redirection'])) 
{
	require '../modele/connexion_administrateur.php'; 
	require '../vue/connexion_administrateur.php';
}
else   
{
	$redirection = htmlspecialchars($_GET["redirection"]);

	if ($redirection == 'connecte') /*Pour aller vers la paege d accueil du site*/
	{
		require '../modele/preinscription_client_par_administrateur.php';
	}
	if ($redirection == 'deconnexion') /*Pour se deconnecter de la session*/
	{
		$_SESSION = array(); /*vider la variable session*/
		session_destroy(); /*detruit la session*/
		header("Location: index_administrateur.php"); /*redirige vers la page d'accueil*/
	}
}

?>
