<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=bdd_site;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$requser = $bdd -> prepare('SELECT * FROM client WHERE id_client=?');
$requser -> execute(array($_SESSION['id_client']));
?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="style/accueil_admin.css" />
        <title>Ajout Capteur</title>
    </head>

  <body>
    <?php include("en_tete.php");?>
      <div id="container_3">
        <?php include("navigation_client.php");?>
          <div id="preinscription">
           <?php include("test.php"); 
           piece($_SESSION['id_client']);?>
          </div>
      </div>
    <?php include("pied_de_page.php");?>   
    </body>
</html>