<?php
function search($search){
require '../modele/connexion_bdd.php';

            $req = $bdd -> prepare('SELECT * FROM client WHERE nom LIKE :nom OR prenom LIKE :prenom');
            $req -> execute(array(':nom' =>'%'.$search .'%',
                                ':prenom' =>'%'.$search .'%'));
                                echo '<font color="green">'. $req->rowCount() . ' résultat(s) trouvé(s)'.'</font color>';
                                echo '<ul>';
                                while($info = $req->fetch() ){
                                    echo  '<li>'.'<font color="blue">' . htmlspecialchars($info['nom']).' '. htmlspecialchars($info['prenom']) .'</font>'.'</li>' ; // mettez une balise <a> 
                                }

                                echo'</ul>';               

$req->closeCursor();
}

function search_bar($keyword){
echo '<form action="../vue/administrateur_visualisation_client.php" method="get"> ';//les info sera visible sur la barre de navigation
echo '<input type="text" name="search" value="'.$keyword.'"> '; // ceci crera une variable $_GET['search'] , noublie pas de faire un isset($_GET['search']) avant d'appeler la fonction search($_GET['search'])
echo '<input type="submit"  name ="valider" value="valider"/>';
echo '</form> ';
}


if(isset($_GET['search']) AND !empty($_GET['search']))
{
search_bar($_GET['search']); // le formulaire est déja rempli et correspond à la recherche de l'admin
    search($_GET['search']);
}else
{
search_bar(''); // par defaut rien en attribut value

}

?>