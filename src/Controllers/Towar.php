<?php
namespace Controllers;
class Towar extends Controller
{


  public function index()
  {
    if($_SESSION['role']<=1)
    {
      //tworzy obiekt widoku i zleca wyświetlenie wszystkich kategorii
      //w widoku
      $view = $this->getView('Towar');
      $view->index();
    }
    else
      $this->redirect('index/');
  }

  public function freezed()
  {
    if($_SESSION['role']<=1)
    {
      //tworzy obiekt widoku i zleca wyświetlenie wszystkich kategorii
      //w widoku
      $view = $this->getView('Towar');
      $view->freezed();
    }
    else
      $this->redirect('index/');
  }


  public function showone($id=null)
  {
    if($id !== null)
    {
      $view = $this->getView('Towar');
      $view->showone($id);
    }
    else
      $this->redirect('Towar/');
  }


  public function delete($id)
  {

      if($_SESSION['role']<=1)
      {
        if($id !== null)
        {

          $model=$this->getModel('Towar');
                  if($model)
                  {
                    $data = $model->delete($id);
                      //nie przekazano komunikatów o błędzie
                  }
          //powiadamiamy odpowiedni widok, że nastąpiła aktualizacja bazy
          $this->redirect('Towar/');
        }
        else
          $this->redirect('Towar/');
      }
      else
        $this->redirect('index/');
    }


}
?>
