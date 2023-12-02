<?php

namespace Application\models;

class Usuario {
    private $codigo;
    private $nome;
    private $cpf;
    private $email;
    private $senha;


    public function __construct($nome, $cpf, $email, $senha) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->senha = $senha;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }
}
?>
