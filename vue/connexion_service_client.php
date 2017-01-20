<!DOCTYPE html>
<html>
<head>
	<title>Connexion du Service Client</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="../style/page_de_connexion.css">
</head>
<body>
<div>
    <?php include '../vue/en_tete_administrateur_non_connecte.php';?>

    <div id="container">
    	<div id="login">
    	<h2>Connexion Service-Client</h2>
		<form method="post" action="">
		<fieldset>
		<p><label for= "e-mail">E-mail</label>:</p><p><input type="text" name="e-mail" /></p>
		<p><label for="password">Mot de Passe</label>:</p><p><input type="password" name= "password"></p>
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
    	 <?php header("Location:../controleur/index_service_client.php?redirection=visualiser_problemes_techniques_du_client");?>
		</div>
		</fieldset>
		</form>
	<?php include '../vue/pied_de_page.php';?>
</div>
</body>
</html>