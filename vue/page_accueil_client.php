<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" /> 
        <link rel="stylesheet" href="../Style/accueil.css" />
        <title>Page d'accueil</title>
    </head>
	<body>
		<?php include("../vue/en_tete_client.php");?>

		<div id="container_2">
			<div id="navigation">
				<nav >
					<ul id="menu_navigation_verticale">
						<li><a href="#">Pieces</a>
							<ul>
								<li><a href="#">Rez de chaussée</a></li>
								<li><a href="#">Etage</a></li>
							</ul>
						</li>
						<li><a href="#">Profil</a>
							<ul>
								<li><a href="#">Voir Profil</a></li>
								<li><a href="client_modifier_profil.php">Modifier Profil</a></li>
					      		<li><a href="#">Ajouter/Supprimer capteur ou piece</a></li>
				 			</ul>
						</li>
						<li><a href="#">Contact</a></li>
					</ul>
				</nav>
			</div>
		</div>
		<?php include("../vue/pied_de_page.php");?>
	</body>
</html>
