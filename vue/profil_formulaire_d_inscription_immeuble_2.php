<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="style/client_modifier_profil.css" />
        <link rel="stylesheet" href="style/style.css" />

        <title>Modification du profil</title>
    </head>
    	<body>
    		<div id="bloc_page_3">
                <?php include("vue/en_tete_client.php");?>
                <div id="container_3">


                    <form method="post" action="#">
                        <fieldset>
                            <p>
                                <label for="surface">Surface : </label>
                            </p>
                            <p>
                                <input type="text" name="surface">
                            </p>
                            <p>
                                <label for="etage">Etage : </label>
                            </p>
                            <p>
                                <input type="text" name="etage">
                            </p>
                            <p>
                                <label for="numero">Numéro : </label>
                            </p>
                            <p>
                                <input type="text" name="numero">
                            </p>


                            <p>

                              <input type="submit" name="validerimmeuble" value="Valider"/>
                               <?php 
                                    if(isset($erreur))
                                        {
                                            echo $erreur;
                                        }
                                ?>
                            </p>
                        </fieldset>
                    </form>
                </div>
                <?php include("vue/pied_de_page.php");?>
            </div>
        </body>
        <script src="../formulaire_profil_d_inscription2.js"></script>

</html>


























