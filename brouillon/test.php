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
            <div id="decalage">
            <?php
            $increment = 0;
            $j=0;
            $reqpiece=$bdd->prepare('SELECT * FROM piece WHERE id_client=?');
            $reqpiece->execute(array($_SESSION['id_client']));
                
            while($piece = $reqpiece -> fetch())
            {
              $increment = $increment +1;
              ?>
              <ul>
                <form method="post" action="test.php" >
                  <li>
                    <?php echo $piece['nom_piece']; ?> 
                    <?php $idpiece=$piece['id_piece'];?>
                    <input type="hidden" name="idpiece" value="<?php echo "".$idpiece."" ?>"></input>
                  </li>
                  <input type="number" name="nombredecapteur" min="1" max="10"/>
                  <?php 
                  $j++;

                  ?>
                  <?php
                  echo'<input type="submit" name="valider['.$j.']" value="valider" />';
                  ?>
                  <?php

                  $nombre_de_capteur=$_POST["nombredecapteur"];

                  if(isset($_POST['valider'][$j]))
                  {
                    for($i=1;$i<=$nombre_de_capteur;$i++)
                    {
                      ?>
                      <p>
                        <?php echo'<select name="capteur['.$i.']" id="capteur">' ?>
                          <option value="luminiosite" name="luminiosite">Luminiosite</option>
                          <option value="temperature" name="Temperature">Temperature</option>
                          <option value="fumee" name="fumee">Fumée</option>
                          <option value="volet" name="volet">Volet</option>
                          <option value="presence" name="presence">Presence</option>
                        </select>
                      </p>
                      <?php
                    }
                    ?>
                    <input type="submit" name ="validerlecapteur" value="Valider le/les Capteur(s)"/>
                    <?php 
                  }

                  elseif(isset($_POST['validerlecapteur']))
                  {
                    for($k=1;$k<=$nombre_de_capteur;$k++)
                    {
                        $choix = $_POST['capteur'][$k];
                        $a=0;
                        $reqcapteur=$bdd->prepare('INSERT INTO capteur(type,etat,id_piece,id_client) VALUES(:type, :etat, :id_piece, :id_client)');
                        $reqcapteur->execute(array(
                          'type'=>$choix,
                          'etat'=>$a,
                          'id_piece'=>$idpiece,
                          'id_client'=>$_SESSION['id_client']));
      
                    }
                  }
                  ?>
                  </input>
                </form>
              </ul>
            <?php
            }
            ?>
            </div>
            <?php
            $reqpiece->closeCursor();
            ?>
          </div>
      </div>
    <?php include("pied_de_page.php");?>   
    </body>
</html>