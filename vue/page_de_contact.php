<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" /> 
        <link rel="stylesheet" href="style/page_contact.css" />
        <link rel="stylesheet" href="style/banniere.css" />

        <title>Contact</title>
    </head>
        <body>
            <?php include 'vue/en_tete_client.php';?>
            
                <div id="container_3">  
                <div class="formulaire">           

        
        
             <form method="post" action="index.php?redirection=pagedecontact">
                      
                            <h1><p><strong>Contactez nous</strong></p></h1>
                                <label for="email">Votre E-mail: </label>
    
                                <input type="text" name="email" />
                            
                                <label for="produits">Tous nos produits visibles: </label><br/>
                                <select name="produit" id="produit">
                                    <option value="luminosite">Luminosité</option>
                                    <option value="temperature">Température</option>
                                    <option value="détecteur_de_mouvements">Détecteur de mouvements</option>
                                    <option value="incendie">Fumée</option>
                                    <option value="détecteur_de_presence">Volets</option>
                                    <option value="Alarme">Alarme</option>
                                    <option value="">Autre</option>
                                </select>
                            

                            
                                <label for="question">
                                Votre question
                                </label><br/>
       
                            <textarea name="question" id="question" rows="10" cols="35"></textarea>
                                 
                            


                            <input type="submit" name="soumettre_la_requete">
                     

                </form>
                </div>
                
                <?php 
                  if(isset($erreur))
                {
                  echo $erreur;
                }
          ?>
          </div>
        
        

    <?php include("vue/pied_de_page.php");?>

    </body>
</html>



   