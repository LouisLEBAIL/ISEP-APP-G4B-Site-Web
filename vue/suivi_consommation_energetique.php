<?php
?>
<!DOCTYPE html>
<html>
<head>
	<title>Suivi de la consommation énergétique</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style/suivi_de_consommation_energetique.css">
	<link rel="stylesheet" href="style/banniere.css" />
</head>
<body>
<div>
    <?php include("vue/en_tete_client.php");?>

<?php
/*
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=bdd_site;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
*/
?>


<p>Bienvenue
 <?php  
	$req = $bdd->prepare('SELECT nom, prenom FROM client where id_client=?');
	$req->execute(array($_SESSION['id_client']));
	while ($_SESSION = $req->fetch())
	{
		echo $_SESSION['prenom'] .' '.$_SESSION['nom'];
	}

	$req->closeCursor();
	?> </p>

<p>Cet onglet vous permettra de surveiller votre consommation énergétique.<br />
 Pour cela, les données concernant vos différentes pièces seront prises en compte de même que l'historique des données relatives à  <br /> l'utilisation de vos objets intelligents.</p>


<caption><strong>Consommation énergétique par pièce<strong></caption>
	<table border=1>
		<?php 

			$req_id_piece = $bdd->prepare('SELECT id_piece,nom_piece FROM piece WHERE id_client=?');
			$req_id_piece->execute(array($_SESSION['id_client']));

			while ($nom_des_pieces = $req_id_piece->fetch()) // Boucle par piece
			{

				?>
				<tr>
					<td> <?php echo $nom_des_pieces['nom_piece']; 	?> </td>
				</tr> 
				<?php

				$req_capteur = $bdd -> prepare('SELECT id_capteur,type FROM capteur WHERE  id_piece=? ');
				$req_capteur->execute(array($nom_des_pieces['id_piece']));

				while ($donnees_capteurs=$req_capteur->fetch()) // Boucle par capteur
				{

					$date = $bdd -> prepare('SELECT dates FROM donnee_capteur WHERE id_capteur=?');
					$date -> execute(array($donnees_capteurs['id_capteur']));

					$jour=date('d');
					$mois=date('m');
					$annee=date('Y');
					$heure=date('H');
					$minute=date('i');

					while ($mois)
					{
					
						for($jour=1;$jour<=31;$jour++)
						{

							$tableau_consommation = $bdd->query('SELECT AVG(valeur) AS valeur_moyenne FROM donnee_capteur');

							while ($consommation = $tableau_consommation->fetch())
							{
								?>
								<thead>
									<tr>
										<th> Chauffage </th>
										<td> <?php echo $consommation['valeur_moyenne'];?> </td>
									</tr>
									<tr>
										<th> Gaz </th>
										<td> <?php echo $consommation['valeur_moyenne'];?> </td>
									</tr>
									<tr>
										<th> Lampes </th>
										<td> <?php echo $consommation['valeur_moyenne']; ?> </td>
									</tr>
								</thead>
								<?php

							}

							$tableau_consommation->closeCursor();

						}
						$date->closeCursor();
					}
				}
			$req_capteur->closeCursor();
			}
			$req_id_piece->closeCursor();


		?>
	</table>


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