<?php 
$bdd = new PDO('mysql:host=localhost;dbname=bdd_site;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$reqinfouser=$bdd->prepare('SELECT * FROM client WHERE id_client=?');
$reqinfouser->execute(array($_SESSION['id_client']));
$reqadressemaison=$bdd->prepare('SELECT * FROM maison WHERE id_client=?');
$reqadressemaison->execute(array($_SESSION['id_client']));
$reqadresseimmeuble=$bdd->prepare('SELECT * FROM immeuble WHERE id_client=?');
$reqadresseimmeuble->execute(array($_SESSION['id_client']));
$reqadresseappartement=$bdd->prepare('SELECT * FROM appartement WHERE id_client=?');
$reqadresseappartement->execute(array($_SESSION['id_client']));
$immeubleexist=$reqadresseimmeuble->rowcount();
$maisonexist=$reqadressemaison->rowcount();

?>