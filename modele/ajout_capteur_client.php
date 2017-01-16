 <?php


$reqpiece=$bdd->prepare('SELECT * FROM piece WHERE id_client=? AND id_piece=? ');
$reqpiece->execute(array($_SESSION['id_client'],piece('id_piece')));

$requser = $bdd -> prepare('SELECT * FROM client WHERE id_client=?');
$requser -> execute(array($_SESSION['id_client']));


if(isset($_POST['validercapteur']))
{
	$numeroseriecapteur=htmlspecialchars($_POST["numero_de_serie"]);
	$reqnumeroseriecapteur=$bdd->prepare('SELECT * FROM numero_serie_capteur WHERE numero_serie_capteur=?');
	$reqnumeroseriecapteur->execute(array($numeroseriecapteur));
	$numeroserieexist=$reqnumeroseriecapteur->rowCount();
	if($numeroserieexist==1)
	{
		$a=0;

		include("modele/fonction_traitement_type_capteur.php");

		$type2=type_capteur($numeroseriecapteur);

		$reqcapteur=$bdd->prepare('INSERT INTO capteur(type, numero_serie_capteur, etat, id_piece, id_client) VALUES(:type, :numero_serie_capteur, :etat, NULL, :id_client)');
		$reqcapteur->execute(array(
    		'type'=>$type2,
    		'numero_serie_capteur'=>$numeroseriecapteur,
    		'etat'=>$a,
    		'id_client'=>$_SESSION['id_client']
		));
		$erreur="Capteur ajouter";
	}
	else
	{
    	$erreur="probleme";
	}
}

?>

