<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="../style/accueil_admin.css" />
        <link rel="stylesheet" href="../style/style.css" />
        <link rel="stylesheet" href="../style/banniere.css" />

        <title>Visualisation des clients</title>
    </head>

	<body>
		<?php include("../vue/en_tete_administrateur_connecte.php");?>
			<div id="container_3">
      			<?php include("../vue/navigation_administrateur.php");?>
      				<div id="preinscription">
      				<?php 
						include("../modele/fonctions_administrateur.php");
					?>
         			</div>
      		</div>
	<?php include("../vue/pied_de_page.php");?>
			
	</body>
</html>