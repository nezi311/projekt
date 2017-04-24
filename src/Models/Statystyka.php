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
if($kryterium==="towarIlosc" && $sortowanie==="ASC")
{
                    $stmt = $this->pdo->prepare('SELECT NazwaTowaru AS nazwa, COUNT(*)*ilosc AS wartosc
FROM towar
INNER JOIN towarysprzedaz
ON towarysprzedaz.idTowar=towar.IdTowar
	INNER JOIN zamowieniesprzedaz
    ON towarysprzedaz.IdZamowienieSprzedaz=zamowieniesprzedaz.IdZamowienieSprzedaz
 WHERE DataZamowienia BETWEEN :dataOd AND :dataDo
 GROUP BY NazwaTowaru
ORDER BY `wartosc` asc');
}

if($kryterium==="towarIlosc" && $sortowanie==="DESC")
{
$stmt = $this->pdo->prepare('SELECT NazwaTowaru AS nazwa, COUNT(*)*ilosc AS wartosc
FROM towar
INNER JOIN towarysprzedaz
ON towarysprzedaz.idTowar=towar.IdTowar
INNER JOIN zamowieniesprzedaz
ON towarysprzedaz.IdZamowienieSprzedaz=zamowieniesprzedaz.IdZamowienieSprzedaz
WHERE DataZamowienia BETWEEN :dataOd AND :dataDo
GROUP BY NazwaTowaru
ORDER BY `wartosc` desc');
}
$stmt->bindValue(':dataOd', $dataOd, PDO::PARAM_STR);
$stmt->bindValue(':dataDo', $dataDo, PDO::PARAM_STR);
$result = $stmt->execute();
                    $statystyki = $stmt->fetchAll();
                    $stmt->closeCursor();
                    if($statystyki && !empty($statystyki))
                        $data['statystyki'] = $statystyki;
                    else
                        $data['error'] = "brak wyników";
                }
                catch(\PDOException $e)
                {
                    $data['error'] = 'Błąd odczytu danych z bazy!'. $e->getMessage();
                }

            return $data;
		}
	}
?>
