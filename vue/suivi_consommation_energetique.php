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
	while ($donnees = $req->fetch())
	{
		echo $donnees['prenom'] .' '.$donnees['nom'];
	}

	$req->closeCursor();
	?> </p>

<p>Cet onglet vous permettra de surveiller votre consommation énergétique.<br />
 Pour cela, les données concernant vos différentes pièces seront prises en compte de même que l'historique des données relatives à  <br /> l'utilisation de vos objets intelligents.</p>


<caption><strong>Consommation énergétique par pièce<strong></caption>
	<table border=1>
		<?php 
			$req = $bdd->prepare('SELECT * FROM piece WHERE id_client=?');
			$req->execute(array($_SESSION['id_client']));
			while ($donnees = $req->fetch())
			{
				?>

				<tr>
					<td> <?php echo $donnees['nom_piece']; 	?> </td>
				</tr> 
				<?php

				$info_capteur = $bdd -> prepare('SELECT id_capteur,type  FROM capteur WHERE id_client=?, id_piece=? AND type=?');
				$info_capteur->execute(array($_SESSION['id_client'],$info_capteur['id_piece'],$info_capteur['type'],$info_capteur['id_capteur=?']));


				$info_donnee_capteur=$bdd->prepare('SELECT id_capteur, date FROM donnee_capteur WHERE id_capteur=?');
				$info_donnee_capteur->execute(array($info_donnee_capteur['id_capteur'],$info_donnee_capteur['date']));

				while ($donnees=$req->fetch())
			{
				$jour=date('d');
				$mois=date('m');
				$annee=date('Y');
				$heure=date('H');
				$minute=date('i');

				while ($mois)
				{
					
					for($jour=1;$jour<=31;$jour++)
					{

						$reponse = $bdd->query('SELECT AVG(consommation) AS consommation_moyenne FROM donnee_capteur');

						while ($donnees = $reponse->fetch())
						{
							?>
							<tr>
								<td> Chauffage </td>
								<td> <?php echo $donnees['consommation_moyenne'];?> </td>
							</tr>
							<tr>
								<td> Gaz </td>
								<td> <?php echo $donnees['consommation_moyenne'];?> </td>
							</tr>
							<tr>
								<td> Lampes </td>
								<td> <?php echo $donnees['consommation_moyenne']; ?> </td>
							</tr>
							<?php

						}

			$req->closeCursor();

					}
				$donnees->closeCursor();
				}
				$reponse->closeCursor();
			}
			}
			$donnees->closeCursor();

		?>
	
	
	
	AVG consommation where id_piece= and id_capteur=
}

 </p>
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