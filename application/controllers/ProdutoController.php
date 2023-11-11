<?php

use Application\core\Controller;

class ProdutoController extends Controller{

    public function index(){

        $produtoDAO = new ProdutoDAO();
        $produtos = $produtos = $produtoDAO ->findAll();
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
        print_r($preco);

        $produto = new Produto($nome, $marca, $preco);
       
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


   public function iniciarEditar($codigo){
        //BUSCAR OS DADOS
        $produtoDAO = new ProdutoDAO();
        $produto = $produtoDAO-> findById($codigo);
        // MOSTRAR NA VIEW
        $this->view 

   }















}


?>