<?php

include "../projeto/src/lib/utils.php";

/**
 * Modificadores de Acesso
 * public = acesso público, isto é acessível pela instância da Classe (objeto)
 * private = acesso privado, isto é acessível somente de forma interna na classe e na instância dela
 * protected = acesso protegido, isto é, acessível somente internamente na classe, na instância ou em suas subclasses
 */

class Usuario
{
    // propriedades / campos / membros
    private int $id = 0;
    private string $email = '';

    public function __construct(int $id = 1, string $email = 'teste@teste.com.br')
    {
        $this->setId($id);
        $this->setEmail($email);
    }

    // métodos GETTERS e SETTERS
    public function getId() : int { 
        return $this->id;
    }
    public function setId(int $id) {
        if ($id <= 0) {
            throw new Exception('ID inválido!');
        }

        $this->id = $id;
    }

    public function getEmail() : string {
        return $this->email;
    }
    public function setEmail(string $email) {
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if ($email === false) {
            throw new Exception('E-mail inválido!');
        }

        $this->email = $email;
    }
}

$usuario = new Usuario(8, 'jhonatan@gmail.com');

print '<strong>E-mail: </strong>' . $usuario->getEmail();
print '<br><strong>ID:</strong>' . $usuario->getId();
