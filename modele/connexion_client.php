<?php
if(isset($_POST['formconnexionclient']))
{
  $login_client_connect = htmlspecialchars($_POST['login_client_connect']);
  $mdpconnect = sha1($_POST['mdpconnect']);

  if(!empty($_POST['login_client_connect']) AND !empty($_POST['mdpconnect']))
  {
    $requtilisateur = $bdd->prepare("SELECT * FROM client WHERE login_client = ? AND password_client = ? ");
    $requtilisateur->execute(array($login_client_connect, $mdpconnect));
    $utilisateurexist = $requtilisateur->rowCount();
    if($utilisateurexist == 1)
    {
      $utilisateurinfo = $requtilisateur -> fetch();
      $_SESSION['id_client'] = $utilisateurinfo['id_client'];
      $_SESSION['login_client'] = $utilisateurinfo['login_client'];
      header("Location: index.php?redirection=connecte");

    }
    else
    {
      $erreur = "Login ou mot de passe érroné";
    }
  }
  else
  {
    $erreur='tous les champs doivent être remplies';

  }
}
?>