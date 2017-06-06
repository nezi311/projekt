<?php
	namespace Models;
	use \PDO;
	class Cennik extends Model
	{

    public function getAll()
    {
      $data = array();
      if(!$this->pdo)
          $data['error'] = 'Połączenie z bazą nie powidoło się!';
      else
          try
          {
              $stmt = $this->pdo->query("SELECT * FROM cennik");
              $Cenniki = $stmt->fetchAll();
              $stmt->closeCursor();
              if($Cenniki && !empty($Cenniki))
                  $data['Cenniki'] = $Cenniki;
              else
                  $data['Cenniki'] = array();
          }
          catch(\PDOException $e)
          {
              $data['error'] = 'Błąd odczytu danych z bazy! ';
          }
      return $data;
    }

	public function insert($towar,$cena,$opis,$dataOd)
	{
		$blad=false;
		$data = array();
		$data['error']="";
		if($dataOd === null || $dataOd === "")
		{
			$data['error'] .= 'Nieokreślona data dostępności cennika! <br>';
			$blad=true;
		}
		if($towar === null || $towar === "")
		{
			$data['error'] .= 'Nieokreślone id towaru! <br>';
			$blad=true;
		}
		if($cena === null || $cena === "")
		{
			$data['error'] .='Nieokreślona cena towaru! <br>';
			$blad=true;
		}
		if(!$blad)
		{
			try
			{
				$this->pdo->beginTransaction();
				$stmt = $this->pdo->prepare('INSERT INTO cennik (idTowar,opis,cena,dataOd) VALUES (:idTowar,:opis,:Cena,:dataOd)');
				$stmt -> bindValue(':idTowar',$towar,PDO::PARAM_INT);
				$stmt -> bindValue(':Cena',$cena,PDO::PARAM_STR);
				$stmt -> bindValue(':opis',$opis,PDO::PARAM_STR);
				//$datee=date("Y-m-d");
				$stmt -> bindValue(':dataOd',$dataOd,PDO::PARAM_STR);
				$wynik_zapytania = $stmt -> execute();

				$idCennika = $this->pdo->lastInsertId();

				$stmt = $this->pdo->prepare('UPDATE Towar SET Cena = :CennikId WHERE IdTowar=:idTowar');
				$stmt -> bindValue(':idTowar',$towar,PDO::PARAM_INT);
				$stmt -> bindValue(':CennikId',$idCennika,PDO::PARAM_STR);
				$wynik_zapytania=$stmt->execute();

				$this->pdo->commit();



			}
			catch(\PDOException $e)
			{
				$this->pdo->rollback();
				$data['error'] .='Błąd zapisu danych do bazy! <br>';
				return $data;
			}

	}
		return $data;
	}


	public function historiaCeny($towar)
	{
				$blad=false;
				$data = array();
				$data['error']="";

				if($towar === null || $towar === "")
				{
					$data['error'] .= 'Nieokreślone id towaru! <br>';
					$blad=true;
				}
				if(!$blad)
				{
					try
					{

						$stmt = $this->pdo->prepare('SELECT * FROM cennik INNER JOIN Towar ON cennik.idTowar = Towar.idTowar WHERE cennik.idTowar=:idTowar ORDER BY cennik.dataOd DESC');
						$stmt -> bindValue(':idTowar',$towar,PDO::PARAM_INT);
						$wynik_zapytania = $stmt -> execute();
						$data['historiaCeny']=$stmt->fetchAll();
					}
					catch(\PDOException $e)
					{
						$data['error'] .='Błąd zapisu danych do bazy! <br>';
						return $data;
					}

			}
				return $data;
	}

	public function dajCene($idTowar,$dataZakupu)
	{

			$blad=false;
			$data = array();
			$data['error']="";

			if($idTowar === null || $idTowar === "")
			{
				$data['error'] .= 'Nieokreślone id cennika! <br>';
				$blad=true;
			}
			if($dataZakupu === null || $dataZakupu === "")
			{
				$data['error'] .= 'Nieokreślona data! <br>';
				$blad=true;
			}
			if(!$blad)
			{
				try
				{
					$datee = date("Y-m-d");
					$stmt = $this->pdo->prepare('SELECT * FROM cennik WHERE idTowar=:idTowar AND (:dataZakupu BETWEEN IFNULL(dataOd,:pomocniczaDataOd) AND IFNULL(dataDo,:obecnaData))');
					$stmt -> bindValue(':idTowar',$idTowar,PDO::PARAM_INT);
					$stmt -> bindValue(':dataZakupu',$dataZakupu,PDO::PARAM_STR);
					$stmt -> bindValue(':pomocniczaDataOd','1900-01-01',PDO::PARAM_STR);
					$stmt -> bindValue(':obecnaData',$datee,PDO::PARAM_STR);

					$wynik_zapytania = $stmt -> execute();
					$temp=$stmt->fetchAll();
					$data['cena']=$temp['cena'];
				}
				catch(\PDOException $e)
				{
					$data['error'] .='Błąd odczytu danych do bazy! <br>';
					return $data;
				}

		}
			return $data;

	}


	public function zmienStanAktywnosc($idCennik)
	{
				$blad=false;
				$data = array();
				$data['error']="";

				if($idCennik === null || $idCennik === "")
				{
					$data['error'] .= 'Nieokreślone id cennika! <br>';
					$blad=true;
				}
				if(!$blad)
				{
					try
					{
						$stmt = $this->pdo->prepare('SELECT * FROM cennik WHERE idcennik=:idCennik');
						$stmt -> bindValue(':idCennik',$idCennik,PDO::PARAM_INT);
						$wynik_zapytania = $stmt -> execute();
						$data=$stmt->fetchAll();

						if($data['aktualny']=="T")
							$aktualny='N';
						else
							$aktualny='T';


						$stmt = $this->pdo->prepare('UPDATE cennik SET aktualny=:aktualny WHERE idcennik=:idCennik');
						$stmt -> bindValue(':idCennik',$idCennik,PDO::PARAM_INT);
						$stmt -> bindValue(':aktualny',$aktualny,PDO::PARAM_STR);
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

	public function insertNew($towar,$idCennikByly,$cena,$opis,$dataOd)
	{
		$blad=false;
		$data = array();
		$data['error']="";
		if($idCennikByly === null || $idCennikByly === "")
		{
			$data['error'] .= 'Nieokreślone id byłego cennika! <br>';
			$blad=true;
		}
		if($dataOd === null || $dataOd === "")
		{
			$data['error'] .= 'Nieokreślona data dostępności cennika! <br>';
			$blad=true;
		}
		if($towar === null || $towar === "")
		{
			$data['error'] .= 'Nieokreślone id towaru! <br>';
			$blad=true;
		}
		if($cena === null || $cena === "")
		{
			$data['error'] .='Nieokreślona cena towaru! <br>';
			$blad=true;
		}
		if(!$blad)
		{
			try
			{

				$this->pdo->beginTransaction();



				$stmt = $this->pdo->prepare('SELECT dataOd FROM cennik WHERE idCennik=:idCennik');
				$stmt -> bindValue(':idCennik',$idCennikByly,PDO::PARAM_INT);
				$stmt->execute();
				$data['cennik'] = $stmt->fetchAll();
				$stmt->closeCursor();



				//d($data);
				//$data['cennik'][0]['dataOd']<=$dataOd
				if(strtotime($data['cennik'][0]['dataOd'])<=strtotime($dataOd))
				{
						$stmt = $this->pdo->prepare('UPDATE cennik SET dataDo=:dataDo WHERE idCennik=:idCennik');
						$stmt->bindValue(':dataDo',date("Y-m-d",strtotime($dataOd . ' -1 day')),PDO::PARAM_STR);
						$stmt->bindValue(':idCennik',$idCennikByly,PDO::PARAM_INT);
						$stmt->execute();
						$stmt->closeCursor();


						$stmt = $this->pdo->prepare('INSERT INTO cennik (idTowar,opis,cena,dataOd) VALUES (:idTowar,:opis,:Cena,:dataOd)');
						$stmt -> bindValue(':idTowar',$towar,PDO::PARAM_INT);
						$stmt -> bindValue(':Cena',$cena,PDO::PARAM_STR);
						$stmt -> bindValue(':opis',$opis,PDO::PARAM_STR);
						$stmt -> bindValue(':dataOd',$dataOd,PDO::PARAM_STR);


						$wynik_zapytania=$stmt->execute();
						$stmt->closeCursor();


				}
				else
				{
						$data['error'] .='Data od nie może być mniejsza od daty poprzedniego cennika! <br>';
						$this->pdo->rollback();
						return $data;
				}

				$this->pdo->commit();



			}
			catch(\PDOException $e)
			{
				$this->pdo->rollback();
				$data['error'] .='Błąd zapisu danych do bazy! <br>';
				return $data;
			}

	}
		return $data;
	}





}
?>
