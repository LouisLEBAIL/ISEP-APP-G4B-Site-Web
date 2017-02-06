<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style/banniere.css" />
        <link rel="stylesheet" href="style/mdp.css" />
        <title>Mot de passe oublié</title>
    </head>
    <body>
        <?php include 'en_tete.php';?>
        <p id="instr">Veuillez entrer votre adresse E-mail, votre numéro de ce MAC afin de réinitialiser votre mot de passe.</p>
        <form action="" method="post">
            <br /><br />
            <label>E-mail :</label><br />
            <input type="text" name="email"><br /><br />
            <label>Numéro de ceMAC :</label><br />
            <input type="text" name="numero_serie_ceMAC"><br /><br />
            <?php
            if(isset($erreur))
                {
                  echo '<font color=#c0392b>'.$erreur.'</font>';
                }
            ?>
            <input type="submit" name="valider" value="valider">
        </form>
        <?php include 'pied_de_page.php';?>
    </body>
</html>