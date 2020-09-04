<?php

class Categoria
{
    private int $id = 0;
    private string $nome = '';

    public function __construct() {}

    public function getId() { 
        return $this->id;
    }
    public function setId(int $id) {
        if ($id <= 0) {
            throw new Exception('ID da Categoria inválido!');
        }

        $this->id = $id;
    }

    public function getNome() { 
        return $this->nome;
    }
    public function setNome(string $nome) {
        $nome = filter_var($nome, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        if (trim($nome) == '') {
            throw new Exception('Nome da Categoria é inválido!');
        }

        $this->nome = $nome;
    }
}