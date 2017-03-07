<?php
require_once('vendor/autoload.php');
\Config\Database\DBConfig::setDBConfig();
 $pdo=\Config\Database\DBConfig::getHandle();

try{

$stmt = $pdo->query("DROP TABLE IF EXISTS `elementharmonogramu`");
$stmt = $pdo->query("DROP TABLE IF EXISTS `elementharmonogramu`");
$stmt = $pdo->query("DROP TABLE IF EXISTS `harmonogram`");
$stmt = $pdo->query("DROP TABLE IF EXISTS `kartamc`");
$stmt = $pdo->query("DROP TABLE IF EXISTS `pracownicy`");
$stmt->execute();
$stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `pracownicy`
(
  `id` INT AUTO_INCREMENT,
  `imie` VARCHAR(100) NOT NULL,
  `nazwisko` VARCHAR(100) NOT NULL,
  `dzial` VARCHAR(150) NOT NULL,
  `stanowisko` VARCHAR(150) NOT NULL,
  `telefon` VARCHAR(20) NULL,
  `login` VARCHAR(100) NOT NULL UNIQUE,
  `haslo` VARCHAR(150) NOT NULL,
  `uprawnienia` INT NOT NULL,
  `urlop` TINYINT DEFAULT 0,
  PRIMARY KEY (id)
);");
$stmt->execute();
$stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `kartamc`
(
  `id` INT AUTO_INCREMENT,
  `idpracownik` INT,
  `aktywna` TINYINT,
  PRIMARY KEY (id),
  FOREIGN KEY (idpracownik) REFERENCES pracownicy(id) ON DELETE CASCADE
);");
$stmt->execute();
/*
$stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `harmonogram`
(
  `id` INT AUTO_INCREMENT,
  `miesiac` TINYINT NOT NULL,
  `rok` INT NOT NULL,
  PRIMARY KEY (id)
);");
 $stmt->execute();
 */
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `elementharmonogramu`
  (
    `id` INT AUTO_INCREMENT,
    `idpracownik` INT NOT NULL,
    `dzien` DATE NOT NULL ,
    `tytul` VARCHAR(150) NOT NULL,
    `dostepnyod` TIME NOT NULL,
    `dostepnydo` TIME NOT NULL,
    `rozpoczeciepracy` DATETIME NULL,
    `zakonczeniepracy` DATETIME NULL,
    `czaspracy` DECIMAL(2,0) DEFAULT 0,
    `obecny` TINYINT DEFAULT 0,
    PRIMARY KEY (id),
    FOREIGN KEY (idpracownik) REFERENCES pracownicy(id) ON DELETE CASCADE
  );");
 $stmt->execute();

  $stmt=$pdo->query("CREATE TABLE IF NOT EXISTS `pomieszczenie`
    (
      `id` INT AUTO_INCREMENT,
      `nazwa` VARCHAR(100) NOT NULL,
      `opis` VARCHAR(500) NULL,
      `nr` VARCHAR(10) NOT NULL,
      `wymaganeuprawnienia` INT NULL DEFAULT 0,
      `aktywny` TINYINT NOT NULL,
      PRIMARY KEY (id)
    );
  ");
   $stmt->execute();



 $users = array();
 $users[]=array('imie'=>'Dawid','nazwisko'=>'Dominiak','dzial'=>'IT','stanowisko'=>'Administrator','telefon'=>'666666666','login'=>'root','haslo'=>'password','uprawnienia'=>0);
 $users[]=array('imie'=>'Marcin','nazwisko'=>'Kornalski','dzial'=>'Obsługa klienta','stanowisko'=>'Pracownik','telefon'=>'777666555','login'=>'pracownik','haslo'=>'password','uprawnienia'=>1);
 foreach($users as $element_user)
 {
   $stmt = $pdo->prepare('INSERT INTO `pracownicy`(`imie`,`nazwisko`,`dzial`,`stanowisko`,`telefon`,`login`,`haslo`,`uprawnienia`) VALUES (:imie,:nazwisko,:dzial,:stanowisko,:telefon,:login,:password,:role)');
   $stmt -> bindValue(':login',$element_user['login'],PDO::PARAM_STR);
   $md5password = md5($element_user['haslo']);
   $stmt -> bindValue(':password',$md5password,PDO::PARAM_STR);
   $stmt -> bindValue(':role',$element_user['uprawnienia'],PDO::PARAM_INT);
   $stmt -> bindValue(':imie',$element_user['imie'],PDO::PARAM_STR);
   $stmt -> bindValue(':nazwisko',$element_user['nazwisko'],PDO::PARAM_STR);
   $stmt -> bindValue(':dzial',$element_user['dzial'],PDO::PARAM_STR);
   $stmt -> bindValue(':stanowisko',$element_user['stanowisko'],PDO::PARAM_STR);
   $stmt -> bindValue(':telefon',$element_user['telefon'],PDO::PARAM_STR);
   $wynik_zapytania = $stmt -> execute();

 }

/*
 $harmonogram=array();
 $harmonogram[]=array('miesiac'=>1,'rok'=>'2016');
  $harmonogram[]=array('miesiac'=>2,'rok'=>'2016');
   $harmonogram[]=array('miesiac'=>3,'rok'=>'2016');
    $harmonogram[]=array('miesiac'=>4,'rok'=>'2016');
     $harmonogram[]=array('miesiac'=>5,'rok'=>'2016');
      $harmonogram[]=array('miesiac'=>6,'rok'=>'2016');
       $harmonogram[]=array('miesiac'=>7,'rok'=>'2016');
        $harmonogram[]=array('miesiac'=>8,'rok'=>'2016');

        foreach($harmonogram as $element)
        {
          $stmt = $pdo->prepare('INSERT INTO `harmonogram`(`miesiac`,`rok`) VALUES (:miesiac,:rok)');
          $stmt -> bindValue(':miesiac',$element['miesiac'],PDO::PARAM_INT);
          $stmt -> bindValue(':rok',$element['rok'],PDO::PARAM_INT);
          $wynik_zapytania = $stmt -> execute();
        }
*/


  $elementHarmonogramu=array();
  $elementHarmonogramu[]=array('idpracownik'=>1,'dzien'=>'2017-01-26','tytul'=>'Praca własna','dostepnyod'=>'08:00:00','dostepnydo'=>'16:00:00');
  $elementHarmonogramu[]=array('idpracownik'=>2,'dzien'=>'2017-01-26','tytul'=>'Praca własna','dostepnyod'=>'16:00:00','dostepnydo'=>'00:00:00');
  foreach($elementHarmonogramu as $element)
  {
    $stmt = $pdo->prepare('INSERT INTO `elementharmonogramu` (`idpracownik`,`dzien`,`tytul`,`dostepnyod`,`dostepnydo`) VALUES (:idpracownik,:dzien,:tytul,:dostepnyod,:dostepnydo)');
    $stmt->bindValue(':idpracownik', $element['idpracownik'], PDO::PARAM_INT);
    $stmt->bindValue(':dzien', $element['dzien'], PDO::PARAM_STR);
    $stmt->bindValue(':tytul', $element['tytul'], PDO::PARAM_STR);
    $stmt->bindValue(':dostepnyod', $element['dostepnyod'], PDO::PARAM_STR);
    $stmt->bindValue(':dostepnydo', $element['dostepnydo'], PDO::PARAM_STR);
    $stmt->execute();
    $stmt->closeCursor();
  }

 return true;
}
catch (PDOException $e)
{
 echo ('Wystąpił błąd biblioteki PDO: ' .$e->getMessage());
 return false;
}
echo ("Baza została zainstalowana.");
?>
