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
		require 'modele/test_donnees_client_incompletes.php';
		require 'modele/page_accueil_client.php';
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
		require "modele/profil_formulaire_d_inscription_immeuble_2.php";
		require "vue/profil_formulaire_d_inscription_immeuble_2.php";
	}
	elseif ($redirection == 'formulaire_maison') /*Pour aller vers le formulaire d inscription maison*/
	{
		require "modele/profil_formulaire_d_inscription_maison.php";
		require "vue/profil_formulaire_d_inscription_maison.php";
	}
	elseif ($redirection == 'page_de_contact') /*Pour aller vers la page de contact*/
	{
		require 'modele/Page_de_contacts.php';
		require 'modele/page_service_client.php';
		require "vue/page_de_contact.php";
	}
	elseif ($redirection == 'ajout_piece_client')
	{
		require"modele/ajout_piece_client.php";
		require"vue/ajout_piece_client.php";
	}
	elseif ($redirection == 'ajout_capteur_client')
	{
		require "modele/fonctions_ajout_capteur.php";
		require "modele/ajout_capteur_client.php";
		require "vue/ajout_capteur_client.php";
	}
	elseif ($redirection == 'voir_profil')
	{
		require "modele/voir_profil.php";
		require "vue/voir_profil.php";
	}
	elseif ($redirection == 'suivi_consommation_energetique')
	{
		require "vue/suivi_consommation_energetique.php";
	}
	elseif($redirection=='ajout_capteur_piece_client')
	{
		require"modele/ajout_capteur_piece_client.php";
		require"vue/ajout_capteur_piece_client.php";
	}
	elseif($redirection=='generateur') /*Pour aller vers la page de generatiopn de donnees de capteurs*/
	{
		require"modele/fonction_creation_donnee.php";
		require"modele/generateur_donnee_capteur.php";
		require"vue/generateur_donnee_capteur.php";
	}
	elseif($redirection=='mot_de_passe_oublie_1') /*Pour aller vers la page de mot de passe oublié*/
	{
		require"modele/mot_de_passe_oublie_1.php";
		require"vue/mot_de_passe_oublie_1.php";
	}
	elseif($redirection=='mot_de_passe_oublie_2') /*Pour aller vers la page de mot de passe oublié*/
	{
		require"modele/mot_de_passe_oublie_2.php";
		require"vue/mot_de_passe_oublie_2.php";
	}
	elseif($redirection=="pagedecontact")
	{
		require"modele/Page_de_contacts.php";
		require"vue/page_de_contact.php";
	}
	elseif ($redirection == 'deconnexion') /*Pour se deconnecter de la session*/
	{
		$_SESSION = array(); /*vider la variable session*/
		session_destroy(); /*detruit la session*/
		header("Location: index.php"); /*redirige vers la page d'accueil*/
	}
}

?>