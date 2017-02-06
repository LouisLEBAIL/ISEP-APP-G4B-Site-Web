<!DOCTYPE html>

<html>

    <head>
        <link rel="stylesheet" href="style/modifier-profil.css" />
        <link rel="stylesheet" href="style/banniere.css" />

        <title>Modification du profil</title>
    </head>
        <body>
        <?php include("vue/en_tete_client.php");?>
            <div id="id">

                <div id="container_3">
                    <form method="post" action="">
                        <fieldset>
                            <p>
                                <label for="codepostal">Code Postal:</label>
                            </p>
                            <p>
                                <input type="text" name="codepostal">
                            </p>
                            <p>
                                <label for="ville">Ville: </label>
                            </p>
                            <p>
                                <input type="text" name="ville">
                            </p>
                            <p>
                                <label for="adresse_1">Adresse: </label>
                            </p>
                            <p>
                                <input type="text" name="adresse_1">
                            </p>
                            <p>
                                <label for="adresse_2">Complement d'adresse : </label>
                            </p>
                            <p>
                                <input type="text" name="adresse_2">
                            </p>
                             <p>
                                <label for="surface">Surface : </label>
                            </p>
                            <p>
                                <input type="text" name="surface">
                            </p>
                            <p>

                              <input type="submit" name="validermaison" value="Valider"/>  
                              <?php 
                                    if(isset($erreur))
                                        {
                                            echo $erreur;
                                        }
                                ?>
                            </p>
                    
                </div>

                

                <?php include("vue/pied_de_page.php");?>
            </div>
        </body>
        <script src="../formulaire_profil_d_inscription_maison.js"></script>

</html>