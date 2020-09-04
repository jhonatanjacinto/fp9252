<?php

class DB
{
    private $conexao = null;

    public function __construct()
    {
        $this->conexao = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME);
        if ($this->conexao->connect_errno) {
            throw new Exception('Não foi possível conectar à base de dados.');
        }
    }

    public function __destruct()
    {
        $this->conexao->close();
    }

    public function execute(string $sql, string $param_types = '', array $params = array()) : bool 
    {
        $stmt = $this->conexao->prepare($sql);
        if (!$stmt or $stmt->errno) {
            throw new Exception('Erro na estrutura do comando SQL informado!');
        }

        if ($params and $param_types) {
            $stmt->bind_param($param_types, ...$params);
        }

        $stmt->execute();
        $erro = $stmt->errno;
        $stmt->close();

        if ($erro) {
            return false;
        }

        return true;
    }

    public function query(string $sql, string $param_types = '', array $params = array(), bool $is_single = false) : ?array 
    {
        $stmt = $this->conexao->prepare($sql);
        if (!$stmt or $stmt->errno) {
            throw new Exception('Erro na estrutura do comando SQL informado!');
        }

        if ($params and $param_types) {
            $stmt->bind_param($param_types, ...$params);
        }

        $stmt->execute();
        $resultado = $stmt->get_result();
        $stmt->close();

        if ($is_single) {
            # retorna somente 1 dado
            return $resultado->fetch_assoc();
        }

        return $resultado->fetch_all(MYSQLI_ASSOC);

    }


}