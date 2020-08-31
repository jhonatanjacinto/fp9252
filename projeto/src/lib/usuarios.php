<?php

/**
 * Cadastra um usuário admin no sistema
 * @param string $email_login       E-mail de login do usuário
 * @param string $senha             Senha do Usuário
 * @param bool $ativo               Indica se o usuário está ativo ou não
 * @return bool
 */
function cadastrar_usuario(string $email_login, string $senha, bool $ativo = true) : bool
{
    if (is_usuario_cadastrado($email_login)) {
        throw new Exception('E-mail já cadastrado para um usuário no sistema!');
    }

    $sql = "INSERT INTO usuarios_admin(email_login, senha, ativo) VALUES(?, ?, ?)";
    $params = array($email_login, $senha, $ativo);
    return db_execute($sql, 'ssi', $params);
}

/**
 * Verifica se um usuário já está cadastrado na base de dados
 * @param string $email_login       Usuário a ser verificado
 * @return bool
 */
function is_usuario_cadastrado(string $email_login) : bool 
{
    $sql = "SELECT email_login FROM usuarios_admin WHERE email_login = ?";
    $param = array($email_login);
    $resultado = db_query($sql, 's', $param);

    if ($resultado) {
        return true;
    }

    return false;
}

/**
 * Exclui um usuário admin do sistema
 * @param int $usuario_id       ID do usuário
 * @return bool
 */
function excluir_usuario(int $usuario_id) : bool
{
    $sql = "DELETE FROM usuarios_admin WHERE usuario_id = ?";
    $params = array($usuario_id);
    return db_execute($sql, 'i', $params);
}

/**
 * Retorna a lista de usuários cadastrados no sistema
 * @return array
 */
function get_usuarios() : array 
{
    $sql = "SELECT * FROM usuarios_admin";
    return db_query($sql);
}

function atualizar_usuario()
{

}