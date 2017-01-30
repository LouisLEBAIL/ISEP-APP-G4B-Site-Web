<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style/banniere.css" />
        <title>Mot de passe oublié</title>
    </head>
    <body>
        <?php include 'en_tete.php';?>
        <form action="" method="post">
        <label>Nouveau mot de passe :</label>
        <input type="" name="nouveau_mot_de_passe">
        <label>Confirmation du nouveau mot de passe :</label>
        <input type="" name="nouveau_mot_de_passe_validation">
        <input type="submit" name="valider" value="valider">
        </form>
        <?php
            if(isset($erreur))
                {
                  echo '<font color=#c0392b>'.$erreur.'</font>';
                }
            ?>
        <?php include 'pied_de_page.php';?>
    </body>
</html>