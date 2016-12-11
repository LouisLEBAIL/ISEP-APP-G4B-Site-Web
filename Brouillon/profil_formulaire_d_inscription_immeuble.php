<?php
session_start();
include('fonctions.php');
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

if(isset($_SESSION['id_client']))
{
    $requser = $bdd -> prepare('SELECT * FROM client WHERE id_client=?');
    $requser -> execute(array($_SESSION['id_client']));
    $user = $requser -> fetch();
    if(isset($_POST["suivantimmeuble"]))

    {
        if(!empty($_POST['codepostal']) AND !empty($_POST['ville']) AND !empty($_POST['adresse_1']))
        {
            $_POST['codepostal']=(int) $_POST['codepostal'];
            $ville=htmlspecialchars($_POST['ville']);
            $adresse_1=htmlspecialchars($_POST['adresse_1']);
            $adresse_2=htmlspecialchars($_POST['adresse_2']);
            $codepostal=htmlspecialchars($_POST['codepostal']);
            
            $insertimmeuble = $bdd->prepare('INSERT INTO immeuble(code_postal, ville, adresse_1, adresse_2) VALUES(:code_postal, :ville, :adresse_1,:adresse_2)');
            $insertimmeuble->execute(array(
                    'code_postal' => $codepostal,
                    'ville' => $ville,
                    'adresse_1' =>$adresse_1,
                    'adresse_2' => $adresse_2));

            header('Location:ahah.php');

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

                

                <?php include("pied_de_page.php");?>
            </div>
        </body>
</html>