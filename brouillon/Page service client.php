<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="Page_service_client.css" />

        <title>Page de service client</title>
    </head>
    	<body>
    		<div id="bloc_page_3">
                <?php include("en_tete.php");?>
                <div id="container_3">
                <?php include("navigation_client.php");?>

                    <form method="post" action="#">
                
                    <p>Votre adresse e-mail</p>
                      <fieldset>
                            <p>
                                <label for="email">Adresse email:</label>
                            </p>
                            <p>
                                <input type="text" name="email">
                            </p>



            <input type="submit" value="Envoyer" />


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

$reponse = $bdd->query('SELECT * FROM donnee_capteur');

while ($donnees = $reponse->fetch())
{
  ?>

            <table id="tableau" border="1">
            <caption><strong>Etat des fonctionnalités</strong></caption><?php echo $donnees['Etat_des_fonctionnalites']; ?><br/>
            Les fonctionnalités suivantes <?php echo $donnees['Fonctionnalités']; ?> sont : <?php echo $données['Etat']; ?> fonctionnelles, non fonctionelles ou il n'y a rien à signaler.

            <tr>
              <thead><td>Fonctionnalités</td>
              <td>Etat</td></thead>
            </tr>
            <tr>
              <tbody><td>Luminosité</td>
              <td colspan="3">RAS/Fonctionnement partiel/Non fonctionnel</td>
            </tr>
            <tr>
              <td>Température</td>
              <td colspan="3">RAS/Fonctionnement partiel/Non fonctionnel</td>
            </tr>
            <tr>
              <td>détecteur de mouvements</td>
              <td colspan="3">RAS/Fonctionnement partiel/Non fonctionnel</td>
            </tr>
            <tr>
              <td>Incendie</td>
              <td colspan="3">RAS/Fonctionnement partiel/Non fonctionnel</td>
              </tr>
              <tr>
              <td>Détecteur de présence (caméra)</td>
              <td colspan="3">RAS/Fonctionnement partiel/Non fonctionnel</td></tbody>
              </tr>
            </table>
<?php 
{
  $reponse->closeCursor(); // Termine le traitement de la requête

?>

           

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


   
<?php include("pied_de_page.php");?>
            </div>
        </body>

<script src="../Page_service_client.js"></script>

</html>


          


        







