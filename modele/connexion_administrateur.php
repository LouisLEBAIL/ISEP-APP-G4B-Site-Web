<?php

if(isset($_POST['formconnexionadministrateur']))
{
  $login_admin_connect = htmlspecialchars($_POST['login_administrateur']);
  $mdpconnect = sha1($_POST['password_administrateur']);

  if(!empty($_POST['login_administrateur']) AND !empty($_POST['password_administrateur']))
  {
    $reqadmin = $bdd->prepare("SELECT * FROM administrateur WHERE login_administrateur = ? AND password_administrateur = ? ");
    $reqadmin->execute(array($login_admin_connect, $mdpconnect));
    $adminexist = $reqadmin->rowCount();

    if($adminexist == 1)
    {
      $admininfo = $reqadmin -> fetch();
      $_SESSION['id_administrateur'] = $admininfo['id_administrateur'];
      $_SESSION['login_administrateur'] = $admininfo['login_administrateur'];
      header("Location: index_administrateur?redirection=connecte");
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