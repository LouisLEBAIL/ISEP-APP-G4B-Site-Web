<?php 

include ("modele/connexion_bdd.php");

$req_piece = $bdd->prepare('SELECT * FROM piece WHERE id_client=?');
$req_piece->execute(array($_SESSION['id_client']));

while ($id_des_pieces = $req_piece -> fetch()) // boucle pour toutes les pieces
{
	$req_id_capteurs = $bdd->prepare('SELECT id_capteur FROM capteur WHERE id_client=? AND id_piece=?');
	$req_id_capteurs->execute(array($_SESSION['id_client'],$id_des_pieces['id_piece']));

	while ($id_des_capteurs = $req_id_capteurs -> fetch()) // boucle pour tous les capteurs par piece
	{
		// Requetes a la base de donnee
		$donnee_capteur = $bdd->prepare('SELECT * FROM donnee_capteur WHERE id_client=? AND id_capteur=?');
		$donnee_capteur->execute(array($_SESSION['id_client'],$id_des_capteurs['id_capteur']));

		$capteur = $bdd->prepare('SELECT * FROM capteur WHERE  id_capteur=?');
		$capteur->execute(array($id_des_capteurs['id_capteur']));

		// Innitialisation des variable
		$derniere_date = 0000-00-00;
		$increment1 = 0;
		$increment2 = 0;

		// Remplissage des variables a afficher par pices et par capteurs
		$id_de_la_piece = $id_des_pieces['id_piece']; // Sortie: id de la piece ou est le capteur
		while ($a = $capteur -> fetch()) // Sortie: variable ou est l etat du capteur & type de capteur
		{
			$etat_du_capteur = $a['etat'];
			$type_du_capteur = $a['type'];
		}
		while ($b = $donnee_capteur -> fetch()) // Sortie: date de la valeur a afficher & valeur du capteur a afficher
		{
			if ($derniere_date < $b['date'])
				{
					$derniere_date = $b['date'];
					$date_de_la_valeur = $derniere_date;
				}
			$increment1++;

			if ($increment1 == $increment2)
			{
				$valeur_a_afficher = $b['valeur'];
			}
			$increment2++;
		}
		$type_du_capteur.$id_de_la_piece = 1;
		//variable transmise par piece et capteur 
		//$type_du_capteur.$id_de_la_piece = $etat_du_capteur.$date_de_la_valeur.$valeur_a_afficher; // variable avec TemperatureSalon=02017-01-310 par exemple
	}
}

?>
