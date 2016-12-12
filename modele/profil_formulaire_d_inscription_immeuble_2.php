<?php

if(isset($_SESSION['id_client']))
{
    $requser = $bdd -> prepare('SELECT * FROM client WHERE id_client=?');
    $requser -> execute(array($_SESSION['id_client']));
    $user = $requser -> fetch();
    $a=$user['id_client'];
    $reqidimmeuble =$bdd ->query('SELECT max(id_immeuble) as id_immeuble FROM immeuble');
    $info = $reqidimmeuble -> fetch();
    
    if(isset($_POST["validerimmeuble"]))

    {
        if( !empty($_POST['surface']) AND !empty($_POST['etage']) AND !empty($_POST['numero']))
        {
            $_POST['surface']=(int)$_POST['surface'];
            $_POST['etage']=(int)$_POST['etage'];
            $_POST['numero']=(int)$_POST['numero'];
            $surface=htmlspecialchars($_POST['surface']);
            $etage=htmlspecialchars($_POST['etage']);
            $numero=htmlspecialchars($_POST['numero']);
            
            

            $insertappartement = $bdd->prepare('INSERT INTO appartement(id_client, id_immeuble, surface, etage, numero) VALUES(:id_client, :id_immeuble, :surface, :etage, :numero)');
            $insertappartement->execute(array(
                'id_client' => $a,
                'id_immeuble' => $info['id_immeuble'],
                'surface'=> $surface,
                'etage' => $etage,
                'numero' => $numero
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