<?php
include("connexion_bdd.php");


$reqpiece=$bdd->prepare('SELECT * FROM piece WHERE id_client=?');
$reqpiece->execute(array($_SESSION['id_client']));


$reqcapteur=$bdd->prepare('SELECT * FROM capteur WHERE id_client=? AND ISNULL(id_piece)');
$reqcapteur->execute(array($_SESSION['id_client']));




	if(isset($_POST['validercapteurpiece']))
	{
		$idpiece=htmlspecialchars($_POST['piece']);
		$idcapteur=htmlspecialchars($_POST['capteur']);

		$reqcapteur1=$bdd->prepare('SELECT id_piece FROM capteur WHERE id_client=? AND id_capteur=?');
		$reqcapteur1->execute(array($_SESSION['id_client'],$idcapteur));
		$capteur=$reqcapteur1->fetch();
		if($capteur['id_piece']=="")
		{
				$insertpiececapteur=$bdd->prepare('UPDATE capteur SET id_piece=? WHERE id_client=? AND id_capteur=?');
				$insertpiececapteur->execute(array($idpiece,$_SESSION['id_client'],$idcapteur));
				$erreur="Ajouter";

		}
		else
		{
			$erreur="erreur capteur deja utiliser dans une autre piece";
		}

	}
	else
	{
		$erreur="erreur inconnu contacter le service client";
	}

?>
