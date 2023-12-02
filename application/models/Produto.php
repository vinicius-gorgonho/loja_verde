<?php
namespace Application\models;
class Produto{
    private $codigo;
    private $nome;
    private $marca;
    private $preco;
    private $imagem;
public function __construct($nome, $marca,$preco,$imagem){
       $this->nome = $nome;
       $this->marca = $marca;
       $this->preco = $preco;
       $this->imagem = $imagem;
    }
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    public function getCodigo(){
        return $this->codigo;
    }
    public function getNome(){return $this->nome;}

    public function getMarca(){return $this->marca;}
    public function getPreco(){return $this->preco;}
    public function getImagem(){return $this->imagem;}
}
?>