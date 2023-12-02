<?php

namespace Application\dao;

use Application\models\Produto;

class ProdutoDAO
{
    private $conexao;

    public function __construct()
    {
        try {
            $this->conexao = new \PDO("mysql:host=localhost;dbname=loja_verde", "root", "2303");
            $this->conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }
    }

    public function salvar($produtos)
    {
        try {
            $nome = $produtos->getNome();
            $marca = $produtos->getMarca();
            $preco = $produtos->getPreco();
            $imagem = $produtos->getImagem();

            $stmt = $this->conexao->prepare("INSERT INTO produtos(nome, marca, preco, imagem) VALUES (:nome, :marca, :preco, :imagem)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':marca', $marca);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':imagem', $imagem);

            $stmt->execute();

            return true;
        } catch (\PDOException $e) {
            echo "Erro ao salvar produtos: " . $e->getMessage();
            return false;
        }
    }

    public function findAll()
    {
        try {
            $stmt = $this->conexao->query("SELECT * FROM produtos ;");
            $produtos = [];

            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $produtos = new produtos($row["nome"], $row["marca"], $row["preco"], $row["imagem"]);
                $produtos->setCodigo($row["codigo"]);
                array_push($produtos[], $produtos);
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

            $produtos = new produtos($row["nome"], $row["marca"], $row["preco"], $row["imagem"]);
            $produtos->setCodigo($row["codigo"]);

            return $produtos;
        } catch (\PDOException $e) {
            echo "Erro ao recuperar produto por ID: " . $e->getMessage();
            return null;
        }
    }

    public function atualizar($produtos)
    {
        try {
            $codigo = $produtos->getCodigo();
            $nome = $produtos->getNome();
            $marca = $produtos->getMarca();
            $preco = $produtos->getPreco();
            $imagem = $produtos->getImagem();

            $stmt = $this->conexao->prepare("UPDATE produtos SET nome = :nome, marca = :marca, preco = :preco, imagem = :imagem WHERE codigo = :codigo");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':marca', $marca);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':imagem', $imagem);
            $stmt->bindParam(':codigo', $codigo);

            $stmt->execute();

            return $this->findById($codigo);
        } catch (\PDOException $e) {
            echo "Erro ao atualizar produtos: " . $e->getMessage();
            return $produtos;
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
            echo "Erro ao deletar produtos: " . $e->getMessage();
            return false;
        }
    }
}
