<?php
?>
<!DOCTYPE html>
<html>
<head>
	<title>Suivi de la consommation énergétique</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style/suivi_de_consommation_energetique.css">
</head>
<body>
<div>
<?php include 'en_tete.php';?>

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
$req = $bdd->prepare('SELECT nom, prenom FROM client');
$req->execute(array('prenom', 'nom'));
while ($donnees = $req->fetch())
{
	echo $donnees['prenom'] .' '.$donnees['nom'];
}

$req->closeCursor();
?> </p>

<p>Cet onglet vous permettra de surveiller votre consommation énergétique.<br />
 Pour cela, les données concernant vos différentes pièces seront prises en compte de même que l'historique des données relatives à <br />l'utilisation de vos objets intelligents.

Consommation par pièce
<tr>
<?php 
$req = $bdd_site->prepare('SELECT nom_piece FROM client');
$req->execute(array('nom_piece'));
while ($donnees = $req->fetch())
{
	?>
	<caption>Consommation énergétique par pièce</caption>
	<table border=1>
	<tr>
	<td> <?php echo $donnees['nom_piece']; 	?> </td>
	</tr> 
}
<?php
$req->closeCursor();

?>

<?php 
{
	$req=$bdd_site->prepare('SELECT id_piece,id_capteur, date FROM donnee_capteur');
	$req->execute(array('id_piece','id_capteur'));
	while ($donnees=$req->fetch())
{
	while ($_date('m'))
	{
		for($_date('j')=1;$_date('j')<=31;$_date('j')++)
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
				$donnees->closeCursor();
			}
			$reponse->closeCursor();
	}
}
$donnees->closeCursor();
}	

?>
			}
	}
	
	
	AVG consommation where id_piece= and id_capteur=
}

 </p>



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
<!--Pour insérer les différentes pièces du client dans le tableau-->

<?php include 'pied_de_page.php';?>
</body>

</html>