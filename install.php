<?php
require_once('vendor/autoload.php');
\Config\Database\DBConfig::setDBConfig();
 $pdo=\Config\Database\DBConfig::getHandle();
try{
  $stmt = $pdo->query("DROP TABLE if exists `cenahistoria`,`towarySprzedaz`, `zamowieniesprzedaz`, `statuszamowienia`, `koszyk`, `dostawcatowar`, `klient`, `zamowienietowar`, `zamowienietowarkopia`, `zamowienia`, `Dostawca`, `towar`, `jednostkamiary`, `kategoria`,`pracownicy`,`users`;");
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
/*******************SPOSOBZAPLATY********************/
/*************************************************/
$stmt = $pdo->query("DROP TABLE IF EXISTS `sposobzaplaty`");
$stmt->execute();
$stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `sposobzaplaty`
(
  `Idsposobzaplaty` INT AUTO_INCREMENT,
  `sposobzaplaty` VARCHAR(50) NOT NULL UNIQUE,
  PRIMARY KEY (Idsposobzaplaty)
)ENGINE = InnoDB;");
$stmt->execute();
$kategorie = array();
$kategorie[]=array('sposobzaplaty'=>'gotówka');
$kategorie[]=array('sposobzaplaty'=>'przelew');
foreach($kategorie as $element_kategoria)
{
  $stmt = $pdo->prepare('INSERT INTO `sposobzaplaty`(`sposobzaplaty`) VALUES (:sposobzaplaty)');
  $stmt -> bindValue(':sposobzaplaty',$element_kategoria['sposobzaplaty'],PDO::PARAM_STR);
  $wynik_zapytania = $stmt -> execute();
}
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
$kategorie[]=array('SposobDostawy'=>'Odbiór Osobisty');
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
   $stmt = $pdo->prepare('INSERT INTO `Pracownicy`(`imie`,`nazwisko`,`dzial`,`stanowisko`,`telefon`,`login`,`haslo`,`uprawnienia`) VALUES (:imie,:nazwisko,:dzial,:stanowisko,:telefon,:login,:password,:role)');
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
 $stmt = $pdo->query("DROP TABLE IF EXISTS `jednostkamiary`");
 $stmt->execute();
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `jednostkamiary`
 (
   `Idjednostkamiary` INT AUTO_INCREMENT,
   `Nazwa` VARCHAR(100) NOT NULL,
   `NazwaSkrocona` VARCHAR(10)  NULL,
   PRIMARY KEY (Idjednostkamiary)
 )ENGINE = InnoDB;");
 $stmt->execute();
 $jednostki = array();
 $jednostki[]=array('Nazwa'=>'sztuka','NazwaSkrocona'=>'szt');
 $jednostki[]=array('Nazwa'=>'litr','NazwaSkrocona'=>'l');
 foreach($jednostki as $element_jednostka)
 {
   $stmt = $pdo->prepare('INSERT INTO `jednostkamiary`(`Nazwa`,`NazwaSkrocona`) VALUES (:Nazwa,:NazwaSkrocona)');
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
   `Idjednostkamiary` INT NOT NULL,
   `Freeze` INT NOT NULL,
   `Cena` INT NULL,
   PRIMARY KEY (IdTowar),
   FOREIGN KEY (IdKategoria)
   REFERENCES Kategoria(IdKategoria),
   FOREIGN KEY (Idjednostkamiary)
   REFERENCES jednostkamiary(Idjednostkamiary)
 )ENGINE = InnoDB;");
 $stmt->execute();
 $towary = array();
 $towary[]=array('NazwaTowaru'=>'klawiatura','MinStanMagazynowy'=>1,'MaxStanMagazynowy'=>1,'StanMagazynowyRzeczywisty'=>1,'StanMagazynowyDysponowany'=>10,'StawkaVat'=>23,'KodTowaru'=>'a43dv42','IdKategoria'=>1,'Idjednostkamiary'=>1,'Freeze'=>1,'Cena'=>1);
  $towary[]=array('NazwaTowaru'=>'głośniki','MinStanMagazynowy'=>1,'MaxStanMagazynowy'=>1,'StanMagazynowyRzeczywisty'=>1,'StanMagazynowyDysponowany'=>10,'StawkaVat'=>23,'KodTowaru'=>'a43dv42','IdKategoria'=>1,'Idjednostkamiary'=>1,'Freeze'=>0,'Cena'=>3);
 $towary[]=array('NazwaTowaru'=>'mysz','MinStanMagazynowy'=>1,'MaxStanMagazynowy'=>1,'StanMagazynowyRzeczywisty'=>1,'StanMagazynowyDysponowany'=>10,'StawkaVat'=>8,'KodTowaru'=>'b43dv43','IdKategoria'=>1,'Idjednostkamiary'=>1,'Freeze'=>0,'Cena'=>1);
  $towary[]=array('NazwaTowaru'=>'monitor','MinStanMagazynowy'=>2,'MaxStanMagazynowy'=>2,'StanMagazynowyRzeczywisty'=>2,'StanMagazynowyDysponowany'=>20,'StawkaVat'=>8,'KodTowaru'=>'h3h4j1','IdKategoria'=>1,'Idjednostkamiary'=>1,'Freeze'=>0,'Cena'=>2);
 foreach($towary as $element_towar)
 {
   $stmt = $pdo->prepare('INSERT INTO `Towar`(`NazwaTowaru`,`MinStanMagazynowy`,`MaxStanMagazynowy`,`StanMagazynowyRzeczywisty`,`StanMagazynowyDysponowany`,`StawkaVat`,`KodTowaru`,`IdKategoria`,`Idjednostkamiary`,`Freeze`,`Cena`) VALUES (:NazwaTowaru,:MinStanMagazynowy,:MaxStanMagazynowy,:StanMagazynowyRzeczywisty,:StanMagazynowyDysponowany,:StawkaVat,:KodTowaru,:IdKategoria,:Idjednostkamiary,:Freeze,:Cena)');
   $stmt -> bindValue(':NazwaTowaru',$element_towar['NazwaTowaru'],PDO::PARAM_STR);
   $stmt -> bindValue(':MinStanMagazynowy',$element_towar['MinStanMagazynowy'],PDO::PARAM_INT);
   $stmt -> bindValue(':MaxStanMagazynowy',$element_towar['MaxStanMagazynowy'],PDO::PARAM_INT);
   $stmt -> bindValue(':StanMagazynowyRzeczywisty',$element_towar['StanMagazynowyRzeczywisty'],PDO::PARAM_INT);
   $stmt -> bindValue(':StanMagazynowyDysponowany',$element_towar['StanMagazynowyDysponowany'],PDO::PARAM_INT);
   $stmt -> bindValue(':StawkaVat',$element_towar['StawkaVat'],PDO::PARAM_INT);
   $stmt -> bindValue(':KodTowaru',$element_towar['KodTowaru'],PDO::PARAM_STR);
   $stmt -> bindValue(':IdKategoria',$element_towar['IdKategoria'],PDO::PARAM_INT);
   $stmt -> bindValue(':Idjednostkamiary',$element_towar['Idjednostkamiary'],PDO::PARAM_INT);
   $stmt -> bindValue(':Freeze',$element_towar['Freeze'],PDO::PARAM_INT);
   $stmt -> bindValue(':Cena',$element_towar['Cena'],PDO::PARAM_INT);
   $wynik_zapytania = $stmt -> execute();
 }
 /*************************************************/
 /**********************CENNIK*********************/
 /*************************************************/
 $stmt = $pdo->query("DROP TABLE IF EXISTS `cennik`");
 $stmt->execute();
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `cennik`
 (
   `idCennik` INT AUTO_INCREMENT,
   `idTowar` INT NULL,
   `cena` float NOT NULL,
   `dataOd` DATE NOT NULL,
   `dataDo` DATE NULL,
   `aktualny` VARCHAR(1) DEFAULT 'T',
   `opis` VARCHAR(150) DEFAULT NULL,
   PRIMARY KEY (idCennik)
 )ENGINE = InnoDB;");
 $stmt->execute();
 $cennik = array();

 $cennik[]=array('idTowar'=>1,'cena'=>80,'dataOd'=>'2017-06-01','dataDo'=>'2018-04-20');
 $cennik[]=array('idTowar'=>2,'cena'=>100,'dataOd'=>'2017-06-01','dataDo'=>'2018-04-20');
 $cennik[]=array('idTowar'=>3,'cena'=>50,'dataOd'=>'2017-06-01','dataDo'=>'2018-04-20');
 $cennik[]=array('idTowar'=>4,'cena'=>120,'dataOd'=>'2017-06-01','dataDo'=>'2018-04-03');
 $cennik[]=array('idTowar'=>4,'cena'=>124,'dataOd'=>'2017-06-04','dataDo'=>'2018-04-23');



 foreach($cennik as $element_towar)
 {
   $stmt = $pdo->prepare('INSERT INTO `cennik`(`idTowar`,`cena`,`dataOd`,`dataDo`) VALUES (:idTowar,:cena,:dataOd,:dataDo)');
   $stmt -> bindValue(':idTowar',$element_towar['idTowar'],PDO::PARAM_INT);
   $stmt -> bindValue(':cena',$element_towar['cena'],PDO::PARAM_STR);
   $stmt -> bindValue(':dataOd',$element_towar['dataOd'],PDO::PARAM_STR);
   $stmt -> bindValue(':dataDo',$element_towar['dataDo'],PDO::PARAM_STR);
   $wynik_zapytania = $stmt -> execute();
 }

 $stmt = $pdo->query("ALTER TABLE cennik ADD FOREIGN KEY (idTowar)
 REFERENCES Towar(IdTowar)");
 $stmt->execute();

 $stmt = $pdo->query("ALTER TABLE Towar ADD  FOREIGN KEY (Cena)
 REFERENCES cennik(idCennik)");
 $stmt->execute();
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
   `Idjednostkamiary` INT NOT NULL,
   `Status` INT NOT NULL,
   PRIMARY KEY (IdZamowienie),
   FOREIGN KEY (IdKategoria)
   REFERENCES Kategoria(IdKategoria)
   ON DELETE CASCADE,
   FOREIGN KEY (Idjednostkamiary)
   REFERENCES jednostkamiary(Idjednostkamiary)
   ON DELETE CASCADE
 )ENGINE = InnoDB;");
 $stmt->execute();
 $towary = array();
 $towary[]=array('NazwaTowaru'=>'klawiatura','MinStanMagazynowy'=>1,'MaxStanMagazynowy'=>1,'StawkaVat'=>8,'IdKategoria'=>1,'Idjednostkamiary'=>1,'Status'=>1);
 $towary[]=array('NazwaTowaru'=>'mysz','MinStanMagazynowy'=>1,'MaxStanMagazynowy'=>1,'StawkaVat'=>8,'IdKategoria'=>1,'Idjednostkamiary'=>1,'Status'=>1);
 foreach($towary as $element_towar)
 {
   $stmt = $pdo->prepare('INSERT INTO `Zamowienia`(`NazwaTowaru`,`MinStanMagazynowy`,`MaxStanMagazynowy`,`StawkaVat`,`IdKategoria`,`Idjednostkamiary`,`Status`) VALUES (:NazwaTowaru,:MinStanMagazynowy,:MaxStanMagazynowy,:StawkaVat,:IdKategoria,:Idjednostkamiary,:Status)');
   $stmt -> bindValue(':NazwaTowaru',$element_towar['NazwaTowaru'],PDO::PARAM_STR);
   $stmt -> bindValue(':MinStanMagazynowy',$element_towar['MinStanMagazynowy'],PDO::PARAM_INT);
   $stmt -> bindValue(':MaxStanMagazynowy',$element_towar['MaxStanMagazynowy'],PDO::PARAM_INT);
   $stmt -> bindValue(':StawkaVat',$element_towar['StawkaVat'],PDO::PARAM_INT);
   $stmt -> bindValue(':IdKategoria',$element_towar['IdKategoria'],PDO::PARAM_INT);
   $stmt -> bindValue(':Idjednostkamiary',$element_towar['Idjednostkamiary'],PDO::PARAM_INT);
   $stmt -> bindValue(':Status',$element_towar['Status'],PDO::PARAM_INT);
   $wynik_zapytania = $stmt -> execute();
 }*/
 /*************************************************/
 /*******************DOSTAWCA********************/
 /*************************************************/
  $stmt = $pdo->query("DROP TABLE IF EXISTS `dostawca`");
  $stmt->execute();
  $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `dostawca`
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
 /*******************ZAMÓWIENIA********************/
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
   'IdDostawcy'=>'1',
   'DataWystawienia'=>'2017-03-22',
   'NumerZamowienia'=>'2017/03/22/002',
   'IdSposobDostawy'=>'2',
   'KosztDostawy'=>'50',
   'WartoscTowarow'=>'1500'
 );
 foreach($towary as $element_towar)
 {
   $stmt = $pdo->prepare('INSERT INTO `Zamowienia`(`TerminRealizacji`, `DataRealizacji`, `KosztZamowienia`, `IdDostawcy`, `DataWystawienia`, `NumerZamowienia`, `IdSposobDostawy`, `KosztDostawy`, `WartoscTowarow`) VALUES (:TerminRealizacji,:DataRealizacji,(:KosztDostawy+:WartoscTowarow),:IdDostawcy,:DataWystawienia,:NumerZamowienia,:IdSposobDostawy,:KosztDostawy,:WartoscTowarow)');
   $stmt -> bindValue(':TerminRealizacji',$element_towar['TerminRealizacji'],PDO::PARAM_STR);
   $stmt -> bindValue(':DataRealizacji',$element_towar['DataRealizacji'],PDO::PARAM_STR);
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
    `Telefon` int NOT NULL,
    `NrKonta` varchar(32) NOT NULL,
    `Bank` varchar(30) NOT NULL,
    `EMail` varchar(30) NOT NULL,
    `NazwaFirmy` varchar(100) DEFAULT NULL,
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
  'Telefon'=>'132456789',
  'NrKonta'=>'23 1500 1663 1234 9661 8188 7238',
  'Bank'=>'PKO',
  'EMail'=>'michal123@wp.pl',
  'NazwaFirmy'=>'Drutex');
  $klienci[]=array('Imie'=>'Dawid',
  'Nazwisko'=>'Kowalski',
  'NIP'=>'654789713',
  'Miasto'=>'Ostrów Wlkp',
  'Ulica'=>'Parczewskiego',
  'Dom'=>'31',
  'Lokal'=>'22',
  'KodPocztowy'=>'63-400',
  'Poczta'=>'Ostrów Wlkp',
  'Telefon'=>'636547732',
  'NrKonta'=>'23 1500 4567 1234 9661 8188 7238',
  'Bank'=>'Skok Stefczyka',
  'EMail'=>'DKowal123@wp.pl',
  'NazwaFirmy'=>'Marmoladex');
  $klienci[]=array('Imie'=>'Maciej',
  'Nazwisko'=>'Marciniak',
  'NIP'=>'0122456789',
  'Miasto'=>'Ostrów Wlkp',
  'Ulica'=>'Strzelecka',
  'Dom'=>'5B',
  'Lokal'=>'7',
  'KodPocztowy'=>'63-400',
  'Poczta'=>'Ostrów Wlkp',
  'Telefon'=>'763577335',
  'NrKonta'=>'23 1500 1663 1234 9876 8188 7238',
  'Bank'=>'Milenium',
  'EMail'=>'maciux@wp.pl',
  'NazwaFirmy'=>'Maciux i spółka');
  $klienci[]=array('Imie'=>'Kamil',
  'Nazwisko'=>'Kowalski',
  'NIP'=>'0123875789',
  'Miasto'=>'Kalisz',
  'Ulica'=>'Radosna',
  'Dom'=>'69',
  'Lokal'=>'',
  'KodPocztowy'=>'63-401',
  'Poczta'=>'Kalisz',
  'Telefon'=>'675463347',
  'NrKonta'=>'23 1500 1663 1234 9661 8188 5632',
  'Bank'=>'Amber Gold',
  'EMail'=>'dojlido123@wp.pl',
  'NazwaFirmy'=>'Kamilonex');
  foreach($klienci as $klient)
  {
    $stmt = $pdo->prepare('INSERT INTO `Klient`(`Imie`,`Nazwisko`,`NIP`,`Miasto`,`Ulica`,`Dom`,`Lokal`,`KodPocztowy`,`Poczta`,`EMail`,`NazwaFirmy`,`Telefon`,`NrKonta`,`Bank`) VALUES (:Imie,:Nazwisko,:NIP,:Miasto,:Ulica,:Dom,:Lokal,:KodPocztowy,:Poczta,:EMail,:Firma,:Telefon,:NrKonta,:Bank)');
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
    $stmt -> bindValue(':Firma',$klient['NazwaFirmy'],PDO::PARAM_STR);
    $stmt -> bindValue(':Telefon',$klient['Telefon'],PDO::PARAM_INT);
    $stmt -> bindValue(':NrKonta',$klient['NrKonta'],PDO::PARAM_STR);
    $stmt -> bindValue(':Bank',$klient['Bank'],PDO::PARAM_STR);
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
   `cena` float NOT NULL,
   PRIMARY KEY (id),
   FOREIGN KEY (IdTowar)
   REFERENCES Towar(IdTowar)
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
   `DataZamowienia` DATETIME NOT NULL,
   `Wartosc` float NOT NULL,
   `IdStanZamowienia` INT NOT NULL,
   `IdKlient` INT NOT NULL,
   `IdSposobDostawy` INT NOT NULL,
   `IdSposobZaplaty` INT NOT NULL,
   `DataWystawienia` date  NULL,
   `DataSprzedazy` date  NULL,
   `TerminZaplaty` date  NULL,
   `NrFaktury` varchar(20)  NULL,
   PRIMARY KEY (IdZamowienieSprzedaz),
   FOREIGN KEY (IdStanZamowienia)
   REFERENCES statuszamowienia(IdStanZamowienia),
   FOREIGN KEY (IdSposobDostawy)
   REFERENCES sposobdostawy(IdSposobDostawy),
   FOREIGN KEY (IdKlient)
   REFERENCES Klient(IdKlient),
   FOREIGN KEY (IdSposobZaplaty)
   REFERENCES sposobzaplaty(IdSposobZaplaty)
    )ENGINE = InnoDB;");
 $stmt->execute();

/*
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
 */
 /*************************************************/
 /*******************TOWARY_SPRZEDAZ********************/
 /*************************************************/
$stmt = $pdo->query("DROP TABLE IF EXISTS `towarySprzedaz`");
$stmt->execute();
$stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `towarySprzedaz`
(
 `id` INT AUTO_INCREMENT,
 `IdTowar` INT NOT NULL,
 `ilosc` INT NOT NULL,
 `klient` INT NOT NULL,
 `cena` float NOT NULL,
 `vat` float NOT NULL,
 `IdZamowienieSprzedaz` INT NOT NULL,
 PRIMARY KEY (id),
 FOREIGN KEY (IdTowar)
 REFERENCES Towar(IdTowar),
 FOREIGN KEY (klient)
 REFERENCES Klient(IdKlient),
 FOREIGN KEY (IdZamowienieSprzedaz)
 REFERENCES zamowieniesprzedaz(IdZamowienieSprzedaz)
)ENGINE = InnoDB;");
/*
$kategorie = array();
$kategorie[]=array(
'IdTowar'=>'2',
'ilosc'=>'2',
'klient'=>'1',
'cena'=>'400',
'IdZamowienieSprzedaz'=>'1'
);
$kategorie[]=array(
  'IdTowar'=>'1',
  'ilosc'=>'1',
  'klient'=>'1',
  'cena'=>'500',
  'IdZamowienieSprzedaz'=>'1'
);
$kategorie[]=array(
  'IdTowar'=>'1',
  'ilosc'=>'1',
  'klient'=>'1',
  'cena'=>'500',
  'IdZamowienieSprzedaz'=>'2'
);
foreach($kategorie as $element_kategoria)
{
  $stmt = $pdo->prepare('INSERT INTO `towarySprzedaz`(`IdTowar`,`ilosc`,`klient`,`IdZamowienieSprzedaz`,`cena`) VALUES (:IdTowar,:ilosc,:klient,:IdZamowienieSprzedaz,:cena)');
  $stmt -> bindValue(':IdTowar',$element_kategoria['IdTowar'],PDO::PARAM_INT);
  $stmt -> bindValue(':ilosc',$element_kategoria['ilosc'],PDO::PARAM_INT);
  $stmt -> bindValue(':klient',$element_kategoria['klient'],PDO::PARAM_INT);
  $stmt -> bindValue(':IdZamowienieSprzedaz',$element_kategoria['IdZamowienieSprzedaz'],PDO::PARAM_INT);
  $stmt -> bindValue(':cena',$element_kategoria['cena'],PDO::PARAM_STR);
  $wynik_zapytania = $stmt -> execute();
}
*/
 /*************************************************/
 /*******************CENA_HISTORIA*******************/
 /*************************************************/
 /*
 $stmt = $pdo->query("DROP TABLE IF EXISTS `cenahistoria`");
 $stmt->execute();
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `cenahistoria`
 (
   `IdCenaHistoria` INT AUTO_INCREMENT,
   `DataWprowadzenia` date NOT NULL,
   `Cena` float NOT NULL,
   `IdTowar` int NOT NULL,
   PRIMARY KEY (IdCenaHistoria),
   FOREIGN KEY (IdTowar)
   REFERENCES Towar(IdTowar)
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
*/
 echo ("Baza została zainstalowana.");
 return true;
}
catch (PDOException $e)
{
 echo ('Wystąpił błąd biblioteki PDO: ' .$e->getMessage());
 return false;
}
?>
