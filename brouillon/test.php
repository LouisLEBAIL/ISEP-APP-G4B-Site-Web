<?php

if(isset($_POST)){//débugage
	var_dump($_POST);
}
/*####################################################################################################################################################################################################################
#############################LA FONCTION SUPER BALEZE#############################################################################################################
####################################################################################################################################################################################################################*/



/*####################################################################################################################################################################################################################
####################################################################################################################################################################################################################
####################################################################################################################################################################################################################*/



function piece($id_utilisateur){//Ici $id_utilisateur = $_SESSION['id_client'] ///  La fonction affiche les formulaires et traite les données
	$bdd = new PDO('mysql:host=localhost;dbname=bdd_site;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$i = 1;//compteur (pas besoins de 2 variable si j = i )
	
	//on selectionne les salles qui appartiennent au client possédant l' $id_utilisateur
	$reqpiece=$bdd->prepare('SELECT * FROM piece WHERE id_client=?');
	$reqpiece->execute(array($id_utilisateur));
	while($piece = $reqpiece -> fetch()) // les salles sont parcourus une à une 
        {
			
            formulaire_par_piece($piece['nom_piece'],$piece['id_piece'],$i); 

		            if(isset($_POST['idpiece']) && $piece['id_piece'] == $_POST['idpiece']){// on verifie que la ligne possédant le champ id_piece ($piece['id_piece']) est égale à $_POST['idpiece'] 

		            	if(isset($_POST['valider'.$i])){// le client a sélectionné le nombre de capteur à ajouter, par conséquent on lui affiche les type de capteur : temperature, luminosité,...
							liste_capteurs($_POST['nombredecapteur'],$piece['id_piece'] );
						}elseif(isset($_POST['validerlecapteur'])){// le client a valider les capteurs qu'il ajoute
							for($c=1;$c<=$_POST['nombredecapteur'];$c++){// on reste dans la même salle dans la boucle WHILE : $_POST['idpiece'] . Et dans cette salle il y a $_POST['nombredecapteur'] capteurs, d'où le FOR 
								insertion_capteur($_POST['capteur'.$c],$piece['id_piece'],$id_utilisateur);//on insere les données dans la base de données 
							}
						
						}
           			}

			$i = $i +1;// on increment l'indexe pour passer à valider(N+1)
				}


}


function formulaire_par_piece($nom,$idpiece,$j){// le formulaire appropriés à la salle $idpiece qui porte le nom $nom et le formulaire est indéxé par le <input submit> avec valider1, valider2,..., validerN

	echo '<form method="post" action="test_1.php" > '  .  $nom . '<input type="hidden" name="idpiece" value="'.$idpiece.'"></input>
	<input type="number" name="nombredecapteur" min="1" max="10"/>';
	 echo'<input type="submit" name="valider'.$j.'" value="valider" /></form>';


}

function liste_capteurs($nombre_de_capteur,$idpiece){// Pour la salle $idpiece, on afficher $nombre_de_capteur champs permettant à l'utilisateur d'ajouter $nombre_de_capteur capteurs
if($nombre_de_capteur == 0){
	return 0; // $nombre_de_capteur doit être entre compris 1 et 10 inclus
}
                    echo '<form method="post" action="test_1.php" >';
					for($i=1;$i<=$nombre_de_capteur;$i++)
                    {

                        echo'<select name="capteur'.$i. '" id="capteur">
                          <option value="luminiosite" name="Luminiosite">Luminiosite</option>
                          <option value="temperature" name="Temperature">Temperature</option>
                          <option value="fumee" name="Fumee">Fumée</option>
                          <option value="volet" name="Volet">Volet</option>
                          <option value="presence" name="Presence">Presence</option>
                        </select>
                      ';
                    
                    }
                  	echo '<input type="hidden" name="idpiece" value="'.$idpiece.'">
                  	<input type="hidden" name="nombredecapteur" value="'. $nombre_de_capteur.'"/>';
                  	if($nombre_de_capteur == 1){
                  		echo '<input type="submit" name ="validerlecapteur" value="Ajouter le capteur"/></form>';
                  	}else{
                  		echo '<input type="submit" name ="validerlecapteur" value="Ajouter les '.$nombre_de_capteur. ' capteurs"/></form>';
                  	}
                    

}

function insertion_capteur($choix,$idpiece,$session){// cette fonction ajouter une seule ligne dans la base de données : (type,etat = 0,id_piece,id_client) 

	$bdd = new PDO('mysql:host=localhost;dbname=bdd_site;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $a=0;
    $reqcapteur=$bdd->prepare('INSERT INTO capteur(type,etat,id_piece,id_client) VALUES(:type, :etat, :id_piece, :id_client)') ;
    $reqcapteur->execute(array(
                          ':type'=>$choix,
                          ':etat'=>$a,
                          ':id_piece'=>$idpiece,
                          ':id_client'=>$session));
      
                    
}




?>