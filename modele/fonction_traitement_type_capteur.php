<?php
function type_capteur($numeroserie)
{
  $type1=substr($numeroserie,0,1);
  if($type1=="T")
  {
    $type2="Temperature";
  }
  elseif($type1=="I")
  {
    $type2="Presence";
  }
  elseif($type1=="F")
  {
    $type2="Fumee";
  }  
  elseif($type1=="L")
  {
    $type2="Luminiosite";
  }
  return $type2;
}
?>