<?php

/**
 * Funções relacionadas ao gerenciamento de E-mails cadastrados para Newsletter
 */

/**
 * Exclui um email cadastrado na tabela de newsletter na base de dados
 * @param int $email_id    ID do e-mail que deve ser excluído
 * @return bool 
 */
function excluir_email_newsletter(int $email_id): bool
{
    $sql = "DELETE FROM emails_newsletter WHERE email_id = ?";
    $params = array($email_id);
    return db_execute($sql, "i", $params);
}

/**
 * Retorna a lista de e-mails cadastrados na base de dados
 * @return array
 */
function get_emails_newsletter() : array
{
    $sql = "SELECT * FROM emails_newsletter";
    return db_query($sql);
}

/**
 * Cadastra um e-mail para recebimento da newsletter
 * @param string $email     E-mail a ser registrado na base
 * @return bool
 */
function cadastrar_email_newsletter(string $email) : bool 
{
    if (is_email_cadastrado($email)) {
        throw new Exception('E-mail já está cadastrado em nossa base de dados!');
    }

    $sql = "INSERT INTO emails_newsletter (email) VALUES(?)";
    $params = array($email);
    return db_execute($sql, 's', $params);
}

/**
 * Verifica na base de dados se um e-mail já está cadastrado para receber newsletter
 * @param string $email     E-mail a ser verificado
 * @return bool
 */
function is_email_cadastrado(string $email) : bool 
{
    $sql = "SELECT * FROM emails_newsletter WHERE email = ?";
    $params = array( $email );

    $email_encontrado = db_query($sql, 's', $params, true);
    if ($email_encontrado) {
         return true;
    }

    return false;
}
