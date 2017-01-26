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



   