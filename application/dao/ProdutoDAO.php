<?php

namespace Application\dao;

class ProdutoDAO
{

    // Create (C)
    public function salvar($produto)
    {
        // 1º instancia o Objeto
        $conexao = new Conexao();

        // 2º recebe a conexao
        $conn = $conexao->getConexao();

        //3º recebe os dados de outra camada
        $nome =  $produto->getNome();
        $marca = $produto->getMarca();
        $preco = $produto->getPreco();

        //4º monta o SQL 
        $SQL = "INSERT INTO produtos (codigo, nome, marca, preco) VALUES (null, '$nome', '$marca', '$preco') ";
        if ($conn->query($SQL) === TRUE) {
            return true;
        } else {
            echo "Error: " . $SQL . "<br/>" . $conn->error;
            return false;
        }
    }

    public function pegaTodos()
    {
    }

    // Retrieve (R)
    public function pegaPorId($id)
    {
    }

    // Update (U)
    public function atualizar($produto)
    {
    }

    // Delete (D)
    public function apagar($id)
    {
    }
}
