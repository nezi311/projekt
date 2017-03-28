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
          $stmt = $this->pdo->prepare('SELECT * FROM `pracownicy` WHERE `login`=:login');
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
