<?php

$req = $bdd -> prepare('SELECT nom,prenom,telephone_mobile,telephone_fixe FROM client WHERE id_client=?');
$req->execute(array($_SESSION['id_client']));
$reqinfo=$req->fetch();

$nom=$reqinfo['nom'];
$prenom=$reqinfo['prenom'];
$telephone_mobile=$reqinfo['telephone_mobile'];
$telephone_fixe=$reqinfo['telephone_fixe'];


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

?>
