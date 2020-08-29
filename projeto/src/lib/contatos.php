<?php

/**
 * Funções que gerenciam os contatos da nossa aplicação
 */

 /**
  * Cadastra uma mensagem de contato no banco de dados
  * @param string $nome         Nome da pessoa que entrou em contato
  * @param string $email        E-mail do contatante
  * @param string $mensagem     Mensagem enviada pelo contatante
  * @return bool
  */
function cadastrar_contato(string $nome, string $email, string $mensagem) : bool
{
    $sql = "INSERT INTO contatos (nome, email, mensagem) VALUES(?, ?, ?)";
    $params = array( $nome, $email, $mensagem );
    return db_execute($sql, 'sss', $params);
}

/**
 * Exclui uma mensagem de contato do banco de dados
 * @param int $contato_id   ID da mensagem a ser excluída
 * @return bool
 */
function excluir_contato(int $contato_id) : bool
{
    $sql = "DELETE FROM contatos WHERE contato_id = ?";
    $params = array($contato_id);
    return db_execute($sql, 'i', $params);
}

/**
 * Seleciona as mensagens de contato da base de dados
 * @return array
 */
function get_contatos() : array
{
    $sql = "SELECT * FROM contatos";
    return db_query($sql);
}