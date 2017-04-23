<?php
$IdTowar = 1;
$ilosc = 2;
if(!isset($_COOKIE['idtowary']))
{
  echo 'nie ma ciaskeczka';
  $ids = array();
  $dane = json_encode($ids);
  setcookie('idtowary', $dane);
  $_COOKIE['idtowary'] = $dane;
}
else
{
  $cookie = $_COOKIE['idtowary'];
  $cookie = stripslashes($cookie);
  $towar = json_decode($cookie, true);
  $towar[] = $IdTowar;
  $dane = json_encode($towar);
  setcookie('idtowary', $dane);
  $_COOKIE['idtowary'] = $dane;
  echo 'idtowary</br>';
  echo $dane;
  echo '</br>';
}
if(!isset($_COOKIE['ilosci']))
{
  echo 'nie ma ciaskeczka';
  $ids = array();
  $dane = json_encode($ids);
  setcookie('ilosci', $dane);
  $_COOKIE['ilosci'] = $dane;
}
else
{
  $cookie = $_COOKIE['ilosci'];
  $cookie = stripslashes($cookie);
  $towar = json_decode($cookie, true);
  $towar[] = $ilosc;
  $dane = json_encode($towar);
  setcookie('ilosci', $dane);
  $_COOKIE['ilosci'] = $dane;
  echo 'ilosci </br>';
  echo $dane;
}
?>
