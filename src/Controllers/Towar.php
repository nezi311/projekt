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

  public function add($data = null)
  {
    if($_SESSION['role']<=1) // sprawdzenie czy zalogowany user ma prawa do modyfikacji konta pracownika
    {

      $view=$this->getView('Pracownicy');   //utworzenie widoku
      $view->add($data);   //przeslanie nowych danych wraz z informacjami o bledzie do metody edit w widoku
    }
    else
      $this->redirect('index/'); //jesli user nie ma uprawnien zostaje przekierowany do indexu
  }



  public function insert()
  {
    if($_SESSION['role']<=1)
    {
      $model=$this->getModel('Pracownicy');
          if($model)
          {
            $data = $model->insert($_POST['imie'],$_POST['nazwisko'],$_POST['dzial'],$_POST['stanowisko'],$_POST['telefon'],$_POST['login'],$_POST['haslo'],$_POST['uprawnienia']);
            //pobranie komunikatów o bledach
          }
          if($data['error'] === "") // jeśli bledy nie istnieją, przechodzimy do zakladnki "pracownicy"
            {
              $this->redirect('Pracownicy/');
            }
            else // jeśli błędy istnieją wyświetlamy je w formularzu
            {
              $this->add($data);
            }

    }
    else
      $this->redirect('index/');

  }

  public function search()
  {

			$view=$this->getView('Towar');
			$view->search($_POST['towar']);
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

    public function koszyk($id)
    {

          if($id !== null)
          {

            $model=$this->getModel('Towar');
                    if($model)
                    {
                      $data = $model->koszyk($_POST['IdTowar'],$_POST['ilosc']);
                        //nie przekazano komunikatów o błędzie
                    }
            //powiadamiamy odpowiedni widok, że nastąpiła aktualizacja bazy
            $this->redirect('Towar/');
          }
          else
            $this->redirect('Towar/');
    }
}
?>
