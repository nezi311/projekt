<?php
	namespace Controllers;
	//kontroler do obsługi kategorii
	//każda metoda odpowiada jednej akcji możliwej
    //do wykonania przez kontroler
	class Kategoria extends Controller {
		//wyświetla widok z listą kategorii
		public function index(){
			//tworzy obiekt widoku i zleca wyświetlenie wszystkich kategorii
			//w widoku
			$view = $this->getView('Kategoria');
			$view->index();
		}
		//wyświetla widok z konkretną kategorią
		public function showone($id=null){
			if($id !== null)
			{
				//tworzy obiekt widoku i zleca wyświetlenie wybranej kategorii
				$view = $this->getView('Kategoria');
				$view->showone($id);
			}
			else
				$this->redirect('Kategoria/');
		}
		//usuwa wybraną kategorię
		public function delete($id){
			if($id !== null)
			{
				//za operację na bazie danych odpowiedzialny jest model
				//tworzymy obiekt modelu i zlecamy usunięcie kategorii
				$model=$this->getModel('Kategoria');
                if($model) {
				    $data = $model->delete($id);
                    //nie przekazano komunikatów o błędzie
                }
				//powiadamiamy odpowiedni widok, że nastąpiła aktualizacja bazy
				$this->redirect('Kategoria/');
			}
			else
				$this->redirect('Kategoria/');
		}

		public function edit($id){
			if($id !== null)
			{
			$model=$this->getModel('Kategoria');
            if($model) {
			     $data = $model->edit($id, $_POST['name']);
                 //nie przekazano komunikatów o błędzie
            }
            $this->redirect('Kategoria/');
			}
			else
				$this->redirect('Kategoria/');
		}
		//wyświetla widok formularza umożliwiający dodanie do bazy kategorii
		public function add() {
			$view=$this->getView('Kategoria');
			$view->add();
		}
		//dodaje do bazy kategorię
		public function insert($id) {
			//za operację na bazie danych odpowiedzialny jest model
			//tworzymy obiekt modelu i zlecamy dodanie kategorii
			$model=$this->getModel('Kategoria');
            if($model) {
			     $data = $model->insert($_POST['nazwa']);
                 //nie przekazano komunikatów o błędzie
            }
            $this->redirect('Kategoria/');
		}
	}
?>
