<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="style/accueil_admin.css" />
        <link rel="stylesheet" href="style/style.css" />
        <link rel="stylesheet" href="style/banniere.css" />

        <title>Ajout Capteur</title>
    </head>

  <body>
    <?php include("vue/en_tete_client.php");?>
      <div id="container_3">

        <div id="preinscription">
          <?php piece($_SESSION['id_client']);?>
        </div>
      </div>
    <?php include("vue/pied_de_page.php");?>   
    </body>
</html>