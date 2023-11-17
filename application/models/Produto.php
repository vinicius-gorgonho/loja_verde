<?php 
namespace Application\models;
class Produto{
    private $codigo;
    private $nome;
    private $marca;
    private $preco;
public function __construct($nome, $marca,$preco){
       $this->nome = $nome;
       $this->marca = $marca;
       $this->preco = $preco;
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
}