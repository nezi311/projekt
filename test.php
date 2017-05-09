<?php
/*
if(isset($_COOKIE['idtowary']))
{
  echo '<br>id ';
var_dump($_COOKIE['idtowary']);
}

if(isset($_COOKIE['ilosci']))
{
  echo '<br>ilosci ';
var_dump($_COOKIE['ilosci']);
}
*/
/*
$IdTowar = 1;
$ilosc = 2;
if(!isset($_COOKIE['test']))
{
  $ids = array();
  $ids[] = $IdTowar;
  $dane = json_encode($ids);
  setcookie('test', $dane,time()+60*60*24*30,'/');
  $_COOKIE['test'] = $dane;
}
else
{
  $cookie = $_COOKIE['test'];
  $cookie = stripslashes($cookie);
  $ids = json_decode($cookie, true);
  $ids[] = $IdTowar;
  $dane = json_encode($ids);
  setcookie('test', $dane,time()+60*60*24*30,'/');
  $_COOKIE['test'] = $dane;
}

if(!isset($_COOKIE['test2']))
{
  $quantity = array();
  $quantity[] = $ilosc;
  $dane = json_encode($quantity);
  setcookie('test2', $dane,time()+60*60*24*30,'/');
  $_COOKIE['test2'] = $dane;
}
else
{
  $cookie = $_COOKIE['test2'];
  $cookie = stripslashes($cookie);
  $quantity = json_decode($cookie, true);
  $quantity[] = $ilosc;
  $dane = json_encode($quantity);
  setcookie('test2', $dane,time()+60*60*24*30,'/');
  $_COOKIE['test2'] = $dane;
}
//var_dump($_COOKIE['test']);
//var_dump($_COOKIE['test2']);

*/
$jakiesid=3;
var_dump($_COOKIE['idtowary']);
echo '<br>';
var_dump($_COOKIE['ilosci']);
echo '<br>';
$cookie2 = $_COOKIE['idtowary'];
$cookie2 = stripslashes($cookie2);
$ids = json_decode($cookie2, true);

if(($k = array_search($jakiesid, $ids)) === false)
{
//  echo 'nie ma';
}
else
{
  //echo 'jest';
  $indeks = array_search($jakiesid, $ids);
}

$cookie = $_COOKIE['ilosci'];
$cookie = stripslashes($cookie);
$quantity = json_decode($cookie, true);
if(($k = array_search($jakiesid, $ids)) === false){}
else
{
  $quantity[$indeks]=2;
}
$dane = json_encode($quantity);
setcookie('ilosci', $dane,time()+60*60*24*30,'/');
$_COOKIE['ilosci'] = $dane;
echo 'ewentualna zmiana';
echo '<br>';
var_dump($_COOKIE['ilosci']);

/*
$cookie = $_COOKIE['idtowary'];
$cookie = stripslashes($cookie);
$ids = json_decode($cookie, true);

$cookie = $_COOKIE['ilosci'];
$cookie = stripslashes($cookie);
$quantity = json_decode($cookie, true);

foreach (array_combine($ids, $quantity) as $code => $name)
{
    echo 'id: '.$code;
    echo ',';
    echo 'ilosc: '.$name;
    echo '<br>';
}
*/
?>
