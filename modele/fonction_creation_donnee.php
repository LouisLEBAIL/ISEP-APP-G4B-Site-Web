<?php

// CE PROGRAMME SERT A REMPLIR LA TABLE donnee_capteur DE DONNEES POUR UN CAPTEUR

// LE CAPTEUR DOIT DEJA EXISTER DANS LA TABLE capteur 
// CE PROGRAMME MARCHE POUR LES CAPTEUR TEMPERATURE, LUMINOSITE, FUMEE ET INTRUSION
// DONNEES A RENTRER (DANS L'ORDRE) : id du capteur concerné, nombre de ligne de valeur que vous voulez générer

function creation_donnees($id_du_capteur,$nombre_de_lignes,$intervalle_mesure,$id_du_client)
{

	require 'modele/connexion_bdd.php';


// RECUPERATION DU TYPE DU CAPTEUR

	$req_type = $bdd -> prepare('SELECT type FROM capteur WHERE id_capteur=? ');
	$req_type -> execute(array($id_du_capteur));
	
	while ($type = $req_type -> fetch())
	{
		$type_du_capteur = $type['type'];
	}


	$lignes = 0;
	while ($lignes <= $nombre_de_lignes)
	{
		$lignes++;

// GENERATEUR DE DATE

		setlocale (LC_TIME, 'fr_FR.utf8','fra');
		$date_donnee = time();
		$date_donnee += $intervalle_mesure*$lignes ;
		$date_donnee = date("Y-m-d H:i:s", $date_donnee);



// GENERATEUR DE VALEUR ALEATOIRE

	// GENERATION DONNEE TEMPERATURE	
		if ($type_du_capteur == 'Temperature') 
		{
			$choix_valeur = rand(0,7);

			if ($choix_valeur == 0)
			{
				$valeur_donnee = rand(14,34);
			}			
			elseif ($choix_valeur == 1)
			{
				$valeur_donnee = rand(16,32);
			}
			elseif ($choix_valeur == 2)
			{
				$valeur_donnee = rand(18,30);
			}
			elseif ($choix_valeur == 3)
			{
				$valeur_donnee = rand(20,28);
			}
			elseif ($choix_valeur == 4)
			{
				$valeur_donnee = rand(21,27);
			}
			elseif ($choix_valeur == 5)
			{
				$valeur_donnee = rand(22,26);
			}
			elseif ($choix_valeur == 6)
			{
				$valeur_donnee = rand(23,25);
			}
			else
			{
				$valeur_donnee = 24;
			}					
		}


	// GENERATION DONNEE LUMINOSITE	
		if ($type_du_capteur == 'Luminosite') 
		{
			// Pas encore fait
		}


	// GENERATION DONNEE FUMEE
		if ($type_du_capteur == 'Fumee') 
		{
			$choix_valeur = rand(0,49);

			if ($choix_valeur = 0)
			{
				$valeur_donnee = 1;
			}
			else
			{
				$valeur_donnee = 0;
			}
		}


	// GENERATION DONNEE INTRUSION	
		if ($type_du_capteur == 'Intrusion') 
		{
			$choix_valeur = rand(0,99);

			if ($choix_valeur = 0)
			{
				$valeur_donnee = 1;
			}
			else
			{
				$valeur_donnee = 0;
			}
		}



// INSERTION DE LA VALEUR DANS LA BASE DE DONNEE $bdd_site DANS LA TABLE donnee_capteur	

		$insertion_valeur_temperature = $bdd -> prepare('INSERT INTO donnee_capteur(dates, valeur, id_capteur, id_client) VALUES (:dates, :valeur, :id_capteur, :id_client)');
		$insertion_valeur_temperature -> execute(array(
			'dates' => $date_donnee,
			'valeur' => $valeur_donnee,
			'id_capteur' => $id_du_capteur,
			'id_client' => $id_du_client));	
	}

}

?>