<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../style/page_de_connexion.css" />
        
        <link rel="stylesheet" href="../style/banniere.css" />
        <link rel="stylesheet" href="style/page_de_connexion.css" />

        <title>Page d'accueil administrateur</title>
    </head>
    <body>
        <div>
            <?php include '../vue/en_tete_adminco.php';?>

            <div id="container">
              <div id="login">
                <h2>Connexion Administrateur</h2>
                <form method="post" action="">
                <fieldset>
                  <P><label for="identifiant">Identifiant:</label></P>
                  <p><input type="text" name="login_administrateur"></p>
                  <P><label for="mot de passe">Mot de passe:</label></P>
                  <P><input type="password" name="password_administrateur"></P>
                  <p><a href="#">Mot de passe oublié</a></p>
                  <p>
                    <?php 
                    if(isset($erreur))
                    {
                      echo '<font color=#c0392b>'.$erreur.'</font>';
                    }
                    ?>
                  </p>
                  <div class="valider">
                    <p>
                      <input type="submit" name="formconnexionadministrateur" value="Connexion"/>  
                    </p>
                  </div>
                </fieldset>
                </form>
              </div>
            </div>

            <?php include '../vue/pied_de_page.php';?>
        </div>
    </body>

<script src="../verification_de_mdp_connexion_admin.js"></script>

</html>
