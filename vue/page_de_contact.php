<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" /> 
        <link rel="stylesheet" href="style/style.css" />
        <link rel="stylesheet" href="style/banniere.css" />

        <title>Contact</title>
    </head>
        <body>
        <?php include 'vue/en_tete_client.php';?>
            <div id="bloc_page_3"> 
                <div id="container_3">
        <?php include '../modele/page_de_contact.php';?>
        <?php include '../modele/Page_service_client.php';?>



             <form method="post" action="">
                      <fieldset>
                            <p><strong>Contactez nous</strong></p>
                            <p>
                                <label for="email">Votre E-mail: </label>
                            </p>
                            <p>
                                <input type="text" name="email" />
                            </p>

                            <p>Veuillez renseigner les champs suivants pour acceder à vos données personnelles</p>

             <form action="#" method="post">

                      <fieldset>
                            <p>
                                <label for="Nom">Nom:</label>
                            </p>
                            <p>
                                <input type="text" name="Nom" required="">
                            </p>
                            <p>
                                <label for="Prenom">Prenom:</label>
                            </p>
                            <p>
                                <input type="text" name="Prenom" required="">
                            </p>
                            <p>
                                <label for="Nombre_de_capteurs">Nombre de capteurs:</label>
                            </p>
                            <p>
                                <input type="number" name="Nombre_de_capteurs" required="">
                            </p> 
                            <p>
                                <label for="ID_client">ID client:</label>
                            </p>
                            <p>
                                <input type="number" name="ID_client" required="">
                            </p>
                            <p>
                                 <label for="Durée_inscription">Client depuis le:</label>
                            </p>
                            <p> 
                                <input type="date" name="date" required="">
                            <p>
                                <input type="submit" value="Envoyer" />
                            
                            </p>
                      </fieldset>

<?php 

try 
{
  
  $bdd = new PDO('mysql:host=localhost;dbname=ISEP-APP-G4B-Site-Web;charset=utf8', 'root', '');

}

$reponse = $bdd->query('SELECT * FROM client');

while ($donnees = $reponse->fetch())
{
  ?>

            <table id="tableau" border="1">
            <caption><strong>Vue globale client en cours<strong></caption><?php echo $données['Numero_de_pieces']; ?><br/>
            Vous avez <?php echo $donnees['Numero_de_pieces']; ?> pièces qui sont : <?php echo $donnees['Pieces']; ?>
            <tr>
              <thead><td>Numéro de pièces</td>
              <td>Pièces</td></thead>
            </tr>
            <tr>
              <tbody><td>1</td>
              <td>Salon</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Séjour</td>
            </tr>
              <td>3</td>
              <td>Cuisine</td>
            </tr>
              <td>4</td>
              <td>Cellier</td>
            </tr>
              <td>5</td>
              <td>Garage</td>
            </tr>
              <td>6</td>
              <td>Bureau</td>
            </tr>
            <td>7</td>
              <td>Entrée</td>
            </tr>
              <td>8</td>
              <td colspan="3">Chambre 1/Chambre 2/Chambre 3</td>
            </tr>
              <td>9</td>
              <td colspan="2">Salles de bain RDC/Salle de bain étage)</td>
            </tr>
            </tbody>
            </table>

<?php 
{
  $reponse->closeCursor(); // Termine le traitement de la requête

?>




                            <p>
                                <label for="produits">Tous nos produits visibles: </label><br/>
                                <select name="produit" id="produit">
                                    <option value="luminosite">Luminosité</option>
                                    <option value="temperature">Température</option>
                                    <option value="détecteur_de_mouvements">Détecteur de mouvements</option>
                                    <option value="incendie">Incendie</option>
                                    <option value="détecteur_de_presence">Détecteur de présence</option>
                                </select>
                            </p>

                            <p>
                                <label for="question">
                                Votre question
                                </label><br/>
       
                            <textarea name="question" id="question" rows="10" cols="50"></textarea>
                                 
                            </p>


 <input type="submit" name="soumettre la requete" value="soumettre_la_requete"/>  
                    
                      </fieldset>
                </form>
                <?php 
                  if(isset($erreur))
                {
                  echo $erreur;
                }
          ?>
          </div>
        </div>


        <?php include("vue/pied_de_page.php");?>
        </body>

</html>



   