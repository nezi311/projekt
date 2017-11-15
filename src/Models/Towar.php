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
              $stmt = $this->pdo->query("SELECT * FROM towar");
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

		public function getAllTwCn()
		{
			$data = array();
			if(!$this->pdo)
					$data['error'] = 'Połączenie z bazą nie powidoło się!';
			else
					try
					{
							$datee = date("Y-m-d");
							$stmt = $this->pdo->prepare("SELECT * FROM cennik INNER JOIN towar ON cennik.idtowar = towar.Idtowar WHERE :obecnaData BETWEEN IFNULL(cennik.dataOd,:pomocniczaDataOd) AND IFNULL(cennik.dataDo,:obecnaData)");
							$stmt -> bindValue(':pomocniczaDataOd','1900-01-01',PDO::PARAM_STR);
							$stmt -> bindValue(':obecnaData',$datee,PDO::PARAM_STR);
							$stmt->execute();
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

		public function getNotPriced()
		{
			$data = array();
			if(!$this->pdo)
					$data['error'] = 'Połączenie z bazą nie powidoło się!';
			else
					try
					{
							$stmt = $this->pdo->query("SELECT * FROM towar WHERE towar.idtowar NOT IN (SELECT cennik.idtowar FROM cennik)");
							$towary = $stmt->fetchAll();
							$stmt->closeCursor();
							if($towary && !empty($towary))
							{
								$data['towary'] = $towary;
							}
							else
							{
								$data['towary'] = array();
							}
					}
					catch(\PDOException $e)
					{
							$data['error'] = 'Błąd odczytu danych z bazy! ';
					}
			return $data;
		}

		public function getNotPricedCount()
		{
			$data = array();
			if(!$this->pdo)
					$data['error'] = 'Połączenie z bazą nie powidoło się!';
			else
					try
					{
							$stmt = $this->pdo->query("SELECT * FROM towar WHERE towar.idtowar NOT IN (SELECT cennik.idtowar FROM cennik)");

							$towary = $stmt->fetchAll();
							$iloscWierszy = $stmt->rowCount();
							$stmt->closeCursor();

					}
					catch(\PDOException $e)
					{
							$data['error'] = 'Błąd odczytu danych z bazy! ';
					}
			return $iloscWierszy;
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
					$stmt = $this->pdo->prepare('INSERT INTO `towar`(`Nazwatowaru`,`MinStanMagazynowy`,`MaxStanMagazynowy`,`StanMagazynowyRzeczywisty`,`StanMagazynowyDysponowany`,`StawkaVat`,`KodTowaru`,`IdKategoria`,`IdJednostkaMiary`,`Freeze`,`Cena`) VALUES (:NazwaTowaru,:MinStanMagazynowy,:MaxStanMagazynowy,:StanMagazynowyRzeczywisty,:StanMagazynowyDysponowany,:StawkaVat,:KodTowaru,:IdKategoria,:IdJednostkaMiary,:Freeze,:Cena)');
			    $stmt -> bindValue(':NazwaTowaru',$NazwaTowaru,PDO::PARAM_STR);
			    $stmt -> bindValue(':MinStanMagazynowy',$MinStanMagazynowy,PDO::PARAM_INT);
			    $stmt -> bindValue(':MaxStanMagazynowy',$MaxStanMagazynowy,PDO::PARAM_INT);
			    $stmt -> bindValue(':StanMagazynowyRzeczywisty',0,PDO::PARAM_INT);
			    $stmt -> bindValue(':StanMagazynowyDysponowany',0,PDO::PARAM_INT);
			    $stmt -> bindValue(':StawkaVat',$StawkaVat,PDO::PARAM_INT);
			    $stmt -> bindValue(':KodTowaru',$KodTowaru,PDO::PARAM_STR);
					$stmt -> bindValue(':IdKategoria',$IdKategoria,PDO::PARAM_INT);
			    $stmt -> bindValue(':IdJednostkaMiary',$IdJednostkaMiary,PDO::PARAM_INT);
			    $stmt -> bindValue(':Freeze',1,PDO::PARAM_INT);
					$stmt -> bindValue(':Cena',NULL,PDO::PARAM_INT);
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


		public function edit($id, $NazwaTowaru,$MinStanMagazynowy,$MaxStanMagazynowy,$StawkaVat,$KodTowaru,$IdKategoria,$IdJednostkaMiary) {

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
                    $stmt = $this->pdo->prepare('UPDATE `towar`
												SET `NazwaTowaru`=:NazwaTowaru,
														`MinStanMagazynowy`=:MinStanMagazynowy,
														`MaxStanMagazynowy`=:MaxStanMagazynowy,
														`StawkaVat`=:StawkaVat,
														`KodTowaru`=:KodTowaru,
														`IdKategoria`=:IdKategoria,
														`IdJednostkaMiary`=:IdJednostkaMiary
												WHERE `IdTowar`=:id');
								$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
								$stmt -> bindValue(':NazwaTowaru',$NazwaTowaru,PDO::PARAM_STR);
								$stmt -> bindValue(':MinStanMagazynowy',$MinStanMagazynowy,PDO::PARAM_INT);
								$stmt -> bindValue(':MaxStanMagazynowy',$MaxStanMagazynowy,PDO::PARAM_INT);
								$stmt -> bindValue(':StawkaVat',$StawkaVat,PDO::PARAM_INT);
								$stmt -> bindValue(':KodTowaru',$KodTowaru,PDO::PARAM_STR);
								$stmt -> bindValue(':IdKategoria',$IdKategoria,PDO::PARAM_INT);
								$stmt -> bindValue(':IdJednostkaMiary',$IdJednostkaMiary,PDO::PARAM_INT);
								$wynik_zapytania = $stmt -> execute();
                }
                catch(\PDOException $e)
                {
                     $data['error'] = 'Błąd zapisu danych do bazy!';
                }
            return $data;
		}
}
		public function getJed()
		{


				$data = array();
	      if(!$this->pdo)
	          $data['error'] = 'Połączenie z bazą nie powidoło się!';
	      else
	          try
	          {
	              $stmt = $this->pdo->query("SELECT IdJednostkaMiary,CONCAT(Nazwa,', ',NazwaSkrocona) AS Nazwa2 From jednostkamiary");
	              $jednostki = $stmt->fetchAll();
	              $stmt->closeCursor();
	              if($jednostki && !empty($jednostki))
	                  $data['jednostki'] = $jednostki;
	              else
	                  $data['jednostki'] = array();
	          }
	          catch(\PDOException $e)
	          {
	              $data['error'] = 'Błąd odczytu danych z bazy! ';
	          }
	      return $data;
		}


    public function getFreeze()
    {
      $data = array();
      if(!$this->pdo)
          $data['error'] = 'Połączenie z bazą nie powidoło się!';
      else
          try
          {
              $stmt = $this->pdo->query("SELECT towar.IdTowar, KodTowaru, StanMagazynowyDysponowany, StawkaVat, NazwaTowaru, kategoria.NazwaKategorii AS Kategoria, jednostkamiary.Nazwa AS JednostkaMiary, (SELECT CONCAT(cena,' ','zl') FROM cennik WHERE cennik.idTowar=towar.idTowar AND (CURRENT_DATE() BETWEEN IFNULL(cennik.dataOd,'1900-01-01') AND IFNULL(cennik.dataDo, CURRENT_DATE() )) ) AS Cena FROM `towar` INNER JOIN kategoria on towar.IdKategoria=kategoria.IdKategoria INNER JOIN jednostkamiary on towar.IdJednostkaMiary=jednostkamiary.IdJednostkaMiary WHERE freeze=1");
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
			//d($_COOKIE['idtowary']);
			//d($_COOKIE['ilosci']);
			//d($_COOKIE['ceny']);
      $data = array();
      if(!$this->pdo)
          $data['error'] = 'Połączenie z bazą nie powidoło się!';
      else
          try
          {



							$obecnaData = date("Y-m-d");
              $stmt = $this->pdo->prepare("
							SELECT towar.IdTowar, towar.KodTowaru, towar.StanMagazynowyDysponowany, towar.StawkaVat, towar.NazwaTowaru, kategoria.NazwaKategorii AS Kategoria, jednostkamiary.Nazwa AS JednostkaMiary,
							(SELECT CONCAT(cena,' ','zl')
								FROM cennik
								WHERE cennik.idTowar=towar.idTowar
								AND (:obecnaData BETWEEN IFNULL(cennik.dataOd,:tempPoczatkowaData)
								 AND IFNULL(cennik.dataDo, :obecnaData) AND cennik.aktualny='T' )) AS Cena
							FROM towar,kategoria,jednostkamiary
									 WHERE towar.freeze=0
									 AND kategoria.IdKategoria=towar.IdKategoria
										 AND towar.IdJednostkaMiary=jednostkamiary.IdJednostkaMiary
							");
							$stmt -> bindValue(':obecnaData',$obecnaData,PDO::PARAM_STR);
							$stmt -> bindValue(':tempPoczatkowaData','1900-01-01',PDO::PARAM_STR);
							$stmt->execute();
              $towary = $stmt->fetchAll();
              $stmt->closeCursor();
              if($towary && !empty($towary))
                  $data['towary'] = $towary;
              else
                  $data['towary'] = array();
          }
          catch(\PDOException $e)
          {
              $data['error'] = 'Błąd odczytu danych z baz! ';
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
						$obecnaData = date("Y-m-d");
							$stmt = $this->pdo->prepare("
							SELECT towar.IdTowar, NazwaTowaru, StanMagazynowyDysponowany, MinStanMagazynowy, MaxStanMagazynowy, StawkaVat, KodTowaru, kategoria.IdKategoria, kategoria.NazwaKategorii AS Kategoria, jednostkamiary.Nazwa AS JednostkaMiary, Freeze,
							(SELECT cena
								FROM cennik
								WHERE cennik.idTowar=towar.idTowar
								AND (:obecnaData BETWEEN IFNULL(cennik.dataOd,:tempPoczatkowaData)
								 AND IFNULL(cennik.dataDo, :obecnaData) )) AS Cena
								 FROM towar,kategoria,jednostkamiary
	 									 WHERE towar.IdTowar=:id
	 									 AND kategoria.IdKategoria=towar.IdKategoria
	 										 AND towar.IdJednostkaMiary=jednostkamiary.IdJednostkaMiary");
							$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
							$stmt -> bindValue(':obecnaData',$obecnaData,PDO::PARAM_STR);
							$stmt -> bindValue(':tempPoczatkowaData','1900-01-01',PDO::PARAM_STR);
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
						$dataObecna = date("Y-m-d");
              $stmt = $this->pdo->prepare("
							SELECT *,
							kategoria.NazwaKategorii as Kategoria,
							jednostkamiary.Nazwa as JednostkaMiary,
							(SELECT cena FROM cennik WHERE cennik.idTowar=towar.idTowar AND (:data BETWEEN IFNULL(cennik.dataOd,:datatmp) AND IFNULL(cennik.dataDo, :data) )) AS Cena
							FROM towar
							INNER JOIN kategoria on towar.IdKategoria=kategoria.IdKategoria
							INNER JOIN jednostkamiary on towar.IdJednostkaMiary=jednostkamiary.IdJednostkaMiary
							INNER JOIN koszyk on koszyk.IdTowar=towar.IdTowar
							");
							$stmt -> bindValue(':data',$dataObecna,PDO::PARAM_STR);
							$stmt -> bindValue(':datatmp','1900-01-01',PDO::PARAM_STR);
							$stmt->execute();
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
						$stmt2 = $this->pdo->prepare('SELECT IdTowar FROM `koszyk` where id=:id');
						$stmt2 -> bindValue(':id',$id,PDO::PARAM_INT);
						$stmt2 -> execute();
						$data = $stmt2 -> fetchAll();
						foreach($data as $result)
						{
							$idt = $result['IdTowar'];
						}
						$stmt = $this->pdo->prepare('DELETE FROM `towar` WHERE IdTowar=:id');
				    $stmt -> bindValue(':id',$id,PDO::PARAM_INT);
				    $wynik_zapytania = $stmt -> execute();
					}
					catch(\PDOException $e)
					{
						$data['error'] =$data['error'].'<br> Błąd wykonywania operacji usunięcia';
					}

				return $data;
			}

			public function zrealizuj($suma, $klient, $dostawa, $zaplata)
			{
				echo "suma ".$suma."<br>";
				echo "kl ".$klient."<br>";
				echo "dos ".$dostawa."<br>";
				echo "zap ".$zaplata."<br>";
				$data = array();
				$data['error']="";
					if($zaplata === NULL || $zaplata === "")
						$data['error'] = 'Nieokreślona zaplata!';
					else
						try
						{
							$stmt = $this->pdo->prepare('INSERT INTO `zamowieniesprzedaz`(`DataZamowienia`,`Wartosc`,`IdStanZamowienia`,`IdKlient`, `IdSposobDostawy`,`IdSposobZaplaty`) VALUES (NOW(),:suma,3,:klient, :dostawa,:zaplata)');
							$stmt -> bindValue(':suma',$suma,PDO::PARAM_STR);
							$stmt -> bindValue(':klient',$klient,PDO::PARAM_INT);
							$stmt -> bindValue(':dostawa',$dostawa,PDO::PARAM_INT);
							$stmt -> bindValue(':zaplata',$zaplata,PDO::PARAM_INT);
							$stmt -> execute();
							echo 'zamowieniesprzedaz';
							$stmt = $this->pdo->prepare('INSERT INTO towarysprzedaz (IdTowar, ilosc, klient, cena, vat, IdZamowienieSprzedaz) select koszyk.IdTowar, koszyk.ilosc, :klient, koszyk.cena, StawkaVat, (SELECT MAX(IdZamowienieSprzedaz) FROM zamowieniesprzedaz) FROM `towar` inner join `koszyk` on towar.IdTowar=koszyk.IdTowar');
							$stmt -> bindValue(':klient',$klient,PDO::PARAM_INT);
							$stmt -> execute();
							echo 'towarysprzedaz';
							$stmt2 = $this->pdo->prepare("truncate table koszyk");
							$stmt2 -> execute();

							setcookie("ilosci", "", time()-3600,'/');
							setcookie("idtowary", "", time()-3600,'/');
							setcookie("ceny", "", time()-3600,'/');
/*
							$stmt2 = $this->pdo->prepare('SELECT IdTowar, ilosc FROM koszyk');
							$stmt2 -> execute();
							$data = $stmt2 -> fetchAll();
							foreach($data as $result)
							{
								echo 'id'.$result['IdTowar'].' ilosc'.$result['ilosc'];
								echo '<br>';
								$stmt2 = $this->pdo->prepare("SELECT ilosc from koszyk where IdTowar = '".$result['IdTowar']."'");
								$quantity = $stmt2 -> execute();

								$stmt2 = $this->pdo->prepare("update towar set towar.StanMagazynowyDysponowany = towar.StanMagazynowyDysponowany-'".$result['ilosc']."' where IdTowar = '".$result['IdTowar']."'");
								$stmt2 -> execute();
							}*/
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

						$stmt2 = $this->pdo->prepare('SELECT StanMagazynowyDysponowany FROM `towar` where IdTowar=:id');
						$stmt2 -> bindValue(':id',$id,PDO::PARAM_INT);
						$stmt2 -> execute();
						$data = $stmt2 -> fetchAll();
						//d($data);
						foreach($data as $result)
						{
							$stan = $result['StanMagazynowyDysponowany'];
						}
						//d($stan);
						$stmt2 = $this->pdo->prepare('SELECT IdTowar, ilosc FROM `koszyk` where IdTowar=:id');
						$stmt2 -> bindValue(':id',$id,PDO::PARAM_INT);
						$ilosc = $stmt2 -> execute();
						$data = $stmt2 -> fetchAll();
						foreach($data as $result)
						{
							$ilosc = $result['ilosc'];
							$idt = $result['IdTowar'];
						}

						if($stan>0)
						{
							echo $id.'<br>towary: ';
							var_dump('Towary cookie '.$_COOKIE['idtowary']);
							$stmt = $this->pdo->prepare('UPDATE koszyk SET ilosc=ilosc+1 WHERE IdTowar=:id');
							$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
							$wynik_zapytania = $stmt -> execute();

							$stmt2 = $this->pdo->prepare("update towar set towar.StanMagazynowyDysponowany = towar.StanMagazynowyDysponowany-1 where IdTowar = $idt");
							$stmt2 -> execute();

							$cookie2 = $_COOKIE['idtowary'];
							$cookie2 = stripslashes($cookie2);
							$ids = json_decode($cookie2, true);

							if(($k = array_search($idt, $ids)) === false)
							{
							//  echo 'nie ma';
							}
							else
							{
							  //echo 'jest';
							  $indeks = array_search($idt, $ids);
							}

							$cookie = $_COOKIE['ilosci'];
							$cookie = stripslashes($cookie);
							$quantity = json_decode($cookie, true);
							echo '<br>';
							if(($k = array_search($idt, $ids)) === false){}
							else
							{
								echo '<br>ilosci ';
								var_dump($_COOKIE['ilosci']);
								$ilosc=$ilosc+1;
							  $quantity[$indeks]=$ilosc;
							}
							$dane = json_encode($quantity);
							setcookie('ilosci', $dane,time()+60*60*24*30,'/');
							$_COOKIE['ilosci'] = $dane;
							echo '<br>';
							var_dump($_COOKIE['ilosci']);
						}
					}
					catch(\PDOException $e)
					{
						$data['error'] ="Cos poszlo nie tak";
					}
				return $data;

		}

		public function iloscMinus($id)
		{/*
			var_dump($_COOKIE['idtowary']);
			echo '<br>';
			var_dump($_COOKIE['ilosci']);
			echo '<br>';*/
			$data = array();
				if($id === NULL || $id === "")
					$data['error'] = 'Nieokreślone ID!';
				else
					try
					{
						$stmt2 = $this->pdo->prepare('SELECT IdTowar, ilosc FROM `koszyk` where IdTowar=:id');
						$stmt2 -> bindValue(':id',$id,PDO::PARAM_INT);
						$ilosc = $stmt2 -> execute();
						$data = $stmt2 -> fetchAll();
						foreach($data as $result)
						{
							$ilosc = $result['ilosc'];
							$idt = $result['IdTowar'];
						}
						if($ilosc>1)
						{
							echo $id.'<br>towary: ';
							var_dump($_COOKIE['idtowary']);
							$stmt = $this->pdo->prepare('UPDATE koszyk SET ilosc=ilosc-1 WHERE IdTowar=:id');
							$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
							$wynik_zapytania = $stmt -> execute();

							$stmt2 = $this->pdo->prepare("update towar set towar.StanMagazynowyDysponowany = towar.StanMagazynowyDysponowany+1 where IdTowar = $idt");
							$stmt2 -> execute();

							$cookie2 = $_COOKIE['idtowary'];
							$cookie2 = stripslashes($cookie2);
							$ids = json_decode($cookie2, true);

							if(($k = array_search($idt, $ids)) === false)
							{
							//  echo 'nie ma';
							}
							else
							{
							  //echo 'jest';
							  $indeks = array_search($idt, $ids);
							}

							$cookie = $_COOKIE['ilosci'];
							$cookie = stripslashes($cookie);
							$quantity = json_decode($cookie, true);
							echo '<br>';
							if(($k = array_search($idt, $ids)) === false){}
							else
							{
								echo '<br>ilosci ';
								var_dump($_COOKIE['ilosci']);
								$ilosc=$ilosc-1;
							  $quantity[$indeks]=$ilosc;
							}
							$dane = json_encode($quantity);
							setcookie('ilosci', $dane,time()+60*60*24*30,'/');
							$_COOKIE['ilosci'] = $dane;
							echo '<br>';
							var_dump($_COOKIE['ilosci']);
						}
					}
					catch(\PDOException $e)
					{
						$data['error'] =$data['error'].'<br> Błąd wykonywania operacji usunięcia';
					}
					/*var_dump($_COOKIE['idtowary']);
					echo '<br>';
					var_dump($_COOKIE['ilosci']);
					echo '<br>';*/
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
						$stmt2 = $this->pdo->prepare('SELECT IdTowar, ilosc FROM `koszyk` where IdTowar=:id');
						$stmt2 -> bindValue(':id',$id,PDO::PARAM_INT);
						$stmt2 -> execute();
						$data = $stmt2 -> fetchAll();
						foreach($data as $result)
						{
							$idt = $result['IdTowar'];
							$ilosc = $result['ilosc'];
						}
						$stmt2 = $this->pdo->prepare("update towar set towar.StanMagazynowyDysponowany = towar.StanMagazynowyDysponowany+$ilosc where IdTowar = $idt");
						$stmt2 -> execute();

						$stmt = $this->pdo->prepare('DELETE FROM `koszyk` WHERE IdTowar=:id');
				    $stmt -> bindValue(':id',$id,PDO::PARAM_INT);
				    $wynik_zapytania = $stmt -> execute();

						$cookie2 = $_COOKIE['idtowary'];
						$cookie2 = stripslashes($cookie2);
						$ids = json_decode($cookie2, true);
						//d($ids);
						if(($k = array_search($idt, $ids)) === false)
						{
						//  echo 'nie ma';
						}
						else
						{
							$indeks = array_search($idt, $ids);
							unset($ids[$indeks]);
						}
						$d = array();
						foreach($ids as $key)$d[]=$key;
						//d($d);
						$ids=$d;
						$dane = json_encode($ids);
						setcookie('idtowary', $dane,time()+60*60*24*30,'/');
						$_COOKIE['idtowary'] = $dane;

						$cookie = $_COOKIE['ilosci'];
						$cookie = stripslashes($cookie);
						$quantity = json_decode($cookie, true);
						unset($quantity[$indeks]);
						$d = array();
						foreach($quantity as $key)$d[]=$key;
						//d($d);
						$quantity=$d;
						$dane = json_encode($quantity);
						setcookie('ilosci', $dane,time()+60*60*24*30,'/');
						$_COOKIE['ilosci'] = $dane;

						$cookie = $_COOKIE['ceny'];
						$cookie = stripslashes($cookie);
						$price = json_decode($cookie, true);
						unset($price[$indeks]);
						$d = array();
						foreach($price as $key)$d[]=$key;
						//d($d);
						$price=$d;
						$dane = json_encode($price);
						setcookie('ceny', $dane,time()+60*60*24*30,'/');
						$_COOKIE['ceny'] = $dane;
					}
					catch(\PDOException $e)
					{
						$data['error'] =$data['error'].'<br> Błąd wykonywania operacji usunięcia';
					}
				return $data;

		}
		public function koszyk($IdTowar,$ilosc,$cena)
    {
			$blad=false;
			$data = array();
			$data['error']="";
			$_SESSION['errorCennik']="";
			if($cena === '')
			{
				$_SESSION['errorCennik']='Towar nie posiada cennika!';
				$data['error'] .= 'Towar nie posiada cennika! <br>';
				$blad=true;
			}
			else
			{
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
				if($cena === null || $cena === "")
				{
					$data['error'] .='Nieokreślona cena! <br>';
					$blad=true;
				}
			}	
			if(!$blad)
			{
				if(!isset($_COOKIE['idtowary']))
				{
				  $ids = array();
					$ids[] = $IdTowar;
					//echo '<br>id: ';
					//var_dump($ids);
				  $dane = json_encode($ids);
				  setcookie('idtowary', $dane,time()+60*60*24*30,'/');
				  $_COOKIE['idtowary'] = $dane;
					//var_dump($_COOKIE['idtowary']);
					if(!isset($_COOKIE['ilosci']))
					{
						$quantity = array();
						$quantity[] = $ilosc;
						//echo '<br>ilosc: ';
						//var_dump($quantity);
						$dane = json_encode($quantity);
						setcookie('ilosci', $dane,time()+60*60*24*30,'/');
						$_COOKIE['ilosci'] = $dane;
						//var_dump($_COOKIE['ilosci']);
					}
					else
					{
						$cookie = $_COOKIE['ilosci'];
						$cookie = stripslashes($cookie);
						$quantity = json_decode($cookie, true);
						$quantity[] = $ilosc;
						//echo '<br>ilosc: ';
						//var_dump($quantity);
						$dane = json_encode($quantity);
						setcookie('ilosci', $dane,time()+60*60*24*30,'/');
						$_COOKIE['ilosci'] = $dane;
						//var_dump($_COOKIE['ilosci']);
					}

					if(!isset($_COOKIE['ceny']))
					{
						$price = array();
						$price[] = $cena;
						//echo '<br>cena: ';
						//var_dump($price);
						$dane = json_encode($price);
						setcookie('ceny', $dane,time()+60*60*24*30,'/');
						$_COOKIE['ceny'] = $dane;
						//var_dump($_COOKIE['ceny']);
					}
					else
					{
						$cookie = $_COOKIE['ceny'];
						$cookie = stripslashes($cookie);
						$price = json_decode($cookie, true);
						$price[] = $cena;
						//echo '<br>cena: ';
						//var_dump($price);
						$dane = json_encode($price);
						setcookie('ceny', $dane,time()+60*60*24*30,'/');
						$_COOKIE['ceny'] = $dane;
						//var_dump($_COOKIE['ceny']);
					}
				}
				else
				{
				  $cookie = $_COOKIE['idtowary'];
				  $cookie = stripslashes($cookie);
				  $ids = json_decode($cookie, true);
					if (!in_array($IdTowar, $ids))
					{
						$ids[] = $IdTowar;
						//echo '<br>id: ';
						//var_dump($ids);
						$dane = json_encode($ids);
						setcookie('idtowary', $dane,time()+60*60*24*30,'/');
						$_COOKIE['idtowary'] = $dane;
						//var_dump($_COOKIE['idtowary']);
						if(!isset($_COOKIE['ilosci']))
						{
							$quantity = array();
							$quantity[] = $ilosc;
							//echo '<br>ilosc: ';
							//var_dump($quantity);
							$dane = json_encode($quantity);
							setcookie('ilosci', $dane,time()+60*60*24*30,'/');
							$_COOKIE['ilosci'] = $dane;
							//var_dump($_COOKIE['ilosci']);
						}
						else
						{
							$cookie = $_COOKIE['ilosci'];
							$cookie = stripslashes($cookie);
							$quantity = json_decode($cookie, true);
							$quantity[] = $ilosc;
							//echo '<br>ilosc: ';
							//var_dump($quantity);
							$dane = json_encode($quantity);
							setcookie('ilosci', $dane,time()+60*60*24*30,'/');
							$_COOKIE['ilosci'] = $dane;
							//var_dump($_COOKIE['ilosci']);
						}

						if(!isset($_COOKIE['ceny']))
						{
							$price = array();
							$price[] = $cena;
							//echo '<br>cena: ';
							//var_dump($price);
							$dane = json_encode($price);
							setcookie('ceny', $dane,time()+60*60*24*30,'/');
							$_COOKIE['ceny'] = $dane;
							//var_dump($_COOKIE['ceny']);
						}
						else
						{
							$cookie = $_COOKIE['ceny'];
							$cookie = stripslashes($cookie);
							$price = json_decode($cookie, true);
							$price[] = $cena;
							//echo '<br>cena: ';
							//var_dump($price);
							$dane = json_encode($price);
							setcookie('ceny', $dane,time()+60*60*24*30,'/');
							$_COOKIE['ceny'] = $dane;
							//var_dump($_COOKIE['ceny']);
						}
					}
				}/*
				echo '<br>id: ';
				var_dump($_COOKIE['idtowary']);
				echo '<br>ilosci: ';
				var_dump($_COOKIE['ilosci']);*/
				//echo $IdTowar;
				//echo $ilosc;
				$cookie = $_COOKIE['idtowary'];
				$cookie = stripslashes($cookie);
				$ids = json_decode($cookie, true);

				$cookie = $_COOKIE['ilosci'];
				$cookie = stripslashes($cookie);
				$quantity = json_decode($cookie, true);

				$cookie = $_COOKIE['ceny'];
				$cookie = stripslashes($cookie);
				$price = json_decode($cookie, true);

				foreach (array_combine($ids, $quantity) as $towar => $ile)
				{
						echo 'towar ';
						echo 'id: '.$towar;
				    echo ',';
				    echo 'ilosc: '.$ile;
				    echo '<br>';
						echo 'login: '.$_SESSION['login'];
						echo '<br>';
				}
					try
          {

							$stmt2 = $this->pdo->prepare('select * from `koszyk` where IdTowar=:IdTowar');
							$stmt2 -> bindValue(':IdTowar',$IdTowar,PDO::PARAM_INT);
							$czyJuzJest = $stmt2 -> execute();
							//var_dump($stmt2);
							$i = $stmt2->fetchColumn();
							$klient = $_SESSION['login'];

							if($i == null)
							{
								$stmt = $this->pdo->prepare('insert into `koszyk`(`IdTowar`,`ilosc`,`cena`) values(:IdTowar,:ilosc,:cena);');
								$stmt -> bindValue(':IdTowar',$IdTowar,PDO::PARAM_INT);
								$stmt -> bindValue(':ilosc',$ilosc,PDO::PARAM_INT);
								$stmt -> bindValue(':cena',$cena,PDO::PARAM_INT);
								$wynik_zapytania = $stmt -> execute();

								$stmt2 = $this->pdo->prepare("update towar set towar.StanMagazynowyDysponowany = towar.StanMagazynowyDysponowany-$ilosc where IdTowar = $IdTowar");
								$stmt2 -> execute();
							}
          }
          catch(\PDOException $e)
          {
              $data['error'] = 'Błąd odczytu danych z bazy! '.$e;
							return $data;
          }
				}
				else return $data;
    	}

			public function freeze($id)
			{
					$data = array();
						try
						{
							$stmt = $this->pdo->prepare('UPDATE `towar` SET `Freeze`=:Freeze WHERE `IdTowar`=:id');
							$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
							$stmt -> bindValue(':Freeze',1,PDO::PARAM_INT);
							$wynik_zapytania = $stmt -> execute();
						}
						catch(\PDOException $e)
						{
							$data['error'].='Błąd zapisu danych do bazy! <br>';
							return $data;
						}

		}

			public function unfreeze($id)
			{
				$blad=false;
				$data = array();
				$data['error']="";
				if($id === null || $id === "")
				{
					$data['error'] .= 'Nieokreślone id! <br>';
					$blad=true;
				}
					if(!$blad)
					{
						try
						{
							$stmt = $this->pdo->prepare('UPDATE `towar` SET `Freeze`=:Freeze WHERE `IdTowar`=:id');
							$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
							$stmt -> bindValue(':Freeze',0,PDO::PARAM_INT);
							$wynik_zapytania = $stmt -> execute();
						}
						catch(\PDOException $e)
						{
							$data['error'].='Błąd zapisu danych do bazy! <br>';
							return $data;
						}
			}


  }
}
?>
