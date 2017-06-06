<?php
	namespace Models;
	use \PDO;
	class SzukajTowar extends Model {
		public function search($towar='' ,$cenaMin='' ,$cenaMax='',$kodTowaru='' ,$sprzedawane='' ,$niesprzedawane='')
		{
			$data = array();
			if(!$this->pdo)
					$data['error'] = 'Połączenie z bazą nie powidoło się!';
			else
					try
					{
						$zapytanie="SELECT *,(SELECT cena FROM cennik WHERE cennik.idTowar=Towar.idTowar AND (Current_Date() BETWEEN IFNULL(cennik.dataOd,'1900-01-01') AND IFNULL(cennik.dataDo, Current_Date() )) ) AS CENA2 FROM Towar WHERE (NazwaTowaru LIKE :nazwa)";
						d($cenaMin);
						if ($cenaMin!='')
						{
							$zapytanie=$zapytanie." AND ((SELECT cena FROM cennik WHERE cennik.idTowar=Towar.idTowar AND (Current_Date() BETWEEN IFNULL(cennik.dataOd,'1900-01-01') AND IFNULL(cennik.dataDo, Current_Date() )) )>=:cenaMin)";
						}
						if ($cenaMax!='')
						{
							$zapytanie=$zapytanie." AND ((SELECT cena FROM cennik WHERE cennik.idTowar=Towar.idTowar AND (Current_Date() BETWEEN IFNULL(cennik.dataOd,'1900-01-01') AND IFNULL(cennik.dataDo, Current_Date() )) )<=:cenaMax)";
						}
						if ($kodTowaru!='')
						{
							$zapytanie=$zapytanie." AND (kodTowaru LIKE :kodTowaru)";
						}
						if($sprzedawane!='tru' || $niesprzedawane!='tru')
						{
							if ($sprzedawane==='tru')
							{
								$zapytanie=$zapytanie." AND (Freeze=0)";
							}
							if ($niesprzedawane==='tru')
							{
								$zapytanie=$zapytanie." AND (Freeze=1)";
							}
						}
						d($zapytanie);

							$stmt = $this->pdo->prepare($zapytanie);
							$stmt->bindValue(':nazwa', '%'.$towar.'%', PDO::PARAM_STR);
							if ($cenaMin!='')
							{
								$stmt->bindValue(':cenaMin',$cenaMin, PDO::PARAM_INT);
							}
							if ($cenaMax!='')
							{
								$stmt->bindValue(':cenaMax',$cenaMax, PDO::PARAM_INT);
							}
							if ($kodTowaru!='')
							{
								$stmt->bindValue(':kodTowaru', '%'.$kodTowaru.'%', PDO::PARAM_INT);
							}
							$stmt->execute();
							$towary = $stmt->fetchAll();
							$stmt->closeCursor();
							if($towary && !empty($towary))
									$data['towary'] = $towary;
							else
									$data['error'] = 'Nie znaleziono towarów z daną frazą';
					}
					catch(\PDOException $e)
					{
							$data['error'] = 'Błąd odczytu danych z bazy! ';
					}
			return $data;
		}
  }
?>
