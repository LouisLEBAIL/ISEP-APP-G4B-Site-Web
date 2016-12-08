<?php
session_start();

require 'modele/connexion_bdd.php';

if(!isset($_SESSION['id_client'])) 
{
	require 'modele/connexion_client.php'; 
	require 'vue/connexion_client.php';
}
else
{
	require 'vue/page_accueil_client.php';
}
?>