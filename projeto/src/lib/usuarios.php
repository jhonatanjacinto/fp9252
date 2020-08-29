<?php

function cadastrar_usuario(string $email_login, string $senha, bool $ativo = true) : bool
{
    $sql = "INSERT INTO usuarios_admin(email_login, senha, ativo) VALUES(?, ?, ?)";
    $params = array($email_login, $senha, $ativo);
    return db_execute($sql, 'ssi', $params);
}

function excluir_usuario(int $usuario_id) : bool
{
    $sql = "DELETE FROM usuarios_admin WHERE usuario_id = ?";
    $params = array($usuario_id);
    return db_execute($sql, 'i', $params);
}

function get_usuarios() : array 
{
    $sql = "SELECT * FROM usuarios_admin";
    return db_query($sql);
}

function atualizar_usuario()
{

}