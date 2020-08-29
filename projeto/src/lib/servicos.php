<?php


function cadastrar_servico(string $nome, string $texto, bool $ativo = true) : bool
{
    $sql = "INSERT INTO servicos (nome_servico, texto_servico, ativo) VALUES(?, ?, ?)";
    $params = array($nome, $texto, $ativo);
    return db_execute($sql, 'ssi', $params);
}

function excluir_servico(int $servico_id) : bool
{
    $sql = "DELETE FROM servicos WHERE servico_id = ?";
    $params = array($servico_id);
    return db_execute($sql, 'i', $params);
}

function get_servicos() : array
{
    $sql = "SELECT * FROM servicos";
    return db_query($sql);
}

function atualizar_servico()
{

}