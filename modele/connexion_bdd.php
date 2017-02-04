<?php
	// connection a la base de donnee 

    $dbname = "bdd_site";
    $host='localhost';
    $user='root';
    $pass='';

    $bdd = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $bdd->query("SET NAMES UTF8");
/*try
{
	$bdd = new PDO('mysql:host=localhost;dbname=bdd_site;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}*/

	?>