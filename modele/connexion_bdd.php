<?php
	// connection a la base de donnee 

    $dbname = "bdd_site";
    $host='localhost';
    $user='root';
    $pass='root';

    $bdd = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $bdd->query("SET NAMES UTF8");
?>