<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style/page_de_connexion.css" />
        <link rel="stylesheet" href="style/banniere.css" />
       

        <title>Page d'accueil</title>
    </head>
    <body>
      <?php include 'en_tete.php';?>

        <div class="container">


          <div class="container" id="login">
          <h2>Connexion Client</h2>
          <form method="post" action="">
            <fieldset>
              <p><label for="identifiant">Email:</label></p>
              <p><input type="text" name="login_client_connect"></p>
              <p><label for="mot de passe">Mot de passe:</label></p>
              <p><input type="password" name="mdpconnect"></p>
              <p><a href="index.php?redirection=mot_de_passe_oublie_1">Mot de passe oublié</a></p>
              <p><?php 
                if(isset($erreur))
                {
                  echo '<font color=#c0392b>'.$erreur.'</font>';
                }
                ?>
              </p>
              <div id="valider">
                <p><input type="submit" name="formconnexionclient" value="Connexion" /></p>
              </div>
            </fieldset>
          </form>
          </div> 

                
          <div class="container">         
           <img  src="picture/accueil.png" alt="smart" id="smart"/>
          </div>


          <div class="container" id="login" class="login2">
          <h2>Inscription</h2>
          <form method="post" action="">
              <fieldset >
                  <p>
                    <label for="Identifiant">Numero Série ceMAC:</label>
                  </p>
                          <p>
                            <input type="text" name="numeroseriecemac">
                          </p>
                          <p>
                            <label for="Email">Email:</label>
                          </p>
                          <p>
                            <input type="email" name="email">
                          </p>
        
         
                            <P>
                              <label for="mot de passe">Mot de passe:</label>
                            </P>
                            <P>
                              <input type="password" name="password_client">
                            </p>
                            <p>
                              <label for="verification mot de passe ">Verification mot de passe: </label>
                            </p>
                            <p>
                              <input type="password" name="password_client_verification">
                            </p>
         
                            
                            <div id="valider">
                             <p>

                                <input type="submit" name="formvalider" value="Ajouter"/>  
                             </p>
                            </div>
            </fieldset>
            </form>
                <?php 
                  if(isset($erreur1))
                {
                  echo $erreur1;
                }
            ?>
            </div> 


           </div>
      <?php include 'pied_de_page.php';?>
      </div>
  </body>
<script src="../verification_de_mdp_connexion_client.js"></script>

</html>
