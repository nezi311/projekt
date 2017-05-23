<?php
	namespace Models;
	use \PDO;
	class Statystyka extends Model {
		//model zwraca tablicę wszystkich kategorii
		public function getAll($kryterium, $sortowanie, $dataOd, $dataDo){
			if($kryterium==="towarIlosc")
			{
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
                    $statystyki = $stmt->fetchAll();
                    $stmt->closeCursor();
                    if($statystyki && !empty($statystyki))
                        $data['statystyki'] = $statystyki;
                    else
                        $data['statystyki'] = array();
                }
                catch(\PDOException $e)
                {
                    $data['error'] = 'Błąd odczytu danych z bazy!'. $e->getMessage();
                }
							}
            return $data;
		}
	}
?>
