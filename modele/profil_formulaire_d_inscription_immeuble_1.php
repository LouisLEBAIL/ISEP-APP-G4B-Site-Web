<?php

include('fonctions.php');

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

            header('Location: index.php?redirection=formulaire_immeuble_2');

        }
        else
        {
            $erreur="veuillez remplir tous les champs";
        }
    }
}


?>