page piece par piece 

  

  <?php 
  piece($_SESSION['id_client']);

  include ('brouillon/etat des fonctionnalités par pièces')

   $reqpiece=$bdd->prepare('SELECT * FROM piece WHERE id_client=?');
   $reqpiece->execute(array($_SESSION['id_client']));


if(isset($_POST['ajouter']) AND !empty($_POST['pieces']))
            $nompiece=$_POST['pieces'];
            $nom_piece=htmlspecialchars($_POST['nom_piece']);
            $volets=htmlspecialchars($_POST['volets']);
            $chauffage=htmlspecialchars($_POST['chauffage']);
            $batterie_capteur=htmlspecialchars($_POST['batterie_capteur']);

{
  $insertpiece = $bdd->prepare('INSERT INTO piece (nom_piece, id_piece, id_capteur, volets, chauffage, batterie_capteur) VALUES (:nom_piece, :id_piece, :id_capteur, volets, chauffage, batterie_capteur)');
  $insertpiece->execute(array(
    'nom_piece'=> $nompiece,
    'id_piece'=>$piece['id_piece'],
    'id_capteur'=>$capteur['id_capteur'],
    'volets' => $volets,
    'chauffage'=>$chauffage,
    'batterie_capteur'=>$batterie_capteur,
    
    ));

 header('Location: index.php?redirection=page service client');



            ?>
          </div>
      </div>
	 <?php include("vue/pied_de_page.php");?>		
	</body>
</html>



<?php











