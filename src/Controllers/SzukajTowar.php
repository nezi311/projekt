<?php
namespace Controllers;
class SzukajTowar extends Controller
{
  public function search()
  {
    $towar='';
    $cenaMin='';
    $cenaMax='';
    $sprzedawane='';
    $niesprzedawane='';
    if (isset ($_POST['towar']))
    {
      $towar=$_POST['towar'];
    }
    if (isset ($_POST['cenaMin']))
    {
      $cenaMin=$_POST['cenaMin'];
      d("coś");
    }
    if (isset ($_POST['cenaMax']))
    {
      $cenaMax=$_POST['cenaMax'];
    }
    if (isset ($_POST['sprzedawane']))
    {
      $sprzedawane=$_POST['sprzedawane'];
    }
    if (isset ($_POST['niesprzedawane']))
    {
      $niesprzedawane=$_POST['niesprzedawane'];
    }
      $view=$this->getView('SzukajTowar');
      $view->search($towar,$cenaMin,$cenaMax,$sprzedawane,$niesprzedawane);
  }
}
?>
