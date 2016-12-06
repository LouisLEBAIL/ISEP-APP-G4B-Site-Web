<?php 
session_start();/* toujours commencer par ça*/
$_SESSION = array();/*vider la variable session*/
session_destroy();/*detruit la session*/
header("Location: index_client.php");/*redirige vers la page d'accueil*/
?>

