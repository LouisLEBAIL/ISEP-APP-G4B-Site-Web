






<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="../style/accueil_admin.css" />
        <link rel="stylesheet" href="../style/style.css" />
        <link rel="stylesheet" href="../style/banniere.css" />

        <title>Visualisation des messages</title>
    </head>

	<body>
		<?php include("../vue/en_tete_administrateur_connecte.php");?>
			<div id="container_3">
      			
      				<div id="preinscription">
      				<?php
$reqmessage1=$bdd->query('SELECT id_client FROM messagerie');
while($id_client=$reqmessage1->fetch())
{
  $reqclient=$bdd->prepare('SELECT email FROM client WHERE id_client=?');
  $reqclient->execute(array($id_client['id_client']));
  $email=$reqclient->fetch();
$reqmessage2=$bdd->prepare('SELECT message FROM messagerie WHERE id_client=?');
$reqmessage2->execute(array($id_client['id_client']));
}
  while($message=$reqmessage2->fetch())
  {
    
    
    echo'Ce message a était envoyer par '.$email['email'].'  le message est le suivant :  '.$message['message'].'<br/>';

  
  
}?>
         			</div>
      		</div>
	<?php include("../vue/pied_de_page.php");?>
			
	</body>
</html>