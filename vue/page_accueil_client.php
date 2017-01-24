<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" /> 
        <link rel="stylesheet" href="style/accueil.css" />
        <link rel="stylesheet" href="style/banniere.css" />
        <link rel="stylesheet" href="style/menu.css" />

        <title>Page d'accueil</title>
    </head>
    <body>
		<?php include("vue/en_tete_client.php");?>


		<div id="container_2">
			<div id="lien_donnees">
            	<a href="temperature">Température</a>
            	<a href="luminosite">Luminosité</a>
            	<a href="autres">Autres</a>
            </div>

        	<div id='table1'> 
        	<caption>Volets</caption>
        	<table border="1">
            <tr>
                <th>Pièce</th>
                <th>Volets Ouverts/Fermés</th>
                <th>Position des volets</th>
                <th>Normal ?</th>
                <th>Etat des</br>batteries</th>
            </tr>

                <?php
                $i=0;
            while ($piece = $reponse1->fetch())
            {
                $i++;
                ?>
                <tr>
                    <th><?php echo $piece['nom_piece'] ;?></th>
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
                    <td class=pre_circle>
                        <?php
                        $j = rand (0,9) ;
                        if ($j == 0)
                        {
                            ?>
                            <div class=circle_red></div>
                            <?php
                        }
                        elseif ($j == 1 or $j==2)
                        {
                            ?>
                            <div class=circle_orange></div>
                            <?php
                        }
                        else
                        {
                            ?>
                            <div class=circle_green></div>
                            <?php
                        }
                        ?>
                    </td>
                    <td class=pre_circle>
                        <?php
                        if ($etat_capteur['etat'] == 3)
                        {
                            ?>
                            <div class=circle_red></div>
                            <?php                            
                        }
                        elseif ($etat_capteur['etat'] == 2)
                        {
                            ?>
                            <div class=circle_orange></div>
                            <?php
                        }
                        else
                        {
                            ?>
                            <div class=circle_green></div>
                            <?php
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
            <tr>
                <th>Pièce</th>
                <th>Niveau</br>d'alerte</th>
                <th>Normal ?</th>
            </tr>

        	<?php
        	while ($pieces = $reponse2->fetch())
        	{
        		?>
        		<tr>
        			<th><?php echo $pieces['nom_piece'] ;?></th>
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
                    <td class=pre_circle>
                        <?php
                        $j = rand (0,9) ;
                        if ($j == 0)
                        {
                            ?>
                            <div class=circle_red></div>
                            <?php
                        }
                        elseif ($j == 1 or $j==2)
                        {
                            ?>
                            <div class=circle_orange></div>
                            <?php
                        }
                        else
                        {
                            ?>
                            <div class=circle_green></div>
                            <?php
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
                                                       