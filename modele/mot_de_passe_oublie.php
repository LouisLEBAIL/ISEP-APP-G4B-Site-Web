
<?php
if (isset($_POST['valider']))
{
	$login_client_connect = htmlspecialchars($_POST['email']);
	if(!empty($_POST['login_client_connect']) AND !empty($_POST['mdpconnect']))
  {
    $reqemail = $bdd->prepare("SELECT * FROM client WHERE email = ? AND numero_serie_ceMAC = ? ");
    $reqemail->execute(array($login_client_connect, $mdpconnect));
    $utilisateurexist = $reqemail->rowCount();
	if($utilisateurexist == 1)
    {
      $utilisateurinfo = $reqemail -> fetch();
      
    }
    else
    {
      $erreur = "Adresse mais ou numéro de ceMAC erroné";
    }
  }
  else
  {
    $erreur='Tous les champs doivent être remplis';
  }
?>