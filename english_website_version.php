/* English website */

<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" /> 
        
        <link rel="stylesheet" href="style/banniere.css" />
        <meta charset="utf-8" /> <link rel="stylesheet" href="style/ajoutcapteur.css" />
        

        <title>Add a sensor</title>
    </head>

  <body>
    <?php include("en_tete_client.php");
          include('vue/bouton traduction anglais.php');?>

      <div id="container_3">
      
      
        <form method="post" action="index.php?redirection=ajout_capteur_client">
         
          <label for="numerocapteur">Sensor number: </label>
            <input type="number" name="numero_du_capteur" step="1" min="1" max="98"">
            <label for="numeroserie">Serial number: </label>
            <input type="text" name="numero_de_serie">
            <input type="submit" name="validercapteur" value="Valider">
            <p><?php 
            if(isset($erreur))
            {
              echo $erreur;
            }
             ?></p>
          
        </form>
        <?php
        $reqcapteur2 = $bdd -> prepare('SELECT * FROM capteur WHERE id_client=?');
        $reqcapteur2 -> execute(array($_SESSION['id_client']));?>

<ul>
<?php
                        while($capteur = $reqcapteur2 -> fetch())
                {
                  ?>
                  
                  <form method="post" action="index.php?redirection=ajout_capteur_client" >
                  <li>
                  <?php 
                  echo $capteur['numero_serie_capteur'].'<br/>';
                  echo $capteur['numero_capteur'].'-'. $capteur['type'].'<br/>';
                  ?> 
                  <?php $idcapteur=$capteur['id_capteur'];?>
                  <input type="submit" name="supprimer" value="supprimer" >
                  </input> 
                  <input type="hidden" name="idcapteur" value="<?php echo "".$idcapteur."" ?>">
                  </input>         
                  </li>
                  </form>
                  
                  <?php
                }

                ?>
                <ul>

      </div>
    <?php include("pied_de_page.php");?>   
    </body>
</html>



<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="style/accueil_admin.css" />
        <link rel="stylesheet" href="style/style.css" />
        <link rel="stylesheet" href="style/banniere.css" />

        <title>Add a room</title>
    </head>

	<body>
		<?php include("vue/en_tete_client.php");?>
			<div id="container_3">

          <div id="preinscription">
				    <form method="post" action="index.php?redirection=ajout_piece_client">
        			<fieldset>
          				<p>
          					<label for="nombre de piece">Write the name of the room you want to add: </label>
          				</p>
                  <p>
                    <input type="text" name="pieces">
                  </p>
                  <p>
                    <input type="submit" name="ajouter" value="ajouter"/>
                      <?php 
                        if(isset($erreur))
                            {
                                echo $erreur;
                            }
                      ?>
                  </p>       
						  </fieldset>
            </form>
                <div id="decalage">
                <?php
                while($piece = $reqpiece -> fetch())
                {
                  ?>
                  <ul>
                  <form method="post" action="index.php?redirection=ajout_piece_client" >
                  <li>
                  <?php echo $piece['nom_piece']; ?> 
                  <?php $idpiece=$piece['id_piece'];?>
                  <input type="submit" name="supprimer" value="supprimer" >
                  </input> 
                  <input type="hidden" name="idpiece" value="<?php echo "".$idpiece."" ?>">
                  </input>         
                  </li>
                  </form>
                  </ul>
                  <?php
                }
                ?>
                </div>
                <?php
                $reqpiece->closeCursor();
            ?>
          </div>
      </div>
	 <?php include("vue/pied_de_page.php");?>		
	</body>
</html>



<?php 

include("modele/fonctions_client.php");

modifier_donnees();
$user = client_info();//recupere toutes les donnees du client dans la table client
redirection();// redirige le client vers la page client...maison ou client....appartement

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="style/client_modifier_profil.css" />
        <link rel="stylesheet" href="style/style.css" />
        <link rel="stylesheet" href="style/banniere.css" />

        <title>Edit profile</title>
    </head>
    	<body>
        </div>
                <?php include("vue/en_tete_client.php");?>
    		<div id="bloc_page_3">

                <div id="container_3">
                    
                    <?php include("vue/profil_formulaire_d_inscription.php");?>
                </div>
                <?php include("vue/pied_de_page.php");?>
            </div>
        </body>
</html>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../style/page_de_connexion.css" />
        <link rel="stylesheet" href="style/style.css" />
        <link rel="stylesheet" href="style/banniere.css" />

        <title>Webmaster home page</title>
    </head>
    <body>
        <div>
            <?php include '../vue/en_tete_administrateur_non_connecte.php';?>

            <div id="container">
              <div id="login">
                <h2>Webmaster login</h2>
                <form method="post" action="">
                <fieldset>
                  <P><label for="identifiant">Login:</label></P>
                  <p><input type="text" name="login_administrateur"></p>
                  <P><label for="mot de passe">Password:</label></P>
                  <P><input type="password" name="password_administrateur"></P>
                  <p><a href="#">Forgotten password</a></p>
                  <p>
                    <?php 
                    if(isset($erreur))
                    {
                      echo '<font color=#c0392b>'.$erreur.'</font>';
                    }
                    ?>
                  </p>
                  <div class="valider">
                    <p>
                      <input type="submit" name="formconnexionadministrateur" value="Connexion"/>  
                    </p>
                  </div>
                </fieldset>
                </form>
              </div>
            </div>

            <?php include '../vue/pied_de_page.php';?>
        </div>
    </body>

<script src="../verification_de_mdp_connexion_admin.js"></script>

</html>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style/style-acceuil.css" />
        <link rel="stylesheet" href="style/page_de_connexion.css" />
        <link rel="stylesheet" href="style/banniere.css" />
       

        <title>Home page</title>
    </head>
    <body>
      <?php include 'en_tete.php';?>
      <div >
        

        <div id="container">
          <div id="login">
          <h2>Customer login</h2>
          <form method="post" action="">
            <fieldset>
              <p><label for="identifiant">Email address:</label></p>
              <p><input type="text" name="login_client_connect"></p>
              <p><label for="mot de passe">Password:</label></p>
              <p><input type="password" name="mdpconnect"></p>
              <p><a href="index.php?redirection=mot_de_passe_oublie_1">Forgotten password</a></p>
              <p><?php 
                if(isset($erreur))
                {
                  echo '<font color=#c0392b>'.$erreur.'</font>';
                }
                ?>
              </p>
              <div id="valider">
                <p><input type="submit" name="formconnexionclient" value="Connexion" /></p>
              </div>
            </fieldset>
          </form>
        </div>
          <div id="login">
          <h2>Registration</h2>
        <form method="post" action="">
              <fieldset>
                  <p>
                    <label for="Identifiant">ceMAC serial number:</label>
                  </p>
                          <p>
                            <input type="text" name="numeroseriecemac">
                          </p>
                          <p>
                            <label for="Email">Email address:</label>
                          </p>
                          <p>
                            <input type="email" name="email">
                          </p>
        
         
                            <P>
                              <label for="mot de passe">Password:</label>
                            </P>
                            <P>
                              <input type="password" name="password_client">
                            </p>
                            <p>
                              <label for="verification mot de passe ">Password check: </label>
                            </p>
                            <p>
                              <input type="password" name="password_client_verification">
                            </p>
         
                            
                            <div id="valider">
                             <p>

                                <input type="submit" name="formvalider" value="Ajouter"/>  
                             </p>
                </div>
            </fieldset>
            </form>
                <?php 
                  if(isset($erreur1))
                {
                  echo $erreur1;
                }
          ?>
          </div>

        </div>
      <?php include 'pied_de_page.php';?>
      </div>
  </body>
<script src="../verification_de_mdp_connexion_client.js"></script>

</html>


<!DOCTYPE html>
<html>
<head>
	<title>Customer relations department login</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="../style/page_de_connexion.css">
</head>
<body>
<div>
    <?php include '../vue/en_tete_administrateur_non_connecte.php';?>

    <div id="container">
    	<div id="login">
    	<h2>Customer relations department login</h2>
		<form method="post" action="">
		<fieldset>
		<p><label for= "e-mail">E-mail address</label>:</p><p><input type="text" name="e-mail" /></p>
		<p><label for="password">Password</label>:</p><p><input type="password" name= "password"></p>
		<p><a href="#">Forgotten password</a></p>
		<p>
		<?php 
    	if(isset($erreur))
    	{
        	echo '<font color=#c0392b>'.$erreur.'</font>';
    	}
    	?>
    	</p>
    	<div class="valider">
    	<p><input type="submit" name="formconnexion_service_client" value="Connexion" /></p>
    	<?php header("Location:..//controleur/index_service_client.php?redirection=visualiser_problemes_techniques_du_client");?>
		</div>
		</fieldset>
		</form>
	<?php include '../vue/pied_de_page.php';?>
</div>
</body>
</html>


<header>			
		<div id="banniere">
					<div >
                    <img  src="picture/logo_transparent.png" alt="logo DomLab" id="logo"/>
                    </div>
                    <p class="titrep" id="domisep">
					A DOMISEP product
					</p>
        </div>
</header>



<header>
    <div id="favicon">
<<<<<<< HEAD
                     <link rel="icon" type="image/gif" href="picture/favicon.gif">
                     <link rel="icon" type="image/gif" href="image/favicon.gif">
=======

                     <link rel="icon" type="image/gif" href="picture/favicon.gif">

                     <link rel="icon" type="image/gif" href="image/favicon.gif">

>>>>>>> origin/master
    <div id="DHomeLab">
        <div id="logo">
            <a href="index.php?redirection=connecte"><img  src="../picture/logo_transparent.png" alt="logo DomLab" title="DomLab"/></a>
        </div>
        <h2 class="titre">DHomeLab</h2>
        <h4><a href="index_administrateur.php?redirection=deconnexion">Log out</a></h4>
</header>


<header>

        <a href="index.php?redirection=connecte" id="logoco"  >
        <img  href="index.php?redirection=connecte" src="picture/logo_transparent.png" alt="logo DomLab" title="DomLab" id="logo"  />
        </a>

    <div id="navigation">
	<nav>
		<ul id="menu_navigation_verticale">
			<li class="hid"><a href="index.php?redirection=connecte">Rooms</a></li>
			<li id="der"><a href="index.php?redirection=voir_profil" >Profile</a>
				<ul >
					<li><a href="index.php?redirection=voir_profil">View Profile</a></li>
					<li><a href="index.php?redirection=inscription">Edit Profile</a></li>
					<li><a href="index.php?redirection=ajout_piece_client">Add/Remove a room</a></li>
					<li><a href="index.php?redirection=ajout_capteur_client">Add/Remove a sensor</a></li>
					<li><a href="index.php?redirection=ajout_capteur_piece_client">Add a sensor to a room</a></li>
<!--	LIGNE A CACHER PAR LA SUITE		-->		
					<li><a href="index.php?redirection=generateur">GENERATOR</a></li>
				</ul>
			</li>
			<li class="hid"><a href="index.php?redirection=page_de_contact">Contact us</a></li>
			<li class="hid"><a href="index.php?redirection=suivi_consommation_energetique">Energy consumption</a></li>
		</ul>
	</nav>
   </div>


        <p class="titrep" id="domisep"> A DOMISEP product</p>
        <a href="index.php?redirection=deconnexion" id="logout"> 
        <img  href="index.php?redirection=deconnexion" src="picture/logout.png" alt="logout" title="logout" />
        </a>


                
</header>


<header>
    <div id="favicon">

                     <link rel="icon" type="image/gif" href="picture/favicon.gif">

                     <link rel="icon" type="image/gif" href="image/favicon.gif">

    <div id="DHomeLab">
        <div id="logo">
            <a href="index.php?redirection=connecte"><img  src="../picture/logo_transparent.png" alt="logo DomLab" title="DomLab"/></a>
        </div>
        <h2 class="titre">DHomeLab</h2>
        <h4><a href="index_service_client.php?redirection=deconnexion">Log out</a></h4>
</header>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" /> 
        <link rel="stylesheet" href="style/banniere.css" />
        <link rel="stylesheet" href="style/generateur_donnee_capteur.css" />
        <title>GENERATOR</title>
    </head>
    <body>
    	<?php include("en_tete_client.php");



// FORMULAIRE DE RENTREE DES  INFORMATIONS REQUISES ?>

        <form method="post" class='questionnaire' action="index.php?redirection=generateur">
        <p><h6 class='warning'>WARNING !!! not available for the light sensors  !!!</h6><br /><br /><br />
        Sensor concerned: <br /></p><?


    // Choix du capteur
            ?><select name="id_du_capteur"><?php

                while ($capteur = $req_capteur->fetch())
                {
                
                    ?><option value="<?php echo $capteur['id_capteur'];?>">
                    <?php echo $capteur['numero_capteur'].' - '.$capteur['type']?>
                    </option><?php
                }
            ?></select><?php


    // Choix du nombre de lignes                  
            ?><p><br />Number of lines you want to create:<br /></p>
            <p>
                <input type="text" name="nombre" value='50'>
            </p><?php


    // Choix de l'intervalle de mesure
            ?><p><br />Measuring interval (in second) :<br /></p>
            <p>
                <input type="text" name="intervalle" value='86400'>
            </p>            
            

            <p><br /><input type="submit" name="valider" value="Valider"/>
            <p><?php
                if(isset($erreur))
                {
                  echo $erreur;
                }?>
            </p>
        </form>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style/banniere.css" />
        <title>Forgotten password</title>
    </head>
    <body>
        <?php include 'en_tete.php';?>
        <p>Please enter your Email address, ceMAC number in order to reinitiate your password.</p>
        <form action="" method="post">
            <br /><br />
            <label>E-mail address:</label><br />
            <input type="text" name="email"><br /><br />
            <label>ceMAC number:</label><br />
            <input type="text" name="numero_serie_ceMAC"><br /><br />
            <?php
            if(isset($erreur))
                {
                  echo '<font color=#c0392b>'.$erreur.'</font>';
                }
            ?>
            <input type="submit" name="valider" value="valider">
        </form>
        <?php include 'pied_de_page.php';?>
    </body>
</html>



        <?php include("pied_de_page.php");?>   
    </body>
</html> 


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style/banniere.css" />
        <title>Forgotten password</title>
    </head>
    <body>
        <?php include 'en_tete.php';?>
        <form action="" method="post">
        <label>New password:</label><br />
        <input type="" name="nouveau_mot_de_passe"><br /><br />
        <label>Password confirm:</label><br />
        <input type="" name="nouveau_mot_de_passe_validation"><br /><br />
        <input type="submit" name="valider" value="valider">
        </form>
        <?php
            if(isset($erreur))
                {
                  echo '<font color=#c0392b>'.$erreur.'</font>';
                }
            ?>
        <?php include 'pied_de_page.php';?>
    </body>
</html>


<div id="navigation">
	<nav >
		<ul id="menu_navigation_verticale">
			<li><a href="../controleur/index_administrateur.php?redirection=ajouter_client">Add a customer</a>
			</li>
			<li><a href="../controleur/index_administrateur.php?redirection=visualisation_client">See all the customers</a>
			</li>
			<li><a href="#">Edit account</a></li>
		</ul>
	</nav>
</div>


<div id="navigation">
	<nav>
		<ul id="menu_navigation_verticale">
			<li><a href="index.php?redirection=notifications">Notifications</a></li>
			<li><a href="index.php?redirection=acces_donnees_client">Detection of an issue</a>
			<li><a href="index.php?redirection=depannage">Repair service</a></li>
		</ul>
	</nav>
</div>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" /> 

        <link rel="stylesheet" href="style/accueil.css" />
        <link rel="stylesheet" href="style/banniere.css" />
        <title>Home page</title>
    </head>
    <body>
    <?php include("en_tete_client.php");
 


// BOUTON POUR RAFRAICHIR LA PAGE

    ?><div class="ensemble_refresh">
        <p class="date">
        <?php

    // Affichage de la date exacte actuelle
            echo 'Dernière mise à jour : '; 
            setlocale (LC_TIME, 'fr_FR.utf8','fra');
            $date_donnee = time();
            $date_donnee = date("Y-m-d H:i:s", $date_donnee);
            echo $date_donnee; 

    // Rafraichissemment de la page
            ?>
        </p>
        <p class="refresh">
            <a href="javascript:window.location.reload()">Reload the page</a>
        </p>
    </div><?php



// BOUCLE POUR UNE PIECE

    ?><div class='tous_les_encadres'><?php

        require 'modele/SQL_Page_Accueil/SQL_1.php';
        
        while ($info_de_la_piece = $req_id_piece -> fetch())
        {  



    // Requetes a la base de donnee pour connaitre les capteurs d une piece ( deux requetes identiques car besoin de deux boucles sur id_capteur par la suite)

            require 'modele/SQL_Page_Accueil/SQL_2.php';

            ?><div class='une_piece'><div class='nom_piece'>
                <?php echo '<h2>'.$info_de_la_piece['nom_piece'];'</h2>';?><br />
            </div><?php
 


    // Test pour detecter si il y a plusieur capteurs du meme type dans la piece

            // Innitialisation des variables qui contiennent le nombre de capteurs de la piece par type
            $temperature = 0;
            $luminosite = 0;
            $fumee = 0;
            $intrusion = 0;
            
            // Decompte des capteurs par type de la piece
            while ($doublon_type = $req_doublon -> fetch())
            {
                if ($doublon_type == 'Temperature')
                {
                    $temperature++;
                }
                if ($doublon_type == 'Luminosite')
                {
                    $luminosite++;
                }
                if ($doublon_type == 'Fumee')
                {
                    $fumee++;
                }
                if ($doublon_type == 'Intrusion')
                {
                    $intrusion++;
                }
            }



    // Test pour savoir si il y a un capteur dans la salle
            if (empty($req_id_capteur_test -> fetch()))
            {
                ?><div class='pas_de_capteur'><br />
                Cette pièce ne comporte pas de capteur.
                <br /><br />
                Vous pouvez ajouter un capteur 
                <a href='index.php?redirection=ajout_capteur_client'> ici </a>.
                <br /><br />
                Vous pouvez lier un capteur à votre pièce 
                <a href='index.php?redirection=ajout_capteur_piece_client'> ici </a>.
                </div><?php
            }



// BOUCLE POUR UN CAPTEUR

            else
            {                       
                ?><div class='tous_les_capteurs'><?php

                while ($id_du_capteur = $req_id_capteur -> fetch())
               {



    // Requetes a la base de donnee
                    require 'modele/SQL_Page_Accueil/SQL_3.php';



    // Calcul des donnes a afficher
                    $id_capteur = $id_du_capteur['id_capteur'];
                    while ($infos_de_la_table_capteur = $capteur -> fetch())  // Pour les infos de la table capteur
                    {
                // Sortie: type de capteur
                        $type_du_capteur = $infos_de_la_table_capteur['type'];

                // Sortie: etat du capteur
                        $etat_du_capteur = $infos_de_la_table_capteur['etat'];
                    }
                    while ($infos_de_la_table_donnee_capteur = $donnee_capteur -> fetch()) // Pour les infos de la table donnee_capteur
                    {
                // Sortie: valeur du capteur
                        $valeur = $infos_de_la_table_donnee_capteur['valeur'];
                    }



    // Affichage des informations
                    ?><div class='un_capteur'><?php

                        echo $type_du_capteur.':'.'<hr />' ;?>

                        <div class='boite_pour_un_capteur'><?php


                // Gestion du capteur de temperature
                            if ($type_du_capteur == 'Temperature') 
                            {
                                ?>
                                <div class="image">
                                    <?php
                                    echo  '<img  src="picture/temperature.png" title="Temperature" />';
                                    echo '<h3>'.$valeur.'°C'.'</h3>' ;?><br />
                                </div><?php   

                            }


                // Gestion du capteur de fumee
                            if ($type_du_capteur == 'Fumee') 
                            {
                                ?><div class="image"><?php
                                    echo  '<img  src="picture/fire.png" title="Fumée" />';
                                ?></div><?php

                                /* A REVOIR

                                if ($valeur == 0) // Si il n y a pas de fumée
                                {
                                    ?><div class='pre_circle'>
                                        <div class='circle_green'></div><br />
                                    </div><?php
                                }
                                if ($valeur == 1) // Si il y a de la fumee
                                {
                                    ?><div class='pre_circle'>
                                        <div class='circle_red'></div><br />
                                    </div><?php
                                }

                                */
                            }


                // Gestion du capteur de presence
                            if ($type_du_capteur == 'Intrusion')
                            {
                                if ($valeur == 0) // Si il n y personne
                                {
                                    ?><div class='pre_circle'>
                                        <div class='circle_green'></div><br />
                                    </div><?php
                                }
                                if ($valeur == 1) // Si il y a un intru
                                {
                                    ?><div class='pre_circle'>
                                        <div class='circle_red'></div><br />
                                    </div><?php
                                }                            
                            }


                // Gestion du capteur de luminosite
                            if ($type_du_capteur == 'Luminosite') 
                            {
                                ?> 
                                <div class="image">
                                <?php
                                echo '<img  src="picture/luminiosity.png" title="Luminosité" />';
                                echo ' ';?><br /><br />
                                </div><?php
                            }


                // Gestion de l etat du capteur
                            ?><div class='pre_circle'><?php
                                echo '<hr /  class="vertical">'.'<p>'.'Etat : '.'</p>';
                                if ($etat_du_capteur == 0)
                                {
                                    ?><div class='circle_green'></div><br /><?php
                                }
                                if ($etat_du_capteur == 1)
                                {
                                    ?><div class='circle_orange'></div><br /><?php
                                }
                                if ($etat_du_capteur == 2)
                                {
                                    ?><div class='circle_red'></div><br /><?php
                                }
                                if ($etat_du_capteur == 3)
                                {
                                    ?><div class='circle_black'></div><br /><?php
                                }
                            ?></div>                                                        
                        </div>
                    </div><?php                 
                }
                ?></div><?php
            }         
            ?></div><?php
        }
    ?></div>
    <?php include("pied_de_page.php");?>   
    </body>
</html>




<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" /> 
        <link rel="stylesheet" href="style/page_contact.css" />
        <link rel="stylesheet" href="style/banniere.css" />

        <title>Contact</title>
    </head>
        <body>
            <?php include 'vue/en_tete_client.php';?>
            
                <div id="container_3">  
                <div class="formulaire">           

        
        
             <form method="post" action="index.php?redirection=pagedecontact">
                      
                            <h1><p><strong>Contact us</strong></p></h1>
                                <label for="email">Your E-mail address: </label>
    
                                <input type="text" name="email" />
                            
                                <label for="produits">All our products here: </label><br/>
                                <select name="produit" id="produit">
                                    <option value="luminosite">Light</option>
                                    <option value="temperature">Temperature</option>
                                    <option value="détecteur_de_mouvements">Motion sensor</option>
                                    <option value="incendie">Smoke sensor</option>
                                    <option value="détecteur_de_presence">Shutter</option>
                                    <option value="Alarme">Alarm</option>
                                    <option value="">Other</option>
                                </select>
                            

                            
                                <label for="question">
                                Your question
                                </label></br>
       
                            <textarea name="question" id="question" rows="10" cols="35"></textarea>
                                 
                            


                            <input type="submit" name="soumettre_la_requete">
                     

                </form>
                </div>
                
                <?php 
                  if(isset($erreur))
                {
                  echo $erreur;
                }
          ?>
          </div>
        
        

    <?php include("vue/pied_de_page.php");?>

    </body>
</html>



 <div id="foot">
<footer>
	 <div id="Copyrights">
        <p>Copyright DOMISEP - All rights reserved</p>


     </div>
     <div id="Contacts">
     	<a href="index.php?redirection=page_de_contact">Contact</a>
     </div>
     <div id="Conditions">
     	<a href="#">Terms and conditions of use</a>
     </div>
</footer>

</div>  


<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="../style/accueil_admin.css" />
        <link rel="stylesheet" href="style/style.css" />
        <link rel="stylesheet" href="style/banniere.css" />

        <title>Home page</title>
    </head>

	<body>
		<?php include("../vue/en_tete_administrateur_connecte.php");?>
			<div id="container_3">
        <?php include("../vue/navigation_administrateur.php");?>
        <div id="preinscription">
				<form method="post" action="">
        			<fieldset>
          				<P>
          					<label for="Identifiant">ceMAC serial number:</label>
          				</P>
                        	<p>
                        		<input type="text" name="numeroseriecemac">
                        	</p>
                        	<p>
                        		<label for="Email">Email address:</label>
                        	</p>
                        	<p>
                        		<input type="email" name="email">
                        	</p>
        
         
                          	<P>
                          		<label for="mot de passe">Password:</label>
                          	</P>
                          	<P>
                            	<input type="password" name="password_client">
                            </p>
                            <p>
                              <label for="verification mot de passe ">Password check: </label>
                            </p>
                            <p>
                              <input type="password" name="password_client_verification">
                            </p>
         
                            
                            <div class="valider">
                             <p>

                              	<input type="submit" name="formvalider" value="Ajouter"/>  
                             </p>
			   				</div>
						</fieldset>
         		</form>
                <?php 
                  if(isset($erreur))
                {
                  echo $erreur;
                }
          ?>
          </div>
        </div>
	



	<?php include("../vue/pied_de_page.php");?>

			

			
	</body>
</html>



<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="style/client_modifier_profil.css" />
        <link rel="stylesheet" href="style/style.css" />

        <title>Login page</title>
        <title>Presentation of DomLab</title>
    </head>
        <body>
            <div id="bloc_page_3">
                <?php include("vue/en_tete_client.php");?>
                <div id="container_3">


                    <form method="post" action="#">
                        <fieldset>
                            <p>
                                <label for="codepostal">Postcode:</label>
                            </p>
                            <p>
                                <input type="text" name="codepostal">
                            </p>
                            <p>
                                <label for="ville">City: </label>
                            </p>
                            <p>
                                <input type="text" name="ville">
                            </p>
                            <p>
                                <label for="adresse_1">Address: </label>
                            </p>
                            <p>
                                <input type="text" name="adresse_1">
                            </p>
                            <p>
                                <label for="adresse_2">Additionnal address: </label>
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



<div id="profil_formulaire_d_inscription">
    <form method="post" action="#" onsubmit="return validateprofil_formulaire_d_inscription()" >
                        <fieldset class="modifier_profil">
                            <p>
                                <label for="Nom">Lastname:</label>
                            </p>
                            <p>
                                <input type="text" name="nom" value="<?php echo $user['nom'];?>">
                            </p>
                            <p>
                                <label for="Prenom">Firstname:</label>
                            </p>
                            <p>
                                <input type="text" name="prenom" value="<?php echo $user['prenom'];?>">
                            </p>
                            
                            <p>
                                <label for="date_de_naissance">Date of birth(jj/mm/aa)</label>

                            </p>
                            <p>
                                <input type="date" name="date_de_naissance" value="<?php echo $user['date_de_naissance'];?>">
                            
                            </p>
                            
                            <p>
                                <label for="Adresse_email">Email address:</label>
                            </p>
                            <p>
                                <input type="email" name="email" value="<?php echo $user['email'];?>">
                            </p>

                            <p>
                                <label for="telephone_mobile">Mobile phone: </label>
                            </p>
                            <p>
                                <input type="tel" name="telephone_mobile" value="<?php echo $user['telephone_mobile'];?>">
                            </p>
                            <p>
                                <label for="telephone_fixe">Landline phone:</label>
                            </p>
                            <p>
                                <input type="tel" name="telephone_fixe" value="<?php echo $user['telephone_fixe'];?>">
                            </p>
                            <p>
                                <label for="newmdp ">New password:</label>
                            </p>
                            <p>
                                <input type="password" name="newmdp">
                            </p>
                            <p>
                                <label for="confirmmdp">Password confirm: </label>
                            </p>
                            <p>
                                <input type="password" name="confirmmdp">
                            </p>
                            
                                <p>
                                Do you have a flat or a house: <br/>
                            
                            
                                <input type="radio" name="logement" value="appartement" id="appartement" ><label for="Appartement">Flat</label>
                                <input type="radio" name="logement" value="maison" id="maison" ><label for="Maison">House</label>
                            </p>
                            <p>
                                <?php 
                                    if(isset($erreur))
                                        {
                                            echo $erreur;
                                        }
                                ?>
                            </p>



                            <p>

                              <input type="submit" name="formsuivant" value="suivant"/>  
                            </p>
                        </fieldset>
    </form>
</div>

<script src="../formulaire_profil_d_inscription.js"></script>
 

<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="style/client_modifier_profil.css" />
        <link rel="stylesheet" href="style/style.css" />

        <title>Edit profile</title>
    </head>
    	<body>
    		<div id="bloc_page_3">
                <?php include("vue/en_tete_client.php");?>
                <div id="container_3">


                    <form method="post" action="#">
                        <fieldset>
                            <p>
                                <label for="surface">Area: </label>
                            </p>
                            <p>
                                <input type="text" name="surface">
                            </p>
                            <p>
                                <label for="etage">Floor: </label>
                            </p>
                            <p>
                                <input type="text" name="etage">
                            </p>
                            <p>
                                <label for="numero">Number: </label>
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



<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="style/client_modifier_profil.css" />
        <link rel="stylesheet" href="style/style.css" />

        <title>Edit profile</title>
    </head>
        <body>
            <div id="bloc_page_3">

                <div id="container_3">
                    <form method="post" action="">
                        <fieldset>
                            <p>
                                <label for="codepostal">Postcode:</label>
                            </p>
                            <p>
                                <input type="text" name="codepostal">
                            </p>
                            <p>
                                <label for="ville">City: </label>
                            </p>
                            <p>
                                <input type="text" name="ville">
                            </p>
                            <p>
                                <label for="adresse_1">Address: </label>
                            </p>
                            <p>
                                <input type="text" name="adresse_1">
                            </p>
                            <p>
                                <label for="adresse_2">Additionnal address : </label>
                            </p>
                            <p>
                                <input type="text" name="adresse_2">
                            </p>
                             <p>
                                <label for="surface">Area: </label>
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



