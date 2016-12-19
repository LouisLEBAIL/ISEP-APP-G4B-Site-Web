<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" /> 
        <link rel="stylesheet" href="style/accueil.css" />
        <title>Page d'accueil</title>
    </head>
    <body>
    	<script>
    		if (confirm('Voulez-vous compléter vos informations personnelles ?'))
    		{
    			document.location.href="index.php?redirection=inscription"
    		}

    	</script>

		<?php include("vue/en_tete_client.php");?>

		<div id="container_2">
			<?php include("vue/navigation_client.php");?>
		</div>
		<?php include("vue/pied_de_page.php");?>
	</body>
</html>
