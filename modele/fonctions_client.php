<?php
function modifier_donnees(){
    
   if(isset($_SESSION['id_client']))
        {   require 'modele/connexion_bdd.php'; // Connexion a la base de donnee

            $requser = $bdd -> prepare('SELECT * FROM client WHERE id_client=?');
            $requser -> execute(array($_SESSION['id_client']));
            $user = $requser -> fetch();

            if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['date_de_naissance']) AND !empty($_POST['telephone_mobile']) AND !empty($_POST['telephone_fixe']) AND isset($_POST['newmdp']) AND !empty($_POST['newmdp']) AND isset($_POST['confirmmdp']) AND !empty($_POST['confirmmdp']) )
            {
                
                $nom= htmlspecialchars($_POST['nom']);
                $prenom= htmlspecialchars($_POST['prenom']);
                $datedenaissance=$_POST['date_de_naissance'];
                $email=htmlspecialchars($_POST['email']);
                $telephonemobile=$_POST['telephone_mobile'];
                $telephonefixe=$_POST['telephone_fixe'];
                $newpassword=sha1($_POST['newmdp']);
                $confirmmdp=sha1($_POST['confirmmdp']);
                if($newpassword == $confirmmdp)
                {

                    $insertclient = $bdd->prepare('UPDATE client SET nom=? , prenom=? ,date_de_naissance=?, email=? , telephone_mobile=?, telephone_fixe=?, password_client=? WHERE id_client=? ');
                    $insertclient->execute(array($nom,$prenom,$datedenaissance,$email,$telephonemobile,$telephonefixe,$newpassword,$_SESSION['id_client']));

                }
                else
                {
                    $erreur='Mot de passes non identique';
                    
                }
            }
            else
            {
                $erreur='Veuillez completer tous les champs';
                
            }
        }
        else
        {
            header("Location: index.php?redirection=deconnexion");
        } 
}

function redirection(){// le formulaire doit être complètement rempli
        if(isset($_POST['logement']) && $_POST['logement'] == "appartement" && !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['date_de_naissance']) AND !empty($_POST['telephone_mobile']) AND !empty($_POST['telephone_fixe']) AND isset($_POST['newmdp']) AND !empty($_POST['newmdp']) AND isset($_POST['confirmmdp']) AND !empty($_POST['confirmmdp']) )
        {          #mttre ici le SQL
           header("Location: index.php?redirection=formulaire_immeuble_1");
        }
    else if (isset($_POST['logement']) && $_POST['logement'] == "maison" && !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['date_de_naissance']) AND !empty($_POST['telephone_mobile']) AND !empty($_POST['telephone_fixe']) AND isset($_POST['newmdp']) AND !empty($_POST['newmdp']) AND isset($_POST['confirmmdp']) AND !empty($_POST['confirmmdp']) ) 
        {
                                #mettre ici le SQL
             header("Location: index.php?redirection=formulaire_maison");        
         }  
}

function client_info(){
            require 'modele/connexion_bdd.php'; // Connexion a la base de donnee

            $requser = $bdd -> prepare('SELECT * FROM client WHERE id_client=?');
            $requser -> execute(array($_SESSION['id_client']));
            $user = $requser -> fetch();
            $list =  array('nom' => $user['nom'],
                            'prenom' => $user['prenom'],
                            'telephone_mobile' => $user['telephone_mobile'],
                            'telephone_fixe' => $user['telephone_fixe'],
                            'email' => $user['email'],
                            'password_client' => $user['password_client'],
                            'date_de_naissance' => $user['date_de_naissance'],
             );
            $requser->closeCursor();
            return $list;
}
?>