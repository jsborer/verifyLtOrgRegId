<?php
function checkLtOrgRegId(string $regnr, int $d = null) : bool
{

  $l = strlen($regnr);
  
  if($d == null && $l != 9) {
    if($l != 11) {
      return false;
    }
  } 
  
  $s = 0;
  $n = 0;
  $r = 0;
  $t = false;
      
  if($d == null) {
  	$d = 1;
    $t = true;
  }
  
  for ($i = 0; $i < $l; $i++) {
    $c = substr($regnr, $i, 1);
    if(!is_numeric($c)) return false;
    $n = (int)$c;
    if($i+1 == $l) break;
    $d = ($d > 9)?1:$d;
    $s += $n * $d++; 
  }
  
  $r = ($s % 11);
  if($r == 10) {
    if($l==11 && $t && $r == 10) {
      return checkLtOrgRegId($regnr, 3);
    }
    $r = 0;
  }
  return $r == $n;
}

print (checkLtOrgRegId('30260997'))?'Ok':'false';