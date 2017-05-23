


<?php
	namespace Models;
	use \PDO;
	class Statystyka extends Model {
		//model zwraca tablicę wszystkich kategorii
		public function getAll($kryterium, $fraza, $dataOd, $dataDo, $kategoria){

            $data = array();
            if(!$this->pdo)
                $data['error'] = 'Połączenie z bazą nie powidoło się!';
            else
                try
                {
                    $statystyki = array();
//ilość towaru
if($kryterium==="kategoriaKasa")
{
                    $stmt = $this->pdo->prepare('SELECT kategoria, CONCAT(SUM(wartosc)," zł.") AS wartosc
FROM (
SELECT Towar.NazwaTowaru, Kategoria.NazwaKategorii AS kategoria, SUM(towarysprzedaz.cena)*ilosc AS wartosc
FROM Towar
INNER JOIN TowarySprzedaz
ON TowarySprzedaz.idTowar=Towar.IdTowar
	INNER JOIN zamowieniesprzedaz
    ON Towarysprzedaz.IdZamowienieSprzedaz=Zamowieniesprzedaz.IdZamowienieSprzedaz
    INNER JOIN Kategoria
    ON Towar.IdKategoria=Kategoria.IdKategoria
		WHERE (DataZamowienia BETWEEN :dataOd AND :dataDo) AND (NazwaTowaru like :fraza)
 GROUP BY Towarysprzedaz.cena
ORDER BY `wartosc`  ASC
) AS sprzedane');
}

if($kryterium==="towarNiesprzedany")
{
                    $stmt = $this->pdo->prepare('SELECT NazwaTowaru as nazwa, StanMagazynowyDysponowany as wartosc, NazwaKategorii as kategoria
FROM Towar
INNER JOIN Kategoria
ON Kategoria.IdKategoria=Towar.IdKategoria
WHERE NazwaTowaru NOT IN(SELECT Towar.NazwaTowaru AS NazwaTowaru
FROM Towar
INNER JOIN towarySprzedaz
ON towarySprzedaz.idTowar=Towar.IdTowar
	INNER JOIN zamowieniesprzedaz
    ON towarySprzedaz.IdZamowienieSprzedaz=zamowieniesprzedaz.IdZamowienieSprzedaz
 WHERE (DataZamowienia BETWEEN :dataOd AND :dataDo) AND (NazwaTowaru like :fraza)
 GROUP BY NazwaTowaru)');
}
if($kryterium==="towarIlosc")
{
                    $stmt = $this->pdo->prepare('SELECT Towar.NazwaTowaru AS nazwa, Kategoria.NazwaKategorii AS kategoria,  CONCAT(COUNT(*)*ilosc," ",NazwaSkrocona,".") AS wartosc
FROM Towar
INNER JOIN towarySprzedaz
ON towarySprzedaz.idTowar=Towar.IdTowar
	INNER JOIN zamowieniesprzedaz
    ON towarySprzedaz.IdZamowienieSprzedaz=zamowieniesprzedaz.IdZamowienieSprzedaz
    INNER JOIN Jednostkamiary
    ON Jednostkamiary.IdJednostkaMiary=Towar.IdJednostkaMiary
    INNER JOIN Kategoria
    ON Towar.IdKategoria=Kategoria.IdKategoria
 WHERE (DataZamowienia BETWEEN :dataOd AND :dataDo) AND (NazwaTowaru like :fraza)
 GROUP BY NazwaTowaru
ORDER BY `wartosc` asc');
}
//pieniądze z towaru
if($kryterium==="towarKasa")
{
                    $stmt = $this->pdo->prepare('SELECT Towar.NazwaTowaru AS nazwa, Kategoria.NazwaKategorii AS kategoria, CONCAT(SUM(towarysprzedaz.cena)*ilosc," zł.") AS wartosc
FROM Towar
INNER JOIN towarySprzedaz
ON towarySprzedaz.idTowar=Towar.IdTowar
	INNER JOIN zamowieniesprzedaz
    ON towarysprzedaz.IdZamowienieSprzedaz=zamowieniesprzedaz.IdZamowienieSprzedaz
    INNER JOIN Kategoria
    ON towar.IdKategoria=Kategoria.IdKategoria
 WHERE (DataZamowienia BETWEEN :dataOd AND :dataDo) AND (NazwaTowaru like :fraza)
 GROUP BY Towarysprzedaz.cena
ORDER BY `wartosc` asc');
}

if($kryterium==="towarNiesprzedany" && $kategoria!=0)
{
                    $stmt = $this->pdo->prepare('SELECT NazwaTowaru as nazwa, StanMagazynowyDysponowany as wartosc, NazwaKategorii as kategoria
FROM Towar
INNER JOIN Kategoria
ON Kategoria.IdKategoria=Towar.IdKategoria
WHERE NazwaTowaru NOT IN(SELECT Towar.NazwaTowaru AS NazwaTowaru
FROM Towar
INNER JOIN towarySprzedaz
ON towarySprzedaz.idTowar=Towar.IdTowar
	INNER JOIN zamowieniesprzedaz
    ON towarySprzedaz.IdZamowienieSprzedaz=zamowieniesprzedaz.IdZamowienieSprzedaz
 WHERE (DataZamowienia BETWEEN :dataOd AND :dataDo) AND (NazwaTowaru like :fraza)
 GROUP BY NazwaTowaru) AND (Towar.IdKategoria=:kategoria)');
 $stmt->bindValue(':kategoria', $kategoria, PDO::PARAM_INT);
}

if($kryterium==="towarIlosc" && $kategoria!=0)
{
                    $stmt = $this->pdo->prepare('SELECT Towar.NazwaTowaru AS nazwa, Kategoria.NazwaKategorii AS kategoria,  CONCAT(COUNT(*)*ilosc," ",NazwaSkrocona,".") AS wartosc
FROM Towar
INNER JOIN towarySprzedaz
ON towarySprzedaz.idTowar=Towar.IdTowar
	INNER JOIN zamowieniesprzedaz
    ON towarySprzedaz.IdZamowienieSprzedaz=zamowieniesprzedaz.IdZamowienieSprzedaz
    INNER JOIN Jednostkamiary
    ON Jednostkamiary.IdJednostkaMiary=Towar.IdJednostkaMiary
    INNER JOIN Kategoria
    ON Towar.IdKategoria=Kategoria.IdKategoria
 WHERE (DataZamowienia BETWEEN :dataOd AND :dataDo) AND (NazwaTowaru like :fraza) AND (Towar.IdKategoria=:kategoria)
 GROUP BY NazwaTowaru
ORDER BY `wartosc` asc');
$stmt->bindValue(':kategoria', $kategoria, PDO::PARAM_INT);
}
//pieniądze z towaru
if($kryterium==="towarKasa" && $kategoria!=0)
{
                    $stmt = $this->pdo->prepare('SELECT Towar.NazwaTowaru AS nazwa, Kategoria.NazwaKategorii AS Kategoria, CONCAT(SUM(towarysprzedaz.cena)*ilosc," zł.") AS wartosc
FROM Towar
INNER JOIN towarySprzedaz
ON towarySprzedaz.idTowar=Towar.IdTowar
	INNER JOIN zamowieniesprzedaz
    ON towarysprzedaz.IdZamowienieSprzedaz=zamowieniesprzedaz.IdZamowienieSprzedaz
    INNER JOIN Kategoria
    ON towar.IdKategoria=Kategoria.IdKategoria
 WHERE (DataZamowienia BETWEEN :dataOd AND :dataDo) AND (NazwaTowaru like :fraza) AND (Towar.IdKategoria=:kategoria)
 GROUP BY Towarysprzedaz.cena
ORDER BY `wartosc` asc');
$stmt->bindValue(':kategoria', $kategoria, PDO::PARAM_INT);
}
//pieniądze od klientów
if($kryterium==="klientKasa")
{
$stmt = $this->pdo->prepare('SELECT CONCAT(Imie," ",Nazwisko," (",NIP,")") AS nazwa, CONCAT(SUM(wartosc)," zł.") AS wartosc, CONCAT(KodPocztowy," ",Poczta) AS adres
FROM zamowieniesprzedaz
INNER JOIN Klient
ON zamowieniesprzedaz.IdKlient=Klient.IdKlient
WHERE (DataZamowienia BETWEEN :dataOd AND :dataDo) AND (CONCAT(Imie," ",Nazwisko," (",NIP,")") LIKE :fraza)
ORDER BY `wartosc` asc');
}
$stmt->bindValue(':fraza', '%'.$fraza.'%', PDO::PARAM_STR);
$stmt->bindValue(':dataOd', $dataOd, PDO::PARAM_STR);
$stmt->bindValue(':dataDo', $dataDo, PDO::PARAM_STR);
$result = $stmt->execute();
                    $statystyki = $stmt->fetchAll();
                    $stmt->closeCursor();
                    if($statystyki && !empty($statystyki))
                        $data['statystyki'] = $statystyki;
                }
                catch(\PDOException $e)
                {
                    $data['error'] = 'Błąd odczytu danych z bazy!'. $e->getMessage();
                }

            return $data;
		}
	}
?>
