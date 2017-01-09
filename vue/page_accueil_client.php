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

        	<div id='table1'> 
        	<caption>Volets</caption>
        	<table border="1">


                <?php
                $i=0;
            while ($piece = $reponse1->fetch())
            {
                $i++;
                ?>
                <tr>
                    <td><?php echo $piece['nom_piece'] ;?></td>
                    <td>
                    <?php
                            
                                echo'<div class="onoffswitch">';
                                echo'<input type="checkbox" name="onoffswitch[]" class="onoffswitch-checkbox" id="myonoffswitch'.$i.'" value="valeur">';
                                echo'<label class="onoffswitch-label" for="myonoffswitch'.$i.'">';
                                echo'<span class="onoffswitch-inner">';
                                echo'</span>';
                                echo'<span class="onoffswitch-switch">';
                                echo'</span>';
                                echo'</label>';
                                echo '</div>';
                                ?>
                    </td>            
                    <td>
                        <?php
                        $j = rand (0,1) ;
                        if ($j == 0)
                        {
                            echo 'Ouvert';
                        }
                        else
                        {
                            echo 'Fermé';
                        }
                        ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        	
        	</table>
        	</div>

        	<div id='table2'>
        	<caption>Sécurité</caption>
        	<table border="1">
        	<?php
        	while ($pieces = $reponse2->fetch())
        	{
        		?>
        		<tr>
        			<td><?php echo $pieces[0] ;?></td>
        			<td>
        				<?php
        				$j = rand (0,4) ;
        				if ($j == 0)
        				{
        					echo 'Alerte sécurité';
        				}
        				else
        				{
        					echo 'Aucun problème de sécurité';
        				}
        				?>
        			</td>
        		</tr>
        		<?php
        	}
        	?>
        	</table>
        	</div>
		</div>
		<?php include("vue/pied_de_page.php");?>
	</body>
</html>
                                                       