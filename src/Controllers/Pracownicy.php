<?php
namespace Controllers;
class Pracownicy extends Controller
{

  public function index()
  {
    //tworzy obiekt widoku i zleca wyświetlenie wszystkich kategorii
    //w widoku
    $view = $this->getView('Pracownicy');
    $view->index();
  }

  public function showone($id=null)
  {
    if($id !== null)
    {
      //tworzy obiekt widoku i zleca wyświetlenie wybranej kategorii
      $view = $this->getView('Pracownicy');
      $view->showone($id);
    }
    else
      $this->redirect('Pracownicy/');
  }

  public function update()
  {
    $model=$this->getModel('Pracownicy');
          if($model)
          {
            $data = $model->update($_POST['id'],$_POST['imie'],$_POST['nazwisko'],$_POST['dzial'],$_POST['stanowisko'],$_POST['telefon'],$_POST['login'],$_POST['haslo'],$_POST['uprawnienia']);
            //nie przekazano komunikatów o błędzie
          }
          $this->redirect('Pracownicy/');
  }

  public function delete($id)
  {

      if($_SESSION['role']<=0)
      {
        if($id !== null)
        {
          //za operację na bazie danych odpowiedzialny jest model
          //tworzymy obiekt modelu i zlecamy usunięcie kategorii
          $model=$this->getModel('Pracownicy');
                  if($model) {
              $data = $model->delete($id);
                      //nie przekazano komunikatów o błędzie
                  }
          //powiadamiamy odpowiedni widok, że nastąpiła aktualizacja bazy
          $this->redirect('Pracownicy/');
        }
        else
          $this->redirect('Pracownicy/');
      }
      else
        $this->redirect('Pracownicy/');
    }

    public function add()
    {
      if($_SESSION['role']<=0)
      {
        $view=$this->getView('Pracownicy');
        $view->add();
      }
      else
        $this->redirect('Pracownicy/');
    }

    public function insert()
    {
      $model=$this->getModel('Pracownicy');
            if($model)
            {
              $data = $model->insert($_POST['imie'],$_POST['nazwisko'],$_POST['dzial'],$_POST['stanowisko'],$_POST['telefon'],$_POST['login'],$_POST['haslo'],$_POST['uprawnienia']);
              //nie przekazano komunikatów o błędzie
            }
            $this->redirect('Pracownicy/');
    }

    public function edit()
    {
      if($_SESSION['role']<=0)
      {
        $view=$this->getView('Pracownicy');
        $view->edit($_GET["id"]);
      }
      else
        $this->redirect('Pracownicy/');
    }
}
?>
