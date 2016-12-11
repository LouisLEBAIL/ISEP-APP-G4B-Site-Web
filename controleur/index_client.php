<?php
session_start();

require 'modele/connexion_bdd.php';

if (!isset($_GET["redirection"]))
{
	require 'modele/connexion_client.php'; 
	require 'vue/connexion_client.php';
}
else
{
	$redirection = htmlspecialchars($_GET["redirection"]);
	
	if ($redirection == 'connecte') /*Pour aller vers la paege d accueil du site*/
	{
		require 'vue/page_accueil_client.php';
	}
	elseif ($redirection == 'inscription') /*Pour aller vers la paege d accueil du site*/
	{
			require 'vue/client_modifier_profil.php';
	}
	elseif ($redirection == 'formulaire_immeuble_1') /*Pour aller vers le formulaire d inscription immeuble 2*/
	{
		require "modele/profil_formulaire_d_inscription_immeuble_1.php";
		require "vue/profil_formulaire_d_inscription_immeuble_1.php";
	}
	elseif ($redirection == 'formulaire_immeuble_2') /*Pour aller le formulaire d inscription immeuble 2*/
	{
		require "modele/profil_formulaire_ddinscription_immeuble_2.php";
		require "vue/profil_formulaire_ddinscription_immeuble_2.php";
	}
	elseif ($redirection == 'formulaire_maison') /*Pour aller vers le formulaire d inscription maison*/
	{
		require "modele/profil_formulaire_d_inscription_maison.php";
		require "vue/profil_formulaire_d_inscription_maison.php";
	}
	elseif ($redirection == 'deconnexion') /*Pour se deconnecter de la session*/
	{
		$_SESSION = array(); /*vider la variable session*/
		session_destroy(); /*detruit la session*/
		header("Location: index.php"); /*redirige vers la page d'accueil*/
	}
}

?>