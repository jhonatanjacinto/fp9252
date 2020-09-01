<?php

/**
 * Funções relacionadas a operações em banco de dados
 */

/**
 * Retorna o objeto de conexão com a base de dados da aplicação
 */
function get_db_connection()
{
    $conexao = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    if (mysqli_connect_errno()) {
        exit("Não foi possível se conectar à base de dados!");
    }

    return $conexao;
}

/**
 * Executa operações de SELEÇÃO DE DADOS na base de dados
 * @param string $sql             Instrução SQL que deve ser executada no banco
 * @param string $param_types     Tipo dos valores passados como parâmetro do SQL
 * @param array $params           Valores dos parâmetros do SQL
 * @param bool $is_single         Se true retorna um único valor do banco, caso contrário retorna uma lista de valores
 */
function db_query(string $sql, string $param_types = '', array $params = [], bool $is_single = false)
{
    $conexao = get_db_connection();
    $stmt = mysqli_prepare($conexao, $sql);

    if (!$stmt or mysqli_stmt_errno($stmt)) {
        throw new Exception('Erro na estrutura do comando SQL informado!');
    }

    if ($params and $param_types) {
        mysqli_stmt_bind_param($stmt, $param_types, ...$params);
    }

    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    if ($is_single) {
        # retorna só 1 item dos resultados
        return mysqli_fetch_assoc($resultado);
    }

    # retorna todos os dados retornados (lista de informações)
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

/**
 * Executa operações do tipo INSERT, UPDATE e DELETE na base de dados
 * @param string $sql             Instrução SQL que deve ser executada no banco
 * @param string $param_types     Tipo dos valores passados como parâmetro do SQL
 * @param array $params           Valores dos parâmetros do SQL
 */
function db_execute(string $sql, string $param_types = '', array $params = [])
{
    $conexao = get_db_connection();
    $stmt = mysqli_prepare($conexao, $sql);

    if (!$stmt or mysqli_stmt_errno($stmt)) {
        throw new Exception('Erro na estrutura do comando SQL informado!');
    }

    if ($params and $param_types) {
        mysqli_stmt_bind_param($stmt, $param_types, ...$params);
    }

    mysqli_stmt_execute($stmt);
    $erro = mysqli_stmt_errno($stmt);
    mysqli_stmt_close($stmt);

    if ($erro) {
        return false;
    }

    return true;
}
