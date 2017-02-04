<!DOCTYPE html>

<html>

    <head>
        <title>Alertes signalées</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="banniere.css">
    </head>

	<body>
	<?php include("../vue/en_tete_administrateur_connecte.php");?>
			<div id="container_3">
      			<?php include("../vue/navigation_service_client.php");?>
      				<div id="notif">
                <caption><strong>Alertes signalées par les clients</strong></caption>
                  <table>

                    <?php
                    require '../modele/connexion_bdd.php';
      				      $req=$bdd->query('SELECT * FROM messagerie');
                    while($donnees=$req->fetch())
                    {
                      ?>

                      <tr>
                      <th>ID</th>
                      <th>Messages</th>
                      <th>ID_Client</th>
                      </tr>

                      <tr>
                        <td> <?php echo $donnees['id_messagerie'];?></td>
                        <td> <?php echo $donnees['message'];?></td>
                        <td> <?php echo $donnees['id_client'];?></td>
                      </tr>
                      <?php
                    }

					           ?>
                  </table>

         			</div>
      		</div>
	<?php include("../vue/pied_de_page.php");?>


	</body>
</html>