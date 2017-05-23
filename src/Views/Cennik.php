<?php
	namespace Views;

	class Cennik extends View
	{

      public function index($data = null)
      {

					if(isset($data['liczbaTowarow']))
						 $this->set('liczbaTowarow', $data['liczbaTowarow']);

					if(isset($data['towar']['towary']))
						 $this->set('tablicaTowary', $data['towar']['towary']);

          if(isset($data['Cenniki']))
             $this->set('tablicaCennikow', $data['Cenniki']);

          if(isset($data['error']))
              $this->set('error', $data['error']);
          //przetworzenie szablonu do wyświetlania listy pracowników
          $this->render('indexCennik');
      }

  }
?>
