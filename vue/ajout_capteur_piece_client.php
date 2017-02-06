<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="style/banniere.css" />
        <link rel="stylesheet" href="style/ajout_piece_capteur.css"

       
    </head>

  <body>
    <?php include("en_tete_client.php");?>
      <div id="container_3">
      <p>Choisissez une pièce puis un capteur à lui attribuer</p>
        <form method="post" action="index.php?redirection=ajout_capteur_piece_client">
        
          <select name="piece" id="blue" >
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
        
        <select name="capteur" id="green">
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
           
            <div id="sel">
        <p><input type="submit" name="validercapteurpiece" value="Valider"/>
        </p>
         </div><?php
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
         

          
          
        </form>
      </div>
    <?php include("pied_de_page.php");?>   
    </body>
</html>