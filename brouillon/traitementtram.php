<?php 
$serie="100011301002B01251B";

$tram=substr($serie,0,-18);
$obj=substr($serie,1,-14);
$req=substr($serie,5,-13);
$typ=substr($serie,6,-12);
$num=substr($serie,7,-10);
$val=substr($serie,9,-6);
$tim=substr($serie,13,-2);
$chk=substr($serie,-2);
$baseconvert=base_convert($val,16,10);
$numeroseriecapteur="T0000000001";


?>
<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" /> <link rel="stylesheet" href="#"
        <title>Ajout trame</title>
    </head>

  <body>
  <br/>
  <?php echo $serie."<br/>";
  echo$tram."<br/>";
  echo"Numéro du groupe: ".$obj."<br/>";
  echo$req."<br/>";
  echo"Type de capteur: ".$typ."<br/>";
  echo "Numéro du capteur: ".$num."<br/>";
  echo$val."<br/>";
  echo$tim."<br/>";
  echo$chk."<br/>";
  echo"La Temperature est de ".$baseconvert."°";

  

  
  ?>
 
 
    </body>
</html>