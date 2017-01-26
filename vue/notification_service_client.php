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

<?php include("../vue/suivi_consommation_energetique_.php");



if (window.webkitNotifications) {

// Notifications supportées, on vérifie si l'utilisateur a bien donné l'autorisation d'utiliser les notifications

if (window.webkitNotifications.checkPermission() == 0) { 

// Si = 0, alors autorisé.  

// On créé la notification !

} else {

window.webkitNotifications.requestPermission();

}

} else {

// Pas supporté, on affiche un message d'alerte

}

var notif = window.webkitNotifications.createNotification('logo_transparent.png', 'Bonjour de la part de DHomeLab', "Voici les statistiques de votre consommation énergétique ce mois-ci");


					?>
         			</div>
      		</div>
	<?php include("../vue/pied_de_page.php");?>

	</body>
</html>