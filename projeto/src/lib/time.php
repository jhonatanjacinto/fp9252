<?php

function cadastrar_membro(string $nome, string $cargo, string $minicurriculo, string $foto = '', bool $ativo = true) : bool
{
    $sql = "INSERT INTO nosso_time (nome, cargo, minicurriculo, foto, ativo) VALUES(?, ?, ?, ?, ?)";
    $params = array($nome, $cargo, $minicurriculo, $foto, $ativo);
    return db_execute($sql, 'ssssi', $params);
}

function excluir_membro(int $membro_id) : bool
{
    $sql = "DELETE FROM nosso_time WHERE membro_id = ?";
    $params = array($membro_id);
    return db_execute($sql, 'i', $params);
}

function get_membros() : array
{
    $sql = "SELECT * FROM nosso_time";
    return db_query($sql);
}

function atualizar_membro()
{

}