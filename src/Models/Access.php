<?php
	namespace Models;
	use \PDO;

	// ** Dawid Dominiak **//
	class Access extends Model
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
          $user=null;
          $stmt = $this->pdo->prepare('SELECT * FROM `uzytkownik` WHERE (`login`=:login) AND (`haslo`=:haslo)');
          $stmt->bindValue(':login', $login, PDO::PARAM_STR);
					$stmt->bindValue(':login', $haslo, PDO::PARAM_STR);
          $result = $stmt->execute();
          $user = $stmt->fetchAll();
          $rows = $stmt->rowCount();
          $stmt->closeCursor();

          if($rows==1)
          {
            \Tools\Access::login($login);
            return 0;
          }
          else
          {
            return 1;
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
			\Tools\Access::logout();
		}
	}
