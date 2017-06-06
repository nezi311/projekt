<?php
	namespace Models;
	use \PDO;
	class SzukajTowar extends Model {
		public function search($towar='' ,$cenaMin='' ,$cenaMax='' ,$sprzedawane='' ,$niesprzedawane='')
		{
			$data = array();
			if(!$this->pdo)
					$data['error'] = 'Połączenie z bazą nie powidoło się!';
			else
					try
					{
						$zapytanie="SELECT * FROM `Towar` WHERE (NazwaTowaru LIKE :nazwa)";
						d($cenaMin);
						if ($cenaMin!='')
						{
							$zapytanie=$zapytanie." AND (Cena>=:cenaMin)";
						}
						if ($cenaMax!='')
						{
							$zapytanie=$zapytanie." AND (Cena<=:cenaMax)";
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
							if ($cenaMin!='')
							{
								$stmt->bindValue(':cenaMin',$cenaMin, PDO::PARAM_INT);
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
