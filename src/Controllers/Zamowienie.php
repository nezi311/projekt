<?php
namespace Controllers;
class Zamowienie extends Controller
{


  public function index()
  {
    if($_SESSION['role']<=1)
    {
      //tworzy obiekt widoku i zleca wyświetlenie wszystkich kategorii
      //w widoku
      $view = $this->getView('Zamowienie');
      $view->index();
    }
    else
      $this->redirect('index/');
  }


  public function add($data = null)
  {
    if($_SESSION['role']<=1) // sprawdzenie czy zalogowany user ma prawa do modyfikacji konta pracownika
    {

      $view=$this->getView('Zamowienie');   //utworzenie widoku
      $view->add($data);   //przeslanie nowych danych wraz z informacjami o bledzie do metody edit w widoku
    }
    else
      $this->redirect('index/'); //jesli user nie ma uprawnien zostaje przekierowany do indexu
  }

  public function insert()
  {
    if($_SESSION['role']<=1)
    {
      $model=$this->getModel('Zamowienie');
          if($model)
          {
            $data = $model->insert($_POST['NazwaTowaru'],$_POST['MinStanMagazynowy'],$_POST['MaxStanMagazynowy'],$_POST['stawkaVat'],$_POST['kategoria'],$_POST['jednostkamiary']);
            //pobranie komunikatów o bledach
          }
          if($data['error'] === "") // jeśli bledy nie istnieją, przechodzimy do zakladnki "pracownicy"
            {
              $this->redirect('Zamowienie/');
            }
            else // jeśli błędy istnieją wyświetlamy je w formularzu
            {
              $this->add($data);
            }

    }
    else
      $this->redirect('index/');

  }

  public function showone($id=null)
  {
    if($id !== null)
    {
      $view = $this->getView('Zamowienie');
      $view->showone($id);
    }
    else
      $this->redirect('Zamowienie/');
  }


  public function delete($id)
  {

      if($_SESSION['role']<=1)
      {
        if($id !== null)
        {

          $model=$this->getModel('Zamowienie');
                  if($model)
                  {
                    $data = $model->delete($id);
                      //nie przekazano komunikatów o błędzie
                  }
          //powiadamiamy odpowiedni widok, że nastąpiła aktualizacja bazy
          $this->redirect('Zamowienie/');
        }
        else
          $this->redirect('Zamowienie/');
      }
      else
        $this->redirect('index/');
    }


}
?>
