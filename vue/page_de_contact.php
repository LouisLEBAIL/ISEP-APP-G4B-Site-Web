<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" /> 
        <link rel="stylesheet" href="style/contact.css" />
        <link rel="stylesheet" href="style/banniere.css" />

        <title>Contact</title>
    </head>
        <body>
        <?php include 'vue/en_tete_client.php';?>
            <div id="bloc_page_3"> 
                <div id="container_3">


             <form method="post" action="index.php?redirection=pagedecontact">
                      <fieldset>
                            <div id="contactez">
                            <strong>Contactez nous</strong>
                            </div>
                            <p>
                                <label for="email">Adresse mail: </label>
                            </p>
                            <p>
                                <input type="text" name="email" placeholder="Jean.dupont@****.com"/>
                                 
                            </p>
                            <p>
                                <label for="produits">Selectionnez un produit: </label>
                                <br><br/>
                                <select name="produit" id="produit">
                                    <option value="luminosite">Luminosité</option>
                                    <option value="temperature">Température</option>
                                    <option value="détecteur_de_mouvements">Détecteur de mouvements</option>
                                    <option value="incendie">Incendie</option>
                                    <option value="détecteur_de_presence">Détecteur de présence</option>
                                </select>
                            </p>

                            <p>

                            <textarea name="question" id="question" rows="10" cols="50"  placeholder="Tapez votre message ici " ></textarea>
                                 
                            </p>
                            <?php 
                                 if(isset($erreur))
                                    {
                                        echo $erreur;
                                    }
                            ?>

<div id="send">
 <input type="submit" name="soumettre_la_requete" value="Envoyer" id="envoyer"/>  
 </div>
                    
                      </fieldset>
                </form>
                
          </div>
        </div>


        <?php include("vue/pied_de_page.php");?>
        </body>
</html>