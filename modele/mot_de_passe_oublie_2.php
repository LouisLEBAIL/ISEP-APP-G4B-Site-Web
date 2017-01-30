<?php
$mdp1=htmlspecialchars($_POST['nouveau_mot_de_passe']);
$mdp2=htmlspecialchars($_POST['nouveau_mot_de_passe_validation']);
if (!empty($_POST['nouveau_mot_de_passe'] and !empty($_POST['nouveau_mot_de_passe'])))
{
	if ($mdp1==$mdp2)
	{
		$mdp = $bdd -> prepare('UPDATE client SET password_client = ? WHERE id_client = ?');
		$mdp -> execute(array($mdp1,$_SESSION['id_client']));
		header('location:index.php')
	}
}
else
{
	$erreur="Tous les champs doivent être remplis";
}