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
    <?php include("vue/en_tete_client.php");?>


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

<caption>Consommation énergétique par pièce</caption>
<table border=1>
		<thead>
			<tr>
				<th> </th> <!--pour faire une marge dans le tableau et permettre que la première pièce ait sa case-->

								
	<?php 

	//Sélection des pièces d'un client X
	$req_id_piece = $bdd->prepare('SELECT id_piece,nom_piece FROM piece WHERE id_client=?');
	$req_id_piece->execute(array($_SESSION['id_client']));

	while ($nom_des_pieces = $req_id_piece->fetch()) // Boucle par pièce de ce client X
	{
		?>
		<!--Affichage du nom de la pièce correspondant à la boucle-->
				
				<th> <?php echo $nom_des_pieces['nom_piece']; ?> </th>
			</tr>
		</thead>

		<?php
		//Sélection des différents capteurs de cette pièce en fonction de leur type
		$req_capteur = $bdd -> prepare('SELECT id_capteur,type FROM capteur WHERE  id_piece=? ');
		$req_capteur->execute(array($nom_des_pieces['id_piece']));

		while ($donnees_capteurs=$req_capteur->fetch()) // Boucle par capteur appartenant à la pièce
				{
					$donnees_capteurs['type'];		//Juste pour sortir de la boucle en ayant stocké ces valeurs
				}


		//Accès aux valeurs de chaque type de capteur

		/* La table jointure est une table montrant les différents types de capteurs, leur id, leur valeur et la date à laquelle le transfert de données du capteur a été réalisé*/	

		$jointure =$bdd->prepare('SELECT * FROM jointure where type_capteur=?'); 
		$jointure->execute(array($donnees_capteurs['type']));

		$jour=date('d');
		$mois=date('m');
		$annee=date('Y');
		$heure=date('H');
		$minute=date('i');

		while ($mois)
		{			
							
			while($tableau=$jointure->fetch())
			{
				$tableau['dates'];
				$tableau['valeur'];			/*Juste pour sortir de la boucle en ayant déjà stocké ces valeurs car la 								moyenne ne devra pas nécessiter de while*/
				$tableau['type'];
			}
			//Moyenne de la température sur un mois
			if($tableau['type_capteur'] =='Temperature')
			{
				$tableau_temp = $bdd->query('SELECT AVG(valeur_capteur) AS temperature_moyenne FROM jointure ');
				$temp_moy=$tableau_temp->fetch();
			}

			?>
			<!--Affichage de la moyenne en température de la pièce correspondante -->
			<tbody>

				<tr>
					<td> Chauffage </td>
					<td> <?php echo $temp_moy['temperature_moyenne'];?> </td>
				</tr>

			</tbody>
			<?php
		}
		
		$tableau_temp->closeCursor();
		$jointure->closeCursor();
	}
	?>

<!--Fin du tableau après la fin des boucles relatives à chaque pièce-->	
</table>

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