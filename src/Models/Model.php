<?php
	namespace Models;
	//aby będąc w inne przestrzeni nazw móc korzystać z PDO
	use \PDO;
	abstract class Model{
		//wszystkie operacje na bazie wykonujemy przy pomocy PDO
		protected $pdo;

		public function  __construct() {
			//konstruktor modelu łaczy się z bazą danych
			try {
				//dane dostępu do bazy znajdują się w pliku konfiguracyjnym

                /**
                   //konfiguracja uproszczona
                   $path='cfg'.DIRECTORY_SEPARATOR.'dbcfg.php';
				   require $path;
				   $this->pdo=$pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database, $username, $password );
				   //włączenie raportowania błędów
				   $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                */
				$this->pdo = \Config\Database\dbconfig::getHandle();
			}
			catch(\PDOException $e) {
                $this->pdo = null;
			}
		}

		public function getModel($name)
		{
			$name = 'Models\\'.$name;
						if(class_exists($name))
								return new $name();
						return null;
		}
	}
?>
