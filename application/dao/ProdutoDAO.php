<?php

class ProdutoDAO{
   
    // Create (C)

    public function salvar($produto){}

    public function findAll()
    $conexao = new Conexao();

    $conn = $conexao ->getConexao();
    $SQL = "SELECT * FROM produtos";
    $result = $conn -> query($SQL);
    $produtos = [];
    while($row = $result->fetch_assoc()){
        $produto = new Produto($row["nome"],$row["marca"],$row["preco"]);
        $produto ->setCodigo($row["codigo"]);
        array_push($produtos, $produto);
    }
    return $produtos;
}



    // Retrieve (R)

    public function findById($id){
        $conxao = new Conexao();
        $conn = $conexao ->getconexao();
        $SQL = "SELECT * FROM produtos WHERE codigo =".$id;
        $result = conn ->query($SQL);
        $row = $result -> fetch_assoc();
        $produto = new Produto($row["nome"],$row["marca"],$row["preco"]);
        return $produto;
    }


    // Update (U)

    public function atualizar($produto){}


    // Delete (D)
    
    public function apagar($id){}




?>