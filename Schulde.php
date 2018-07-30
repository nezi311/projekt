<?php
require_once('vendor/autoload.php');
\Config\Database\DBConfig::setDBConfig();
$pdo=\Config\Database\DBConfig::getHandle();

try
{
   $stmt = $pdo->query("CREATE
	                     EVENT `automatyczne_min_max`
	                     ON SCHEDULE EVERY 1 MONTH STARTS '2017-01-01 03:00:00'
	                     DO BEGIN


                       END");
   $stmt->execute();

   echo ("Schulde Events został ustawiony");
   return true;
}
   catch (PDOException $e)
{
   echo ('Wystąpił błąd biblioteki PDO: ' .$e->getMessage());
   return false;
}
?>
