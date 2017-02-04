<!DOCTYPE html>
<html>
<head>

	<title>Connexion du Service Client</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="../style/page_de_connexion.css" />
	<link rel="stylesheet" href="../style/banniere.css" />
</head>

<body>
	<div>
    	<?php include '../vue/en_tete_administrateur_non_connecte.php';?>


    		<div id="container">

    			<div id="login">

    				<h2>Connexion Service-Client</h2>

					<form method="post" action="">

						<fieldset>
							<p><label for= "email_service_client">E-mail</label>:</p><p><input type="text" name="email_service_client" /></p>
							<p><label for="password_service_client">Mot de Passe</label>:</p><p><input type="password" name= "password_service_client"></p>
							<p><a href="#">Mot de passe oublié</a></p>
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
    							<?php header("Location:../controleur/index_service_client.php?redirection=notifications_service_client.php");?>
							</div>
						</fieldset>

					</form>
				</div>
			</div>
	<?php include '../vue/pied_de_page.php';?>
</div>
</body>
</html>