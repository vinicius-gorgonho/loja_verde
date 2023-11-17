<?php

use Application\core\Controller;
use Application\dao\ProdutoDAO;
use Application\models\Produto;
class ProdutoController extends Controller{

public function index(){
 $produtoDAO = new ProdutoDAO();
 $produtos = $produtoDAO->findAll();
 // $produtos = $produtoDAO::findAll();
 $this->view('produto/index', ['produtos' => $produtos]);
    }
    public function cadastrar(){
        $this->view('produto/cadastrar');
    }
    public function salvar(){
        $nome = $_POST['nome_produto'];
        $marca = $_POST['marca'];
        $preco = $_POST['preco'];
        // COMO CONSTRUIR UM OBJETO PRODUTO AQUI
        $produto = new Produto($nome, $marca, $preco);

        $produtoDAO = new ProdutoDAO();
        $produtoDAO->salvar($produto);
       
        $this->view('produto/cadastrar', ["msg" => "Sucesso"]);
    }

    public function iniciarEditar($codigo){
       // 1 - Buscar os dados 
        $produtoDAO = new ProdutoDAO();
        $produto = $produtoDAO->findById($codigo);
       // 2 - Mostrar na view
       $this->view('produto/editar', ["produto" => $produto]);
    }
    
}


?>