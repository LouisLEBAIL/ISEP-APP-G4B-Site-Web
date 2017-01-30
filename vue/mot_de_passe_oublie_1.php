<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style/banniere.css" />
        <title>Mot de passe oublié</title>
    </head>
    <body>
        <?php include 'en_tete.php';?>
        <p>Veuillez entrer votre adresse E-mail, votre numéro de ce MAC afin de réinitialiser votre mot de passe.
        <form action="" method="post">
            <label><br /><br />E-mail :</label>
            <input type="text" name="email"><br /><br /><br />
            <label>Numéro de ceMAC :</label>
            <input type="text" name="numero_serie_ceMAC"><br /><br /><br />
            <?php
            if(isset($erreur))
                {
                  echo '<font color=#c0392b>'.$erreur.'</font>';
                }
            ?>
            <input type="submit" name="valider" value="valider">
            </p>
        </form>
        <?php include 'pied_de_page.php';?>
    </body>
</html>