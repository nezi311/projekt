<?php
require_once('vendor/autoload.php');
\Config\Database\DBConfig::setDBConfig();
 $pdo=\Config\Database\DBConfig::getHandle();

try{


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
  `aktywny` INT DEFAULT 1,
  PRIMARY KEY (id)
);");
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
 $stmt = $pdo->query("DROP TABLE IF EXISTS `Towar`");
 $stmt->execute();
 $stmt = $pdo->query("DROP TABLE IF EXISTS `Zamówienia`");
 $stmt->execute();
 $stmt = $pdo->query("DROP TABLE IF EXISTS `Kategoria`");
 $stmt->execute();
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Kategoria`
 (
   `IdKategoria` INT AUTO_INCREMENT,
   `NazwaKategorii` VARCHAR(100) NOT NULL,
   PRIMARY KEY (IdKategoria)
 )ENGINE = InnoDB;");
 $stmt->execute();

 $kategorie = array();
 $kategorie[]=array('NazwaKategorii'=>'elektronika');
 $kategorie[]=array('NazwaKategorii'=>'Inne');
 foreach($kategorie as $element_kategoria)
 {
   $stmt = $pdo->prepare('INSERT INTO `Kategoria`(`NazwaKategorii`) VALUES (:NazwaKategorii)');
   $stmt -> bindValue(':NazwaKategorii',$element_kategoria['NazwaKategorii'],PDO::PARAM_STR);
   $wynik_zapytania = $stmt -> execute();
 }

 $stmt = $pdo->query("DROP TABLE IF EXISTS `Jednostkamiary`");
 $stmt->execute();
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Jednostkamiary`
 (
   `IdJednostkaMiary` INT AUTO_INCREMENT,
   `NazwaJednostki` VARCHAR(100) NOT NULL,
   `skrotJednostki` VARCHAR(10)  NULL,
   PRIMARY KEY (IdJednostkaMiary)
 )ENGINE = InnoDB;");
 $stmt->execute();

 $jednostki = array();
 $jednostki[]=array('NazwaJednostki'=>'sztuka','skrotJednostki'=>'szt');
 $jednostki[]=array('NazwaJednostki'=>'litr','skrotJednostki'=>'l');
 foreach($jednostki as $element_jednostka)
 {
   $stmt = $pdo->prepare('INSERT INTO `Jednostkamiary`(`NazwaJednostki`,`skrotJednostki`) VALUES (:NazwaJednostki,:skrotJednostki)');
   $stmt -> bindValue(':NazwaJednostki',$element_jednostka['NazwaJednostki'],PDO::PARAM_STR);
   $stmt -> bindValue(':skrotJednostki',$element_jednostka['skrotJednostki'],PDO::PARAM_STR);
   $wynik_zapytania = $stmt -> execute();
 }


 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Towar`
 (
   `IdTowar` INT AUTO_INCREMENT,
   `NazwaTowaru` VARCHAR(100) NOT NULL,
   `StanMagazynowy` INT NOT NULL,
   `MinStanMagazynowy` INT NOT NULL,
   `MaxStanMagazynowy` INT NOT NULL,
   `StanMagazynowyRzeczywisty` INT NOT NULL,
   `StanMagazynowyDysponowany` INT NOT NULL,
   `StawkaVat` INT NOT NULL,
   `KodTowaru` VARCHAR(100) NOT NULL ,
   `IdKategoria` INT NOT NULL,
   `IdJednostkaMiary` INT NOT NULL,
   `Freeze` INT NOT NULL,
   PRIMARY KEY (IdTowar),
   FOREIGN KEY (IdKategoria)
   REFERENCES Kategoria(IdKategoria)
   ON DELETE CASCADE,
   FOREIGN KEY (IdJednostkaMiary)
   REFERENCES Jednostkamiary(IdJednostkaMiary)
   ON DELETE CASCADE
 )ENGINE = InnoDB;");
 $stmt->execute();

 $towary = array();
 $towary[]=array('NazwaTowaru'=>'klawiatura','StanMagazynowy'=>1,'MinStanMagazynowy'=>1,'MaxStanMagazynowy'=>1,'StanMagazynowyRzeczywisty'=>1,'StanMagazynowyDysponowany'=>1,'StawkaVat'=>8,'KodTowaru'=>'a43dv42','IdKategoria'=>1,'IdJednostkaMiary'=>1,'Freeze'=>1);
 $towary[]=array('NazwaTowaru'=>'mysz','StanMagazynowy'=>1,'MinStanMagazynowy'=>1,'MaxStanMagazynowy'=>1,'StanMagazynowyRzeczywisty'=>1,'StanMagazynowyDysponowany'=>1,'StawkaVat'=>8,'KodTowaru'=>'b43dv43','IdKategoria'=>1,'IdJednostkaMiary'=>1,'Freeze'=>0);
 foreach($towary as $element_towar)
 {
   $stmt = $pdo->prepare('INSERT INTO `Towar`(`NazwaTowaru`,`StanMagazynowy`,`MinStanMagazynowy`,`MaxStanMagazynowy`,`StanMagazynowyRzeczywisty`,`StanMagazynowyDysponowany`,`StawkaVat`,`KodTowaru`,`IdKategoria`,`IdJednostkaMiary`,`Freeze`) VALUES (:NazwaTowaru,:StanMagazynowy,:MinStanMagazynowy,:MaxStanMagazynowy,:StanMagazynowyRzeczywisty,:StanMagazynowyDysponowany,:StawkaVat,:KodTowaru,:IdKategoria,:IdJednostkaMiary,:Freeze)');
   $stmt -> bindValue(':NazwaTowaru',$element_towar['NazwaTowaru'],PDO::PARAM_STR);
   $stmt -> bindValue(':StanMagazynowy',$element_towar['StanMagazynowy'],PDO::PARAM_INT);
   $stmt -> bindValue(':MinStanMagazynowy',$element_towar['MinStanMagazynowy'],PDO::PARAM_INT);
   $stmt -> bindValue(':MaxStanMagazynowy',$element_towar['MaxStanMagazynowy'],PDO::PARAM_INT);
   $stmt -> bindValue(':StanMagazynowyRzeczywisty',$element_towar['StanMagazynowyRzeczywisty'],PDO::PARAM_INT);
   $stmt -> bindValue(':StanMagazynowyDysponowany',$element_towar['StanMagazynowyDysponowany'],PDO::PARAM_INT);
   $stmt -> bindValue(':StawkaVat',$element_towar['StawkaVat'],PDO::PARAM_INT);
   $stmt -> bindValue(':KodTowaru',$element_towar['KodTowaru'],PDO::PARAM_STR);
   $stmt -> bindValue(':IdKategoria',$element_towar['IdKategoria'],PDO::PARAM_INT);
   $stmt -> bindValue(':IdJednostkaMiary',$element_towar['IdJednostkaMiary'],PDO::PARAM_INT);
   $stmt -> bindValue(':Freeze',$element_towar['Freeze'],PDO::PARAM_INT);
   $wynik_zapytania = $stmt -> execute();
 }

 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Zamowienia`
 (
   `IdZamowienie` INT AUTO_INCREMENT,
   `NazwaTowaru` VARCHAR(100) NOT NULL,
   `MinStanMagazynowy` INT NOT NULL,
   `MaxStanMagazynowy` INT NOT NULL,
   `StawkaVat` INT NOT NULL,
   `IdKategoria` INT NOT NULL,
   `IdJednostkaMiary` INT NOT NULL,
   `Status` INT NOT NULL,
   PRIMARY KEY (IdZamowienie),
   FOREIGN KEY (IdKategoria)
   REFERENCES Kategoria(IdKategoria)
   ON DELETE CASCADE,
   FOREIGN KEY (IdJednostkaMiary)
   REFERENCES Jednostkamiary(IdJednostkaMiary)
   ON DELETE CASCADE
 )ENGINE = InnoDB;");
 $stmt->execute();

 $towary = array();
 $towary[]=array('NazwaTowaru'=>'klawiatura','MinStanMagazynowy'=>1,'MaxStanMagazynowy'=>1,'StawkaVat'=>8,'IdKategoria'=>1,'IdJednostkaMiary'=>1,'Status'=>1);
 $towary[]=array('NazwaTowaru'=>'mysz','MinStanMagazynowy'=>1,'MaxStanMagazynowy'=>1,'StawkaVat'=>8,'IdKategoria'=>1,'IdJednostkaMiary'=>1,'Status'=>1);
 foreach($towary as $element_towar)
 {
   $stmt = $pdo->prepare('INSERT INTO `Zamowienia`(`NazwaTowaru`,`MinStanMagazynowy`,`MaxStanMagazynowy`,`StawkaVat`,`IdKategoria`,`IdJednostkaMiary`,`Status`) VALUES (:NazwaTowaru,:MinStanMagazynowy,:MaxStanMagazynowy,:StawkaVat,:IdKategoria,:IdJednostkaMiary,:Status)');
   $stmt -> bindValue(':NazwaTowaru',$element_towar['NazwaTowaru'],PDO::PARAM_STR);
   $stmt -> bindValue(':MinStanMagazynowy',$element_towar['MinStanMagazynowy'],PDO::PARAM_INT);
   $stmt -> bindValue(':MaxStanMagazynowy',$element_towar['MaxStanMagazynowy'],PDO::PARAM_INT);
   $stmt -> bindValue(':StawkaVat',$element_towar['StawkaVat'],PDO::PARAM_INT);
   $stmt -> bindValue(':IdKategoria',$element_towar['IdKategoria'],PDO::PARAM_INT);
   $stmt -> bindValue(':IdJednostkaMiary',$element_towar['IdJednostkaMiary'],PDO::PARAM_INT);
   $stmt -> bindValue(':Status',$element_towar['Status'],PDO::PARAM_INT);
   $wynik_zapytania = $stmt -> execute();
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
