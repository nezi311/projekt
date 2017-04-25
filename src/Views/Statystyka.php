<?php
	namespace Views;
	require_once('View.php');

	class Statystyka extends View {
		//wyświetlenie widoku z kategoriami
		public function index($kryterium="towarIlosc", $fraza="", $dataOd="", $dataDo=""){
			//pobranie z modelu listy kategorii
			if ($dataDo==="")
			{
				$dataDo=date("Y-m-d");
			}

			if ($dataOd==="")
			{
				$dataOd=date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-1 month" ) );
			}
			$model = $this->getModel('Statystyka');
            if($model)
						{
                $data = $model->getAll($kryterium, $fraza, $dataOd, $dataDo);
                if(isset($data['statystyki']))
                     $this->set('allStatystyki', $data['statystyki']);
            }
            if(isset($data['error']))
                $this->set('error', $data['error']);
								$this->set('dataOd',$dataOd);
								$this->set('dataDo',$dataDo);
								$this->set('kryterium',$kryterium);
								$this->set('fraza',$fraza);

            //przetworzenie szablonu do wyświetlania listy kategorii
            $this->render('statystyka');

		}

	}



?>
