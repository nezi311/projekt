<?php
	namespace Views;

	class SzukajTowar extends View
	{
    public function search($towar='',$cenaMin='',$cenaMax='',$sprzedawane='',$niesprzedawane='' )
    {
        $model = $this->getModel('SzukajTowar');
        if($model)
        {
            $data = $model->search($towar,$cenaMin,$cenaMax,$sprzedawane,$niesprzedawane);

            if(isset($data['towary']))
                 $this->set('tablicaTowarow', $data['towary']);
        }
        if(isset($data['error']))
            $this->set('error', $data['error']);
        //przetworzenie szablonu do wyświetlania listy pracowników
        $this->render('searchTowary');
    }
}
?>
