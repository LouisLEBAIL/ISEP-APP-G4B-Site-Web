<?php

include ('vue/page_de_contact')
if(isset($_POST['formvalider']))
{
  if(!empty($_POST['email']) AND !empty($_POST['produit']) AND !empty($_POST['question']))
  {
    $email = htmlspecialchars($_POST['email']);
    $produit = htmlspecialchars($_POST['produit']);
    $question = htmlspecialchars($_POST['question']);
    {

      {
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

<?php require '../vue/page_de_contacts.php'?>








