<!DOCTYPE html>
<html>
<head>
	<title>Suivi de la consommation énergétique</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style/suivi_de_consommation_energetique.css" />
	<link rel="stylesheet" href="style/banniere.css" />
</head>
<body>

<div>
    <?php
    session start();
    include("vue/en_tete_client.php");?>
    <form method="post" class='questionnaire' action="index.php?redirection=suiviconsommationenergetique">


<p>Bienvenue
 <?php  
	$req = $bdd->prepare('SELECT nom, prenom FROM client where id_client=?');
	$req->execute(array($_SESSION['id_client']));
	while ($donnees = $req->fetch())
	{
		echo $donnees['prenom'] .' '.$donnees['nom'];
	}

	$req->closeCursor();
	?> </p>

<p>Cet onglet vous permettra de surveiller votre consommation énergétique.<br />
 Pour cela, les données concernant vos différentes pièces seront prises en compte de même que l'historique des données relatives à  <br /> l'utilisation de vos objets intelligents.</p>

					
	<?php 
	

	//Sélection des pièces d'un client X
	include 'modele/Requetes_de_suivi_consommation/selection_pieces_client.php';

	while ($nom_des_pieces = $req_id_piece->fetch()) // Boucle par pièce de ce client X
	{
		
		//Sélection des différents capteurs de cette pièce en fonction de leur type
		//require 'modele/Requetes_de_suivi_consommation/selection_capteur_piece.php';
		$req_capteur = $bdd -> prepare('SELECT id_capteur,type FROM capteur WHERE  id_client=? AND id_piece=?');
		$req_capteur->execute(array($_SESSION['id_client'], $nom_des_pieces['id_piece']));

		$donnees_capteurs=$req_capteur->fetch(); /*Récupération des caractéristiques des capteurs appartenant
		à la pièce*/

		
			if ($donnees_capteurs['type']=='Température' AND $donnees_capteurs['dates']==date('m')) /* Pour se recadrer dans le mois actuel*/

			{
				//Récupération de toutes les valeurs de ces capteurs de type température dans la pièce X
				include 'modele/Requetes_de_suivi_consommation/recup_jointure.php';

				$jointure =$bdd->query('CREATE TABLE jointure SELECT c.type type_capteur, c.id_capteur id_capteur, d.valeur valeur_capteur, d.dates date_capteur FROM capteur c RIGHT JOIN donnee_capteur d on c.id_capteur=d.id_capteur');
				$final=$recup_jointure->fetch();
				$tableau_temp = $bdd->query('SELECT AVG (valeur_capteur) AS temperature_moyenne FROM jointure ');
				$temp_moy=$tableau_temp->fetch();
				echo $temp_moy['temperature_moyenne'];
				$ecrase=$bdd->query('DROP TABLE jointure');
			}
			
	}
	
	
	$req_capteur->closeCursor();




		
		
	?>

<!--Fin du tableau après la fin des boucles relatives à chaque pièce-->	


							<?php
								/*
								//Moyenne de la luminosité sur un mois
								if($tableau['type_capteur'] =='Luminosite' )								
								{
									$tableau_lum = $bdd->query('SELECT AVG(valeur_capteur) AS luminosite_moyenne FROM jointure');
									$lum_moy=$tableau_lum->fetch();
								}
								//Moyenne quantité fumée sur un mois
								if($tableau['type_capteur'] =='Fumee')
								{
									$tableau_fum = $bdd->query('SELECT AVG(valeur_capteur) AS q_moy FROM jointure');
									$fum_moy=$tableau_fum->fetch();
								}
							
								*/
					

								?>
								

									
								
								
								
								<?php						

						
							/*
							$tableau_fum->closeCursor();
							$tableau_lum->closeCursor();*/
							
							$req_capteur->closeCursor();
							$req_id_piece->closeCursor();


		?>
	
<caption><strong>Suivi de la consommation énergétique mensuelle</strong></caption> 
	<table border="1">
		<thead>

			<tr>
				<th> </th>
				<th> Janvier </th>
				<th> Février </th>
				<th> Mars </th>
				<th > Avril </th>
				<th> Mai </th>
				<th> Juin </th>
				<th> Juillet </th>
				<th> Août </th>
				<th> Septembre </th>
				<th> Octobre </th>
				<th> Novembre </th>
				<th> Décembre </th>
			</tr>

		</thead>

		<tbody>

			<tr>
				<td>Chauffage</td>
			</tr>
			<tr>
				<td>Lampes</td>
			</tr>
			<tr>
				<td>Gaz</td>
			</tr>
		</tbody>

		<tfooter>
			<tr>
				<td>Surface de la maison</td>
			</tr>
		</tfooter>
</table>

<?php include 'vue/pied_de_page.php';?>
</div>
</body>
</html>