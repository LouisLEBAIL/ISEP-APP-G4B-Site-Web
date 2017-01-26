<?php

if(isset($_POST['formvalider']))
{
  if(!empty($_POST['email']) AND !empty($_POST['produit']) AND !empty($_POST['question']))
  {
    $email = htmlspecialchars($_POST['email']);
    $produit = htmlspecialchars($_POST['produit']);
    $question = htmlspecialchars($_POST['question']);
    $contact = $bdd->prepare('INSERT INTO messagerie (id_messagerie, message, id_client) VALUES(,NULL, :message, NULL');
        $contact->execute(array(
          'id_messagerie' => $user['id_messagerie'],
          'message' => $message,
          'id_client' => $user['id_client']));

        $contact = $bdd->prepare('INSERT INTO client (email, produit, question) VALUES(:email,NULL, NULL');
        $contact->execute(array(
          'email' => $email,
          'produit' => $produit,
          'question' => $question
          ));
        $erreur = 'soumettre_la_requete';

  }
  else
  {
    $erreur= "Veuillez compléter tous les champs";
  }
} 
?>







