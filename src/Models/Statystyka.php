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

                    $stmt = $this->pdo->query("SELECT NazwaTowaru, COUNT(*)*ilosc AS wartosc
										FROM towar
										INNER JOIN towarysprzedaz
										ON towarysprzedaz.idTowar=towar.IdTowar
											INNER JOIN zamowieniesprzedaz
										    ON towarysprzedaz.IdZamowienieSprzedaz=zamowieniesprzedaz.IdZamowienieSprzedaz
										 WHERE DataZamowienia BETWEEN '2016-01-01' AND '2017-04-23'
										 GROUP BY NazwaTowaru
										ORDER BY `wartosc` ASC");

//ilość towaru
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
                    $stmt = $this->pdo->prepare('SELECT Towar.NazwaTowaru AS nazwa, Kategoria.NazwaKategorii AS Kategoria, CONCAT(SUM(towarySprzedaz.cena)*ilosc," zł.") AS wartosc
FROM Towar
INNER JOIN towarySprzedaz
ON towarySprzedaz.idTowar=Towar.IdTowar
	INNER JOIN zamowieniesprzedaz

    ON towarySprzedaz.IdZamowienieSprzedaz=zamowieniesprzedaz.IdZamowienieSprzedaz

    ON towarysprzedaz.IdZamowienieSprzedaz=zamowieniesprzedaz.IdZamowienieSprzedaz
    INNER JOIN kategoria
    ON towar.IdKategoria=kategoria.IdKategoria
 WHERE (DataZamowienia BETWEEN :dataOd AND :dataDo) AND (NazwaTowaru like :fraza)

    INNER JOIN Kategoria
    ON Towar.IdKategoria=Kategoria.IdKategoria
 WHERE DataZamowienia BETWEEN :dataOd AND :dataDo
 GROUP BY towarySprzedaz.cena

 GROUP BY Towarysprzedaz.cena
ORDER BY `wartosc` asc');
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
                    $stmt = $this->pdo->prepare('SELECT Towar.NazwaTowaru AS nazwa, kategoria.NazwaKategorii AS kategoria, CONCAT(SUM(towarysprzedaz.cena)*ilosc," zł.") AS wartosc
FROM Towar
INNER JOIN towarySprzedaz
ON towarySprzedaz.idTowar=Towar.IdTowar
	INNER JOIN zamowieniesprzedaz
    ON towarysprzedaz.IdZamowienieSprzedaz=zamowieniesprzedaz.IdZamowienieSprzedaz
    INNER JOIN kategoria
    ON towar.IdKategoria=kategoria.IdKategoria
 WHERE (DataZamowienia BETWEEN :dataOd AND :dataDo) AND (NazwaTowaru like :fraza) AND (Towar.IdKategoria=:kategoria)
 GROUP BY Towarysprzedaz.cena
>>>>>>> cdf45e430fb959ad5bfdf99ba34518a7d0e7dfd8
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
