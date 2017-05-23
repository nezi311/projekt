<?php
	namespace Views;

	class Zamowienie extends View
	{

      public function index()
      {
          $model = $this->getModel('Zamowienie');
          if($model)
          {
              $data = $model->getAll();

              if(isset($data['zamowienia']))
                   $this->set('tablicaZamowien', $data['zamowienia']);
          }
          if(isset($data['error']))
              $this->set('error', $data['error']);
          //przetworzenie szablonu do wyświetlania listy pracowników
          $this->render('indexZamowienia');
      }



			public function add($data)
			{
				// sprawdzenie czy tablica data, posiada informacje o bledach
				if(isset($data['error']))
						$this->set('error', $data['error']);// jesli tak to przypisujemy je do zmiennej
				$this->render('addZamowienia');
			}


			// public function edit($id, $data=null)
			// {
			// 	$model = $this->getModel('Pracownicy');
			// 	if($model)
			// 	{
			// 			$data = $model->getOne($id);
			// 			if(isset($data['pracownik']))
			// 				$this->set('tablicaPracownik', $data['pracownik']);
			// 	}
			// 	if(isset($data['error']))
			// 			$this->set('error', $data['error']);
			// 	//przetworzenie szablonu do wyświetlania danych pracowników do edycji
			// 	$this->render('editPracownik');
			// }

			// ** Dawid Dominiak **//
			public function edit($data=null)
			{
				//sprawdzenie czy tablica data, posiada dane pracownika
				if(isset($data['Zamowienie']))
					$this->set('tablicaZamowienie', $data['Zamowienie']); // jesli tak przypisujemy je do zmiennej

				// sprawdzenie czy tablica data, posiada informacje o bledach
				if(isset($data['error']))
						$this->set('error', $data['error']);// jesli tak to przypisujemy je do zmiennej

				//przetworzenie szablonu do wyświetlania danych pracowników do edycji
				$this->render('editZamowienie');
			}
			public function listaZamowien()
      {
          $model = $this->getModel('Zamowienie');
          if($model)
          {
              $data = $model->listaZamowien();

              if(isset($data['zamowienia']))
                   $this->set('tablicaZamowien', $data['zamowienia']);
          }
          if(isset($data['error']))
              $this->set('error', $data['error']);
          //przetworzenie szablonu do wyświetlania listy pracowników
          $this->render('listaZamowien');
      }
			public function faktura($id)
			{
					$model = $this->getModel('Zamowienie');
					if($model)
					{
							$data = $model->faktura($id);

							if(isset($data['zamowienia']))
									 $this->set('tablicaZamowien', $data['zamowienia']);
					}
					if(isset($data['error']))
							$this->set('error', $data['error']);
					//przetworzenie szablonu do wyświetlania listy pracowników
					$this->render('faktura');
			}


  }
?>
