<?php 
$volet_1=true;
$volet_2=true;
$volet_3=true;
$securite_1=true;
$securite_2=true;
$securite_3=true;
$bdd=1;
$reponse=1;
$donnees=1;
include ("connexion_bdd.php");
if 
{
    $reponse = $bdd->prepare('SELECT * FROM piece WHERE $id_client=?')
    $reponse->execute(array);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="style/client_modifier_profil.css" />
        <title>Page de connexion</title>
        <title>Présentation de DomLab</title>
    </head>
    	<body>
    		<div id="bloc_page_3">
                <?php include("en_tete_2.php");?>
                <div id="container_3">
                    <?php include("navigation_client.php");?>
                    <?php include("profil_formulaire_d_inscription.php");?>
                    <div id="lien_donnees">
                        <a href="temperature">Température</a>
                        <a href="luminosite">Luminosité</a>
                        <a href="autres">Autres</a>
                    </div>  
                    <table border="1" id="securite">
                    <?php
                    while ($donnees = $reponse->fetch())
                    {
                    ?>
                    <tr>
                        <td>
                            <?php
                                echo $donnees['nom_piece']
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($securite_1==true)
                            {
                                echo "Aucun problème de sécurité";
                            }
                            else
                            {
                                echo "Attention, problème de sécurité";
                            }
                            ?>
                        </td>
                    </tr>
                    </table>
                    }

                    <table border="1" id="volet">
                        <caption>Volets</caption>
                        <tr>
                            <td>
                                <?php
                                    echo $donnees['nom_piece']
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($volet_1==true)
                                {
                                    echo "volet ouvert";
                                }
                                else
                                {
                                    echo "volet fermé";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                    echo $donnees['nom_piece']
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($volet_2==true)
                                {
                                    echo "volet ouvert";
                                }
                                else
                                {
                                    echo "volet fermé";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                    echo $donnees['nom_piece']
                                ?>
                                
                            </td>
                            <td>
                                <?php
                                if ($volet_3==true)
                                {
                                    echo "volet ouvert";
                                }
                                else
                                {
                                    echo "volet fermé";
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
}
                </div>
                <?php include("pied_de_page.php");?>
            </div>
        </body>
</html>