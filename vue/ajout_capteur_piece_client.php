
<!DOCTYPE html>


<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="style/ajout_capteur_client.css" />
        <title>Ajout Capteur</title>
    </head>

  <body>
    <?php include("en_tete.php");?>
      <div id="container_3">
        <?php include("navigation_client.php");?>
        <form method="post" action="index.php?redirection=ajout_capteur_piece_client">
          <select name="piece" id="nom">
          <?php
              while($piece=$reqpiece->fetch())
              {
                ?>
                          <option value="<?php echo $piece['id_piece']; ?>
                            " name="piece">
                          <?php echo $piece['nom_piece'] ?>
                          
                          </option>
                <?php
              }

        ?>
        </select>
        
        <select name="capteur">
        <?php
          while($capteur=$reqcapteur->fetch())
          {
            ?>
            <option value="<?php echo $capteur['id_capteur'];?>">
            <?php echo $capteur['numero_capteur'].'-'.$capteur['type']?>

            



            </option>
            <?php
          }
          
            ?>
            </select>
            

        <p><input type="submit" name="validercapteurpiece" value="Valider"/>
        <p><?php
        if(isset($erreur))
        {
          echo $erreur;
        }
        ?>
        <?php 
        if(isset($_POST['piece']) AND isset($_POST['capteur']))
        {
          $idpiece=htmlspecialchars($_POST['piece']);
              
          $idcapteur=htmlspecialchars($_POST['capteur']);
      


        }
              ?>
              </p>
         

          <fieldset>
          </fieldset>
        </form>
      </div>
    <?php include("pied_de_page.php");?>   
    </body>
</html>