<?php
	namespace Models;
	use \PDO;
	class Pracownicy extends Model
	{
    public function getAll()
    {
      $data = array();
      if(!$this->pdo)
          $data['error'] = 'Połączenie z bazą nie powidoło się!';
      else
          try
          {
              $autorzy = array();
              $stmt = $this->pdo->query("SELECT * FROM pracownicy");
              $pracownicy = $stmt->fetchAll();
              $stmt->closeCursor();
              if($pracownicy && !empty($pracownicy))
                  $data['pracownicy'] = $pracownicy;
              else
                  $data['pracownicy'] = array();
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
						$stmt = $this->pdo->prepare('DELETE FROM `pracownicy` WHERE id=:id');
				    $stmt -> bindValue(':id',$id,PDO::PARAM_INT);
				    $wynik_zapytania = $stmt -> execute();
					}
					catch(\PDOException $e)
					{
						$data['error'] =$data['error'].'<br> Błąd wykonywania operacji usunięcia';
					}
				return $data;

		}

		public function insert($imie,$nazwisko,$dzial,$stanowisko,$telefon,$login,$haslo,$uprawnienia)
		{
			$data = array();
			if($imie === NULL || $imie === "")
					$data['error'] = 'Nieokreślone imię!';
					if($nazwisko === NULL || $nazwisko === "")
								$data['error'] =$data['error'].'<br> Nieokreślone nazwisko!';
								if($dzial === NULL || $dzial === "")
										$data['error'] = 'Nieokreślony dział';
										if($stanowisko === NULL || $stanowisko === "")
												$data['error'] = 'Nieokreślone stanowisko';
												if($telefon === NULL || $telefon === "")
														$data['error'] = 'Nieokreślony nr telefonu';
														if($login === NULL || $login === "")
																$data['error'] = 'Nieokreślony login';
																if($haslo === NULL || $haslo === "")
																		$data['error'] = 'Nieokreślone hasło';
																		if($uprawnienia === NULL || $uprawnienia === "")
																				$data['error'] = 'Nieokreślone uprawnienia';


			else
			try
			{
				$stmt = $this->pdo->prepare('INSERT INTO `pracownicy`(`imie`,`nazwisko`,`dzial`,`stanowisko`,`telefon`,`login`,`haslo`,`uprawnienia`) VALUES (:imie,:nazwisko,:dzial,:stanowisko,:telefon,:login,:password,:role)');
		    $stmt -> bindValue(':login',$login,PDO::PARAM_STR);
		    $md5password = md5($haslo);
		    $stmt -> bindValue(':password',$md5password,PDO::PARAM_STR);
		    $stmt -> bindValue(':role',$uprawnienia,PDO::PARAM_INT);
		    $stmt -> bindValue(':imie',$imie,PDO::PARAM_STR);
		    $stmt -> bindValue(':nazwisko',$nazwisko,PDO::PARAM_STR);
		    $stmt -> bindValue(':dzial',$dzial,PDO::PARAM_STR);
		    $stmt -> bindValue(':stanowisko',$stanowisko,PDO::PARAM_STR);
		    $stmt -> bindValue(':telefon',$telefon,PDO::PARAM_STR);
		    $wynik_zapytania = $stmt -> execute();
			}
			catch(\PDOException $e)
			{
				$data['error'] =$data['error'].'<br> Błąd zapisu danych do bazy!';
			}
			return $data;

		}

  }

?>
