<?php
//Michał Dodot
// pawel
// Dawid Dominiak Zmiana 1

	require_once('vendor/autoload.php');
	//use Config\Database\DBConfig as DB;
	\Config\Database\DBConfig::setDBConfig();
	//przykład uwzględnia obsługę jednego kontrolera,
	//który wykonuje określone akcje $action


	// Bartosz Debicki



	//i może otrzymywać parametry poprzez zmienną $id
	// skrócie, wartości z action są przekazywane do controllera za pomocą tablicy get
	// w controllerze są wywoływane odpowiednie widoki (Views)
	// za to w views dane są wyciągane za pomocą modeli (models) i następnie przekazywane do szablonu (tamplates)
		\Config\Website\Config::$subdir = 'Aplikacja_PO/';

	//Inicjalizacja sesji anonimowej
		\Tools\Session::initialize();
		//Sprawdzamy czy jeste�my zalogowani
		if(\Tools\AccessRoles::islogin() !== true)
		{
			$mycontroller = new \Controllers\AccessRoles();
			//Logowanie do systemu
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$mycontroller->login();
			}
			//Wy�wietlenie formularza do zalogowania
			else
			{
				$mycontroller->logform();
			}
		}
		else
		{
			if(isset($_GET['controller']))
				$controller = $_GET['controller'];
			else
				$controller = 'index';



			if(isset($_GET['action']))
				$action = $_GET['action'];
			else
				$action = 'index';
			if(isset($_GET['id']))
				$id = $_GET['id'];
			else
				$id = null;

			$controller='Controllers\\'.$controller;
			//tworzymy kontroler
			$mycontroller = new $controller;
			//wykonujemy akcję dla kontrolera
			$mycontroller->$action($id);
		}
?>
