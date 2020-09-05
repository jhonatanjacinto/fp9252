<?php

abstract class Usuario {
    protected string $email;
    protected string $senha;

    public function login() : string {
        return $this->email . ' está logando no sistema...';
    }

    public function logout() : string {
        return $this->email . ' está saindo do sistema...';
    }

    public abstract function getPermissoes() : array;
}

class UsuarioAdmin extends Usuario {
    function __construct(string $email, string $senha)
    {
        $this->email = $email;
        $this->senha = $senha;
    }

    public function getPermissoes(): array
    {
        return array('Editar', 'Excluir', 'Cadastrar', 'Selecionar');
    }
}

class UsuarioEditor extends Usuario {
    function __construct(string $email, string $senha)
    {
        $this->email = $email;
        $this->senha = $senha;
    }
    public function getPermissoes(): array
    {
        return array('Editar', 'Selecionar');
    }
}

class UsuarioFactory {
    public const USUARIO_EDITOR = 'editor';
    public const USUARIO_ADMIN = 'admin';

    public static function Create(string $email, string $senha, string $tipo = self::USUARIO_EDITOR)
    {
        if ($tipo == self::USUARIO_EDITOR) {
            return new UsuarioEditor($email, $senha);
        }
        else if ($tipo == self::USUARIO_ADMIN) {
            return new UsuarioAdmin($email, $senha);
        }
    }
}

$editor = UsuarioFactory::Create('editor@site.com', '123456', UsuarioFactory::USUARIO_EDITOR);
$admin = UsuarioFactory::Create('admin@site.com', '123456789', UsuarioFactory::USUARIO_ADMIN);

var_dump($editor === $admin);
print '<br>';
var_dump($editor->getPermissoes());
print '<br>';
var_dump($admin->getPermissoes());
print '<br>';