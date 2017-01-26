<?php

if(isset($_SESSION['id_client']))
{

 $requser = $bdd -> prepare('SELECT * FROM client WHERE id_client=?');
    $requser -> execute(array($_SESSION['id_client']));
    $user = $requser -> fetch();
    if(isset($_POST["suivantimmeuble"]))

  
  if(!empty($_POST['email']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['nombre_de_capteurs']) AND !empty($_POST['ID_client'])AND !empty($_POST['Date_inscription_client']))
  {
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $nombre_de_capteurs = htmlspecialchars($_POST['nombre_de_capteurs']);
    $ID_client = htmlspecialchars($_POST['ID_client']);
    $Date_inscription_client = htmlspecialchars($_POST['Date_inscription_client']);
   
    
        $insertserviceclient = $bdd->prepare('INSERT INTO client (email, nom, prenom, nombre_de_capteurs, ID_client, Date_inscription_client) VALUES( :email, NULL, NULL, :nombre_de_capteurs, :ID_client , :Date_inscription_client ');
        $insertserviceclient->execute(array(
          'email' => $email,
          'nom'=>$nom,
          'prenom'=>$prenom,
          'nombre_de_capteurs'=>$nombre_de_capteurs,
          'ID_client'=>$user['ID_client'],
          'Date_inscription_client'=>$Date_inscription_client
          ));
    
  }
  else
  {
    $erreur= "Veuillez compléter tous les champs";
  }
} 

?>




   

























