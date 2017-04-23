<?php
require_once('vendor/autoload.php');
\Config\Database\DBConfig::setDBConfig();
 $pdo=\Config\Database\DBConfig::getHandle();

try{
  $stmt = $pdo->query("DROP TABLE if exists `cenahistoria`,`towarySprzedaz`, `zamowieniesprzedaz`, `statuszamowienia`, `koszyk`, `dostawcatowar`, `klient`, `zamowienietowar`, `zamowienietowarkopia`, `zamowienia`, `Dostawca`, `towar`, `Jednostkamiary`, `kategoria`,`pracownicy`,`users`;");
  $stmt->execute();
  /*************************************************/
  /*******************BILANS********************/
  /*************************************************/
$stmt = $pdo->query("DROP TABLE IF EXISTS `bilans`");
$stmt->execute();
$stmt = $pdo->query("CREATE TABLE `bilans` (
  `IdBilans` int(11) NOT NULL
);");

/*************************************************/
/*******************SPOSOBDOSTAWY********************/
/*************************************************/
$stmt = $pdo->query("DROP TABLE IF EXISTS `sposobdostawy`");
$stmt->execute();
$stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `sposobdostawy`
(
  `IdSposobDostawy` INT AUTO_INCREMENT,
  `SposobDostawy` VARCHAR(50) NOT NULL UNIQUE,
  PRIMARY KEY (IdSposobDostawy)
)ENGINE = InnoDB;");
$stmt->execute();

$kategorie = array();
$kategorie[]=array('SposobDostawy'=>'Kurier');
$kategorie[]=array('SposobDostawy'=>'Odbior Osobisty');
foreach($kategorie as $element_kategoria)
{
  $stmt = $pdo->prepare('INSERT INTO `sposobdostawy`(`SposobDostawy`) VALUES (:SposobDostawy)');
  $stmt -> bindValue(':SposobDostawy',$element_kategoria['SposobDostawy'],PDO::PARAM_STR);
  $wynik_zapytania = $stmt -> execute();
}
  /*************************************************/
  /*******************PRACOWNICY********************/
  /*************************************************/
$stmt = $pdo->query("DROP TABLE IF EXISTS `Pracownicy`");
$stmt->execute();
$stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Pracownicy`
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
 /*************************************************/
 /*******************KATEGORIA********************/
 /*************************************************/
 $stmt = $pdo->query("DROP TABLE IF EXISTS `Kategoria`");
 $stmt->execute();
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Kategoria`
 (
   `IdKategoria` INT AUTO_INCREMENT,
   `NazwaKategorii` VARCHAR(100) NOT NULL UNIQUE,
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
 /*************************************************/
 /*******************JEDNOSKA_MIARY****************/
 /*************************************************/
 $stmt = $pdo->query("DROP TABLE IF EXISTS `Jednostkamiary`");
 $stmt->execute();
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Jednostkamiary`
 (
   `IdJednostkaMiary` INT AUTO_INCREMENT,
   `Nazwa` VARCHAR(100) NOT NULL,
   `NazwaSkrocona` VARCHAR(10)  NULL,
   PRIMARY KEY (IdJednostkaMiary)
 )ENGINE = InnoDB;");
 $stmt->execute();

 $jednostki = array();
 $jednostki[]=array('Nazwa'=>'sztuka','NazwaSkrocona'=>'szt');
 $jednostki[]=array('Nazwa'=>'litr','NazwaSkrocona'=>'l');
 foreach($jednostki as $element_jednostka)
 {
   $stmt = $pdo->prepare('INSERT INTO `Jednostkamiary`(`Nazwa`,`NazwaSkrocona`) VALUES (:Nazwa,:NazwaSkrocona)');
   $stmt -> bindValue(':Nazwa',$element_jednostka['Nazwa'],PDO::PARAM_STR);
   $stmt -> bindValue(':NazwaSkrocona',$element_jednostka['NazwaSkrocona'],PDO::PARAM_STR);
   $wynik_zapytania = $stmt -> execute();
 }
 /*************************************************/
 /*******************TOWAR*************************/
 /*************************************************/
 $stmt = $pdo->query("DROP TABLE IF EXISTS `Towar`");
 $stmt->execute();
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Towar`
 (
   `IdTowar` INT AUTO_INCREMENT,
   `NazwaTowaru` VARCHAR(100) NOT NULL,
   `MinStanMagazynowy` INT NOT NULL,
   `MaxStanMagazynowy` INT NOT NULL,
   `StanMagazynowyRzeczywisty` INT NOT NULL,
   `StanMagazynowyDysponowany` INT NOT NULL,
   `StawkaVat` INT NOT NULL,
   `KodTowaru` VARCHAR(100) NOT NULL ,
   `IdKategoria` INT NOT NULL,
   `IdJednostkaMiary` INT NOT NULL,
   `Freeze` INT NOT NULL,
   `Cena` float NOT NULL,
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
 $towary[]=array('NazwaTowaru'=>'klawiatura','MinStanMagazynowy'=>1,'MaxStanMagazynowy'=>1,'StanMagazynowyRzeczywisty'=>1,'StanMagazynowyDysponowany'=>1,'StawkaVat'=>8,'KodTowaru'=>'a43dv42','IdKategoria'=>1,'IdJednostkaMiary'=>1,'Freeze'=>1,'Cena'=>600);
 $towary[]=array('NazwaTowaru'=>'mysz','MinStanMagazynowy'=>1,'MaxStanMagazynowy'=>1,'StanMagazynowyRzeczywisty'=>1,'StanMagazynowyDysponowany'=>1,'StawkaVat'=>8,'KodTowaru'=>'b43dv43','IdKategoria'=>1,'IdJednostkaMiary'=>1,'Freeze'=>0,'Cena'=>650);
  $towary[]=array('NazwaTowaru'=>'monitor','MinStanMagazynowy'=>2,'MaxStanMagazynowy'=>2,'StanMagazynowyRzeczywisty'=>2,'StanMagazynowyDysponowany'=>2,'StawkaVat'=>8,'KodTowaru'=>'h3h4j1','IdKategoria'=>1,'IdJednostkaMiary'=>1,'Freeze'=>0,'Cena'=>400);
 foreach($towary as $element_towar)
 {
   $stmt = $pdo->prepare('INSERT INTO `Towar`(`NazwaTowaru`,`MinStanMagazynowy`,`MaxStanMagazynowy`,`StanMagazynowyRzeczywisty`,`StanMagazynowyDysponowany`,`StawkaVat`,`KodTowaru`,`IdKategoria`,`IdJednostkaMiary`,`Freeze`,`Cena`) VALUES (:NazwaTowaru,:MinStanMagazynowy,:MaxStanMagazynowy,:StanMagazynowyRzeczywisty,:StanMagazynowyDysponowany,:StawkaVat,:KodTowaru,:IdKategoria,:IdJednostkaMiary,:Freeze,:Cena)');
   $stmt -> bindValue(':NazwaTowaru',$element_towar['NazwaTowaru'],PDO::PARAM_STR);
   $stmt -> bindValue(':MinStanMagazynowy',$element_towar['MinStanMagazynowy'],PDO::PARAM_INT);
   $stmt -> bindValue(':MaxStanMagazynowy',$element_towar['MaxStanMagazynowy'],PDO::PARAM_INT);
   $stmt -> bindValue(':StanMagazynowyRzeczywisty',$element_towar['StanMagazynowyRzeczywisty'],PDO::PARAM_INT);
   $stmt -> bindValue(':StanMagazynowyDysponowany',$element_towar['StanMagazynowyDysponowany'],PDO::PARAM_INT);
   $stmt -> bindValue(':StawkaVat',$element_towar['StawkaVat'],PDO::PARAM_INT);
   $stmt -> bindValue(':KodTowaru',$element_towar['KodTowaru'],PDO::PARAM_STR);
   $stmt -> bindValue(':IdKategoria',$element_towar['IdKategoria'],PDO::PARAM_INT);
   $stmt -> bindValue(':IdJednostkaMiary',$element_towar['IdJednostkaMiary'],PDO::PARAM_INT);
   $stmt -> bindValue(':Freeze',$element_towar['Freeze'],PDO::PARAM_INT);
   $stmt -> bindValue(':Cena',$element_towar['Cena'],PDO::PARAM_INT);
   $wynik_zapytania = $stmt -> execute();
 }
 /*************************************************/
 /*******************ZAMÓWIENIA********************/
 /*************************************************/
 /*
 $stmt = $pdo->query("DROP TABLE IF EXISTS `Zamowienia`");
 $stmt->execute();
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
 }*/
 /*************************************************/
 /*******************DOSTAWCA********************/
 /*************************************************/
  $stmt = $pdo->query("DROP TABLE IF EXISTS `Dostawca`");
  $stmt->execute();
  $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Dostawca`
  (
    `IdDostawca` INT AUTO_INCREMENT,
    `NazwaSkrocona` varchar(100) NOT NULL,
    `NazwaPelna` varchar(100) NOT NULL,
    `NIP` varchar(10) NOT NULL,
    `Telefon1` varchar(20) DEFAULT NULL,
    `Telefon2` varchar(20) DEFAULT NULL,
    `Telefon3` varchar(20) DEFAULT NULL,
    `NazwaDzialu` varchar(50) NOT NULL,
    `NrKonta` varchar(30) NOT NULL,
    `Adres` varchar(50) NOT NULL,
    `KodPocztowy` varchar(6) NOT NULL,
    `Poczta` varchar(30) NOT NULL,
    PRIMARY KEY (IdDostawca)
  );");
  $stmt->execute();

  $dostawcy = array();
  $dostawcy[]=array('NazwaSkrocona'=>'DPD',
  'NazwaPelna'=>'DPD',
  'NIP'=>'0987654321',
  'Telefon1'=>'123456789',
  'Telefon2'=>'123656789',
  'Telefon3'=>'123856789',
  'NazwaDzialu'=>'elektronika',
  'NrKonta'=>'4487547836587346',
  'Adres'=>'Kalisz, Jasna 21',
  'KodPocztowy'=>'11-666',
  'Poczta'=>'Kalisz',);

  foreach($dostawcy as $dostawca)
  {
    $stmt = $pdo->prepare('INSERT INTO `Dostawca`(`NazwaSkrocona`,`NazwaPelna`,`NIP`,`Telefon1`,`Telefon2`,`Telefon3`,`NazwaDzialu`,`NrKonta`,`Adres`,`KodPocztowy`,`Poczta`) VALUES (:NazwaSkrocona,:NazwaPelna,:NIP,:Telefon1,:Telefon2,:Telefon3,:NazwaDzialu,:NrKonta,:Adres,:KodPocztowy,:Poczta)');
    $stmt -> bindValue(':NazwaSkrocona',$dostawca['NazwaSkrocona'],PDO::PARAM_STR);
    $stmt -> bindValue(':NazwaPelna',$dostawca['NazwaPelna'],PDO::PARAM_STR);
    $stmt -> bindValue(':NIP',$dostawca['NIP'],PDO::PARAM_INT);
    $stmt -> bindValue(':Telefon1',$dostawca['Telefon1'],PDO::PARAM_INT);
    $stmt -> bindValue(':Telefon2',$dostawca['Telefon2'],PDO::PARAM_INT);
    $stmt -> bindValue(':Telefon3',$dostawca['Telefon3'],PDO::PARAM_INT);
    $stmt -> bindValue(':NazwaDzialu',$dostawca['NazwaDzialu'],PDO::PARAM_STR);
    $stmt -> bindValue(':NrKonta',$dostawca['NrKonta'],PDO::PARAM_INT);
    $stmt -> bindValue(':Adres',$dostawca['Adres'],PDO::PARAM_STR);
    $stmt -> bindValue(':KodPocztowy',$dostawca['KodPocztowy'],PDO::PARAM_STR);
    $stmt -> bindValue(':Poczta',$dostawca['Poczta'],PDO::PARAM_STR);
    $wynik_zapytania = $stmt -> execute();
  }
 /*************************************************/
 /*******************ZAMÓWIENIe********************/
 /*************************************************/
 $stmt = $pdo->query("DROP TABLE IF EXISTS `Zamowienia`");
 $stmt->execute();
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Zamowienia`
 (
   `IdZamowienie` int AUTO_INCREMENT,
   `TerminRealizacji` date NOT NULL,
   `DataRealizacji` date DEFAULT NULL,
   `KosztZamowienia` float NOT NULL,
   `IdDostawcy` int(11) NOT NULL,
   `DataWystawienia` date NOT NULL,
   `NumerZamowienia` varchar(50) CHARACTER SET latin1 NOT NULL,
   `IdSposobDostawy` int(11) NOT NULL,
   `KosztDostawy` float NOT NULL,
   `WartoscTowarow` float NOT NULL,
   PRIMARY KEY (IdZamowienie),
   FOREIGN KEY (IdDostawcy)
   REFERENCES Dostawca(IdDostawca)
   ON DELETE CASCADE,
   FOREIGN KEY (IdSposobDostawy)
   REFERENCES sposobdostawy(IdSposobDostawy)
   ON DELETE CASCADE
 )ENGINE = InnoDB;");
 $stmt->execute();

 $towary = array();
 $towary[]=array(
   'TerminRealizacji'=>'2017-03-21',
   'DataRealizacji'=>'2017-03-20',
   'KosztZamowienia'=>'600',
   'IdDostawcy'=>'1',
   'DataWystawienia'=>'2017-03-20',
   'NumerZamowienia'=>'2017/03/20/1',
   'IdSposobDostawy'=>'1',
   'KosztDostawy'=>'0',
   'WartoscTowarow'=>'800'
 );
 $towary[]=array(
   'TerminRealizacji'=>'2017-03-23',
   'DataRealizacji'=>'2017-03-22',
   'KosztZamowienia'=>'1550',
   'IdDostawcy'=>'1',
   'DataWystawienia'=>'2017-03-22',
   'NumerZamowienia'=>'2017/03/22/002',
   'IdSposobDostawy'=>'2',
   'KosztDostawy'=>'50',
   'WartoscTowarow'=>'1500'
 );
 foreach($towary as $element_towar)
 {
   $stmt = $pdo->prepare('INSERT INTO `Zamowienia`(`TerminRealizacji`, `DataRealizacji`, `KosztZamowienia`, `IdDostawcy`, `DataWystawienia`, `NumerZamowienia`, `IdSposobDostawy`, `KosztDostawy`, `WartoscTowarow`) VALUES (:TerminRealizacji,:DataRealizacji,:KosztZamowienia,:IdDostawcy,:DataWystawienia,:NumerZamowienia,:IdSposobDostawy,:KosztDostawy,:WartoscTowarow)');
   $stmt -> bindValue(':TerminRealizacji',$element_towar['TerminRealizacji'],PDO::PARAM_STR);
   $stmt -> bindValue(':DataRealizacji',$element_towar['DataRealizacji'],PDO::PARAM_STR);
   $stmt -> bindValue(':KosztZamowienia',$element_towar['KosztZamowienia'],PDO::PARAM_INT);
   $stmt -> bindValue(':IdDostawcy',$element_towar['IdDostawcy'],PDO::PARAM_INT);
   $stmt -> bindValue(':DataWystawienia',$element_towar['DataWystawienia'],PDO::PARAM_STR);
   $stmt -> bindValue(':NumerZamowienia',$element_towar['NumerZamowienia'],PDO::PARAM_STR);
   $stmt -> bindValue(':IdSposobDostawy',$element_towar['IdSposobDostawy'],PDO::PARAM_INT);
   $stmt -> bindValue(':KosztDostawy',$element_towar['KosztDostawy'],PDO::PARAM_INT);
   $stmt -> bindValue(':WartoscTowarow',$element_towar['WartoscTowarow'],PDO::PARAM_INT);
   $wynik_zapytania = $stmt -> execute();
 }
 /*************************************************/
 /*******************ZAMÓWIENIE_TOWAR********************/
 /*************************************************/
 $stmt = $pdo->query("DROP TABLE IF EXISTS `zamowienietowar`");
 $stmt->execute();
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `zamowienietowar`
 (
   `IdZamowienieTowar` int AUTO_INCREMENT,
   `Lp` int(11) NOT NULL,
   `IdTowar` int(11) NOT NULL,
   `Cena` float NOT NULL,
   `Ilosc` int(11) NOT NULL,
   `WartoscNetto` float NOT NULL,
   `IdZamowienie` int(11) NOT NULL,
   PRIMARY KEY (IdZamowienieTowar),
   FOREIGN KEY (IdTowar)
   REFERENCES Towar(IdTowar)
   ON DELETE CASCADE,
   FOREIGN KEY (IdZamowienie)
   REFERENCES Zamowienia(IdZamowienie)
   ON DELETE CASCADE
 )ENGINE = InnoDB;");
 $stmt->execute();

 $towary = array();
 $towary[]=array(
'Lp'=>'1',
'IdTowar'=>'1',
'Cena'=>'100',
'Ilosc'=>'6',
'WartoscNetto'=>'600',
'IdZamowienie'=>'1'
 );
 $towary[]=array(
'Lp'=>'2',
'IdTowar'=>'2',
'Cena'=>'200',
'Ilosc'=>'2',
'WartoscNetto'=>'400',
'IdZamowienie'=>'2'
 );
 foreach($towary as $element_towar)
 {
   $stmt = $pdo->prepare('INSERT INTO `zamowienietowar`(`Lp`, `IdTowar`, `Cena`, `Ilosc`, `WartoscNetto`, `IdZamowienie`) VALUES (:Lp,:IdTowar,:Cena,:Ilosc,:WartoscNetto,:IdZamowienie)');
   $stmt -> bindValue(':Lp',$element_towar['Lp'],PDO::PARAM_INT);
   $stmt -> bindValue(':IdTowar',$element_towar['IdTowar'],PDO::PARAM_INT);
   $stmt -> bindValue(':Cena',$element_towar['Cena'],PDO::PARAM_STR);
   $stmt -> bindValue(':Ilosc',$element_towar['Ilosc'],PDO::PARAM_STR);
   $stmt -> bindValue(':WartoscNetto',$element_towar['WartoscNetto'],PDO::PARAM_INT);
   $stmt -> bindValue(':IdZamowienie',$element_towar['IdZamowienie'],PDO::PARAM_INT);
   $wynik_zapytania = $stmt -> execute();
 }
 /*************************************************/
 /*******************ZAMÓWIENIE_TOWAR********************/
 /*************************************************/
 $stmt = $pdo->query("DROP TABLE IF EXISTS `zamowienietowarkopia`");
 $stmt->execute();
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `zamowienietowarkopia`
 (
   `IdZamowienieTowarKopia` int AUTO_INCREMENT,
   `Lp` int(11) NOT NULL,
   `IdTowar` int(11) NOT NULL,
   `Cena` float NOT NULL,
   `Ilosc` int(11) NOT NULL,
   `WartoscNetto` float NOT NULL,
   `IdZamowienie` int(11) NOT NULL,
   PRIMARY KEY (IdZamowienieTowarKopia),
   FOREIGN KEY (IdTowar)
   REFERENCES Towar(IdTowar)
   ON DELETE CASCADE
 )ENGINE = InnoDB;");
 $stmt->execute();

 $towary = array();
 $towary[]=array(
'Lp'=>'1',
'IdTowar'=>'1',
'Cena'=>'100',
'Ilosc'=>'6',
'WartoscNetto'=>'600',
'IdZamowienie'=>'1'
 );
 $towary[]=array(
'Lp'=>'2',
'IdTowar'=>'2',
'Cena'=>'200',
'Ilosc'=>'2',
'WartoscNetto'=>'400',
'IdZamowienie'=>'2'
 );
 foreach($towary as $element_towar)
 {
   $stmt = $pdo->prepare('INSERT INTO `zamowienietowarkopia`(`Lp`, `IdTowar`, `Cena`, `Ilosc`, `WartoscNetto`, `IdZamowienie`) VALUES (:Lp,:IdTowar,:Cena,:Ilosc,:WartoscNetto,:IdZamowienie)');
   $stmt -> bindValue(':Lp',$element_towar['Lp'],PDO::PARAM_INT);
   $stmt -> bindValue(':IdTowar',$element_towar['IdTowar'],PDO::PARAM_INT);
   $stmt -> bindValue(':Cena',$element_towar['Cena'],PDO::PARAM_STR);
   $stmt -> bindValue(':Ilosc',$element_towar['Ilosc'],PDO::PARAM_STR);
   $stmt -> bindValue(':WartoscNetto',$element_towar['WartoscNetto'],PDO::PARAM_INT);
   $stmt -> bindValue(':IdZamowienie',$element_towar['IdZamowienie'],PDO::PARAM_INT);
   $wynik_zapytania = $stmt -> execute();
 }
 /*************************************************/
 /*******************KLIENT********************/
 /*************************************************/
  $stmt = $pdo->query("DROP TABLE IF EXISTS `Klient`");
  $stmt->execute();
  $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Klient`
  (
    `IdKlient` INT AUTO_INCREMENT,
    `Imie` varchar(50) NOT NULL,
    `Nazwisko` varchar(50) NOT NULL,
    `NIP` varchar(10) NOT NULL,
    `Miasto` varchar(50) NOT NULL,
    `Ulica` varchar(50) NOT NULL,
    `Dom` varchar(50) NOT NULL,
    `Lokal` varchar(50) NULL,
    `KodPocztowy` varchar(6) NOT NULL,
    `Poczta` varchar(30) NOT NULL,
    `EMail` varchar(30) NOT NULL,
    PRIMARY KEY (IdKlient)
  );");
  $stmt->execute();

  $klienci = array();
  $klienci[]=array('Imie'=>'Michal',
  'Nazwisko'=>'Kowalski',
  'NIP'=>'0123456789',
  'Miasto'=>'Ostrów Wlkp',
  'Ulica'=>'Matejki',
  'Dom'=>'21',
  'Lokal'=>'',
  'KodPocztowy'=>'63-400',
  'Poczta'=>'Ostrów Wlkp',
  'EMail'=>'michal123@wp.pl');


  foreach($klienci as $klient)
  {
    $stmt = $pdo->prepare('INSERT INTO `Klient`(`Imie`,`Nazwisko`,`NIP`,`Miasto`,`Ulica`,`Dom`,`Lokal`,`KodPocztowy`,`Poczta`,`EMail`) VALUES (:Imie,:Nazwisko,:NIP,:Miasto,:Ulica,:Dom,:Lokal,:KodPocztowy,:Poczta,:EMail)');
    $stmt -> bindValue(':Imie',$klient['Imie'],PDO::PARAM_STR);
    $stmt -> bindValue(':Nazwisko',$klient['Nazwisko'],PDO::PARAM_STR);
    $stmt -> bindValue(':NIP',$klient['NIP'],PDO::PARAM_INT);
    $stmt -> bindValue(':Miasto',$klient['Miasto'],PDO::PARAM_STR);
    $stmt -> bindValue(':Ulica',$klient['Ulica'],PDO::PARAM_STR);
    $stmt -> bindValue(':Dom',$klient['Dom'],PDO::PARAM_STR);
    $stmt -> bindValue(':Lokal',$klient['Lokal'],PDO::PARAM_STR);
    $stmt -> bindValue(':KodPocztowy',$klient['KodPocztowy'],PDO::PARAM_STR);
    $stmt -> bindValue(':Poczta',$klient['Poczta'],PDO::PARAM_STR);
    $stmt -> bindValue(':EMail',$klient['EMail'],PDO::PARAM_STR);
    $wynik_zapytania = $stmt -> execute();
  }
  /*************************************************/
  /*******************DOSTAWCA_TOWAR********************/
  /*************************************************/
   $stmt = $pdo->query("DROP TABLE IF EXISTS `dostawcatowar`");
   $stmt->execute();
   $stmt = $pdo->query("CREATE TABLE if NOT EXISTS `dostawcatowar` (
  `IdDostawcaTowar` INT AUTO_INCREMENT,
  `IdDostawca` int(11) NOT NULL,
  `IdTowar` int(11) NOT NULL,
  `Cena` float NOT NULL,
  `DataOd` date NOT NULL,
  `DataDo` date DEFAULT NULL,
  `KodTowaruWgDostawcy` varchar(50) CHARACTER SET latin1 NOT NULL,
  `NazwaTowaruWgDostawcy` varchar(50) CHARACTER SET latin1 NOT NULL,
  primary key(`IdDostawcaTowar`),
  FOREIGN KEY (IdDostawca)
  REFERENCES Dostawca(IdDostawca)
  ON DELETE CASCADE,
  FOREIGN KEY (IdTowar)
  REFERENCES Towar(IdTowar)
  ON DELETE CASCADE
);");
   $stmt->execute();

   $klienci = array();
   $klienci[]=array(
  'IdDostawca'=>'1',
   'IdTowar'=>'1',
   'Cena'=>'600',
   'DataOd'=>'2017-03-13',
   'DataDo'=>'2017-03-23',
   'KodTowaruWgDostawcy'=>'648464168464',
   'NazwaTowaruWgDostawcy'=>'DELL 24"');

   $klienci[]=array(
  'IdDostawca'=>'1',
   'IdTowar'=>'2',
   'Cena'=>'250',
   'DataOd'=>'2017-03-07',
   'DataDo'=>'2017-03-12',
   'KodTowaruWgDostawcy'=>'1551555131353',
   'NazwaTowaruWgDostawcy'=>'Mysz Zowie EC1-A');

   foreach($klienci as $klient)
   {
     $stmt = $pdo->prepare('INSERT INTO `dostawcatowar` (`IdDostawca`, `IdTowar`, `Cena`, `DataOd`, `DataDo`, `KodTowaruWgDostawcy`, `NazwaTowaruWgDostawcy`) VALUES (:IdDostawca,:IdTowar,:Cena,:DataOd,:DataDo,:KodTowaruWgDostawcy,:NazwaTowaruWgDostawcy)');
     $stmt -> bindValue(':IdDostawca',$klient['IdDostawca'],PDO::PARAM_INT);
     $stmt -> bindValue(':IdTowar',$klient['IdTowar'],PDO::PARAM_INT);
     $stmt -> bindValue(':Cena',$klient['Cena'],PDO::PARAM_INT);
     $stmt -> bindValue(':DataOd',$klient['DataOd'],PDO::PARAM_STR);
     $stmt -> bindValue(':DataDo',$klient['DataDo'],PDO::PARAM_STR);
     $stmt -> bindValue(':KodTowaruWgDostawcy',$klient['KodTowaruWgDostawcy'],PDO::PARAM_INT);
     $stmt -> bindValue(':NazwaTowaruWgDostawcy',$klient['NazwaTowaruWgDostawcy'],PDO::PARAM_STR);
     $wynik_zapytania = $stmt -> execute();
   }
   /*************************************************/
   /*******************KOSZYK********************/
   /*************************************************/
 $stmt = $pdo->query("DROP TABLE IF EXISTS `koszyk`");
 $stmt->execute();
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `koszyk`
 (
   `id` INT AUTO_INCREMENT,
   `IdTowar` int NOT NULL unique,
   `ilosc` int NOT NULL,
   `klient` int NOT NULL,
   PRIMARY KEY (id),
   FOREIGN KEY (IdTowar)
   REFERENCES Towar(IdTowar),
   FOREIGN KEY (klient)
   REFERENCES Klient(IdKlient)
 );");
 /*************************************************/
 /*******************STATUS_ZAMÓWIENIA********************/
 /*************************************************/
 $stmt = $pdo->query("DROP TABLE IF EXISTS `statuszamowienia`");
 $stmt->execute();
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `statuszamowienia`
 (
   `IdStanZamowienia` INT AUTO_INCREMENT,
   `Stan` VARCHAR(50) NOT NULL UNIQUE,
   PRIMARY KEY (IdStanZamowienia)
 )ENGINE = InnoDB;");
 $stmt->execute();

 $kategorie = array();
 $kategorie[]=array('Stan'=>'Anulowany');
 $kategorie[]=array('Stan'=>'Zrealizowany');
 $kategorie[]=array('Stan'=>'W trakcie realizacji');
 foreach($kategorie as $element_kategoria)
 {
   $stmt = $pdo->prepare('INSERT INTO `statuszamowienia`(`Stan`) VALUES (:Stan)');
   $stmt -> bindValue(':Stan',$element_kategoria['Stan'],PDO::PARAM_STR);
   $wynik_zapytania = $stmt -> execute();
 }
 /*************************************************/
 /*******************ZAMÓWIENIE_SPRZEDAŻ*******************/
 /*************************************************/
 $stmt = $pdo->query("DROP TABLE IF EXISTS `zamowieniesprzedaz`");
 $stmt->execute();
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `zamowieniesprzedaz`
 (
   `IdZamowienieSprzedaz` INT AUTO_INCREMENT,
   `DataZamowienia` date NOT NULL,
   `Wartosc` float NOT NULL,
   `IdStanZamowienia` int NOT NULL,
   `IdKlient` int NOT NULL,
   `IdKoszykKopia` int NOT NULL,
   PRIMARY KEY (IdZamowienieSprzedaz),
   foreign key (IdStanZamowienia)
   references statuszamowienia(IdStanZamowienia),
   foreign key (IdKlient)
   references klient(IdKlient)
    )ENGINE = InnoDB;");
 $stmt->execute();

 $kategorie = array();
 $kategorie[]=array(
   'DataZamowienia'=>'2017-03-04',
 'Wartosc'=>'700',
'IdStanZamowienia'=>'2',
'IdKlient'=>'1');
$kategorie[]=array(
  'DataZamowienia'=>'2017-02-14',
'Wartosc'=>'100',
'IdStanZamowienia'=>'3',
'IdKlient'=>'1');
 foreach($kategorie as $element_kategoria)
 {
   $stmt = $pdo->prepare('INSERT INTO `zamowieniesprzedaz`(`DataZamowienia`,`Wartosc`,`IdStanZamowienia`,`IdKlient`) VALUES (:DataZamowienia,:Wartosc,:IdStanZamowienia,:IdKlient)');
   $stmt -> bindValue(':DataZamowienia',$element_kategoria['DataZamowienia'],PDO::PARAM_STR);
   $stmt -> bindValue(':Wartosc',$element_kategoria['Wartosc'],PDO::PARAM_INT);
   $stmt -> bindValue(':IdStanZamowienia',$element_kategoria['IdStanZamowienia'],PDO::PARAM_INT);
   $stmt -> bindValue(':IdKlient',$element_kategoria['IdKlient'],PDO::PARAM_INT);
   $wynik_zapytania = $stmt -> execute();
 }
 /*************************************************/
 /*******************TOWARY_SPRZEDAZ********************/
 /*************************************************/
$stmt = $pdo->query("DROP TABLE IF EXISTS `towarySprzedaz`");
$stmt->execute();
$stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `towarySprzedaz`
(
 `id` INT AUTO_INCREMENT,
 `IdTowar` int NOT NULL,
 `ilosc` int NOT NULL,
 `klient` int NOT NULL,
 `IdZamowienieSprzedaz` int NOT NULL,
 PRIMARY KEY (id),
 FOREIGN KEY (IdTowar)
 REFERENCES Towar(IdTowar),
 FOREIGN KEY (klient)
 REFERENCES Klient(IdKlient),
 FOREIGN KEY (IdZamowienieSprzedaz)
 REFERENCES ZamowienieSprzedaz(IdZamowienieSprzedaz)
);");
$kategorie = array();
$kategorie[]=array(
'IdTowar'=>'2',
'ilosc'=>'2',
'klient'=>'1',
'IdZamowienieSprzedaz'=>'1'
);
$kategorie[]=array(
  'IdTowar'=>'1',
  'ilosc'=>'1',
  'klient'=>'1',
  'IdZamowienieSprzedaz'=>'1'
);
$kategorie[]=array(
  'IdTowar'=>'1',
  'ilosc'=>'1',
  'klient'=>'1',
  'IdZamowienieSprzedaz'=>'2'
);
foreach($kategorie as $element_kategoria)
{
  $stmt = $pdo->prepare('INSERT INTO `towarySprzedaz`(`IdTowar`,`ilosc`,`klient`,`IdZamowienieSprzedaz`) VALUES (:IdTowar,:ilosc,:klient,:IdZamowienieSprzedaz)');
  $stmt -> bindValue(':IdTowar',$element_kategoria['IdTowar'],PDO::PARAM_INT);
  $stmt -> bindValue(':ilosc',$element_kategoria['ilosc'],PDO::PARAM_INT);
  $stmt -> bindValue(':klient',$element_kategoria['klient'],PDO::PARAM_INT);
  $stmt -> bindValue(':IdZamowienieSprzedaz',$element_kategoria['IdZamowienieSprzedaz'],PDO::PARAM_INT);
  $wynik_zapytania = $stmt -> execute();
}
 /*************************************************/
 /*******************CENA_HISTORIA*******************/
 /*************************************************/
 $stmt = $pdo->query("DROP TABLE IF EXISTS `cenahistoria`");
 $stmt->execute();
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `cenahistoria`
 (
   `IdCenaHistoria` INT AUTO_INCREMENT,
   `DataWprowadzenia` date NOT NULL,
   `Cena` float NOT NULL,
   `IdTowar` int NOT NULL,
   PRIMARY KEY (IdCenaHistoria),
   foreign key (IdTowar)
   references towar(IdTowar)
 )ENGINE = InnoDB;");
 $stmt->execute();

 $kategorie = array();
 $kategorie[]=array(
   'DataWprowadzenia'=>'2017-02-04',
 'Cena'=>'700',
'IdTowar'=>'1');
$kategorie[]=array(
  'DataWprowadzenia'=>'2017-02-14',
'Cena'=>'650',
'IdTowar'=>'1');
$kategorie[]=array(
  'DataWprowadzenia'=>'2017-02-20',
'Cena'=>'600',
'IdTowar'=>'1');
$kategorie[]=array(
  'DataWprowadzenia'=>'2017-03-14',
'Cena'=>'650',
'IdTowar'=>'2');
$kategorie[]=array(
  'DataWprowadzenia'=>'2017-02-20',
'Cena'=>'600',
'IdTowar'=>'2');
$kategorie[]=array(
  'DataWprowadzenia'=>'2017-04-20',
'Cena'=>'400',
'IdTowar'=>'3');
 foreach($kategorie as $element_kategoria)
 {
   $stmt = $pdo->prepare('INSERT INTO `cenahistoria`(`DataWprowadzenia`,`Cena`,`IdTowar`) VALUES (:DataWprowadzenia,:Cena,:IdTowar)');
   $stmt -> bindValue(':DataWprowadzenia',$element_kategoria['DataWprowadzenia'],PDO::PARAM_STR);
   $stmt -> bindValue(':Cena',$element_kategoria['Cena'],PDO::PARAM_INT);
   $stmt -> bindValue(':IdTowar',$element_kategoria['IdTowar'],PDO::PARAM_INT);
   $wynik_zapytania = $stmt -> execute();
 }
 echo ("Baza została zainstalowana.");
 return true;
}
catch (PDOException $e)
{
 echo ('Wystąpił błąd biblioteki PDO: ' .$e->getMessage());
 return false;
}
?>
