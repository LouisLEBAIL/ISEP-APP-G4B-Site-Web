<?php

if (isset($_POST['formconnexionserviceclient']))
{
	$login_service_client_connect=htmlspecialchars($_POST['login_service_client']);
	$mdp_service_connect=htmlspecialchars($_POST['password_service_client']);

}

if (!empty($_POST['login_service_client']) and !empty($_POST['password_service_client']))
{
	 $reqservice_client = $bdd->prepare("SELECT * FROM administrateur WHERE login_service_client = ? AND password_service_client = ? ");
    $reqservice_client->execute(array($login_service_client_connect, $mdp_service_client_connect));
    $service_clientexist = $reqservice_client->rowCount();

    if($serviceclientexist == 1)
    {
      $service_clientinfo = $reqservice_client -> fetch();
      $_SESSION['id_service_client'] = $admininfo['id_service_client'];
      $_SESSION['login_service_client'] = $admininfo['login_service_client'];
      header("Location:../controleur/index_service_client.php?redirection=visualiser_problemes_techniques_du_client");
    }
    else
    {
      $erreur = "Login ou mot de passe erroné";
    }
}
  
else
{
  $erreur="Tous les champs doivent être remplis";
}

?>