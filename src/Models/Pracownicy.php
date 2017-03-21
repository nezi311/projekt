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
							$stmt = $this->pdo->prepare("SELECT * FROM pracownicy WHERE id=:id");
							$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
							$stmt -> execute();
							$pracownik = $stmt -> fetchAll();
							$liczba_wierszy = $stmt->rowCount();
							$stmt->closeCursor();
							if($pracownik && !empty($pracownik))
									$data['pracownik'] = $pracownik;
							else
									$data['pracownik'] = array();

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

		public function reset($id ,$pass1, $pass2)
		{
			$data = array();
			if($id === NULL || $id === "")
					$data['error'] = 'Nieokreślone id!';
					if($pass1 === NULL || $pass1 === "")
							$data['error'] = 'Nieokreślone hasło nr. 1!';
							if($pass2 === NULL || $pass2 === "")
									$data['error'] = 'Nieokreślone hasło nr. 2!';
									if(strcmp($pass1,$pass2)!==0)
											$data['error'] = 'Hasło nr.1 i hasło nr. 2 są różne!';
			else
			{

				try
				{
					$stmt = $this->pdo->prepare('UPDATE `pracownicy` SET `haslo`= :haslo WHERE `id`=:id');
					$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
					$md5password = md5($pass1);
					$stmt -> bindValue(':haslo',$md5password,PDO::PARAM_STR);
					$wynik_zapytania = $stmt -> execute();
				}
				catch(\PDOException $e)
				{
					if(isset($data['error']))
						$data['error'] =$data['error'].'<br> Błąd zapisu danych do bazy!';
					else
						$data['error'] ='<br> Błąd zapisu danych do bazy!';
				}

			}
			return $data;

		}

		public function update($id,$imie,$nazwisko,$dzial,$stanowisko,$telefon,$uprawnienia)
		{
			$data = array();
			if($id === NULL || $id === "")
					$data['error'] = 'Nieokreślone id!';
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
																if($uprawnienia === NULL || $uprawnienia === "")
																		$data['error'] = 'Nieokreślone uprawnienia';
				else
				{
					try
					{
						$stmt = $this->pdo->prepare('UPDATE `pracownicy` SET `imie`=:imie,`nazwisko`=:nazwisko,`dzial`=:dzial,`stanowisko`=:stanowisko,`telefon`=:telefon,`uprawnienia`=:role WHERE `id`=:id');
						$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
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
				}

				return $data;
		}

		public function zmienAktywnosc($id)
		{
			$data = array();
			if($id === NULL || $id === "")
					$data['error'] = 'Nieokreślone id!';
				else
				{

						try
						{
							$tempArray=array();
							$tempArray=$this->getOne($id);

							//d($tempArray['pracownik'][0]['aktywny']);

							$stmt = $this->pdo->prepare('UPDATE `pracownicy` SET `aktywny`= :aktywny WHERE `id`=:id');
							$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
							if($tempArray['pracownik'][0]['aktywny']==0)
							{
								$stmt -> bindValue(':aktywny',1,PDO::PARAM_INT);
							}
							else
							{
								$stmt -> bindValue(':aktywny',0,PDO::PARAM_INT);
							}
							$wynik_zapytania = $stmt -> execute();
						}
						catch(\PDOException $e)
						{
							if(isset($data['error']))
								$data['error'] =$data['error'].'<br> Błąd zapisu danych do bazy!';
							else
								$data['error'] ='<br> Błąd zapisu danych do bazy!';
						}

				}
				return $data;
		}

  }

?>
