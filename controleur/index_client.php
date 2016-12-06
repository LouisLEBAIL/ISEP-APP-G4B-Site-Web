<?php
session_start();

require '../modele/connexion_bdd.php';

if(!isset($_SESSION['id_administrateur'])) 
{
	require '../modele/connexion_client.php'; 
	require '../vue/connexion_client.php';
}