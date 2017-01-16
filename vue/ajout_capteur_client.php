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
        <form method="post" action="index.php?redirection=ajout_capteur_client">
          <fieldset>
            <p><label for="numeroserie">Numero Série</label></p>
            <p><input type="text" name="numero_de_serie"></p>
            <p><input type="submit" name="validercapteur" value="Valider"></p>
            <p><?php 
            if(isset($erreur))
            {
              echo $erreur;
            }
             ?></p>
          </fieldset>
        </form>
      </div>
    <?php include("pied_de_page.php");?>   
    </body>
</html>