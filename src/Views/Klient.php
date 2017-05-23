<?php
	namespace Views;

	class Klient extends View
	{
			// ** Dawid Dominiak **//
      public function index($data)
      {
          $model = $this->getModel('Klient');
          if($model)
          {
						if(!isset($data))
						{
							$data = $model->getAll();
							if(isset($data['Klienci']))
								$this->set('tablicaKlienci', $data['Klienci']);
								$this->set('Dostawa', $data['Dostawa']);
								$this->set('Zaplata', $data['Zaplata']);
						}
						else
						{
							if(isset($data['Klienci']))
								$this->set('tablicaKlienci', $data['Klienci']);
						}
          }
          if(isset($data['error']))
              $this->set('error', $data['error']);
          //przetworzenie szablonu do wyświetlania listy pracowników
          $this->render('indexKlient');
      }



			// public function edit($id, $data=null)
			// {
			// 	$model = $this->getModel('Klient');
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
				if(isset($data['pracownik']))
					$this->set('tablicaPracownik', $data['pracownik']); // jesli tak przypisujemy je do zmiennej

				// sprawdzenie czy tablica data, posiada informacje o bledach
				if(isset($data['error']))
						$this->set('error', $data['error']);// jesli tak to przypisujemy je do zmiennej

				//przetworzenie szablonu do wyświetlania danych pracowników do edycji
				$this->render('editPracownik');
			}





  }
?>
