<?php

class Projeto
{
    private int $id = 0;
    private Categoria $categoria;
    private string $titulo = '';
    private string $descricao = '';
    private string $imagem = '';
    private bool $is_ativo = true;
    private string $data_projeto = '';

    public function __construct() {
        $this->categoria = new Categoria();
    }

    public function getId() { 
        return $this->id;
    }
    public function setId(int $id) {
        if ($id <= 0) {
            throw new Exception('ID do Projeto é inválido!');
        }

        $this->id = $id;
    }

    public function getCategoria() { 
        return $this->categoria;
    }
    public function setCategoria(Categoria $categoria) {
        $this->categoria = $categoria;
    }

    public function getTitulo() {
        return $this->titulo;
    }
    public function setTitulo(string $titulo) {
        $titulo = filter_var($titulo, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        if (!$titulo) {
            throw new Exception('Título do Projeto é Obrigatório!');
        }
        $this->titulo = $titulo;
    }

    public function getDescricao() {
        return $this->descricao;
    }
    public function setDescricao(string $descricao) {
        $descricao = filter_var($descricao, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        if (!$descricao) {
            throw new Exception('Descrição do Projeto é Obrigatória!');
        }
        $this->descricao = $descricao;
    }

    public function getImagem() {
        return $this->imagem;
    }
    public function setImagem(string $imagem) {
        $imagem = filter_var($imagem, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $this->imagem = $imagem;
    }

    public function isAtivo() {
        return $this->is_ativo;
    }
    public function setAtivo(bool $ativo = true) {
        $this->is_ativo = $ativo;
    }

    public function getDataProjeto() {
        return $this->data_projeto;
    }
    public function setDataProjeto(string $data_projeto) {
        if (!$data_projeto) {
            throw new Exception('Data do Projeto é obrigatória!');
        }
        $this->data_projeto = $data_projeto;
    }
}