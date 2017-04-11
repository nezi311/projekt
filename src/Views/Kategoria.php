<?php
	namespace Views;
	require_once('View.php');

	class Kategoria extends View {
		//wyświetlenie widoku z kategoriami
		public function index(){
			//pobranie z modelu listy kategorii
			$model = $this->getModel('Kategoria');
            if($model)
						{
                $data = $model->getAll();
                if(isset($data['kategorie']))
                     $this->set('allKategorie', $data['kategorie']);
            }
            if(isset($data['error']))
                $this->set('error', $data['error']);
            //przetworzenie szablonu do wyświetlania listy kategorii
            $this->render('categories');

		}

	}



?>
