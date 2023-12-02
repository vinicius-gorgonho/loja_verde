<?php

namespace Application\dao;

class Conexao
{
    private $dbName = "loja_verde";
    private $usuario = "root";
    private $senha = "2303";
    private $host = "localhost";


    private $conn;
    public function __construct()
    {
        $this->conn = new \mysqli(
            $this->host,
            $this->usuario,
            $this->senha,
            $this->dbName
        );
    }
    public function getConexao()
    {
        if ($this->conn->connect_error) {
            die("A conexão falhou. " . $this->conn->connect_error);
        }
        return $this->conn;
    }
    public function desconectar()
    {
        $this->conn->close();
    }
}
