<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="style/client_modifier_profil.css" />
        <title>Modification du profil</title>
    </head>
    	<body>
    		<div id="bloc_page_3">
                <?php include("vue/en_tete_client.php");?>
                <div id="container_3">
                <?php include("vue/navigation_client.php");?>

                    <form method="post" action="#">
                        <fieldset>
                            <p>
                                <label for="surface">Surface : </label>
                            </p>
                            <p>
                                <input type="text" name="surface">
                            </p>
                            <p>
                                <label for="etage">Etage : </label>
                            </p>
                            <p>
                                <input type="text" name="etage">
                            </p>
                            <p>
                                <label for="numero">Numéro : </label>
                            </p>
                            <p>
                                <input type="text" name="numero">
                            </p>


                            <p>

                              <input type="submit" name="validerimmeuble" value="Valider"/>
                               <?php 
                                    if(isset($erreur))
                                        {
                                            echo $erreur;
                                        }
                                ?>
                            </p>
                        </fieldset>
                    </form>
                </div>
                <?php include("vue/pied_de_page.php");?>
            </div>
        </body>
</html>


css bouton on/off : 

.onoff
{
  width:32px;
  height:32px;
  padding:1px 2px 3px 3px;  
  font-size:12px;
  background:lightgray;
  text-align:center;    
}
.onoff div
{
  width:18px;
  height:18px;
  min-height:18px;  
  background:lightgray;
  overflow:hidden;
  border-top:1px solid gray;
  border-right:1px solid white;
  border-bottom:1px solid white;
  border-left:1px solid gray;           
  margin:0 auto;
  color:gray;
}
























