<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="../style/accueil_admin.css" />
        <link rel="stylesheet" href="../style/admin.css" />
        <link rel="stylesheet" href="../style/banniere.css" />

        <title>Page d'accueil</title>
    </head>

	<body>
		<?php include("../vue/en_tete_administrateur_connecte.php");?>
			<div id="container_3">
        
        <div id="preinscription">
				<form method="post" action="">
        			
          				<P>
          					<label for="Identifiant">Numero Série ceMAC:</label>
          				</P>
                        	<p>
                        		<input type="text" name="numeroseriecemac">
                        	</p>
                        	<p>
                        		<label for="Email">Email:</label>
                        	</p>
                        	<p>
                        		<input type="email" name="email">
                        	</p>
        
         
                          	<P>
                          		<label for="mot de passe">Mot de passe:</label>
                          	</P>
                          	<P>
                            	<input type="password" name="password_client">
                            </p>
                            <p>
                              <label for="verification mot de passe ">Verification mot de passe: </label>
                            </p>
                            <p>
                              <input type="password" name="password_client_verification">
                            </p>
         
                            
                            <div class="valider">
                             <p>

                              	<input type="submit" name="formvalider" value="Ajouter"/>  
                             </p>
			   				</div>
					
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