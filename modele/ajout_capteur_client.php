 <?php


$reqpiece=$bdd->prepare('SELECT * FROM piece WHERE id_client=? AND id_piece=? ');
$reqpiece->execute(array($_SESSION['id_client'],piece('id_piece')));

$requser = $bdd -> prepare('SELECT * FROM client WHERE id_client=?');
$requser -> execute(array($_SESSION['id_client']));



if(isset($_POST['validercapteur']) AND !empty($_POST['numero_de_serie']) AND !empty($_POST['numero_du_capteur']))
{
	$numeroseriecapteur=htmlspecialchars($_POST["numero_de_serie"]);
	$numerocapteur=htmlspecialchars($_POST['numero_du_capteur']);
	$reqnumeroseriecapteur=$bdd->prepare('SELECT * FROM numero_serie_capteur WHERE numero_serie_capteur=?');
	$reqnumeroseriecapteur->execute(array($numeroseriecapteur));
	$numeroserieexist=$reqnumeroseriecapteur->rowCount();
	$reqcapteur = $bdd -> prepare('SELECT * FROM capteur WHERE id_client=? AND numero_serie_capteur=?');
	$reqcapteur -> execute(array($_SESSION['id_client'],$_POST['numero_de_serie']));
	$reqnumeroducapteur=$bdd->prepare('SELECT * FROM capteur WHERE id_client=? AND numero_capteur=?');
	$reqnumeroducapteur->execute(array($_SESSION['id_client'],$numerocapteur));
	$numero_capteur_deja_utiliser=$reqnumeroducapteur->rowCount();

	$numeroseriedejautiliser=$reqcapteur->rowCount();
	if($numero_capteur_deja_utiliser==0)
	{
			if($numeroserieexist==1 AND !empty($_POST['numero_de_serie']) AND $numeroseriedejautiliser==0 )
		{
		


			include("modele/fonction_traitement_type_capteur.php");

			$type2=type_capteur($numeroseriecapteur);
			$a=0;

			$reqcapteur=$bdd->prepare('INSERT INTO capteur(type, numero_serie_capteur, numero_capteur, etat, id_piece, id_client) VALUES(:type, :numero_serie_capteur, :numero_capteur, :etat, NULL, :id_client)');
			$reqcapteur->execute(array(
    		'type'=>$type2,
    		'numero_serie_capteur'=>$numeroseriecapteur,
    		'numero_capteur'=>$numerocapteur,
    		'etat'=>$a,
    		'id_client'=>$_SESSION['id_client']
			));
			if ($type2 == 'Alarme')
			{
				$req_1 = $bdd -> prepare('SELECT id_capteur FROM capteur WHERE numero_serie_capteur=? AND id_client=?');
				$req_1 -> execute(array(
					$numeroseriecapteur,
					$_SESSION['id_client']));

				$id_du_capteur = $req_1 -> fetch();

				$ligne_alarme = $bdd-> prepare('INSERT INTO donnee_capteur(dates, valeur, id_capteur, id_client) VALUES (:dates, :valeur, :id_capteur, :id_client)');
				$ligne_alarme -> execute(array(
					'dates'=> '2017-01-23 05:18:14',
					'valeur'=> 0,
					'id_capteur'=> $id_du_capteur['id_capteur'],
					'id_client'=> $_SESSION['id_client']));
			}
			elseif ($type2 == 'Mode_temperature')
			{
				$req_1 = $bdd -> prepare('SELECT id_capteur FROM capteur WHERE numero_serie_capteur=? AND id_client=?');
				$req_1 -> execute(array(
					$numeroseriecapteur,
					$_SESSION['id_client']));

				$id_du_capteur = $req_1 -> fetch();

				$ligne_alarme = $bdd-> prepare('INSERT INTO donnee_capteur(dates, valeur, id_capteur, id_client) VALUES (:dates, :valeur, :id_capteur, :id_client)');
				$ligne_alarme -> execute(array(
					'dates'=> '2017-01-23 05:18:14',
					'valeur'=> 'normal',
					'id_capteur'=> $id_du_capteur['id_capteur'],
					'id_client'=> $_SESSION['id_client']));
			}
			$erreur="Capteur ajouté";
		}
		elseif (!empty($_POST['numero_de_serie']))
		{
    		$erreur="Numéro de série du capteur incorrect ";
		}

	}
	else
	{
		$erreur="Numéro de capteur déja utiliser veuillez choisir un autre numéro";
	}

}
else
{
	$ereur="Veuillez remplir tous les champs";
}

if(isset($_POST['supprimer']))
{
  $supprimer=$bdd->prepare('DELETE FROM capteur WHERE  id_capteur =?');
  $supprimer->execute(array($_POST["idcapteur"]
    ));

}


?>


