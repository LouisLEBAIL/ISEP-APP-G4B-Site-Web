<?php
include("connexion_bdd.php");


$reqpiece=$bdd->prepare('SELECT * FROM piece WHERE id_client=?');
$reqpiece->execute(array($_SESSION['id_client']));




$reqcapteur=$bdd->prepare('SELECT id_piece FROM capteur WHERE id_client=? AND id_capteur=?');
$reqcapteur->execute(array($_SESSION['id_client']),$idcapteur);

	$capteur['id_piece'];
	if(isset($_POST['validercapteurpiece']) AND  )
	{
		$idpiece=htmlspecialchars($_POST['piece']);
              
   

		$insertpiececapteur=$bdd->prepare('UPDATE capteur SET id_piece=? WHERE id_client=? AND id_capteur=?');
		$insertpiececapteur->execute(array($idpiece,$_SESSION['id_client'],$idcapteur));
		$erreur="Ajouter";

	}
	else
	{
		$erreur="erreur inconnu contacter le service client";
	}






?>
