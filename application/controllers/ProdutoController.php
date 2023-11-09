<?php

use Application\core\Controller;
use Application\dao\ProdutoDAO;
use Application\models\Produto;

class ProdutoController extends Controller
{

    public function index()
    {
        $this->view('produto/index');
    }
    public function cadastrar()
    {
        $this->view('produto/cadastrar');
    }
    public function salvar()
    {
        $nome = $_POST['nome_produto'];
        $marca = $_POST['marca'];
        $preco = $_POST['preco'];

    $produto = new Produto($nome, $marca, $preco);

        $produtoDao = new ProdutoDAO();
        $produtoDao->salvar($produto);
    }

}