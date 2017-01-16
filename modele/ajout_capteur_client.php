 <?php


$reqpiece=$bdd->prepare('SELECT * FROM piece WHERE id_client=? AND id_piece=? ');
$reqpiece->execute(array($_SESSION['id_client'],piece('id_piece')));

$requser = $bdd -> prepare('SELECT * FROM client WHERE id_client=?');
$requser -> execute(array($_SESSION['id_client']));


$numero_capteur=1;


if(isset($_POST['validercapteur']) AND !empty($_POST['numero_de_serie']))
{
	$numeroseriecapteur=htmlspecialchars($_POST["numero_de_serie"]);
	$reqnumeroseriecapteur=$bdd->prepare('SELECT * FROM numero_serie_capteur WHERE numero_serie_capteur=?');
	$reqnumeroseriecapteur->execute(array($numeroseriecapteur));
	$numeroserieexist=$reqnumeroseriecapteur->rowCount();
	$reqcapteur = $bdd -> prepare('SELECT * FROM capteur WHERE id_client=? AND numero_serie_capteur=?');
	$reqcapteur -> execute(array($_SESSION['id_client'],$_POST["numero_de_serie"]));

	$numeroseriedejautiliser=$reqcapteur->rowCount();
	if($numeroserieexist==1 AND !empty($_POST['numero_de_serie']) AND $numeroseriedejautiliser==0 )
	{
		$a=0;

		include("modele/fonction_traitement_type_capteur.php");

		$type2=type_capteur($numeroseriecapteur);

		$reqcapteur=$bdd->prepare('INSERT INTO capteur(type, numero_serie_capteur, numero_capteur, etat, id_piece, id_client) VALUES(:type, :numero_serie_capteur, :numero_capteur, :etat, NULL, :id_client)');
		$reqcapteur->execute(array(
    		'type'=>$type2,
    		'numero_serie_capteur'=>$numeroseriecapteur,
    		'numero_capteur'=>$numero_capteur,
    		'etat'=>$a,
    		'id_client'=>$_SESSION['id_client']
		));
		$erreur="Capteur ajouté";
	}
	elseif (!empty($_POST['numero_de_serie']))
	{
    	$erreur="Numero de série du capteur incorect";
	}

}

?>

