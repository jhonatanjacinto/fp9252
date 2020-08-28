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
    $email_id = filter_var($email_id, FILTER_VALIDATE_INT);
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
