<?php
	namespace Models;
	use \PDO;
	class Statystyka extends Model {
		//model zwraca tablicę wszystkich kategorii
		public function getAll($kryterium, $sortowanie, $dataOd, $dataDo){

            $data = array();
            if(!$this->pdo)
                $data['error'] = 'Połączenie z bazą nie powidoło się!';
            else
                try
                {
                    $statystyki = array();
//ilość towaru
if($kryterium==="towarIlosc" && $sortowanie==="ASC")
{
                    $stmt = $this->pdo->prepare('SELECT towar.NazwaTowaru AS nazwa, CONCAT(COUNT(*)*ilosc," ",NazwaSkrocona,".") AS wartosc
FROM towar
INNER JOIN towarysprzedaz
ON towarysprzedaz.idTowar=towar.IdTowar
	INNER JOIN zamowieniesprzedaz
    ON towarysprzedaz.IdZamowienieSprzedaz=zamowieniesprzedaz.IdZamowienieSprzedaz
    INNER JOIN jednostkamiary
    ON jednostkamiary.IdJednostkaMiary=towar.IdJednostkaMiary
 WHERE DataZamowienia BETWEEN :dataOd AND :dataDo
 GROUP BY NazwaTowaru
ORDER BY `wartosc` asc');
}
if($kryterium==="towarIlosc" && $sortowanie==="DESC")
{
$stmt = $this->pdo->prepare('SELECT towar.NazwaTowaru AS nazwa, CONCAT(COUNT(*)*ilosc," ",NazwaSkrocona,".") AS wartosc
FROM towar
INNER JOIN towarysprzedaz
ON towarysprzedaz.idTowar=towar.IdTowar
	INNER JOIN zamowieniesprzedaz
    ON towarysprzedaz.IdZamowienieSprzedaz=zamowieniesprzedaz.IdZamowienieSprzedaz
    INNER JOIN jednostkamiary
    ON jednostkamiary.IdJednostkaMiary=towar.IdJednostkaMiary
WHERE DataZamowienia BETWEEN :dataOd AND :dataDo
GROUP BY NazwaTowaru
ORDER BY `wartosc` desc');
}
//pieniądze z towaru
if($kryterium==="towarKasa" && $sortowanie==="ASC")
{
                    $stmt = $this->pdo->prepare('SELECT towar.NazwaTowaru AS nazwa, CONCAT(SUM(towarysprzedaz.cena)*ilosc," zł.") AS wartosc
FROM towar
INNER JOIN towarysprzedaz
ON towarysprzedaz.idTowar=towar.IdTowar
	INNER JOIN zamowieniesprzedaz
    ON towarysprzedaz.IdZamowienieSprzedaz=zamowieniesprzedaz.IdZamowienieSprzedaz
 WHERE DataZamowienia BETWEEN :dataOd AND :dataDo
 GROUP BY NazwaTowaru
ORDER BY `wartosc` asc');
}
if($kryterium==="towarKasa" && $sortowanie==="DESC")
{
$stmt = $this->pdo->prepare('SELECT towar.NazwaTowaru AS nazwa, CONCAT(SUM(towarysprzedaz.cena)*ilosc," zł.") AS wartosc
FROM towar
INNER JOIN towarysprzedaz
ON towarysprzedaz.idTowar=towar.IdTowar
	INNER JOIN zamowieniesprzedaz
    ON towarysprzedaz.IdZamowienieSprzedaz=zamowieniesprzedaz.IdZamowienieSprzedaz
WHERE DataZamowienia BETWEEN :dataOd AND :dataDo
GROUP BY NazwaTowaru
ORDER BY `wartosc` desc');
}
//pieniądze od klientów
if($kryterium==="klientKasa" && $sortowanie==="ASC")
{
$stmt = $this->pdo->prepare('SELECT CONCAT(Imie," ",Nazwisko," (",NIP,")") AS nazwa, CONCAT(SUM(wartosc)*ilosc," zł.") AS wartosc
FROM zamowieniesprzedaz
INNER JOIN Klient
ON zamowieniesprzedaz.IdKlient=Klient.IdKlient
ORDER BY `wartosc` asc');
}
if($kryterium==="klientKasa" && $sortowanie==="DESC")
{
$stmt = $this->pdo->prepare('SELECT CONCAT(Imie," ",Nazwisko," (",NIP,")") AS nazwa, CONCAT(SUM(wartosc)*ilosc," zł.") AS wartosc
FROM zamowieniesprzedaz
INNER JOIN Klient
ON zamowieniesprzedaz.IdKlient=Klient.IdKlient
ORDER BY `wartosc` desc');
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
