<?php
include("modele/connexion_bdd.php");

$requser = $bdd -> prepare('SELECT * FROM client WHERE id_client=?');
$requser -> execute(array($_SESSION['id_client']));
$user = $requser -> fetch();
$reqmaison = $bdd -> prepare('SELECT * FROM maison WHERE id_client=?');
$reqmaison -> execute(array($_SESSION['id_client']));
$maison = $reqmaison -> fetch();
$reqappartement = $bdd -> prepare('SELECT * FROM appartement WHERE id_client=?');
$reqappartement -> execute(array($_SESSION['id_client']));
$appartement = $reqappartement -> fetch();

if(isset($_POST['ajouter']) AND !empty($_POST['pieces']))
{
  $nompiece=$_POST['pieces'];
  $reqpiece = $bdd->prepare('INSERT INTO piece (nom_piece, id_appartement, id_maison, id_client) VALUES (:nom_piece, :id_appartement, :id_maison, :id_client)');
  $reqpiece->execute(array(
    'nom_piece'=> $nompiece,
    'id_appartement'=>$appartement['id_appartement'],
    'id_maison'=>$maison['id_maison'],
    'id_client'=>$user['id_client']
    ));
  $erreur="Ajouté !";
}
else
{
  $erreur="Veuillez remplir le champs.";
}
if(isset($_POST['supprimer']))
{
  $supprimer=$bdd->prepare('DELETE FROM piece WHERE  id_piece =?');
  $supprimer->execute(array($_POST["idpiece"]
    ));

}


$reqpiece=$bdd->prepare('SELECT * FROM piece WHERE id_client=?');
$reqpiece->execute(array($_SESSION['id_client']));

?>