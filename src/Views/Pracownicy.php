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
          //przetworzenie szablonu do wyświetlania listy kategorii
          $this->render('indexPracownicy');
      }

			public function add()
			{
				$this->render('addPracownik');
			}
  }
?>
