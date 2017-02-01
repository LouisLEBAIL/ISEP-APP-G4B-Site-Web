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
      $erreur = "Login ou mot de passe erroné";
    }
  }
  else
  {
    $erreur='Tous les champs doivent être remplis';

  }
}
?>
<?php

if(isset($_POST['formvalider']))
{
  if(!empty($_POST['numeroseriecemac']) AND !empty($_POST['email']) AND !empty($_POST['password_client']))
  {
    $numero_serie_ceMAC = htmlspecialchars($_POST['numeroseriecemac']);
    $email = htmlspecialchars($_POST['email']);
    $password_client = sha1($_POST['password_client']);

    $password_client_verification=sha1($_POST['password_client_verification']);
    $numero_serie_ceMAC_length = strlen($numero_serie_ceMAC);
    if($numero_serie_ceMAC_length==6)
    {
      $reqcemac=$bdd->prepare("SELECT * FROM ceMAC WHERE numero_serie_ceMAC = ?");
      $reqcemac->execute(array($numero_serie_ceMAC));
      $coumpt1=$reqcemac->rowCount();
      $reqclientcemac=$bdd->prepare("SELECT * FROM client WHERE numero_serie_ceMAC =?");
      $reqclientcemac->execute(array($numero_serie_ceMAC));
      $coumpt2=$reqclientcemac->rowCount();
      $reqclientemail=$bdd->prepare("SELECT * FROM client WHERE email=?");
      $reqclientemail->execute(array($email));
      $coumpt3=$reqclientemail->rowCount();


      if($coumpt1 == 1 AND $coumpt2==0)
      {
        if($coumpt3 == 0)
        {
          if($password_client == $password_client_verification)
          {
              $insertclient = $bdd->prepare('INSERT INTO client (nom, prenom, date_de_naissance, email, telephone_mobile, telephone_fixe, numero_serie_ceMAC, password_client) VALUES(NULL, NULL, NULL, :email, NULL, NULL, :numero_serie_ceMAC, :password_client)');
              $insertclient->execute(array(
          'email' => $email,
          'numero_serie_ceMAC' => $numero_serie_ceMAC,
          'password_client' => $password_client
          ));
              $erreur1 = 'Compte ajouté';


          }
          else
          {
            $erreur1= "le mot de passe ne corespond pas ";
          }
        }
        else
        {
          $erreur1="Vous êtes déja inscrit";
        }

      }
      else
      {
        $erreur1="numero serie incorrect ou deja utiliser";
      }


    }
    else
    {
      $erreur1= "Le numero de serie est incorrect ";
    }

  }
  else
  {
    $erreur1= "Veuillez compléter tous les champs";
  }
} 
?>

