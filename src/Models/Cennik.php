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

	public function insert($towar,$cena,$opis,$dataOd,$dataDo)
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
				if($dataDo===null)
					$stmt = $this->pdo->prepare('INSERT INTO cennik (idTowar,opis,Cena,dataOd,dataDo) VALUES (:idTowar,:opis,:Cena,:dataOd,:dataDo) ');
				else
					$stmt = $this->pdo->prepare('INSERT INTO cennik (idTowar,opis,Cena,dataOd) VALUES (:idTowar,:opis,:Cena,:dataOd) ');
				$stmt -> bindValue(':idTowar',$towar,PDO::PARAM_INT);
				$stmt -> bindValue(':Cena',$cena,PDO::PARAM_STR);
				$stmt -> bindValue(':opis',$opis,PDO::PARAM_STR);
				//$datee=date("Y-m-d");
				$stmt -> bindValue(':dataOd',$dataOd,PDO::PARAM_STR);
				if($dataDo===null)
					$stmt -> bindValue(':dataDo',$dataDo,PDO::PARAM_STR);
				$wynik_zapytania = $stmt -> execute();

				$idCennika = $this->pdo->lastInsertId();;

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

	public function insertNew($towar,$idCennikByly,$cena,$opis,$dataOd,$dataDo)
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

				$stmt = $this->pdo->prepare('UPDATE Cennik SET dataDo = :dataDo WHERE idCennik=:idCennik');
				$stmt -> bindValue(':dataDo',$dataOd,PDO::PARAM_STR);
				$stmt -> bindValue(':idCennik',$idCennikByly,PDO::PARAM_INT);
				$stmt -> execute();


				if($dataDo===null)
					$stmt = $this->pdo->prepare('INSERT INTO cennik (idTowar,opis,Cena,dataOd,dataDo) VALUES (:idTowar,:opis,:Cena,:dataOd,:dataDo) ');
				else
					$stmt = $this->pdo->prepare('INSERT INTO cennik (idTowar,opis,Cena,dataOd) VALUES (:idTowar,:opis,:Cena,:dataOd) ');
				$stmt -> bindValue(':idTowar',$towar,PDO::PARAM_INT);
				$stmt -> bindValue(':Cena',$cena,PDO::PARAM_STR);
				$stmt -> bindValue(':opis',$opis,PDO::PARAM_STR);
				//$datee=date("Y-m-d");
				$stmt -> bindValue(':dataOd',$dataOd,PDO::PARAM_STR);
				if($dataDo===null)
					$stmt -> bindValue(':dataDo',$dataDo,PDO::PARAM_STR);
				$wynik_zapytania = $stmt -> execute();

				$idCennika = $this->pdo->lastInsertId();;

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





}
?>
