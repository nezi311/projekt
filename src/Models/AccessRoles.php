<?php
	namespace Models;
	use \PDO;
	class AccessRoles extends Model
	{
		public function login($login, $password)
		{
			//tutaj powinno nastąpić weryfikacja podanych danych
			//z tymi zapisanymi w bazie

			$data=array();
			$data['error']="";

			if(!$this->pdo)
      {
				$data['error'].='Połączenie z bazą nie powidoło się! <br>';
			}
			if($login=="" || $login===null)
			{
				$data['error'].='Nie podano loginu! <br>';
			}
			if($password=="" || $password===null)
			{
				$data['error'].='Nie podano hasła! <br>';
			}
      else
      {
        try
        {
          $user=array();
          $stmt = $this->pdo->prepare('SELECT * FROM `Pracownicy` WHERE `login`=:login');
          $stmt->bindValue(':login', $login, PDO::PARAM_STR);
          $result = $stmt->execute();
          $user = $stmt->fetchAll();
          $stmt->closeCursor();

          //d($user[0]);

					if(!$user)
					{
						$data['error'].= 'Błędny login lub hasło! <br>';
						return $data;
						//return 1
					}
					else
					{
						if(strcmp($password, $user[0]['haslo'])===0)
						{
							if($user[0]['aktywny'] == 1)
							{
								\Tools\AccessRoles::login($login,$user[0]['uprawnienia'],$user[0]['id']);
								//d($_SESSION);
								//return 0;
								if(isset($_COOKIE['ilosci']) and isset($_COOKIE['idtowary']))
								{
									$cookie = $_COOKIE['idtowary'];
									$cookie = stripslashes($cookie);
									$ids = json_decode($cookie, true);

									$cookie = $_COOKIE['ilosci'];
									$cookie = stripslashes($cookie);
									$quantity = json_decode($cookie, true);

									$stmt2 = $this->pdo->prepare('truncate table koszyk');
									$stmt2 -> execute();

										foreach (array_combine($ids, $quantity) as $towar => $ile)
										{
											$stmt = $this->pdo->prepare('insert into `koszyk`(`IdTowar`,`ilosc`,`klient`) values(:IdTowar,:ilosc,1);');
											$stmt -> bindValue(':IdTowar',$towar,PDO::PARAM_INT);
											$stmt -> bindValue(':ilosc',$ile,PDO::PARAM_INT);
											$wynik_zapytania = $stmt -> execute();
										}
								}
							}
							else
							{
								$data['error'].='Twoje konto jest nieaktywne! Zgłoś się administratora systemu w celu jego odblokowania. <br>';
							}

							return $data;
						}
						else
						{
							$data['error'].= 'Błędny login lub hasło! <br>';
							//return 1;
							return $data;
						}
					}


        }
        catch(\PDOException $e)
        {
          $data['error'].= 'Błąd odczytu danych z bazy! ';
          //return 1;
					return $data;
        }

        //return 1;
				return $data;
      }
		}
		public function logout()
		{
			\Tools\AccessRoles::logout();
		}
	}
