<?php

/**
 * Cadastra um serviço no sistema
 * @param string $nome      Nome do serviço a ser cadastrado
 * @param string $texto     Texto descritivo do serviço
 * @param bool $ativo       Indica se o serviço deve estar ativo no site ou não
 * @return bool
 */
function cadastrar_servico(string $nome, string $texto, bool $ativo = true) : bool
{
    $sql = "INSERT INTO servicos (nome_servico, texto_servico, ativo) VALUES(?, ?, ?)";
    $params = array($nome, $texto, $ativo);
    return db_execute($sql, 'ssi', $params);
}

/**
 * Exclui um serviço específico do sistema
 * @param int $servico_id   ID do serviço a ser excluído
 * @return bool
 */
function excluir_servico(int $servico_id) : bool
{
    $sql = "DELETE FROM servicos WHERE servico_id = ?";
    $params = array($servico_id);
    return db_execute($sql, 'i', $params);
}

/**
 * Retorna a lista de serviços cadastrados no sistema
 * @return array
 */
function get_servicos(bool $ativos_only = false) : array
{
    if ($ativos_only) {
        $sql = "SELECT * FROM servicos WHERE ativo = 1";
        return db_query($sql);
    }

    $sql = "SELECT * FROM servicos";
    return db_query($sql);
}

/**
 * Retorna a um serviço por seu ID do banco de dados
 * @param int $servico_id   ID do serviço a ser consultado no banco
 * @return array|null
 */
function get_servico_por_id(int $servico_id) : ?array
{
    $sql = "SELECT * FROM servicos WHERE servico_id = ?";
    $params = array($servico_id);
    return db_query($sql, 'i', $params, true);
}   

/**
 * Atualiza um serviço no sistema
 * @param string $nome      Nome do serviço a ser cadastrado
 * @param string $texto     Texto descritivo do serviço
 * @param bool $ativo       Indica se o serviço deve estar ativo no site ou não
 * @param int $servico_id   ID do serviço a ser atualizado
 * @return bool
 */
function atualizar_servico(string $nome, string $texto, bool $ativo = true, int $servico_id) : bool
{
    $sql = "UPDATE servicos SET nome_servico = ?, texto_servico = ?, ativo = ? WHERE servico_id = ?";
    $params = array($nome, $texto, $ativo, $servico_id);
    return db_execute($sql, 'ssii', $params);
}