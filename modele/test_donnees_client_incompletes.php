<?php

$req = $bdd -> prepare('SELECT nom,prenom,date_de_naissance,email,telephone_mobile,telephone_fixe FROM client WHERE id_client=?');
$req->execute(array($_SESSION['id_client']));
$reqinfo=$req->fetch();

$nom=$reqinfo['nom'];
$prenom=$reqinfo['prenom'];
$date_de_naisance=$reqinfo['date_de_naissance'];
$email=$reqinfo['email'];
$telephone_mobile=$reqinfo['telephone_mobile'];
$telephone_fixe=$reqinfo['telephone_fixe'];

if (!isset($nom))
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

if (!isset($prenom))
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

if (!isset($date_de_naissance))
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

if (!isset($email))
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

if (!isset($telephone_mobile))
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

if (!isset($telephone_fixe))
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
