<?php

use Application\core\Controller;

class ProdutoController extends Controller{
    public function index(){
        $this->view('produto/index');
    }
    public function cadastrar(){
        $this->view('produto/cadastrar');
    }
    public function salvar(){
        $nome = $_POST['nome_produto'];
        $marca = $_POST['marca'];
        print_r($nome);
        print_r($marca);
       
    }
    
}



?>