<?php
	namespace Models;
	use \PDO;
	class Zamowienie extends Model
	{

    public function getAll()
    {
      $data = array();
      if(!$this->pdo)
          $data['error'] = 'Połączenie z bazą nie powidoło się!';
      else
          try
          {
              $stmt = $this->pdo->query("SELECT * FROM Zamowienia");
              $zamowienia = $stmt->fetchAll();
              $stmt->closeCursor();
              if($zamowienia && !empty($zamowienia))
                  $data['zamowienia'] = $zamowienia;
              else
                  $data['$zamowienia'] = array();
          }
          catch(\PDOException $e)
          {
              $data['error'] = 'Błąd odczytu danych z bazy! ';
          }
      return $data;
    }

    public function wRealizacji()
    {

    }

    public function Zrealizowane()
    {

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
							$stmt = $this->pdo->prepare("SELECT * FROM zamowienia WHERE IdZamowienie=:id");
							$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
							$stmt -> execute();
							$zamowienie = $stmt -> fetchAll();
							$liczba_wierszy = $stmt->rowCount();
							$stmt->closeCursor();
							if($zamowienie && !empty($zamowienie))
									$data['zamowienie'] = $zamowienie;
							else
									$data['zamowienie'] = array();

							if($liczba_wierszy===0)
								$data['error']="Brak podanego id w bazie danych";
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
						$stmt = $this->pdo->prepare('DELETE FROM `zamowienia` WHERE IdZamowienie=:id');
				    $stmt -> bindValue(':id',$id,PDO::PARAM_INT);
				    $wynik_zapytania = $stmt -> execute();
					}
					catch(\PDOException $e)
					{
						$data['error'] =$data['error'].'<br> Błąd wykonywania operacji usunięcia';
					}
				return $data;

		}

		public function anuluj($id)
		{
			$data = array();
				if($id === NULL || $id === "")
					$data['error'] = 'Nieokreślone ID!';
				else
					try
					{
					$stmt = $this->pdo->prepare('select * FROM `towarysprzedaz` WHERE IdZamowienieSprzedaz=:id');
				    $stmt -> bindValue(':id',$id,PDO::PARAM_INT);
					$stmt -> execute();
					$towarysprzedaz = $stmt -> fetchAll();
					foreach($towarysprzedaz as $zamowionyTowar){
						$stmt2 = $this->pdo->prepare('select StanMagazynowyDysponowany FROM `towar` WHERE IdTowar=:id');
						$stmt2 -> bindValue(':id',$zamowionyTowar['IdTowar'],PDO::PARAM_INT);
						$stmt2 -> execute();
						$stan = $stmt2 -> fetchAll();
						foreach($stan as $s){
							$stmt2 = $this->pdo->prepare('update `towar` set StanMagazynowyDysponowany = :stan WHERE IdTowar=:id');
							$stmt2 -> bindValue(':id',$zamowionyTowar['IdTowar'],PDO::PARAM_INT);
							$stmt2 -> bindValue(':stan',$s['StanMagazynowyDysponowany']+$zamowionyTowar['ilosc'],PDO::PARAM_INT);
							$stmt2 -> execute();
						}
					}
					$stmt = $this->pdo->prepare('delete from `towarysprzedaz` WHERE IdZamowienieSprzedaz=:id');
				    $stmt -> bindValue(':id',$id,PDO::PARAM_INT);
					$stmt -> execute();
					$stmt = $this->pdo->prepare('delete from `zamowieniesprzedaz` WHERE IdZamowienieSprzedaz=:id');
				    $stmt -> bindValue(':id',$id,PDO::PARAM_INT);
					$stmt -> execute();
					}
					catch(\PDOException $e)
					{
						$data['error'] =$data['error'].'<br> Błąd wykonywania operacji usunięcia';
						$e;
					}
				return $data;

		}

		public function insert($NazwaTowaru,$MinStanMagazynowy,$MaxStanMagazynowy,$stawkaVat,$kategoria,$jednostkamiary)
		{
			$blad=false;
			$data = array();
			$data['error']="";
			if($NazwaTowaru === null || $NazwaTowaru === "")
			{
				$data['error'] .= 'Nieokreślona Nazwa Towaru! <br>';
				$blad=true;
			}
			if($MinStanMagazynowy === null || $MinStanMagazynowy === "")
			{
				$data['error'] .='Nieokreślony Min Stan Magazynowy! <br>';
				$blad=true;
			}
			if($MaxStanMagazynowy === null || $MaxStanMagazynowy === "")
			{
				$data['error'] .= 'Nieokreślony Max Stan Magazynowy! <br>';
				$blad=true;
			}
			if($stawkaVat === null || $stawkaVat === "")
			{
				$data['error'] .= 'Nieokreślona stawka Vat! <br>';
				$blad=true;
			}
			if($kategoria === null || $kategoria === "")
			{
				$data['error'] .= 'Nieokreślona kategoria! <br>';
				$blad=true;
			}
			if($jednostkamiary === null || $jednostkamiary === "")
			{
				$data['error'] .= 'Nieokreślona jednostka miary! <br>';
				$blad=true;
			}
			if(!$blad)
			{
				try
				{
					$status=1;
					$stmt = $this->pdo->prepare('INSERT INTO `Zamowienia`(`NazwaTowaru`,`MinStanMagazynowy`,`MaxStanMagazynowy`,`StawkaVat`,`IdKategoria`,`IdJednostkaMiary`,`Status`) VALUES (:NazwaTowaru,:MinStanMagazynowy,:MaxStanMagazynowy,:StawkaVat,:IdKategoria,:IdJednostkaMiary,:Status)');
			    $stmt -> bindValue(':NazwaTowaru',$NazwaTowaru,PDO::PARAM_STR);
			    $stmt -> bindValue(':MinStanMagazynowy',$MinStanMagazynowy,PDO::PARAM_INT);
			    $stmt -> bindValue(':MaxStanMagazynowy',$MaxStanMagazynowy,PDO::PARAM_INT);
			    $stmt -> bindValue(':StawkaVat',$stawkaVat,PDO::PARAM_INT);
			    $stmt -> bindValue(':IdKategoria',$kategoria,PDO::PARAM_INT);
			    $stmt -> bindValue(':IdJednostkaMiary',$jednostkamiary,PDO::PARAM_INT);
			    $stmt -> bindValue(':Status',$status,PDO::PARAM_INT);
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
		public function listaZamowien()
		{
			$data = array();
			if(!$this->pdo)
					$data['error'] = 'Połączenie z bazą nie powidoło się!';
			else
					try
					{
							$stmt = $this->pdo->query("SELECT zamowieniesprzedaz.DataWystawienia, zamowieniesprzedaz.TerminZaplaty, zamowieniesprzedaz.DataSprzedazy,zamowieniesprzedaz.DataZamowienia, towar.NazwaTowaru, towarysprzedaz.ilosc, towarysprzedaz.vat, towarysprzedaz.cena, zamowieniesprzedaz.Wartosc, zamowieniesprzedaz.IdSposobZaplaty,klient.Nazwisko, klient.Imie, klient.IdKlient, towarysprzedaz.IdZamowienieSprzedaz, sposobdostawy.* from zamowieniesprzedaz inner join klient on zamowieniesprzedaz.IdKlient = klient.IdKlient inner join towarysprzedaz on towarysprzedaz.IdZamowienieSprzedaz = zamowieniesprzedaz.IdZamowienieSprzedaz inner JOIN towar on towar.IdTowar = towarysprzedaz.IdTowar inner join sposobdostawy on sposobdostawy.IdSposobDostawy = zamowieniesprzedaz.IdSposobDostawy order by zamowieniesprzedaz.IdZamowienieSprzedaz asc");
							$zamowienia = $stmt->fetchAll();
							$stmt->closeCursor();
							if($zamowienia && !empty($zamowienia))
									$data['zamowienia'] = $zamowienia;
							else
									$data['$zamowienia'] = array();
					}
					catch(\PDOException $e)
					{
							$data['error'] = 'Błąd odczytu danych z bazy! ';
					}
			return $data;
		}
		public function faktura($id,$DataWystawienia,$TerminZaplaty,$DataSprzedazy)
		{
			$blad=false;
			$data = array();
			if(!$this->pdo)
					$data['error'] = 'Połączenie z bazą nie powidoło się!';
			else
			if($id === null || $id === "")
			{
				$data['error'] .= 'Nieokreślone zamówienie. <br>';
				$blad=true;
			}
			if($blad != true)
			{
					try
					{
						//d($id);
						//d($DataWystawienia);
						//d($TerminZaplaty);
						//d($DataSprzedazy);
						if($TerminZaplaty!=null && $DataSprzedazy!=null && $TerminZaplaty!='NULL' && $DataSprzedazy!='null')
						{
							$numer = date('Y').'/'.date('m').'/'.date('d').'/'.date('H').''.date('i');
							$stmt = $this->pdo->prepare('update `zamowieniesprzedaz` set `DataWystawienia`=:DataWystawienia,`TerminZaplaty`=:TerminZaplaty,`DataSprzedazy`=:DataSprzedazy,`NrFaktury`=:numer where IdZamowienieSprzedaz=:id');
							$stmt -> bindValue(':DataWystawienia',$DataWystawienia,PDO::PARAM_STR);
							$stmt -> bindValue(':TerminZaplaty',$TerminZaplaty,PDO::PARAM_STR);
							$stmt -> bindValue(':DataSprzedazy',$DataSprzedazy,PDO::PARAM_STR);
							$stmt -> bindValue(':numer',$numer,PDO::PARAM_STR);
							$stmt -> bindValue(':id',$id,PDO::PARAM_STR);
							$stmt -> execute();
						}

							$stmt = $this->pdo->query("SELECT zamowieniesprzedaz.NrFaktury,zamowieniesprzedaz.DataWystawienia, zamowieniesprzedaz.TerminZaplaty, zamowieniesprzedaz.DataSprzedazy, zamowieniesprzedaz.DataZamowienia, towar.KodTowaru, towar.NazwaTowaru, towar.IdJednostkaMiary, jednostkamiary.*, towarysprzedaz.ilosc, towarysprzedaz.vat, towarysprzedaz.cena, zamowieniesprzedaz.Wartosc, towarysprzedaz.IdZamowienieSprzedaz, klient.*, sposobdostawy.*, sposobzaplaty.sposobzaplaty as SposobZaplaty from zamowieniesprzedaz
								inner join klient on zamowieniesprzedaz.IdKlient = klient.IdKlient
								inner join towarysprzedaz on towarysprzedaz.IdZamowienieSprzedaz = zamowieniesprzedaz.IdZamowienieSprzedaz
								inner JOIN towar on towar.IdTowar = towarysprzedaz.IdTowar
								inner JOIN jednostkamiary on towar.IdJednostkaMiary = jednostkamiary.IdJednostkaMiary
								inner join sposobdostawy on sposobdostawy.IdSposobDostawy = zamowieniesprzedaz.IdSposobDostawy
								inner join sposobzaplaty on sposobzaplaty.IdSposobZaplaty = zamowieniesprzedaz.IdSposobZaplaty
								where zamowieniesprzedaz.IdZamowienieSprzedaz = $id");
							$zamowienia = $stmt->fetchAll();
							$stmt->closeCursor();
							if($zamowienia && !empty($zamowienia))
									$data['zamowienia'] = $zamowienia;
							else
									$data['$zamowienia'] = array();
					}
					catch(\PDOException $e)
					{
							$data['error'] = 'Błąd odczytu danych z bazy! ';
					}
				}
			return $data;
		}

  }

?>
