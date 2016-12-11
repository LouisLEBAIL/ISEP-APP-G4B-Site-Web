<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="style/client_modifier_profil.css" />
        <title>Modification du profil</title>
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
                                <input type="text" name="Ville">
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

                              <input type="submit" value="Valider"/>  
                            </p>
                    
                </div>

                

                <?php include("vue/pied_de_page.php");?>
            </div>
        </body>
</html>