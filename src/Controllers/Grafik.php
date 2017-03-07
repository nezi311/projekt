<?php
namespace Controllers;
class Grafik extends Controller
{
  public function index()
  {
    //tworzy obiekt widoku i zleca wyświetlenie wszystkich kategorii
    //w widoku
    $view = $this->getView('Grafik');
    $view->index();
  }
  public function showone($id=null)
  {
    if($id !== null)
    {
      //tworzy obiekt widoku i zleca wyświetlenie wybranej kategorii
      $view = $this->getView('Grafik');
      $view->showone($id);
    }
    else
      $this->redirect('Grafik/');
  }

  public function delete($id)
  {

      if($_SESSION['role']<=0)
      {
        if($id !== null)
        {
          //za operację na bazie danych odpowiedzialny jest model
          //tworzymy obiekt modelu i zlecamy usunięcie kategorii
          $model=$this->getModel('Grafik');
                  if($model) {
              $data = $model->delete($id);
                      //nie przekazano komunikatów o błędzie
                  }
          //powiadamiamy odpowiedni widok, że nastąpiła aktualizacja bazy
          $this->redirect('Grafik/');
        }
        else
          $this->redirect('Grafik/');
      }
      else
        $this->redirect('Grafik/');
    }

    public function add()
    {
      if($_SESSION['role']<=0)
      {
        $view=$this->getView('Grafik');
        $view->add();
      }
    }

    public function insert()
    {
      //za operację na bazie danych odpowiedzialny jest model
      //tworzymy obiekt modelu i zlecamy dodanie kategorii
      $model=$this->getModel('Grafik');
            if($model)
            {
              $data = $model->insert($_POST['pracownik'],$_POST['data'],$_POST['tytul'],$_POST['dostepnyod'],$_POST['dostepnydo']);
              //nie przekazano komunikatów o błędzie
            }
            $this->redirect('Grafik/');
    }
}
 ?>
