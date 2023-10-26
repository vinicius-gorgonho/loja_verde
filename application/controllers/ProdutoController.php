<?php

use Application\core\Controller;

class ProdutoController extends Controller{

    public function index(){
        $this->view('produto/index');
    }
    public function cadastrarProduto(){
        $this->view('produto/cadastrar');
    }
}



?>