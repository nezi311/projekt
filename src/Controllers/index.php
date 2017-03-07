<?php
namespace Controllers;
class index extends Controller
{
  public function index()
  {
    $view = $this->getView('index');
    $view->index();
  }
}
 ?>
