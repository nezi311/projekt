<?php
	namespace Views;
	require_once('View.php');

	class Statystyka extends View {
		//wyświetlenie widoku z kategoriami
		public function index($kryterium="towarIlosc", $fraza="", $dataOd="", $dataDo="", $kategoria=0){
			//pobranie z modelu listy kategorii
<<<<<<< HEAD
=======
			if ($dataDo==="")
			{
				$dataDo=date("Y-m-d");
			}

			if ($dataOd==="")
			{
				$dataOd=date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-1 month" ) );
			}
>>>>>>> 46e61074cdf067578c0d5bdc5026aaab80bea70b
			$model = $this->getModel('Statystyka');
            if($model)
						{
                $data = $model->getAll($kryterium, $fraza, $dataOd, $dataDo, $kategoria);
                if(isset($data['statystyki']))
                     $this->set('allStatystyki', $data['statystyki']);
            }
            if(isset($data['error']))
                $this->set('error', $data['error']);
								$this->set('dataOd',$dataOd);
								$this->set('dataDo',$dataDo);
								$this->set('kryterium',$kryterium);
								$this->set('fraza',$fraza);
								$this->set('kat',$kategoria);
								$model1 = $this->getModel('Kategoria');
											if($model1)
											{
													$data = $model1->getAll();
													if(isset($data['kategorie']))
															 $this->set('allKategorie', $data['kategorie']);
											}
            //przetworzenie szablonu do wyświetlania listy kategorii
            $this->render('statystyka');

		}

	}



?>
