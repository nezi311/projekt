<?php
	namespace Views;
	require_once('View.php');

	class Statystyka extends View {
		//wyświetlenie widoku z kategoriami
		public function index($kryterium=null, $sortowanie=null, $dataOd=null, $dataDo=null){
			//pobranie z modelu listy kategorii
			$model = $this->getModel('Statystyka');
            if($model)
						{
                $data = $model->getAll($kryterium, $sortowanie, $dataOd, $dataDo);
                if(isset($data['statystyki']))
                     $this->set('allStatystyki', $data['statystyki']);
            }
            if(isset($data['error']))
                $this->set('error', $data['error']);
            //przetworzenie szablonu do wyświetlania listy kategorii
            $this->render('statystyka');

		}

	}



?>
