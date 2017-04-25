<?php
	namespace Models;
	use \PDO;
	class Statystyka extends Model {
		//model zwraca tablicę wszystkich kategorii
		public function getAll($kryterium, $fraza, $dataOd, $dataDo){

            $data = array();
            if(!$this->pdo)
                $data['error'] = 'Połączenie z bazą nie powidoło się!';
            else
                try
                {
                    $statystyki = array();
//ilość towaru
if($kryterium==="towarIlosc")
{
                    $stmt = $this->pdo->prepare('SELECT Towar.NazwaTowaru AS nazwa, Kategoria.NazwaKategorii AS Kategoria,  CONCAT(COUNT(*)*ilosc," ",NazwaSkrocona,".") AS wartosc
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
$stmt->bindValue(':fraza', '%'.$fraza.'%', PDO::PARAM_STR);
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
    INNER JOIN Kategoria
    ON Towar.IdKategoria=Kategoria.IdKategoria
 WHERE DataZamowienia BETWEEN :dataOd AND :dataDo
 GROUP BY towarySprzedaz.cena
ORDER BY `wartosc` asc');
}
//pieniądze od klientów
if($kryterium==="klientKasa")
{
$stmt = $this->pdo->prepare('SELECT CONCAT(Imie," ",Nazwisko," (",NIP,")") AS nazwa, CONCAT(SUM(wartosc)," zł.") AS wartosc
FROM zamowieniesprzedaz
INNER JOIN Klient
ON zamowieniesprzedaz.IdKlient=Klient.IdKlient
WHERE DataZamowienia BETWEEN :dataOd AND :dataDo
ORDER BY `wartosc` asc');
}

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
