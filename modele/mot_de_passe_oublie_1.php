
<?php
if (isset($_POST['valider']))
{
	$email_client = htmlspecialchars($_POST['email']);
	$ceMAC = htmlspecialchars($_POST['numero_serie_ceMAC']);
	if(!empty($_POST['email']) AND !empty($_POST['numero_serie_ceMAC']))
  	{
    	$reqemail = $bdd->prepare("SELECT id_client FROM client WHERE email = ?");
    	$reqemail->execute(array($email_client));
    	while ($id_1=$reqemail->fetch()) 
    	{
    		$id_client_1 = $id_1['id_client'];
    	}
    	$reqceMAC = $bdd->prepare("SELECT id_client FROM client WHERE numero_serie_ceMAC = ?");
    	$reqceMAC->execute(array($ceMAC));
    	while ($id_2=$reqceMAC->fetch()) 
    	{
    		$id_client_2 = $id_2['id_client'];
    	}
		if($id_client_1 == $id_client_2)
    	{
    		$_SESSION['id_client']=$id_client_1;
    		header('location:index.php?redirection=mot_de_passe_oublie_2');
    	}
    	else
    	{
    	  $erreur = "Adresse mail ou numéro de ceMAC erroné";
    	}
  }
  else
  {
    $erreur='Tous les champs doivent être remplis';
  }
}
?>