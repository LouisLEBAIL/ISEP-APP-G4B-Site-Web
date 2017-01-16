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
              $erreur = 'Compte ajouté';


          }
          else
          {
            $erreur= "le mot de passe ne corespond pas ";
          }
        }
        else
        {
          $erreur="Vous êtes déja inscrit";
        }

      }
      else
      {
        $erreur="numero serie incorrect ou deja utiliser";
      }


    }
    else
    {
      $erreur= "Le numero de serie est incorrect ";
    }

  }
  else
  {
    $erreur= "Veuillez compléter tous les champs";
  }
} 
?>

<?php require '../vue/preinscription_client_par_administrateur.php'?>