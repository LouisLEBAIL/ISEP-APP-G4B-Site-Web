<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="style/accueil_admin.css" />
        <title>Ajout Capteur</title>
    </head>

	<body>
		<?php include("vue/en_tete_client.php");?>
			<div id="container_3">
        <?php include("vue/navigation_client.php");?>
          <div id="preinscription">
            <?php
                $reqpiece=$bdd->prepare('SELECT * FROM piece WHERE id_client=?');
                $reqpiece->execute(array($_SESSION['id_client']));?>

                <div id="decalage">
                <?php
                while($piece = $reqpiece -> fetch())
                {
                  ?>
                  <ul>
                  <form method="post" action="index.php?redirection=ajout_capteur_client" >
                  <li>
                  <?php echo $piece['nom_piece']; ?> 
                  <?php $idpiece=$piece['id_piece'];?>
                  <input type="number" name="nombredecapteur"/>
                  <input type="submit" name="validernombredecapteur" value="valider">
                  </input>
                  <input type="hidden" name="idpiece" value="<?php echo "".$idpiece."" ?>">
                  </input>         
                  </li>
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
	 <?php include("vue/pied_de_page.php");?>		
	</body>
</html>
