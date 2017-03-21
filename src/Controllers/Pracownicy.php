<?php
namespace Controllers;
class Pracownicy extends Controller
{

  public function index()
  {
    if($_SESSION['role']<=1)
    {
      //tworzy obiekt widoku i zleca wyświetlenie wszystkich kategorii
      //w widoku
      $view = $this->getView('Pracownicy');
      $view->index();
    }
    else
      $this->redirect('index/');
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
    if($_SESSION['role']<=1)
    {
      $model=$this->getModel('Pracownicy');
          if($model)
          {
            $data = $model->update($_POST['id'],$_POST['imie'],$_POST['nazwisko'],$_POST['dzial'],$_POST['stanowisko'],$_POST['telefon'],$_POST['uprawnienia']);
            //nie przekazano komunikatów o błędzie
          }
          $this->redirect('Pracownicy/');
    }
    else
      $this->redirect('index/');
  }

  public function delete($id)
  {

      if($_SESSION['role']<=1)
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
            }
            if(isset($data['error']))
              // dodać obsługę błędów

            $this->redirect('Pracownicy/');
    }

    public function edit()
    {
      if($_SESSION['role']<=1)
      {
        $view=$this->getView('Pracownicy');
        $view->edit($_GET["id"]);
      }
      else
        $this->redirect('Pracownicy/');
    }

    public function passReset()
    {
      if($_SESSION['role']<=1)
      {
        if(isset($_GET['id']))
        {
          $view=$this->getView('Pracownicy');
          $view->passReset($_GET['id']);
        }
        else
        {
           $view=$this->getView('Pracownicy');
           $view->passReset(null);
        }

      }
      else
        $this->redirect('Pracownicy/');
    }

    public function reset()
    {
      if($_SESSION['role']<=1)
      {
        $model=$this->getModel('Pracownicy');
        if($model)
        {
          $data = $model->reset($_POST['id'],$_POST['haslo1'],$_POST['haslo2']);
        }
        if(isset($data['error']))
        {
            // dodać obsługę błędów
        }
      }
      $this->redirect('Pracownicy/');
    }

    public function zmienAktywnosc()
    {
      if($_SESSION['role']<=1)
      {
        $id = $_GET['id'];
        if($id !== null)
        {
          //za operację na bazie danych odpowiedzialny jest model
          //tworzymy obiekt modelu i zlecamy usunięcie kategorii
          $model=$this->getModel('Pracownicy');
                  if($model)
                  {
                    $data = $model->zmienAktywnosc($id);
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


}
?>
