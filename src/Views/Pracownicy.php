<?php
	namespace Views;

	class Pracownicy extends View
	{

      public function index()
      {
          $model = $this->getModel('Pracownicy');
          if($model)
          {
              $data = $model->getAll();

              if(isset($data['pracownicy']))
                   $this->set('tablicaPracownicy', $data['pracownicy']);
          }
          if(isset($data['error']))
              $this->set('error', $data['error']);
          //przetworzenie szablonu do wyświetlania listy pracowników
          $this->render('indexPracownicy');
      }

			public function add()
			{
				$this->render('addPracownik');
			}

			public function edit($id)
			{
				$model = $this->getModel('Pracownicy');
				if($model)
				{
						$data = $model->getOne($id);
						if(isset($data['pracownik']))
							$this->set('tablicaPracownik', $data['pracownik']);
				}
				if(isset($data['error']))
						$this->set('error', $data['error']);
				//przetworzenie szablonu do wyświetlania danych pracowników do edycji
				$this->render('editPracownik');
			}
  }
?>
