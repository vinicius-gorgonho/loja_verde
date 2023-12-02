<?php
namespace Application\dao;

use Application\models\Usuario;

class UsuarioDAO {
    // ... (código existente)

    // Create (C)
    public function salvar($usuario) {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();

        $nome = $usuario->getNome();
        $cpf = $usuario->getCpf();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO usuarios (codigo, nome, cpf, email, senha) VALUES (null, ?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nome, $cpf, $email, $senha);

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            echo "Error: " . $stmt->error;
            return false;
        }
    }

    public function findAll() {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();
        $SQL = "SELECT * FROM usuarios";
        $result = $conn->query($SQL);
        $usuarios = [];

        while ($row = $result->fetch_assoc()) {
            $usuario = new Usuario($row["nome"], $row["cpf"], $row["email"], $row["senha"]);
            $usuario->setCodigo($row["codigo"]);
            array_push($usuarios, $usuario);
        }

        return $usuarios;
    }

    // Retrieve (R)
    public function findById($id) {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();
        $SQL = "SELECT * FROM usuarios WHERE codigo =" . $id;
        $result = $conn->query($SQL);
        $row = $result->fetch_assoc();

        $usuario = new Usuario($row["nome"], $row["cpf"], $row["email"], $row["senha"]);
        $usuario->setCodigo($row["codigo"]);

        return $usuario;
    }
    public function buscarPorTermo($termo) {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();
    
        // Use prepared statements para evitar injeção de SQL
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE nome LIKE ?");
        $termo = "%" . $termo . "%";
        $stmt->bind_param("s", $termo);
        $stmt->execute();
    
        $result = $stmt->get_result();
    
        $usuarios = [];
    
        while ($row = $result->fetch_assoc()) {
            $usuario = new Usuario($row["nome"], $row["cpf"], $row["email"], $row["senha"]);
            $usuario->setCodigo($row["codigo"]);
            array_push($usuarios, $usuario);
        }
    
        $stmt->close();
    
        return $usuarios;
    }
    
    public function buscarPorEmailOrCpf($login) {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();

        // Use prepared statements para evitar injeção de SQL
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ? OR cpf = ? LIMIT 1");
        $stmt->bind_param("ss", $login, $login);
        $stmt->execute();

        $result = $stmt->get_result();

        $usuario = null;

        while ($row = $result->fetch_assoc()) {
            $usuario = new Usuario($row["nome"], $row["cpf"], $row["email"], $row["senha"]);
            $usuario->setCodigo($row["codigo"]);
        }

        $stmt->close();

        return $usuario;
    }

    // Update (U)
    public function atualizar($usuario) {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();

        $codigo = $usuario->getCodigo();
        $nome = $usuario->getNome();
        $cpf = $usuario->getCpf();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("UPDATE usuarios SET nome = ?, cpf = ?, email = ?, senha = ? WHERE codigo = ?");
        $stmt->bind_param("ssssi", $nome, $cpf, $email, $senha, $codigo);

        if ($stmt->execute()) {
            $stmt->close();
            return $this->findById($codigo);
        } else {
            $stmt->close();
            echo "Error: " . $stmt->error;
            return $usuario;
        }
    }

    // Delete (D)
    public function deletar($id) {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("DELETE FROM usuarios WHERE codigo = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }

    // Autenticação
    // public function autenticar($email, $senha) {
    //     $conexao = new Conexao();
    //     $conn = $conexao->getConexao();

    //     // Use prepared statements to prevent SQL injection
    //     $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    //     $stmt->bind_param("s", $email);
    //     $stmt->execute();
    //     $result = $stmt->get_result();

    //     $row = $result->fetch_assoc();

    //     $stmt->close();

    //     if ($row && password_verify($senha, $row['senha'])) {
    //         $usuario = new Usuario($row["nome"], $row["cpf"], $row["email"], $row["senha"]);
    //         $usuario->setCodigo($row["codigo"]);
    //         return $usuario;
    //     }

    //     return null;
    // }
}
?>
