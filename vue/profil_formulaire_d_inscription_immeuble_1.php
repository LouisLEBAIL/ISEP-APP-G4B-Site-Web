<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="style/client_modifier_profil.css" />
        <title>Page de connexion</title>
        <title>Présentation de DomLab</title>
    </head>
        <body>
            <div id="bloc_page_3">
                <?php include("vue/en_tete_client.php");?>
                <div id="container_3">
                <?php include("vue/navigation_client.php");?>

                    <form method="post" action="#">
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
                                <label for="adresse_2">Complément d'adresse : </label>
                            </p>
                            <p>
                                <input type="text" name="adresse_2">
                            </p>
                           


                            <p>

                              <input type="submit" name="suivantimmeuble" value="suivant"/>
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
        <script src="../formulaire_profil_d_inscription1.js"></script>

</html>