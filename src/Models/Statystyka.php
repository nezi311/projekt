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
	SELECT towar.NazwaTowaru, kategoria.NazwaKategorii AS kategoria, SUM(ilosc)*towarysprzedaz.cena AS wartosc
FROM towar
INNER JOIN TowarySprzedaz
ON TowarySprzedaz.idTowar=towar.IdTowar
	INNER JOIN zamowieniesprzedaz
    ON Towarysprzedaz.IdZamowienieSprzedaz=Zamowieniesprzedaz.IdZamowienieSprzedaz
    INNER JOIN kategoria.
    ON towar.IdKategoria=kategoria.IdKategoria
 GROUP BY Towarysprzedaz.cena
ORDER BY `wartosc`  ASC) AS sprzedane');
}

if($kryterium==="towarNiesprzedany")
{
                    $stmt = $this->pdo->prepare('SELECT NazwaTowaru as nazwa, StanMagazynowyDysponowany as wartosc, NazwaKategorii as kategoria
FROM towar
INNER JOIN kategoria.
ON kategoria.IdKategoria=towar.IdKategoria
WHERE NazwaTowaru NOT IN(SELECT towar.NazwaTowaru AS NazwaTowaru
FROM towar
INNER JOIN towarysprzedaz
ON towarysprzedaz.idTowar=towar.IdTowar
	INNER JOIN zamowieniesprzedaz
    ON towarysprzedaz.IdZamowienieSprzedaz=zamowieniesprzedaz.IdZamowienieSprzedaz
 WHERE (DataZamowienia BETWEEN :dataOd AND :dataDo) AND (NazwaTowaru like :fraza)
 GROUP BY NazwaTowaru)');
}
if($kryterium==="towarIlosc")
{
                    $stmt = $this->pdo->prepare('SELECT towar.NazwaTowaru AS nazwa, kategoria.NazwaKategorii AS kategoria,  CONCAT(SUM(ilosc)," ",NazwaSkrocona,".") AS wartosc
FROM towar
INNER JOIN towarysprzedaz
ON towarysprzedaz.idTowar=towar.IdTowar
	INNER JOIN zamowieniesprzedaz
    ON towarysprzedaz.IdZamowienieSprzedaz=zamowieniesprzedaz.IdZamowienieSprzedaz
    INNER JOIN jednostkamiary
    ON jednostkamiary.IdJednostkaMiary=towar.IdJednostkaMiary
    INNER JOIN kategoria.
    ON towar.IdKategoria=kategoria.IdKategoria
 WHERE (DataZamowienia BETWEEN :dataOd AND :dataDo) AND (NazwaTowaru like :fraza)
 GROUP BY NazwaTowaru
ORDER BY `wartosc` asc');
}
//pieniądze z towaru
if($kryterium==="towarKasa")
{
                    $stmt = $this->pdo->prepare('SELECT towar.NazwaTowaru AS nazwa, kategoria.NazwaKategorii AS kategoria, CONCAT(towarysprzedaz.cena*sum(ilosc)," zł.") AS wartosc
FROM towar
INNER JOIN towarysprzedaz
ON towarysprzedaz.idTowar=towar.IdTowar
	INNER JOIN zamowieniesprzedaz
    ON towarysprzedaz.IdZamowienieSprzedaz=zamowieniesprzedaz.IdZamowienieSprzedaz
    INNER JOIN kategoria.
    ON towar.IdKategoria=kategoria.IdKategoria
 WHERE (DataZamowienia BETWEEN :dataOd AND :dataDo) AND (NazwaTowaru like :fraza)
 GROUP BY TowarySprzedaz.cena
ORDER BY `wartosc` asc');
}

if($kryterium==="towarNiesprzedany" && $kategoria!=0)
{
                    $stmt = $this->pdo->prepare('SELECT NazwaTowaru as nazwa, StanMagazynowyDysponowany as wartosc, NazwaKategorii as kategoria
FROM towar
INNER JOIN kategoria.
ON kategoria.IdKategoria=towar.IdKategoria
WHERE NazwaTowaru NOT IN(SELECT towar.NazwaTowaru AS NazwaTowaru
FROM towar
INNER JOIN towarysprzedaz
ON towarysprzedaz.idTowar=towar.IdTowar
	INNER JOIN zamowieniesprzedaz
    ON towarysprzedaz.IdZamowienieSprzedaz=zamowieniesprzedaz.IdZamowienieSprzedaz
 WHERE (DataZamowienia BETWEEN :dataOd AND :dataDo) AND (NazwaTowaru like :fraza) AND (towar.IdKategoria=:kategoria)
 GROUP BY NazwaTowaru) ');
 $stmt->bindValue(':kategoria', $kategoria, PDO::PARAM_INT);
}

if($kryterium==="towarIlosc" && $kategoria!=0)
{
                    $stmt = $this->pdo->prepare('SELECT towar.NazwaTowaru AS nazwa, kategoria.NazwaKategorii AS kategoria,  CONCAT(SUM(ilosc)," ",NazwaSkrocona,".") AS wartosc
FROM towar
INNER JOIN towarysprzedaz
ON towarysprzedaz.idTowar=towar.IdTowar
	INNER JOIN zamowieniesprzedaz
    ON towarysprzedaz.IdZamowienieSprzedaz=zamowieniesprzedaz.IdZamowienieSprzedaz
    INNER JOIN jednostkamiary
    ON jednostkamiary.IdJednostkaMiary=towar.IdJednostkaMiary
    INNER JOIN kategoria.
    ON towar.IdKategoria=kategoria.IdKategoria
 WHERE (DataZamowienia BETWEEN :dataOd AND :dataDo) AND (NazwaTowaru like :fraza) AND (towar.IdKategoria=:kategoria)
 GROUP BY NazwaTowaru
ORDER BY `wartosc` asc');
$stmt->bindValue(':kategoria', $kategoria, PDO::PARAM_INT);
}
//pieniądze z towaru
if($kryterium==="towarKasa" && $kategoria!=0)
{
                    $stmt = $this->pdo->prepare('SELECT towar.NazwaTowaru AS nazwa, kategoria.NazwaKategorii AS kategoria, CONCAT((towarysprzedaz.cena)*sum(ilosc)," zł.") AS wartosc
FROM towar
INNER JOIN towarysprzedaz
ON towarysprzedaz.idTowar=towar.IdTowar
	INNER JOIN zamowieniesprzedaz
    ON towarysprzedaz.IdZamowienieSprzedaz=zamowieniesprzedaz.IdZamowienieSprzedaz
    INNER JOIN kategoria.
    ON towar.IdKategoria=kategoria.IdKategoria
 WHERE (DataZamowienia BETWEEN :dataOd AND :dataDo) AND (NazwaTowaru like :fraza) AND (towar.IdKategoria=:kategoria)
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
GROUP BY .Zamowieniesprzedaz.IdKlient
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
