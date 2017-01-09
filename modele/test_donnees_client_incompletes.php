<?php

$req1 = $bdd -> prepare('SELECT nom,prenom,telephone_mobile,telephone_fixe FROM client WHERE id_client=?');
$req1->execute(array($_SESSION['id_client']));
$reqinfo1=$req1->fetch();

$req2 = $bdd -> prepare('SELECT nom_piece  FROM piece WHERE id_client=?');
$req2->execute(array($_SESSION['id_client']));
$reqinfo2=$req2->fetch();


$nom=$reqinfo1['nom'];
$prenom=$reqinfo1['prenom'];
$telephone_mobile=$reqinfo1['telephone_mobile'];
$telephone_fixe=$reqinfo1['telephone_fixe'];
$nom_piece=$reqinfo2['nom_piece'];


if ($nom == '')
{
	?>
	<script>
    	if (confirm('Voulez-vous compléter vos informations personnelles ?'))
    	{
    		document.location.href="index.php?redirection=inscription"
    	}
    </script>
    <?php
}

else if ($prenom == '')
{
	?>
	<script>
    	if (confirm('Voulez-vous compléter vos informations personnelles ?'))
    	{
    		document.location.href="index.php?redirection=inscription"
    	}
    </script>
    <?php
}

else if ($telephone_mobile == '')
{
	?>
	<script>
    	if (confirm('Voulez-vous compléter vos informations personnelles ?'))
    	{
    		document.location.href="index.php?redirection=inscription"
    	}
    </script>
    <?php
}

else if ($telephone_fixe == '')
{
	?>
	<script>
    	if (confirm('Voulez-vous compléter vos informations personnelles ?'))
    	{
    		document.location.href="index.php?redirection=inscription"
    	}
    </script>
    <?php    
}

else if ($nom_piece == '')
{
    ?>
    <script>
        if (confirm("Vous n\'avez actuellement pas de pièces enregistrées dans votre domicile."+"\nVoulez-vous ajouter des pièces à votre domicile ?"))
        {
            document.location.href="index.php?redirection=ajout_piece_client"
        }
    </script>
    <?php    
}

?>
