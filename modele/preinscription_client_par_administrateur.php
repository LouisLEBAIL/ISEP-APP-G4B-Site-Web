<?php

if(isset($_POST['formvalider']))
{
  if(!empty($_POST['login_client']) AND !empty($_POST['email']) AND !empty($_POST['password_client']))
  {
    $login_client = htmlspecialchars($_POST['login_client']);
    $email = htmlspecialchars($_POST['email']);
    $password_client = sha1($_POST['password_client']);
    $password_client_verification=sha1($_POST['password_client_verification']);
    $login_client_length = strlen($login_client);
    if($login_client_length<=200)
    {
      if($password_client == $password_client_verification)
      {
        $insertclient = $bdd->prepare('INSERT INTO client (nom, prenom, sexe, date_de_naissance, email, telephone_mobile, telephone_fixe, login_client, password_client) VALUES(NULL, NULL, NULL, NULL, :email, NULL, NULL, :login_client, :password_client)');
        $insertclient->execute(array(
          'email' => $email,
          'login_client' => $login_client,
          'password_client' => $password_client
          ));
        $erreur = 'Compte ajouté';


      }
      else
      {
        $erreur= "le mot de passe ne corespond pas ";
      }

    }
    else
    {
      $erreur= "Le login ne doit pas contenir plus de 200 caractere";
    }

  }
  else
  {
    $erreur= "Veuillez compléter tous les champs";
  }
} 
?>

<?php require '../vue/preinscription_client_par_administrateur.php'?>