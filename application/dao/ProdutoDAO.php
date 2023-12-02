<?php
namespace Application\dao;

use Application\models\Produto;

class ProdutoDAO
{
    private $conexao;

    public function __construct()
    {
        try {
            $this->conexao = new \PDO("mysql:host=localhost;dbname=loja", "root", "root");
            $this->conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }
    }

    public function salvar($produto)
    {
        try {
            $nome = $produto->getNome();
            $marca = $produto->getMarca();
            $preco = $produto->getPreco();
            $imagem = $produto->getImagem();

            $stmt = $this->conexao->prepare("INSERT INTO produtos(nome, marca, preco, imagem) VALUES (:nome, :marca, :preco, :imagem)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':marca', $marca);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':imagem', $imagem);

            $stmt->execute();

            return true;
        } catch (\PDOException $e) {
            echo "Erro ao salvar produto: " . $e->getMessage();
            return false;
        }
    }

    public function findAll()
    {
        try {
            $stmt = $this->conexao->query("SELECT * FROM produtos");
            $produtos = [];

            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $produto = new Produto($row["nome"], $row["marca"], $row["preco"], $row["imagem"]);
                $produto->setCodigo($row["codigo"]);
                array_push($produtos, $produto);
            }

            return $produtos;
        } catch (\PDOException $e) {
            echo "Erro ao recuperar produtos: " . $e->getMessage();
            return [];
        }
    }

    public function findById($id)
    {
        try {
            $stmt = $this->conexao->prepare("SELECT * FROM produtos WHERE codigo = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $row = $stmt->fetch(\PDO::FETCH_ASSOC);

            $produto = new Produto($row["nome"], $row["marca"], $row["preco"], $row["imagem"]);
            $produto->setCodigo($row["codigo"]);

            return $produto;
        } catch (\PDOException $e) {
            echo "Erro ao recuperar produto por ID: " . $e->getMessage();
            return null;
        }
    }

    public function atualizar($produto)
    {
        try {
            $codigo = $produto->getCodigo();
            $nome = $produto->getNome();
            $marca = $produto->getMarca();
            $preco = $produto->getPreco();
            $imagem = $produto->getImagem();

            $stmt = $this->conexao->prepare("UPDATE produtos SET nome = :nome, marca = :marca, preco = :preco, imagem = :imagem WHERE codigo = :codigo");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':marca', $marca);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':imagem', $imagem);
            $stmt->bindParam(':codigo', $codigo);

            $stmt->execute();

            return $this->findById($codigo);
        } catch (\PDOException $e) {
            echo "Erro ao atualizar produto: " . $e->getMessage();
            return $produto;
        }
    }

    public function deletar($id)
    {
        try {
            $stmt = $this->conexao->prepare("DELETE FROM produtos WHERE codigo = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return true;
        } catch (\PDOException $e) {
            echo "Erro ao deletar produto: " . $e->getMessage();
            return false;
        }
    }
}
?>
