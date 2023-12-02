<?php

use Application\core\Controller;
use Application\dao\UsuarioDAO;
use Application\models\Usuario;
use Application\routes\routes;

class UsuarioController extends Controller {
    public function index() {
        $usuarioDAO = new UsuarioDAO();
        $usuarios = $usuarioDAO->findAll();
        $this->view('usuario/index', ['usuarios' => $usuarios]);
    }

    public function cadastrar() {
        $this->view('usuario/cadastrar');
    }

    public function salvar() {
        $nome = $_POST['nome_usuario'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuario = new Usuario($nome, $cpf, $email, $senha);
        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO->salvar($usuario);

        $this->view('usuario/cadastrar', ["msg-cadastrado" => "Cadastro com sucesso!"]);
    }
    public function buscar() {
        // Se o termo de busca estiver presente no GET
        if (isset($_GET['search'])) {
            $termoBusca = $_GET['search'];
            $usuarioDAO = new UsuarioDAO();
            $usuariosEncontrados = $usuarioDAO->buscarPorTermo($termoBusca);
            $this->view('usuario/index', ['usuarios' => $usuariosEncontrados]);
        } else {
            // Se nenhum termo de busca estiver presente, redirecione para a página principal
            $this->index();
        }
    }
    

    public function iniciarEditar($codigo) {
        $usuarioDAO = new UsuarioDAO();
        $usuario = $usuarioDAO->findById($codigo);
        $this->view('usuario/editar', ["usuario" => $usuario]);
    }

    public function atualizar() {
        $codigo = filter_input(INPUT_POST, "codigo");
        $nome = filter_input(INPUT_POST, "nome");
        $cpf = filter_input(INPUT_POST, "cpf");
        $email = filter_input(INPUT_POST, "email");
        $senha = filter_input(INPUT_POST, "senha");

        $usuario = new Usuario($nome, $cpf, $email, $senha);
        $usuario->setCodigo($codigo);

        $usuarioDAO = new UsuarioDAO();
        $usuarioAtualizado = $usuarioDAO->atualizar($usuario);

        if ($usuarioAtualizado) {
            $msg = "Sucesso";
        } else {
            $msg = "Erro ao editar";
        }

        $this->view("usuario/editar", ["msg-editarUsuario" => $msg, "usuario" => $usuarioAtualizado]);
    }

    public function deletar() {
        $codigo = filter_input(INPUT_POST, "codigo");
        $usuarioDAO = new UsuarioDAO();

        if ($usuarioDAO->deletar($codigo)) {
            $msg = "Sucesso";
        } else {
            $msg = "Erro ao deletar";
        }

        $usuarios = $usuarioDAO->findAll();
        $this->view("usuario/index", ["msg" => $msg, "usuarios" => $usuarios]);
    }

    
}
?>
