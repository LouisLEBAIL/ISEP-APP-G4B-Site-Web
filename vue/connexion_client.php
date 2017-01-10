<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style/page_de_connexion.css" />
        <title>Page d'accueil</title>
    </head>
    <body>
      <div>
        <?php include 'en_tete.php';?>

        <div id="container">
          <div id="login">
          <h2>Connexion Client</h2>
          <form method="post" action="">
            <fieldset>
              <p><label for="identifiant">Email:</label></p>
              <p><input type="text" name="login_client_connect"></p>
              <p><label for="mot de passe">Mot de passe:</label></p>
              <p><input type="password" name="mdpconnect"></p>
              <p><a href="#">Mot de passe oublié</a></p>
              <p><?php 
                if(isset($erreur))
                {
                  echo '<font color=#c0392b>'.$erreur.'</font>';
                }
                ?>
              </p>
              <div class="valider">
                <p><input type="submit" name="formconnexionclient" value="Connexion"/></p>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
      <?php include 'pied_de_page.php';?>
      </div>
  </body>
</html>
