/* index_traduction_site */

<?php
session_start();

require 'modele/connexion_bdd.php';

if (!isset($_GET["redirection"]))
{
	require 'vue/english_website_version.php'; 
	require 'vue/connexion_client.php';
}
else
{
	$redirection = htmlspecialchars($_GET["redirection"]);
	
	if ($redirection == 'connecte') /*Pour aller vers la paege d accueil du site*/
	{
		require 'vue/english_website_version.php';
		require 'vue/page_accueil_client.php';
		
	}
	elseif ($redirection == 'inscription') /*Pour aller vers la paege d accueil du site*/
	{

require 'vue/client_modifier_profil.php';
	}
	elseif ($redirection == 'formulaire_immeuble_1') /*Pour aller vers le formulaire d inscription immeuble 2*/
	{
		require "vue/english_website_version.php";
		require "vue/profil_formulaire_d_inscription_immeuble_1.php";
	}
	elseif ($redirection == 'formulaire_immeuble_2') /*Pour aller le formulaire d inscription immeuble 2*/
	{
		require "vue/english_website_version.php";
		require "vue/profil_formulaire_d_inscription_immeuble_2.php";
	}
	elseif ($redirection == 'formulaire_maison') /*Pour aller vers le formulaire d inscription maison*/
	{
		require "vue/english_website_version.php";
		require "vue/profil_formulaire_d_inscription_maison.php";
	}
	elseif ($redirection == 'page_de_contact') /*Pour aller vers la page de contact*/
	{
		require 'vue/english_website_version.php';
		require "vue/page_de_contact.php";
	}
	elseif ($redirection == 'ajout_piece_client')
	{
		require"vue/english_website_version.php";
		require"vue/ajout_piece_client.php";
	}
	elseif ($redirection == 'ajout_capteur_client')
	{
		require "vue/english_website_version.php";
		require "vue/ajout_capteur_client.php";
	}
	elseif ($redirection == 'voir_profil')
	{
		require "vue/english_website_version.php";
		require "vue/voir_profil.php";
	}
	
	elseif($redirection=='ajout_capteur_piece_client')
	{
		require"vue/english_website_version.php";
		require"vue/ajout_capteur_piece_client.php";
	}
	elseif($redirection=='generateur') /*Pour aller vers la page de generatiopn de donnees de capteurs*/
	{
		require"vue/english_website_version.php";
		require"vue/generateur_donnee_capteur.php";
	}
	elseif($redirection=='mot_de_passe_oublie_1') /*Pour aller vers la page de mot de passe oublié*/
	{
		require"vue/english_website_version.php";
		require"vue/mot_de_passe_oublie_1.php";
	}
	elseif($redirection=='mot_de_passe_oublie_2') /*Pour aller vers la page de mot de passe oublié*/
	{
		require"vue/english_website_version.php";
		require"vue/mot_de_passe_oublie_2.php";
	}
	elseif ($redirection == 'deconnexion') /*Pour se deconnecter de la session*/
	{
		$_SESSION = array(); /*vider la variable session*/
		session_destroy(); /*detruit la session*/
		header("Location: index.php"); /*redirige vers la page d'accueil*/
	}
}

?>






































