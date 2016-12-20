
<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="Style/client_modifier_profil.css" />
        <title>Page de connexion</title>
        <title>Présentation de DomLab</title>
    </head>
    	<body>
    		<div id="bloc_page_3">
                <?php include("en_tete_client.php");?>
                <div id="container_3">
                <?php include("navigation_client.php");?>
            <?php 
                while($infouser = $reqinfouser->fetch() )
                {
                    ?>
                    <p>Nom: <?php echo $infouser['nom'] ?> <br/>
                    Prenom: <?php echo $infouser['prenom'] ?><br/>
                    Date de naissance: <?php echo $infouser['date_de_naissance'] ?><br/>
                    Email: <?php echo $infouser['email'] ?> <br/>
                    Telephone mobile: <?php echo $infouser['telephone_mobile'] ?><br/>
                    Telephone fixe: <?php echo $infouser['telephone_fixe'] ?><br/>
                    
                    
                    <?php
                    if($immeubleexist == 1 )
                    {
                        while($infoimmeuble = $reqadresseimmeuble->fetch() AND $infoappartement =$reqadresseappartement->fetch())
                        {
                            ?>
                            Code Postal: <?php echo $infoimmeuble['code_postal'] ?> <br/>
                            Ville: <?php echo $infoimmeuble['ville'] ?><br/>
                            Adresse 1: <?php echo $infoimmeuble['adresse_1'] ?><br/>
                            Adresse 2: <?php echo $infoimmeuble['adresse_2'] ?> <br/>
                            Etage: <?php echo $infoappartement['etage'] ?> <br/>
                                Numero: <?php echo $infoappartement['numero'] ?><br/>
                                surface: <?php echo $infoappartement['surface'] ?><br/>
                            
                            <?php
                        }

                    }
                    elseif($maisonexist == 1)
                    {
                        while($infomaison = $reqadressemaison->fetch())
                        {
                            ?>
                            Code Postal: <?php echo $infomaison['code_postal'] ?> <br/>
                            Ville: <?php echo $infomaison['ville'] ?><br/>
                            Adresse 1: <?php echo $infomaison['adresse_1'] ?><br/>
                            Adresse 2: <?php echo $infomaison['adresse_2'] ?> <br/>
                            Surface : <?php echo $infomaison['surface'] ?> <br/>
                            </p>


                            <?php
                        }

                    }
                    ?>
                <?php
                }
                ?>
                </div>

                

                <?php include("pied_de_page.php");?>
            </div>
        </body>
</html>