<?php
	namespace Controllers;
	//kontroler do obsługi kategorii
	//każda metoda odpowiada jednej akcji możliwej
    //do wykonania przez kontroler
	class Statystyka extends Controller {
		//wyświetla widok z listą kategorii
		public function index(){
			//tworzy obiekt widoku i zleca wyświetlenie wszystkich kategorii
			//w widoku
			$view = $this->getView('Statystyka');
			if (isset($_POST['kryterium']))
			{
			$view->index($_POST['kryterium'], $_POST['sortowanie'], $_POST['dataOd'], $_POST['dataDo']);
		}
			else {
				$view->index();
			}
		}
	}
?>
