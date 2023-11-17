<?php
namespace Application\dao;

use Application\models\Produto;

class ProdutoDAO{
    // Create (C)
public function salvar($produto){ 
    $conexao = new Conexao(); // 1- Instancia o Objeto
    // 2- Recebe a conexão
    $conn = $conexao->getConexao();
    // 3 - Receber os dados da outra camada
    $nome =  $produto->getNome();
    $marca = $produto->getMarca();
    $preco = $produto->getPreco();
    // 4 - Monta o SQL
$SQL = "INSERT INTO produtos(codigo, nome, marca, preco) 
VALUES (null, '$nome', '$marca', '$preco')";
    if($conn->query($SQL) === TRUE){
        return true;
    }else{ echo "Error: ". $SQL. "<br />".$conn->error;
    return false;
    }

    }
    public function findAll(){
    // 1 - Instancia
    $conexao = new Conexao();
    // 2 - Recebe 
    $conn = $conexao->getConexao();
    $SQL = "SELECT * FROM produtos";
    $result = $conn->query($SQL);
    $produtos = [];
    while($row = $result->fetch_assoc()){
$produto = new Produto($row["nome"], $row["marca"], $row["preco"]);
$produto->setCodigo($row["codigo"]);
array_push($produtos, $produto);
    }
    return $produtos;
    }
    // Retrieve (R)
    public function findById($id){
     $conexao = new Conexao();
     $conn = $conexao->getConexao();
     $SQL = "SELECT * FROM produtos WHERE codigo =".$id;
     $result = $conn->query($SQL);
     $row = $result->fetch_assoc();
$produto = new Produto($row["nome"], $row["marca"], $row["preco"]);
     $produto->setCodigo($row["codigo"]);
     return $produto;
    }
    // Update (U)
    public function atualizar($produto){}
    // Delete (D)
    public function apagar($id){}

}


?>