<?php
if(isset($_POST['formconnexionclient']))
{
  $login_client_connect = htmlspecialchars($_POST['login_client_connect']);
  $mdpconnect = sha1($_POST['mdpconnect']);

  if(!empty($_POST['login_client_connect']) AND !empty($_POST['mdpconnect']))
  {
    $requtilisateur = $bdd->prepare("SELECT * FROM client WHERE email = ? AND password_client = ? ");
    $requtilisateur->execute(array($login_client_connect, $mdpconnect));
    $utilisateurexist = $requtilisateur->rowCount();
    if($utilisateurexist == 1)
    {
      $utilisateurinfo = $requtilisateur -> fetch();
      $_SESSION['id_client'] = $utilisateurinfo['id_client'];
      $_SESSION['email'] = $utilisateurinfo['email'];
      header("Location: index.php?redirection=connecte");

    }
    else
    {
      $erreur = "Login ou mot de passe érroné";
    }
  }
  else
  {
    $erreur='Tous les champs doivent être remplies';

  }
}
?>