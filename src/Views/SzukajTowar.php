<?php
	namespace Views;

	class SzukajTowar extends View
	{
    public function search($towar='',$cenaMin='',$cenaMax='', $kodTowaru='' ,$sprzedawane='',$niesprzedawane='' )
    {
        $model = $this->getModel('SzukajTowar');
        if($model)
        {
            $data = $model->search($towar,$cenaMin,$cenaMax,$kodTowaru,$sprzedawane,$niesprzedawane);

            if(isset($data['towary']))
                 $this->set('tablicaTowarow', $data['towary']);
        }
        if(isset($data['error']))
            $this->set('error', $data['error']);
        //przetworzenie szablonu do wyświetlania listy pracowników
				$this->set('towar',$towar);
				$this->set('cenaMin',$cenaMin);
				$this->set('cenaMax',$cenaMax);
				$this->set('kodTowaru',$kodTowaru);
				$this->set('sprzedawane',$sprzedawane);
				$this->set('niesprzedawane',$niesprzedawane);

        $this->render('searchTowary');
    }
}
?>
