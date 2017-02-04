<?php
session_start();

require '../modele/connexion_bdd.php'; // Connexion a la base de donnée

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
		header ("Location: ../vue/notifications_service_client.php");
	}
	if ($redirection == 'acces_donnees_client') /*Page permettant d'accéder à la base de données du client pour détecter les éventuels problèmes*/
	{
		header ("Location:../controleur/detection_problemes_service_client.php");

	}
	if ($redirection == 'depannage') /*Pour effectuer un dépannage/maintenance des capteurs*/
	{
		require '../modele/depannage_service_client.php';
	}
		
	if ($redirection == 'deconnexion') /*Pour se deconnecter de la session*/
	{
		$_SESSION = array(); /*vider la variable session*/
		session_destroy(); /*detruit la session*/
		header("Location: ../vue/connexion_service_client.php"); /*redirige vers la page d'accueil*/
	}
}

?>