<!DOCTYPE html>
<html>
<head>
	<title>Détection des problèmes</title>
	<link rel="stylesheet" href="banniere.css">
</head>

<body>
	<div id="container_3">
      	<?php include("../vue/navigation_service_client.php");?>
      		<div id="probleme">
      			<h1>Détection des problèmes des clients à partir des états de leurs capteurs</h1>

      			<form method="post" action="">
      				<p><label for="idclient">Entrez l'ID du client s'il vous plaît</label>:</p><p><input type="text" name="idclient" id="idclient" /></p>
      				<p><label for="date">Entrez la date selon laquelle vous voulez affiner votre recherche</label>:</p><p><input type="timestamp" name="date" /></p>
      				<input type="submit" value="Rechercher" />
      			</form>

      			<?php 
      			
      			require '../modele/connexion_bdd.php';

      		$recherche=$bdd->prepare('SELECT * FROM capteur WHERE id_client = ?');
      		$recherche->execute(array($_POST['idclient']));

      		$precis=$bdd->prepare('SELECT * FROM donnee_capteur WHERE idclient=? and dates=?');
			$recherche->exexute(array($_POST['idclient'], $_POST['date']));

      		while($bonnedate=$precis->fetch)
      		{
      			while($trouve=$recherche->fetch)
      			{
      				$nompiece=$bdd->prepare('SELECT * FROM piece WHERE id_piece= ? and idclient=?');
      				$nompiece->execute(array($recherche['id_piece']), $_POST['idclient']);
      				while($nom=$nompiece->fetch())
      				{
      					?>
      					<p> <?php echo "L'état du capteur".$trouve['type']."de la pièce".$nom['nom_piece']."est associé à la valeur".$trouve['etat']; ?> </p>
      					<?php
      				}
      				
      			}
      		}

?>
      		
  			</div>  
  	</div>  		

</body>
</html>