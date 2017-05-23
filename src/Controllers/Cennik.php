<?php
namespace Controllers;
class Cennik extends Controller
{


  public function index()
  {
    if($_SESSION['role']<=1)
    {
      $model = $this->getModel("Towar");
      if($model)
      {
        $data['liczbaTowarow'] = $model->getNotPricedCount();
        $data['towar'] = $model->getNotPriced();
      }

      $view = $this->getView('Cennik');
      $view->index($data);
    }
    else
      $this->redirect('index/');
  }

  public function insert()
  {
    if($_SESSION['role']<=1)
    {
      $model = $this->getModel("Cennik");
      if($model)
      {
        $model->insert($_POST['Towar'],$_POST['Cena'],$_POST['Opis']);
      }
      $this->redirect('Cennik');
    }
    else
      $this->redirect('index/');
  }

}
?>
