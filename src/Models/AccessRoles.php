<?php
	namespace Models;
	use \PDO;
	class AccessRoles extends Model
	{
		public function login($login, $password)
		{
			//tutaj powinno nastąpić weryfikacja podanych danych
			//z tymi zapisanymi w bazie
      if(!$this->pdo)
          $data['error'] = 'Połączenie z bazą nie powidoło się!';
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
						$data['error'] = 'Błędny login lub hasło! ';
						return 1;
					}
					else
					{
						if(strcmp($password, $user[0]['haslo'])===0)
						{
							\Tools\AccessRoles::login($login,$user[0]['uprawnienia'],$user[0]['id']);
							//d($_SESSION);
							return 0;
						}
						else
						{
							return 1;
						}
					}


        }
        catch(\PDOException $e)
        {
          $data['error'] = 'Błąd odczytu danych z bazy! ';
          return 1;
        }

        return 1;
      }
		}
		public function logout()
		{
			\Tools\AccessRoles::logout();
		}
	}
