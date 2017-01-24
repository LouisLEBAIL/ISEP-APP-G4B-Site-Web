<!DOCTYPE html>

<html>

    <head>
        <title>Visualisation des clients</title>
    </head>

	<body>
	<?php include("../vue/en_tete_administrateur_connecte.php");?>
			<div id="container_3">
      			<?php include("../vue/navigation_service_client.php");?>
      				<div id="notif">
      				<?php 
						include("../modele/fonctions_service_client.php");//Fonction à créer pour gérer la réception des notifications 
					?>
         			</div>
      		</div>
	<?php include("../vue/pied_de_page.php");?>

	</body>
</html>