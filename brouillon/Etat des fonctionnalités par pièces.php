Etat des fonctionnalités par pièces.php

<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="Page_service_client.css" />

        <title>Page de connexion</title>

        <title>Présentation de DomLab</title>

</head>
    	<body>
    		<div id="bloc_page_3">
                <?php include("en_tete.php");?>
                <div id="container_3">
                <?php include("navigation_client.php");?>
        <div id="preinscription">
                    
            <table id="tableau" border="1">
            <caption>Description pièce par pièce</caption>
            <tr>
              <thead><td>Pièce 
            Salon
            Sejour
            Cuisine
            Cellier 
            Garage
            Bureau
            Entrée
            Chambres (1,2,3)
            Salles de bain (2)
</td>
</thead>
</tr>
</table>
</div>


<form method="post" action="index.php?redirection=Etat des fonctionnalités par pièces" >

<?php echo $piece['nom_piece']; ?> 
                  <?php $idpiece=$piece['id_piece'];?>
                  <input type="number" name="luminosite"/>
                  <input type="submit" name="volets" value="valider">
                  </input>
                  <input type="number" name="batterie_capteur"/>

                  <input type="number" name="temperature"/>
                  <input type="submit" name="chauffage" value="valider">
                  </input>
                        
                  </form>

              <td>fonctionnalités par pièces</td></thead>
            </tr>
            <tr>
              <tbody><td>Luminosité</td>
              <td>ouverture/fermeture des volets <button class="onoff" onclick="onoff(this)"><div>off</div></button></td>
            </tr>
            <tr>
              <td>Batterie capteur</td>
              <td colspan="3">Faible/Normale/Pleine</td>
            </tr>
            <tr>
              <td>température/humidité</td>
              <td colspan="2">valeur/Programmaton du chauffage</td>
            </tr>
            <tr>
              <td>Batterie capteur</td>
              <td colspan="3">Faible/Normale/Pleine</td>
            <tr>
              <td>Intrusion/présence/mouvement</td>
              <td>caméra, alarme alluméé/éteinte</td>
            </tr>
            <td>Batterie actionneur</td>
              <td colspan="3">Faible/Normale/Pleine</td>
            </tr>
              

 <table id="tableau" border="1">
            <caption>Programmation chauffage</caption>
            <tr>
             <td>Nuit</td>
             <td>Matin</td>
             <td>Après-midi</td>
             <td>Soir</td>
             </tr>
  </table>
           
  <?php
                }
                ?>
                </div>
                <?php
                $reqpiece->closeCursor();
            ?>


<?php include("pied_de_page.php");?>
            </div>
            </div>
        </body>

 <script src="../cours1.js"></script>
 <script src="../bouton_on_off.js"></script>

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

