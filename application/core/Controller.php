<?php
namespace Application\core;
class Controller{
public function model($model){
  require '../Application/models/'. $model. '.php';
    $classe = 'Application/models\\' .$model;
    return new $classe();
 }
public function view(string $view, $data = []){
require '../Application/views/'. $view .'.php';
 }
public function pageNotFound(){
    $this->view('error404');
}


}



?>