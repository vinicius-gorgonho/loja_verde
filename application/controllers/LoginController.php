<?php

session_start();
use Application\core\Controller;
use Application\dao\UsuarioDAO;
use Application\models\Usuario;
use Application\dao\ProdutoDAO;
use Application\models\Produto;

class LoginController extends Controller
{

    public function index()
    {
        $this->view('login/index');
    }

    public function autenticar_login()
    {
        $login = $_POST['email'];
        $senha_login = $_POST['senha'];


        $usuarioDAO = new UsuarioDAO();
        $usuario = $usuarioDAO->buscarPorEmailOrCpf($login);

        if (!$usuario) {
            $this->view('/login/index', ["msg-invalido" => "Credenciais inválidas"]);
            return;
        }

        $senha_usuario = $usuario->getSenha();

        if ($usuario && $senha_usuario == $senha_login) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['logado'] =  $login;

            $produtoDAO = new ProdutoDAO();
            $produtos = $produtoDAO->findAll();

            $this->view('/home/index', ["msg-valido" => "Logado com sucesso!", "produtos" => $produtos]);
        } else {
            $_SESSION['logado'] = false;
            $this->view('/login/index', ["msg-invalido" => "Credenciais inválidas"]);
        }
    }

    public function logout()
    {
        if (isset($_SESSION)) {
            session_unset();
            session_destroy();
            $this->view('/login/index', ["msg-logout" => "Deslogado com sucesso!"]);
        }
        
    }
}
?>