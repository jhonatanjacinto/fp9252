<?php


function cadastrar_depoimento(string $nome, string $texto, string $foto = '', bool $ativo = true) : bool
{
    $sql = "INSERT INTO depoimentos(nome, texto, foto, ativo) VALUES(?, ?, ?, ?)";
    $params = array($nome, $texto, $foto, $ativo);
    return db_execute($sql, 'sssi', $params);
}

function excluir_depoimento(int $depoimento_id) : bool
{
    $sql = "DELETE FROM depoimentos WHERE depoimento_id = ?";
    $params = array($depoimento_id);
    return db_execute($sql, 'i', $params);
}

function get_depoimentos() : array
{
    $sql = "SELECT * FROM depoimentos";
    return db_query($sql);
}

function atualizar_depoimento()
{

}