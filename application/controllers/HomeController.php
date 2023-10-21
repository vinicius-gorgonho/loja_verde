<?php

use Application\core\Controller;

class HomeController extends Controller{

    public function index(){
        $this->view('home/index');
    }
}



?>