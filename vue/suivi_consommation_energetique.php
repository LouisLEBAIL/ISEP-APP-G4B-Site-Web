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
 Pour cela, les données concernant vos différentes pièces seront prises en compte de même que l'historique des données relatives à <br />l'utilisation de vos objets intelligents.</p>
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
<!--Pour insérer les différentes pièces du client dans le tableau
<tr>
<?php 
/* 
$req = $bdd->prepare('SELECT nom_piece FROM client');
$req->execute(array('nom_piece'));
while ($donnees = $req->fetch())
{
	?>
	<td> <?php echo $donnees['nom_piece']; 	?> </td> 
	</tr>
}
<?php
$req->closeCursor();
*/
?>
-->
</tfooter>

</table>

</body>

</html>