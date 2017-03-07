<?php
	namespace Views;

	class Grafik extends View
	{
    public function index()
    {
        $model = $this->getModel('Grafik');
        if($model)
        {
            $data = $model->getAll();
            if(isset($data['grafik']))
                 $this->set('tablicaGrafik', $data['grafik']);
        }
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
        $this->render('indexGrafik');
    }
  }
?>
