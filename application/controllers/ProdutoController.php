<?php


use Application\core\Controller;
use Application\dao\ProdutoDAO;
use Application\models\Produto;

class ProdutoController extends Controller
{

    public function index()
    {
        $produtoDAO = new ProdutoDAO();
        $produtos = $produtoDAO->findAll();

        $this->view('produto/index', ['produtos' => $produtos]);
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
        $imagem = $_POST['imagem'];
        // COMO CONSTRUIR UM OBJETO PRODUTO AQUI
        $produto = new Produto($nome, $marca, $preco, $imagem);

        $produtoDAO = new ProdutoDAO();
        $produtoDAO->salvar($produto);

        $this->view('produto/cadastrar', ["cdpr" => "Produto criado com Sucesso!"]);

    }

    public function iniciarEditar($codigo)
    {
        // 1 - Buscar os dados
        $produtoDAO = new ProdutoDAO();
        $produto = $produtoDAO->findById($codigo);
        // 2 - Mostrar na view
        $this->view('produto/editar', ["produto" => $produto]);
    }

    public function atualizar()
    {
        //RECEBE OS DADOS
        $codigo = filter_input(INPUT_POST, "codigo");
        $nome = filter_input(INPUT_POST, "nome");
        $marca = filter_input(INPUT_POST, "marca");
        $preco = filter_input(INPUT_POST, "preco");
        $imagem = filter_input(INPUT_POST, "imagem");

        //CRIA O OBJETO
        $produto = new Produto($nome, $marca, $preco, $imagem);
        $produto->setCodigo($codigo);
        //CRIA O PRODUTO DAO
        $produtoDAO = new ProdutoDAO();
        $produtoAtualizado = $produtoDAO->atualizar($produto);
        if ($produtoAtualizado) {
            $msg = "Sucesso";
        } else {
            $msg = "Erro ao editar";
        }
        $this->view("produto/editar", ["msg" => $msg, "produto" => $produtoAtualizado]);
    }

    public function deletar()
    {
        $codigo = filter_input(INPUT_POST, "codigo");
        $produtoDAO = new ProdutoDAO();
        if ($produtoDAO->deletar($codigo)) {
            $msg = "Sucessoooo";
        } else {
            $msg = "Deu errooo ";
        }
        $produtos = $produtoDAO->findAll();
        $this->view("produto/index", ["msg-deletar" => $msg, "produtos" => $produtos]);
    }

}
?>