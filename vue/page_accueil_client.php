<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" /> 
        <link rel="stylesheet" href="style/accueil.css" />
        <title>Page d'accueil</title>
    </head>
    <body>
		<?php include("vue/en_tete_client.php");?>


		<div id="container_2">
			<?php include("vue/navigation_client.php");?>
			<div id="lien_donnees">
            	<a href="temperature">Température</a>
            	<a href="luminosite">Luminosité</a>
            	<a href="autres">Autres</a>
        	</div>  
        	<table border="1">
        	<?php
        	$i=0 ;
        	while ($piece = $reponse->fetch())
        	{
        		?>
        		<tr>
        			<td><?php echo $piece[0] ;?></td>
        			<td>
        				<?php
        				
        				?>
        			</td>
        		</tr>
        		<?php
        		$i=$i+1 ;
        	}
        	?>
        	</table>
		</div>
		<?php include("vue/pied_de_page.php");?>
	</body>
</html>
                                                       