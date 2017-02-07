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
   
    include("vue/en_tete_client.php");?>


<p>Bienvenue
    <?php  
	   $req = $bdd->prepare('SELECT nom, prenom FROM client where id_client=?');
	   $req->execute(array($_SESSION['id_client']));
	   while ($donnees = $req->fetch())
	   {
	       echo $donnees['prenom'] .' '.$donnees['nom'];
	   }

	   $req->closeCursor();
	?> 
</p>

<p>Cet onglet vous permettra de surveiller votre consommation énergétique.<br />
Dans, un premier temps, vous la suivrez en termes de température moyennes de vos pièces. <br />
Pour cela, les données concernant vos différentes pièces seront prises en compte de même que l'historique des données relatives à  <br /> l'utilisation de vos objets intelligents.</p>

<p><caption><strong>Température moyenne de vos pièces durant ce mois</strong></caption> </p>
    <table border="1">
    <tr>
        <th> Pièces </th>
    <th> Température Moyenne</th>
		
			
    <?php 
	

	//Sélection des pièces d'un client X

	require 'modele/Requetes_de_suivi_consommation/selection_pieces_client.php';

	while ($nom_des_pieces = $req_id_piece->fetch()) // Boucle par pièce de ce client X
	{
		
		//Sélection des différents capteurs de cette pièce en fonction de leur type
		
		$req_capteur = $bdd -> prepare('SELECT id_capteur,type FROM capteur WHERE  id_client=? AND id_piece=?');
		$req_capteur->execute(array($_SESSION['id_client'], $nom_des_pieces['id_piece']));

		$donnees_capteurs=$req_capteur->fetch(); /*Récupération des caractéristiques des capteurs appartenant
		à la pièce*/

		//Récupération de toutes les valeurs de ces capteurs de type température dans la pièce X

		/*Jointure externe faite entre les tables capteur et donnre_capteur pour associer à chaque capteur la donnée de sa valeur et sa date*/		
		$jointure =$bdd->query('CREATE TABLE jointure SELECT c.id_client id_client, c.id_piece id_piece, c.type type_capteur, c.id_capteur id_capteur, d.valeur valeur_capteur, DATE_FORMAT(d.dates, \'%d/%m/%Y à %Hh%imin%ss\') date_capteur FROM capteur c RIGHT JOIN donnee_capteur d on c.id_capteur=d.id_capteur');

        //Jointure externe faite entre les tables jointure et piece pour associer à chaque id_piece le nom de la pièce correspondante  
		$tablefinale=$bdd->query('CREATE TABLE test SELECT j.id_client id_client, j.id_piece id_piece, j.type_capteur type_capteur, j.id_capteur id_capteur, j.valeur_capteur valeur_capteur,j.date_capteur date_capteur, p.nom_piece nom_piece FROM piece p RIGHT JOIN jointure j on j.id_piece=p.id_piece');

		//Moyenne effectuée sur les valeurs correspondant aux capteurs de température de la pièce X dans le mois actuel 
    	$final=$bdd->prepare('SELECT AVG (valeur_capteur) AS temperature_moyenne, nom_piece FROM test WHERE id_client=? AND nom_piece=? AND type_capteur= \'Temperature\' GROUP BY date("m")');
    	$final->execute(array($_SESSION['id_client'],$nom_des_pieces['nom_piece']));
    	$value=$final->fetch();
					
        ?>
        <!--Génération du tableau-->
    	<tr>
    		<td> <?php echo $value['nom_piece'] ;?> </td>
    		<td> <?php echo $value['temperature_moyenne']; ?> </td>
    	</tr>
		<?php

    	//Ferméture des reqêtes et supression des tables pour assurer le fonctionnement des autres boucles				
    	$final->closeCursor();
    	$ecrase=$bdd->query('DROP TABLE jointure');	
		$encore=$bdd->query('DROP TABLE test');
    			
    		
    		
    	
	}
	?>

	</table> <br/>

    <?php

							
	$req_capteur->closeCursor();
	$req_id_piece->closeCursor();

	?>


<p> <caption><strong>Température moyenne mensuelle sur l'ensemble de la maison</strong></caption> </p>
    <table border="1">
        <thead>

            <tr>
                <th> Mois </th>
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
            <?php

                //Séletion de tous les capteurs d'un client X et de leur type		
                $req_capteur = $bdd -> prepare('SELECT id_capteur,type FROM capteur WHERE  id_client=?');
                $req_capteur->execute(array($_SESSION['id_client']));

                $donnees_capteurs=$req_capteur->fetch(); //Récupération des caractéristiques de ces capteurs

                //Jointure
				
                $jointure =$bdd->query('CREATE TABLE jointure SELECT c.id_client id_client, c.type type_capteur, c.id_capteur id_capteur, d.valeur valeur_capteur, DATE_FORMAT(d.dates, \'%d/%m/%Y à %Hh%imin%ss\') date_capteur FROM capteur c RIGHT JOIN donnee_capteur d on c.id_capteur=d.id_capteur');

    	       //Moyenne effectuée sur les capteurs de type température selon le mois de la transmission de leurs données
                $mensuel=$bdd->prepare('SELECT ROUND(AVG (valeur_capteur)) AS temperature_moyenne, MONTH(date_capteur) datecapteur FROM jointure WHERE id_client=? AND  type_capteur= "Temperature" GROUP BY MONTH(date_capteur) ORDER BY datecapteur ASC LIMIT 0,15');
                $mensuel->execute(array($_SESSION['id_client']));

                while($valeur=$mensuel->fetch()) //Recup
                {
                    ?>
            
                        <tr>
                            <td>Température</td>
                            <td> <?php  echo $valeur['temperature_moyenne'];  ?> </td>
                        </tr> 
                    <?php
                }

                $mensuel->closeCursor();
                $finir=$bdd->query('DROP TABLE jointure');			
                ?>    		

        </tbody>
    
    </table>

<?php include 'vue/pied_de_page.php';?>

</div>
</body>
</html>