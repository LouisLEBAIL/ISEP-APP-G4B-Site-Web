<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="../style/accueil_admin.css" />
        <title>Page de connexion</title>
        <title>Présentation de DomLab</title>
    </head>

	<body>
		<?php include("En_tete_administrateur.php");?>
			<div id="container_3">
				<form method="post" action="">
        			<fieldset>
          				<P>
          					<label for="Identifiant">Identifiant:</label>
          				</P>
                        	<p>
                        		<input type="text" name="login_client">
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
						</fieldset>
         		</form>
                <?php 
                  if(isset($erreur))
                {
                  echo $erreur;
                }
          ?>

	



	<?php include("pied_de_page.php");?>

			

			</div>
	</body>
</html>