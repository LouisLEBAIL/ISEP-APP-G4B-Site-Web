<!DOCTYPE html>
<html>
<head>
	<title>Page d'accueil Service Client</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="accueil_admin.css">
</head>
<body>
<?php
session_start();

require '../modele/connexion_bdd.php'; // Connexion a la base de donnee

if(!isset($_GET['redirection'])) 
{
	require '../modele/connexion_service_client.php'; 
	require '../vue/connexion_service_client.php';
}
else   
{
	$redirection = htmlspecialchars($_GET["redirection"]);
	include("../vue/en_tete_service_client.php");
	include("../vue/navigation_service_client.php");

	if ($redirection == 'notifications') /*Page permettant de lire les notifications envoyées par les clients*/
	{
		require '../vue/notifiation_service_client.php';
	}
	if ($redirection == 'accès_donnees_client') /*Page permettant d'accéder à la base de données du client pour détecter les éventuels problèmes*/
	{
		require '../controleur/acces_donnees_clients_service_client.php';

	}
	if ($redirection == 'depannage') /*Pour effectuer un dépannage/maintenance des capteurs*/
	{
		require '../modele/depannage_service_client.php';
		
	if ($redirection == 'deconnexion') /*Pour se deconnecter de la session*/
	{
		$_SESSION = array(); /*vider la variable session*/
		session_destroy(); /*detruit la session*/
		header("Location: index_service_client.php"); /*redirige vers la page d'accueil*/
	}
}
}

?>
</body>
</html>