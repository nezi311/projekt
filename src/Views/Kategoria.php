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
		public function showone($id=null)
		{

			$model = $this->getModel('Kategoria');
			if($model)
			{
				$data = $model->getOne($id);

				if(isset($data['kategorie']))
						 $this->set('allKategorie', $data['kategorie']);
				if(isset($data['katnazwa']))
		 				 $this->set('katnazwa', $data['katnazwa']);
			}
			
			if(isset($data['error']))
					$this->set('error', $data['error']);// jesli tak to przypisujemy je do zmiennej

			//przetworzenie szablonu do wyświetlania danych pracowników do edycji
			$this->render('OneKategoria');
		}

	}



?>
