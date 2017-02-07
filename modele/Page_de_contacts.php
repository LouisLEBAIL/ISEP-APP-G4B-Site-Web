<?php

if(isset($_POST['soumettre_la_requete']))
{
  if(!empty($_POST['email']) AND !empty($_POST['produit']) AND !empty($_POST['question']))
  {
    $datetime = date("Y-m-d H:i:s");

    $email = htmlspecialchars($_POST['email']);
    $produit = htmlspecialchars($_POST['produit']);
    $message=htmlspecialchars($_POST['question']);
    $contact = $bdd->prepare('INSERT INTO messagerie (message, id_client, date_message) VALUES(:message, :id_client, :date_message)');
    $contact->execute(array(
          'message' => $message,
          'id_client' => $_SESSION['id_client'],
          'date_message'=> $datetime ));
        $erreur="Message envoyé a l'administrateur , il vous contactera dans les plus bref delais.";

  }
  else
  {
    $erreur= "Veuillez compléter tous les champs.";
  }
} 
?>







