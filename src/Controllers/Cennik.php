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

      $model = $this->getModel("Kategoria");
      if($model)
      {
        $data['kategorie'] = $model->getAll();
      }

      $model = $this->getModel("Towar");
      if($model)
      {
        $data['towarAll'] = $model->getAllTwCn();
      }

      $view = $this->getView('Cennik');
      $view->index($data);
    }
    else
      $this->redirect('index/');
  }

  public function historiaCeny($id)
  {
    if($_SESSION['role']<=1)
    {
      $model = $this->getModel("Cennik");
      if($model)
      {
        $data = $model->historiaCeny($id);
      }
      $view = $this->getView('Cennik');
      $view->historiaCeny($data);
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
        $model->insert($_POST['Towar'],$_POST['Cena'],$_POST['Opis'],$_POST['dataOd']);
      }
      $this->redirect('Cennik');
    }
    else
      $this->redirect('index/');
  }

  public function insertNew()
  {
    if($_SESSION['role']<=1)
    {
      $model = $this->getModel("Cennik");
      if($model)
      {
        $model->insertNew($_POST['Towar'],$_POST['bylyCennik'],$_POST['Cena'],$_POST['Opis'],$_POST['dataOd']);
      }
      $this->redirect('Cennik');
    }
    else
      $this->redirect('index/');
  }

}
?>
