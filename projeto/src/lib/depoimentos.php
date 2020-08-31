<?php

/**
 * Cadastra um depoimento no sistema
 * @param string $nome      Nome do depoente
 * @param string $texto     Texto descritivo do depoimento
 * @param string $foto      Foto do depoente
 * @param bool $ativo       Se o depoimento deve estar ativo ou não no sistema
 * @return bool
 */
function cadastrar_depoimento(string $nome, string $texto, string $foto = '', bool $ativo = true) : bool
{
    $sql = "INSERT INTO depoimentos(nome, texto, foto, ativo) VALUES(?, ?, ?, ?)";
    $params = array($nome, $texto, $foto, $ativo);
    return db_execute($sql, 'sssi', $params);
}

/**
 * Exclui um depoimento do sistema
 * @param int $depoimento_id    ID do depoimento a ser excluído
 * @return bool
 */
function excluir_depoimento(int $depoimento_id) : bool
{
    $sql = "DELETE FROM depoimentos WHERE depoimento_id = ?";
    $params = array($depoimento_id);
    return db_execute($sql, 'i', $params);
}

/**
 * Retorna uma lista dos depoimentos cadastrados no sistema
 * @return array
 */
function get_depoimentos() : array
{
    $sql = "SELECT * FROM depoimentos";
    return db_query($sql);
}

function atualizar_depoimento()
{

}