<?php
	namespace Models;
	use \PDO;
	class Towar extends Model
	{

    public function getAll()
    {
      $data = array();
      if(!$this->pdo)
          $data['error'] = 'Połączenie z bazą nie powidoło się!';
      else
          try
          {
              $stmt = $this->pdo->query("SELECT * FROM Towar");
              $towary = $stmt->fetchAll();
              $stmt->closeCursor();
              if($towary && !empty($towary))
                  $data['towary'] = $towary;
              else
                  $data['towary'] = array();
          }
          catch(\PDOException $e)
          {
              $data['error'] = 'Błąd odczytu danych z bazy! ';
          }
      return $data;
    }


		public function search($towar)
		{
			$data = array();
			if(!$this->pdo)
					$data['error'] = 'Połączenie z bazą nie powidoło się!';
			else
					try
					{
							$stmt = $this->pdo->prepare("SELECT * FROM `Towar` WHERE NazwaTowaru LIKE :nazwa");
							$stmt->bindValue(':nazwa', '%'.$towar.'%', PDO::PARAM_STR);
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

			public function insert($NazwaTowaru,$MinStanMagazynowy,$MaxStanMagazynowy,$StawkaVat,$KodTowaru,$IdKategoria,$IdJednostkaMiary)
		{
			$blad=false;
			$data = array();
			$data['error']="";
			if($NazwaTowaru === null || $NazwaTowaru === "")
			{
				$data['error'] .= 'Nieokreślone Nazwa Towaru! <br>';
				$blad=true;
			}
			if($MinStanMagazynowy === null || $MinStanMagazynowy === "")
			{
				$data['error'] .='Nieokreślone Min Stan Magazynowy! <br>';
				$blad=true;
			}
			if($MaxStanMagazynowy === null || $MaxStanMagazynowy === "")
			{
				$data['error'] .= 'Nieokreślony Max Stan Magazynowy! <br>';
				$blad=true;
			}
			if($StawkaVat === null || $StawkaVat === "")
			{
				$data['error'] .= 'Nieokreślone Stawka Vat! <br>';
				$blad=true;
			}
			if($KodTowaru === null || $KodTowaru === "")
			{
				$data['error'] .= 'Nieokreślony Kod Towaru! <br>';
				$blad=true;
			}
			if($IdKategoria === null || $IdKategoria === "")
			{
				$data['error'] .= 'Nieokreślona Kategoria! <br>';
				$blad=true;
			}
			if($IdJednostkaMiary === null || $IdJednostkaMiary === "")
			{
				$data['error'] .= 'Nieokreślone Jednostka Miary! <br>';
				$blad=true;
			}
			if(!$blad)
			{
				try
				{
					$stmt = $this->pdo->prepare('INSERT INTO `Towar`(`NazwaTowaru`,`MinStanMagazynowy`,`MaxStanMagazynowy`,`StanMagazynowyRzeczywisty`,`StanMagazynowyDysponowany`,`StawkaVat`,`KodTowaru`,`IdKategoria`,`IdJednostkaMiary`,`Freeze`) VALUES (:NazwaTowaru,:MinStanMagazynowy,:MaxStanMagazynowy,:StanMagazynowyRzeczywisty,:StanMagazynowyDysponowany,:StawkaVat,:KodTowaru,:IdKategoria,:IdJednostkaMiary,:Freeze)');
			    $stmt -> bindValue(':NazwaTowaru',$NazwaTowaru,PDO::PARAM_STR);
			    $stmt -> bindValue(':MinStanMagazynowy',$MinStanMagazynowy,PDO::PARAM_INT);
			    $stmt -> bindValue(':MaxStanMagazynowy',$MaxStanMagazynowy,PDO::PARAM_INT);
			    $stmt -> bindValue(':StanMagazynowyRzeczywisty',0,PDO::PARAM_INT);
			    $stmt -> bindValue(':StanMagazynowyDysponowany',0,PDO::PARAM_INT);
			    $stmt -> bindValue(':StawkaVat',$StawkaVat,PDO::PARAM_INT);
			    $stmt -> bindValue(':KodTowaru',$KodTowaru,PDO::PARAM_STR);
					$stmt -> bindValue(':IdKategoria',$IdKategoria,PDO::PARAM_INT);
			    $stmt -> bindValue(':IdJednostkaMiary',$IdJednostkaMiary,PDO::PARAM_INT);
			    $stmt -> bindValue(':Freeze',0,PDO::PARAM_INT);
			    $wynik_zapytania = $stmt -> execute();
				}
				catch(\PDOException $e)
				{
					$data['error'] .='Błąd zapisu danych do bazy! <br>';
					return $data;
				}
		}
			return $data;
		}

		public function add()
		{

		}

    public function getFreeze()
    {
      $data = array();
      if(!$this->pdo)
          $data['error'] = 'Połączenie z bazą nie powidoło się!';
      else
          try
          {
              $stmt = $this->pdo->query("SELECT * FROM `Towar` WHERE freeze=1;");
              $towary = $stmt->fetchAll();
              $stmt->closeCursor();
              if($towary && !empty($towary))
                  $data['towary'] = $towary;
              else
                  $data['towary'] = array();
          }
          catch(\PDOException $e)
          {
              $data['error'] = 'Błąd odczytu danych z bazy! ';
          }
      return $data;
    }

    public function getNotFreeze()
    {
      $data = array();
      if(!$this->pdo)
          $data['error'] = 'Połączenie z bazą nie powidoło się!';
      else
          try
          {
              $stmt = $this->pdo->query("SELECT * FROM Towar WHERE freeze=0;");
              $towary = $stmt->fetchAll();
              $stmt->closeCursor();
              if($towary && !empty($towary))
                  $data['towary'] = $towary;
              else
                  $data['towary'] = array();
          }
          catch(\PDOException $e)
          {
              $data['error'] = 'Błąd odczytu danych z bazy! ';
          }
      return $data;
    }

		public function getOne($id)
		{
			$data = array();
			if($id === NULL || $id === "")
				$data['error'] = 'Nieokreślone ID!';
			else
			if(!$this->pdo)
					$data['error'] = 'Połączenie z bazą nie powidoło się!';
			else
					try
					{
							$stmt = $this->pdo->prepare("SELECT * FROM Towar WHERE IdTowar=:id");
							$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
							$stmt -> execute();
							$towar = $stmt -> fetchAll();
							$liczba_wierszy = $stmt->rowCount();
							$stmt->closeCursor();
							if($towar && !empty($towar))
									$data['towar'] = $towar;
							else
									$data['towar'] = array();

							if($liczba_wierszy===0)
								$data['error']="Brak podanego id w bazie danych";
					}
					catch(\PDOException $e)
					{
							$data['error'] = 'Błąd odczytu danych z bazy! ';
					}
			return $data;
		}

		public function wKoszyku()
    {
      $data = array();
      if(!$this->pdo)
          $data['error'] = 'Połączenie z bazą nie powidoło się!';
      else
          try
          {
              $stmt = $this->pdo->query("SELECT Id ,NazwaTowaru, KodTowaru, Cena, StawkaVat, ilosc, NazwaSkrocona FROM `towar` inner join `koszyk` on towar.IdTowar=koszyk.IdTowar inner join `jednostkamiary` on jednostkamiary.idjednostkamiary=towar.idjednostkamiary");
              $towary = $stmt->fetchAll();
              $stmt->closeCursor();
              if($towary && !empty($towary))
                  $data['towary'] = $towary;
              else
                  $data['towary'] = array();
          }
          catch(\PDOException $e)
          {
              $data['error'] = 'Błąd odczytu danych z bazy! ';
          }
      return $data;
    }

		public function delete($id)
		{
			$data = array();
				if($id === NULL || $id === "")
					$data['error'] = 'Nieokreślone ID!';
				else
					try
					{
						$stmt = $this->pdo->prepare('DELETE FROM `Towar` WHERE IdTowar=:id');
				    $stmt -> bindValue(':id',$id,PDO::PARAM_INT);
				    $wynik_zapytania = $stmt -> execute();
					}
					catch(\PDOException $e)
					{
						$data['error'] =$data['error'].'<br> Błąd wykonywania operacji usunięcia';
					}
				return $data;

		}

		public function iloscPlus($id)
		{
			$data = array();
				if($id === NULL || $id === "")
					$data['error'] = 'Nieokreślone ID!';
				else
					try
					{
						$stmt2 = $this->pdo->prepare('SELECT IdTowar FROM `koszyk` where id=:id');
						$stmt2 -> bindValue(':id',$id,PDO::PARAM_INT);
						$stmt2 -> execute();
						$data = $stmt2 -> fetchAll();
						foreach($data as $result)
						{
							$towar = $result['IdTowar'];
						}

						$stmt2 = $this->pdo->prepare('SELECT StanMagazynowyDysponowany FROM `towar` where IdTowar='.$towar.'');
						$stan = $stmt2 -> execute();
						$data = $stmt2 -> fetchAll();
						foreach($data as $result)
						{
							$stan = $result['StanMagazynowyDysponowany'];
						}

						$stmt2 = $this->pdo->prepare('SELECT ilosc FROM `koszyk` where id=:id');
						$stmt2 -> bindValue(':id',$id,PDO::PARAM_INT);
						$ilosc = $stmt2 -> execute();
						$data = $stmt2 -> fetchAll();
						foreach($data as $result)
						{
							$ilosc = $result['ilosc'];
						}

						if($ilosc==0 || $ilosc<$stan)
						{
							$stmt = $this->pdo->prepare('UPDATE koszyk SET ilosc=ilosc+1 WHERE id=:id');
							$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
							$wynik_zapytania = $stmt -> execute();
						}
					}
					catch(\PDOException $e)
					{
						$data['error'] =$data['error'];
					}
				return $data;

		}

		public function iloscMinus($id)
		{
			$data = array();
				if($id === NULL || $id === "")
					$data['error'] = 'Nieokreślone ID!';
				else
					try
					{
						$stmt2 = $this->pdo->prepare('SELECT ilosc FROM `koszyk` where id=:id');
						$stmt2 -> bindValue(':id',$id,PDO::PARAM_INT);
						$ilosc = $stmt2 -> execute();
						$data = $stmt2 -> fetchAll();
						foreach($data as $result)
						{
							$ilosc = $result['ilosc'];
						}
						if($ilosc>1)
						{
							$stmt = $this->pdo->prepare('UPDATE koszyk SET ilosc=ilosc-1 WHERE id=:id');
							$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
							$wynik_zapytania = $stmt -> execute();
						}
					}
					catch(\PDOException $e)
					{
						$data['error'] =$data['error'].'<br> Błąd wykonywania operacji usunięcia';
					}
				return $data;

		}
		public function deleteKoszyk($id)
		{
			$data = array();
				if($id === NULL || $id === "")
					$data['error'] = 'Nieokreślone ID!';
				else
					try
					{
						$stmt = $this->pdo->prepare('DELETE FROM `koszyk` WHERE id=:id');
				    $stmt -> bindValue(':id',$id,PDO::PARAM_INT);
				    $wynik_zapytania = $stmt -> execute();
					}
					catch(\PDOException $e)
					{
						$data['error'] =$data['error'].'<br> Błąd wykonywania operacji usunięcia';
					}
				return $data;

		}
		public function koszyk($IdTowar,$ilosc)
    {
			$blad=false;
			$data = array();
			$data['error']="";
			if($IdTowar === null || $IdTowar === "")
			{
				$data['error'] .= 'Nieokreślone Id Towaru! <br>';
				$blad=true;
			}
			if($ilosc === null || $ilosc === "")
			{
				$data['error'] .='Nieokreślona ilosc! <br>';
				$blad=true;
			}
			if(!$blad)
			{
				if(!isset($_COOKIE['idtowary']))
				{
				  echo 'nie ma ciaskeczka';
				  $ids = array();
				  $dane = json_encode($ids);
				  setcookie('idtowary', $dane);
				  $_COOKIE['idtowary'] = $dane;
				}
				else
				{
				  $cookie = $_COOKIE['idtowary'];
				  $cookie = stripslashes($cookie);
				  $towar = json_decode($cookie, true);
				  $towar[] = $IdTowar;
				  $dane = json_encode($towar);
				  setcookie('idtowary', $dane);
				  $_COOKIE['idtowary'] = $dane;
				}
				if(!isset($_COOKIE['ilosci']))
				{
				  echo 'nie ma ciaskeczka';
				  $ids = array();
				  $dane = json_encode($ids);
				  setcookie('ilosci', $dane);
				  $_COOKIE['ilosci'] = $dane;
				}
				else
				{
				  $cookie = $_COOKIE['ilosci'];
				  $cookie = stripslashes($cookie);
				  $towar = json_decode($cookie, true);
				  $towar[] = $ilosc;
				  $dane = json_encode($towar);
				  setcookie('ilosci', $dane);
				  $_COOKIE['ilosci'] = $dane;
				}

					try
          {
							$stmt2 = $this->pdo->prepare('select * from `koszyk` where IdTowar=:IdTowar');
							$stmt2 -> bindValue(':IdTowar',$IdTowar,PDO::PARAM_INT);
							$czyJuzJest = $stmt2 -> execute();
							//var_dump($stmt2);
							$i = $stmt2->fetchColumn();
							if($i == null)
							{
								$stmt = $this->pdo->prepare('insert into `koszyk`(`IdTowar`,`ilosc`,`klient`) values(:IdTowar,:ilosc,1);');
								$stmt -> bindValue(':IdTowar',$IdTowar,PDO::PARAM_INT);
								$stmt -> bindValue(':ilosc',$ilosc,PDO::PARAM_INT);
								$wynik_zapytania = $stmt -> execute();
							}
          }
          catch(\PDOException $e)
          {
              $data['error'] = 'Błąd odczytu danych z bazy! ';
							return $data;
          }
				}

      return $data;
    	}

		public function Zamroz()
		{

		}

		public function odmroz($id)
		{

		}

  }

?>
