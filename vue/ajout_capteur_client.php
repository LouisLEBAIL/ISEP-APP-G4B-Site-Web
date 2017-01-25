<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" /> <link rel="stylesheet" href="style/accueil_admin.css" />
        <link rel="stylesheet" href="style/style.css" />
        <link rel="stylesheet" href="style/banniere.css" />
        <meta charset="utf-8" /> <link rel="stylesheet" href="style/ajout_capteur_client.css" />

        <title>Ajout Capteur</title>
    </head>

  <body>
    <?php include("en_tete_client.php");?>
      <div id="container_3">

        <div id="preinscription">
          <?php piece($_SESSION['id_client']);?>
        </div
      
        <form method="post" action="index.php?redirection=ajout_capteur_client">
          <fieldset>
          <p><label for="numerocapteur">Numero du Capteur </label></p>
            <p><input type="number" name="numero_du_capteur" step="1" min="1" max="98""></p>
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
        <?php
        $reqcapteur2 = $bdd -> prepare('SELECT * FROM capteur WHERE id_client=?');
        $reqcapteur2 -> execute(array($_SESSION['id_client']));?>

<ul>
<?php
                        while($capteur = $reqcapteur2 -> fetch())
                {
                  ?>
                  
                  <form method="post" action="index.php?redirection=ajout_capteur_client" >
                  <li>
                  <?php 
                  echo $capteur['numero_serie_capteur'].'<br/>';
                  echo $capteur['numero_capteur'].'-'. $capteur['type'].'<br/>';
                  ?> 
                  <?php $idcapteur=$capteur['id_capteur'];?>
                  <input type="submit" name="supprimer" value="supprimer" >
                  </input> 
                  <input type="hidden" name="idcapteur" value="<?php echo "".$idcapteur."" ?>">
                  </input>         
                  </li>
                  </form>
                  
                  <?php
                }

                ?>
                <ul>

      </div>
    <?php include("pied_de_page.php");?>   
    </body>
</html>