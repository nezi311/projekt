<?php
	namespace Controllers;
	//abstrakcyjna klasa kontrolera
	abstract class Controller {

		//przekierowanie na innyc adres
		public function redirect($url) {
			header('location: '.'http://'.$_SERVER["SERVER_NAME"].'/'.
				\Config\Website\Config::$subdir.$url);
		}

		//załadowanie modelu
		public function getModel($name){
			$name = 'Models\\'.$name;
            if(class_exists($name))
                return new $name();
            return null;
		}

		//załadowanie widoku
		public function getView($name){
			$name = 'Views\\'.$name;
            if(class_exists($name))
                return new $name();
            return null;
		}
	}
?>
