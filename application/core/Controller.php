<?php
namespace Application\core;

class Controller
{
  public function model($model)
  {
    require '../Application/models/' . $model . '.php';
    $classe = 'Application/models\\' . $model;
    return new $classe();
  }
  public function view(string $view, $data = [])
  {
    var_dump('../Application/views/' . $view . '.php');
    require '../Application/views/' . $view . '.php';
  }
  public function pageNotFound()
  {
    $this->view('error404');
  }


}
?>