<?php

/**
 * Cadastra um membro no time da empresa
 * @param string $nome              Nome do membro
 * @param string $cargo             Cargo do Membro
 * @param string $minicurriculo     Minicurrículo do membro
 * @param string $foto              Foto do Membro
 * @param bool $ativo               Indica se o membro deve estar ativo ou não
 * @return bool
 */
function cadastrar_membro(string $nome, string $cargo, string $minicurriculo, string $foto = '', bool $ativo = true) : bool
{
    $sql = "INSERT INTO nosso_time (nome, cargo, minicurriculo, foto, ativo) VALUES(?, ?, ?, ?, ?)";
    $params = array($nome, $cargo, $minicurriculo, $foto, $ativo);
    return db_execute($sql, 'ssssi', $params);
}

/**
 * Exclui um membro do time da empresa
 * @param int $membro_id        ID do membro a ser excluído
 * @return bool
 */
function excluir_membro(int $membro_id) : bool
{
    $sql = "DELETE FROM nosso_time WHERE membro_id = ?";
    $params = array($membro_id);
    return db_execute($sql, 'i', $params);
}

/**
 * Retorna uma lista com todos os membros cadastrados no sistema
 * @return array
 */
function get_membros(bool $ativos_only = false) : array
{
    if ($ativos_only) {
        $sql = "SELECT * FROM nosso_time WHERE ativo = 1";
        return db_query($sql);
    }

    $sql = "SELECT * FROM nosso_time";
    return db_query($sql);
}

/**
 * Retorna um membro selecionado na base por seu ID
 * @param int $membro_id     ID do membro a ser selecionado
 * @return array|null
 */
function get_membro_por_id(int $membro_id) : ?array
{
    $sql = "SELECT * FROM nosso_time WHERE membro_id = ?";
    $params = array($membro_id);
    return db_query($sql, 'i', $params, true);
}

/**
 * Atualiza um membro no time da empresa
 * @param string $nome              Nome do membro
 * @param string $cargo             Cargo do Membro
 * @param string $minicurriculo     Minicurrículo do membro
 * @param string $foto              Foto do Membro
 * @param bool $ativo               Indica se o membro deve estar ativo ou não
 * @param bool $membro_id           ID do membro a ser atualizado
 * @return bool
 */
function atualizar_membro(string $nome, string $cargo, string $minicurriculo, string $foto = '', bool $ativo = true, int $membro_id) : bool
{
    $sql = "UPDATE nosso_time SET nome = ?, cargo = ?, minicurriculo = ?, foto = ?, ativo = ? WHERE membro_id = ?";
    $params = array($nome, $cargo, $minicurriculo, $foto, $ativo, $membro_id);
    return db_execute($sql, 'ssssii', $params);
}