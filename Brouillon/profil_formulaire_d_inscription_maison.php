<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

if(isset($_SESSION['id_client']))
{
    $requser = $bdd -> prepare('SELECT * FROM client WHERE id_client=?');
    $requser -> execute(array($_SESSION['id_client']));
    $user = $requser -> fetch();
    if(isset($_POST["validermaison"]))

    {
        if(!empty($_POST['codepostal']) AND !empty($_POST['ville']) AND !empty($_POST['adresse_1']) AND !empty($_POST['surface']) )
        {
            $_POST['codepostal']=(int) $_POST['codepostal'];
            $ville=htmlspecialchars($_POST['ville']);
            $adresse_1=htmlspecialchars($_POST['adresse_1']);
            $adresse_2=htmlspecialchars($_POST['adresse_2']);
            $codepostal=htmlspecialchars($_POST['codepostal']);
            $_POST['surface']=(int) $_POST['surface'];
            $surface=$_POST['surface'];

            
            $insertmaison = $bdd->prepare('INSERT INTO maison(code_postal, ville, adresse_1, adresse_2 , id_client, surface) VALUES(:code_postal, :ville, :adresse_1, :adresse_2, :id_client, :surface)');
            $insertmaison->execute(array(
                    'code_postal' => $codepostal,
                    'ville' => $ville,
                    'adresse_1' =>$adresse_1,
                    'adresse_2' => $adresse_2,
                    'id_client' => $_SESSION['id_client'],
                    'surface' => $surface
                    ));
            $erreur='good';

        }
        else
        {
            $erreur="veuillez remplir tous les champs";
        }
    }
}

?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="Style/client_modifier_profil.css" />
        <title>Page de connexion</title>
        <title>Présentation de DomLab</title>
    </head>
    	<body>
    		<div id="bloc_page_3">
                <?php include("en_tete_2.php");?>
                <div id="container_3">
                <?php include("navigation_client.php");?>

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

                

                <?php include("pied_de_page.php");?>
            </div>
        </body>
</html>