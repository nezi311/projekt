<?php
	namespace Models;
	use \PDO;
	class Klient extends Model
	{
		// ** Dawid Dominiak **//
    public function getAll()
    {
      $data = array();
			$data['error']="";
      if(!$this->pdo)
          $data['error'] .= 'Połączenie z bazą nie powidoło się! <br>';
      else
          try
          {
              $stmt = $this->pdo->query("SELECT `IdKlient`,`Imie`,`Nazwisko` FROM Klient");
              $Klients = $stmt->fetchAll();
              $stmt->closeCursor();
              if($Klients && !empty($Klients))
                  $data['Klienci'] = $Klients;
              else
                  $data['Klienci'] = array();
          }
          catch(\PDOException $e)
          {
              $data['error'] .= 'Błąd odczytu danych z bazy! <br>';
          }
					$data['error'] .= ' ';

      return $data;
    }

		public function getAllShorter()
		{
			//SELECT `IdKlient`,CONCAT(`Imie`,' ',`Nazwisko`) AS DaneKlienta,`NIP`,CONCAT(`KodPocztowy`,' ',`Miasto`,' ',`Ulica`,' ',`Dom`,'/',`Lokal`) AS Adres,`Poczta`,`EMail` FROM Klient
			$data = array();
			$data['error']="";
      if(!$this->pdo)
          $data['error'] .= 'Połączenie z bazą nie powidoło się! <br>';
      else
          try
          {
              $stmt = $this->pdo->query("SELECT `IdKlient`,CONCAT(`Imie`,' ',`Nazwisko`) AS DaneKlienta,`NIP`,CONCAT(`KodPocztowy`,' ',`Miasto`,' ',`Ulica`,' ',`Dom`,'/',`Lokal`) AS Adres,`Poczta`,`EMail` FROM Klient");
              $Klients = $stmt->fetchAll();
              $stmt->closeCursor();
              if($Klients && !empty($Klients))
                  $data['Klient'] = $Klients;
              else
                  $data['Klient'] = array();
          }
          catch(\PDOException $e)
          {
              $data['error'] .= 'Błąd odczytu danych z bazy! <br>';
          }
					$data['error'] .= ' ';

      return $data;
		}


		// ** Dawid Dominiak **//
		public function getOne($id)
		{
			$data = array();
			if($id == NULL || $id == "")
				$data['error'] = 'Nieokreślone ID!';
			else
			if(!$this->pdo)
					$data['error'] = 'Połączenie z bazą nie powidoło się!';
			else
					try
					{
							$stmt = $this->pdo->prepare("SELECT * FROM Klient WHERE id=:id");
							$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
							$stmt -> execute();
							$Klients = $stmt -> fetchAll();
							$liczba_wierszy = $stmt->rowCount();
							$stmt->closeCursor();
							if($Klients && !empty($Klients))
									$data['Klient'] = $Klients;
							else
									$data['Klient'] = array();

							if($liczba_wierszy==0)
								$data['error']="Brak podanego id w bazie danych";
					}
					catch(\PDOException $e)
					{
							$data['error'] = 'Błąd odczytu danych z bazy! ';
					}
			return $data;
		}


		// ** Dawid Dominiak **//
		public function delete($id)
		{
			$data = array();
				if($id == NULL || $id == "")
					$data['error'] = 'Nieokreślone ID!';
				else
					try
					{
						$stmt = $this->pdo->prepare('DELETE FROM `Klient` WHERE id=:id');
				    $stmt -> bindValue(':id',$id,PDO::PARAM_INT);
				    $wynik_zapytania = $stmt -> execute();
					}
					catch(\PDOException $e)
					{
						$data['error'] =$data['error'].'<br> Błąd wykonywania operacji usunięcia';
					}
				return $data;

		}


		// ** Dawid Dominiak **//
		public function insert($imie,$nazwisko,$NIP,$Miasto,$Ulica,$Dom,$Lokal,$KodPocztowy,$Poczta,$Email)
		{
			$blad=false;
			$data = array();
			$data['error']="";
			if(!$this->pdo)
			{
					$data['error'] = 'Połączenie z bazą nie powidoło się!';
					$blad=true;
			}
			if($imie == null || $imie == "")
			{
				$data['error'] .= 'Nieokreślone imię! <br>';
				$blad=true;
			}
			if($nazwisko == null || $nazwisko == "")
			{
				$data['error'] .='Nieokreślone nazwisko! <br>';
				$blad=true;
			}
			if($NIP == null || $NIP == "")
			{
				$data['error'] .= 'Nieokreślony NIP! <br>';
				$blad=true;
			}
			if($Miasto == null || $Miasto == "")
			{
				$data['error'] .= 'Nieokreślone miasto! <br>';
				$blad=true;
			}
			if($Ulica == null || $Ulica == "")
			{
				$data['error'] .= 'Nieokreślona ulica! <br>';
				$blad=true;
			}
			if($Dom == null || $Dom == "")
			{
				$data['error'] .= 'Nieokreślony numer domu! <br>';
				$blad=true;
			}
			if($KodPocztowy == null || $KodPocztowy == "")
			{
				$data['error'] .= 'Nieokreślony kod pocztowy! <br>';
				$blad=true;
			}
			if($Poczta == null || $Poczta == "")
			{
				$data['error'] .= 'Nieokreślona poczta! <br>';
				$blad=true;
			}
			if($Email == null || $Email == "")
			{
				$data['error'] .= 'Nieokreślony Email! <br>';
				$blad=true;
			}
			if(!$blad)
			{
				try
				{
					$stmt = $this->pdo->prepare('INSERT INTO `Klient`(`Imie`,`Nazwisko`,`NIP`,`Miasto`,`Ulica`,`Dom`,`Lokal`,`KodPocztowy`,`Poczta`,`EMail`) VALUES (:Imie,:Nazwisko,:NIP,:Miasto,:Ulica,:Dom,:Lokal,:KodPocztowy,:Poczta,:EMail)');
			    $stmt -> bindValue(':Imie',$imie,PDO::PARAM_STR);
			    $stmt -> bindValue(':Nazwisko',$nazwisko,PDO::PARAM_STR);
			    $stmt -> bindValue(':NIP',$NIP,PDO::PARAM_INT);
			    $stmt -> bindValue(':Miasto',$Miasto,PDO::PARAM_STR);
			    $stmt -> bindValue(':Ulica',$Ulica,PDO::PARAM_STR);
			    $stmt -> bindValue(':Dom',$Dom,PDO::PARAM_STR);
			    $stmt -> bindValue(':Lokal',$Lokal,PDO::PARAM_STR);
			    $stmt -> bindValue(':KodPocztowy',$KodPocztowy,PDO::PARAM_STR);
			    $stmt -> bindValue(':Poczta',$Poczta,PDO::PARAM_STR);
			    $stmt -> bindValue(':EMail',$Email,PDO::PARAM_STR);
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


		// ** Dawid Dominiak **//
		public function update($id,$imie,$nazwisko,$NIP,$Miasto,$Ulica,$Dom,$Lokal,$KodPocztowy,$Poczta,$Email)
		{
			$blad=false;
			$data = array();
			$data['error']="";
			if(!$this->pdo)
			{
					$data['error'] = 'Połączenie z bazą nie powidoło się!';
					$blad=true;
			}
			if($id == null || $id == "")
			{
				$data['error'] .= 'Nieokreślone ID! <br>';
				$blad=true;
			}
			if($imie == null || $imie == "")
			{
				$data['error'] .= 'Nieokreślone imię! <br>';
				$blad=true;
			}
			if($nazwisko == null || $nazwisko == "")
			{
				$data['error'] .='Nieokreślone nazwisko! <br>';
				$blad=true;
			}
			if($NIP == null || $NIP == "")
			{
				$data['error'] .= 'Nieokreślony NIP! <br>';
				$blad=true;
			}
			if($Miasto == null || $Miasto == "")
			{
				$data['error'] .= 'Nieokreślone miasto! <br>';
				$blad=true;
			}
			if($Ulica == null || $Ulica == "")
			{
				$data['error'] .= 'Nieokreślona ulica! <br>';
				$blad=true;
			}
			if($Dom == null || $Dom == "")
			{
				$data['error'] .= 'Nieokreślony numer domu! <br>';
				$blad=true;
			}
			if($KodPocztowy == null || $KodPocztowy == "")
			{
				$data['error'] .= 'Nieokreślony kod pocztowy! <br>';
				$blad=true;
			}
			if($Poczta == null || $Poczta == "")
			{
				$data['error'] .= 'Nieokreślona poczta! <br>';
				$blad=true;
			}
			if($Email == null || $Email == "")
			{
				$data['error'] .= 'Nieokreślony Email! <br>';
				$blad=true;
			}
				if(!$blad)
				{
					try
					{
						//echo("$id,$imie,$nazwisko,$NIP,$Miasto,$Ulica,$Dom,$Lokal,$KodPocztowy,$Poczta,$Email");
						//$stmt = $this->pdo->prepare('UPDATE Klient SET `Imie`=:Imie, `Nazwisko`=:Nazwisko, `NIP`=:NIP, `Miasto`=:Miasto, `Ulica`=:Uluca, `Dom`=:Dom, `Lokal`=:Lokal, `KodPocztowy`=:KodPocztowy, `Poczta`=:Poczta, `EMail`=:EMail WHERE `IdKlient`=:id');
						$stmt = $this->pdo->prepare('UPDATE `Klient` SET `Imie`=:imie,`Nazwisko`=:nazwisko,`NIP`=:nIP,`Miasto`=:miasto,`Ulica`=:ulica,`Dom`=:dom,`Lokal`=:lokal,`KodPocztowy`=:kodPocztowy,`Poczta`=:poczta,`EMail`=:eMail WHERE `IdKlient`=:id');


						$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
						$stmt -> bindValue(':imie',$imie,PDO::PARAM_STR);
				    $stmt -> bindValue(':nazwisko',$nazwisko,PDO::PARAM_STR);
				    $stmt -> bindValue(':nIP',$NIP,PDO::PARAM_INT);
				    $stmt -> bindValue(':miasto',$Miasto,PDO::PARAM_STR);
				    $stmt -> bindValue(':ulica',$Ulica,PDO::PARAM_STR);
				    $stmt -> bindValue(':dom',$Dom,PDO::PARAM_STR);
				    $stmt -> bindValue(':lokal',$Lokal,PDO::PARAM_STR);
				    $stmt -> bindValue(':kodPocztowy',$KodPocztowy,PDO::PARAM_STR);
				    $stmt -> bindValue(':poczta',$Poczta,PDO::PARAM_STR);
				    $stmt -> bindValue(':eMail',$Email,PDO::PARAM_STR);
						$wynik_zapytania = $stmt -> execute();
					}
					catch(\PDOException $e)
					{
						$data['error'].='Błąd zapisu danych do bazy! <br>';
						return $data;
					}
				}

				return $data;
		}


  }

?>
