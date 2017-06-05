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

              $stmt = $this->pdo->query("SELECT * FROM Cennik");
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
				$wynik_zapytania = $stmt -> execute();

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

				$stmt = $this->pdo->prepare('SELECT dataOd FROM Cennik WHERE idCennik=:idCennik');
				$stmt -> bindValue(':idCennik',$idCennikByly,PDO::PARAM_INT);
				$stmt->execute();
				$data['cennik'] = $stmt->fetchAll();

				if($data['cennik'][0]['dataOd']<=$dataOd)
				{
						$stmt = $this->pdo->prepare('UPDATE Cennik SET dataDo =:dataDo, aktualny=:aktualny WHERE idCennik=:idCennik');
						$stmt -> bindValue(':dataDo',$dataOd,PDO::PARAM_STR);
						$stmt -> bindValue(':idCennik',$idCennikByly,PDO::PARAM_INT);
						if($dataOd!="")
							if(date("Y-m-d")>=$dataOd)
								$stmt->bindValue(':aktualny','N',PDO::PARAM_STR);
							else
								$stmt->bindValue(':aktualny','T',PDO::PARAM_STR);

						$stmt->execute();


						$stmt = $this->pdo->prepare('INSERT INTO Cennik (idTowar,opis,cena,dataOd,aktualny) VALUES (:idTowar,:opis,:Cena,:dataOd,:aktualny)');
						$stmt -> bindValue(':idTowar',$towar,PDO::PARAM_INT);
						$stmt -> bindValue(':Cena',$cena,PDO::PARAM_STR);
						$stmt -> bindValue(':opis',$opis,PDO::PARAM_STR);
						$stmt -> bindValue(':dataOd',$dataOd,PDO::PARAM_STR);
						if($dataOd!="")
							if(date("Y-m-d")<=$dataOd)
								$stmt -> bindValue(':aktualny','N',PDO::PARAM_INT);
							else
								$stmt -> bindValue(':aktualny','T',PDO::PARAM_INT);

						$wynik_zapytania=$stmt->execute();

						$idCennika = $this->pdo->lastInsertId();
						if($dataOd!="")
							if(date("Y-m-d")>=$dataOd)
						{
							$stmt = $this->pdo->prepare('UPDATE Towar SET Cena =:CennikId WHERE IdTowar=:idTowar');
							$stmt -> bindValue(':idTowar',$towar,PDO::PARAM_INT);
							$stmt -> bindValue(':CennikId',$idCennika,PDO::PARAM_INT;
							$wynik_zapytania = $stmt -> execute();
						}
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
