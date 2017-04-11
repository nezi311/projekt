<?php
namespace Controllers;
class Klient extends Controller
{


  public function index($data = null)
  {
    if($_SESSION['role']<=1)
    {
      //tworzy obiekt widoku i zleca wyświetlenie wszystkich kategorii
      //w widoku
      $view = $this->getView('Klient');
      $view->index($data);
    }
    else
      $this->redirect('index/');
  }

  // ** Dawid Dominiak **//
  public function showone($id=null)
  {
    if($id !== null)
    {
      $view = $this->getView('Klient');
      $view->showone($id);
    }
    else
      $this->redirect('Klient/');
  }

  // ** Dawid Dominiak **//
  public function update()
  {
    if($_SESSION['role']<=1)
    {
      $model=$this->getModel('Klient');
          if($model)
          {
            $data = $model->update($_POST['id'],$_POST['imie'],$_POST['nazwisko'],$_POST['dzial'],$_POST['stanowisko'],$_POST['telefon'],$_POST['uprawnienia']);
          }
          if($data['error']==="")
          {
            $this->redirect('Klient/');
          }
          else
          {
            $this->edit($data,$_POST['id']);
          }
    }
    else
      $this->redirect('index/');
  }

  // ** Dawid Dominiak **//
  //rozpoczynamy procedurę aktualizacji pracownika
  //$data - tablica z danymi o userze, przy pierwszym właczeniu edita bez bledow,
  // $data zostaje wypelniony nullem
  //$id - przekazuje id pracownika
  public function edit($data = null , $id=null)
  {
    if($_SESSION['role']<=1) // sprawdzenie czy zalogowany user ma prawa do modyfikacji konta pracownika
    {
        if($id===null) // sprawdzenie czy wykonana byla nieudana proba modyfikacji usera
        {
          $id=$_GET["id"]; //jesli tak to pobieramy jego id za pomoca tablicy $_GET
        }
        //jesli nie to id zostaje przeslane przez argument metody

        // sprawdzamy czy poprzednia tablica z danymi (jesli istniala) jest wypelniona bledami
        // o atualizacji usera
        if(isset($data['error']) && $data['error']!=="")
        {
          //jesli tak to zapamietujemy owe bledy do zmiennej
          $blad['error']=$data['error'];
        }

        $model = $this->getModel('Klient');
        if($model)
        {
            // pobieramy dane usera o zadanym id i nadpisujemy je do tablicy $result
            $data = $model->getOne($id);
        }

      //jesli we wczesniejszej tablicy $result byly bledy, to je przepisujemy
      if(isset($blad))
      {
        $data['error'] = $blad['error'];
      }

      //utworzenie widoku
      $view=$this->getView('Klient');
      //przeslanie nowych danych wraz z informacjami o bledzie do metody edit w widoku
      $view->edit($data);


    }
    else
      $this->redirect('index/');
  }

  // ** Dawid Dominiak **//
  public function delete($id)
  {

      if($_SESSION['role']<=1)
      {
        if($id !== null)
        {

          $model=$this->getModel('Klient');
                  if($model)
                  {
                    $data = $model->delete($id);
                      //nie przekazano komunikatów o błędzie
                  }
          //powiadamiamy odpowiedni widok, że nastąpiła aktualizacja bazy
          $this->redirect('Klient/');
        }
        else
          $this->redirect('Klient/');
      }
      else
        $this->redirect('index/');
    }

    // ** Dawid Dominiak **//
    //rozpoczynamy procedurę dodawania pracownika
    //$data - tablica z danymi o userze, przy pierwszym właczeniu bez bledow,
    //$data zostaje wypelniony nullem
    public function add($data = null)
    {
      if($_SESSION['role']<=1) // sprawdzenie czy zalogowany user ma prawa do modyfikacji konta pracownika
      {

        $view=$this->getView('Klient');   //utworzenie widoku
        $view->add($data);   //przeslanie nowych danych wraz z informacjami o bledzie do metody edit w widoku
      }
      else
        $this->redirect('index/'); //jesli user nie ma uprawnien zostaje przekierowany do indexu
    }



    // ** Dawid Dominiak **//
    // przygotowane pod angularJS
    //** ZAKOŃCOZNE PORAŻKĄ PODDAJE SIĘ ALE JESZCZE TUTAJ WRÓCĘ!! **//
    /*
    public function insert()
    {
      if($_SESSION['role']<=1)
      {

        $view = $this->getView('Klient');
        $model=$this->getModel('Klient');
              $view->renderJSON($data = $model->insert($_POST['imie'],$_POST['nazwisko'],$_POST['NazwaFirmy'],$_POST['NIP'],$_POST['Miasto'],$_POST['Ulica'],$_POST['Dom'],$_POST['Lokal'],$_POST['KodPocztowy'],$_POST['Poczta'],$_POST['Email'],$_POST['Branza'],$_POST['ProponowaneProdukty']));
      }
      else
        $this->redirect('index/');

    }
    */

    // ** Dawid Dominiak **//
    public function insert()
    {
      if($_SESSION['role']<=1)
      {

            $model=$this->getModel('Klient');
            if($model)
            {

              $data = $model->insert($_POST['imie'],$_POST['nazwisko'],$_POST['NIP'],$_POST['Miasto'],$_POST['Ulica'],$_POST['Dom'],$_POST['Lokal'],$_POST['KodPocztowy'],$_POST['Poczta'],$_POST['Email']);
              //pobranie komunikatów o bledach
            }
            if($data['error'] === "") // jeśli bledy nie istnieją, przechodzimy do zakladnki "Klient"
              {
                $this->redirect('Klient/');
              }
              else // jeśli błędy istnieją wyświetlamy je w formularzu
              {
                $this->index($data);
              }

      }
      else
        $this->redirect('index/');

    }

    // ** Dawid Dominiak **//
    public function passReset($dane=null)
    {

        // sprawdzenie czy podany jest index usera
        // zmiana hasla (dostepna tylko dla admina i kierownika sprzedazy)
        if(isset($_GET['id']))
        {
          //d($dane);
          $view=$this->getView('Klient');
          $view->passReset($_GET['id'],$dane);
        }
        else  // zmiana hasla (dostepna tylko zalogowanego usera)
        {
           $view=$this->getView('Klient');
           $view->passReset(null,$dane);
        }
    }

    // ** Dawid Dominiak **//
    public function reset()
    {
      if($_SESSION['role']<=1)
      {
        $model=$this->getModel('Klient');
        if($model)
        {
          $data = $model->reset($_POST['id'],$_POST['haslo1'],$_POST['haslo2']);
          // pobranie komunikatów o błędach
        }
        if($data['error'] === "")// jeśli bledy nie istnieją, przechodzimy do zakladnki "Klient"
        {
            $this->redirect('Klient/');
        }
        else // jeśli błędy istnieją wyświetlamy je w formularzu
        {

          $this->passReset($data);
        }
      }
      $this->redirect('index/'); //jesli user nie ma uprawnien zostaje przekierowany na index
    }


    // ** Dawid Dominiak **//
    public function zmienAktywnosc()
    {
      if($_SESSION['role']<=1)
      {
        $id = $_GET['id'];
        if($id !== null)
        {
          //za operację na bazie danych odpowiedzialny jest model
          //tworzymy obiekt modelu i zlecamy usunięcie kategorii
          $model=$this->getModel('Klient');
                  if($model)
                  {
                    $data = $model->zmienAktywnosc($id);
                      //nie przekazano komunikatów o błędzie
                  }
          //powiadamiamy odpowiedni widok, że nastąpiła aktualizacja bazy
          $this->redirect('Klient/');
        }
        else
          $this->redirect('Klient/');
      }
      else
        $this->redirect('Klient/');
    }


}
?>
