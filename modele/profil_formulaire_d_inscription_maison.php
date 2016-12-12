<?php

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
            header('Location: index.php?redirection=connecte');

        }
        else
        {
            $erreur="veuillez remplir tous les champs";
        }
    }
}

?>