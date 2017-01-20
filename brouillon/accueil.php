accueil

Vision pièces et fonctionnalites


<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="style/voir_profil.css" />
        <title>Profil</title>
    </head>
    	<body>
    		<div id="bloc_page">
                <?php include("en_tete_client.php");?>
                <div id="container_3">
                <?php include("navigation_client.php");?>
                <section class="zone_centre">
                    <?php 
                    while($infouser = $reqinfouser->fetch() )
                    {
                        ?>
                        <p class="cadre">Identité : <br/><br/>
                        Nom: <?php echo $infouser['nom'] ?> <br/>
                        Prénom: <?php echo $infouser['prenom'] ?><br/>
                        Date de naissance: <?php echo $infouser['date_de_naissance'] ?><br/>
                        Email: <?php echo $infouser['email'] ?> <br/>
                        Télephone mobile: <?php echo $infouser['telephone_mobile'] ?><br/>
                        Télephone fixe: <?php echo $infouser['telephone_fixe'] ?><br/><p>
                    
                    
                        <?php
                        if($immeubleexist == 1 )
                        {
                            while($infoimmeuble = $reqadresseimmeuble->fetch() AND $infoappartement =$reqadresseappartement->fetch())
                            {
                                ?>
                                <p class="cadre">Résidence : <br/><br/>
                                Code Postal: <?php echo $infoimmeuble['code_postal'] ?> <br/>
                                Ville: <?php echo $infoimmeuble['ville'] ?><br/>
                                Adresse 1: <?php echo $infoimmeuble['adresse_1'] ?><br/>
                                Adresse 2: <?php echo $infoimmeuble['adresse_2'] ?> <br/>
                                Etage: <?php echo $infoappartement['etage'] ?> <br/>
                                Numero: <?php echo $infoappartement['numero'] ?><br/>
                                Surface: <?php echo $infoappartement['surface'] ?><br/>
                            
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
                </section>
                </div>               
                <?php include("pied_de_page.php");?>
            </div>
        </body>
</html>














