<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="style/accueil_admin.css" />
        <link rel="stylesheet" href="style/ajoter_piece.css" />
        <link rel="stylesheet" href="style/banniere.css" />

        <title>Ajout Pieces</title>
    </head>

	<body>
		<?php include("vue/en_tete_client.php");?>
			<div id="container_3">

          <div id="preinscription">
				    <form method="post" action="index.php?redirection=ajout_piece_client">
        			
          				<p>
          					<label for="nombre de piece">Tapez le nom de la piece que vous souhaitez rajouter:</label>
          				</p>
                  <p>
                    <input type="text" name="pieces">
                  </p>
                  <p>
                    <input type="submit" name="ajouter" value="Ajouter" id="in"/>
                      <?php 
                        if(isset($erreur))
                            {
                                echo $erreur;
                            }
                      ?>
                  </p>       
						  
            </form>
                <div id="decalage">
                <?php
                while($piece = $reqpiece -> fetch())
                {
                  ?>
                  <ul>
                  <form method="post" action="index.php?redirection=ajout_piece_client" id=piece>
                  <li>
                  <?php echo $piece['nom_piece']; ?> 
                  <?php $idpiece=$piece['id_piece'];?>
                  <input type="submit" name="supprimer" value="Supprimer" id="in">
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

