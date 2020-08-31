<?php

# Configurações Gerais
require_once 'config.php';
$msg = null;

try 
{
    if (isset($_POST['cadastrar_usuario']))
    {
        $email = filter_var($_POST['email_login'], FILTER_VALIDATE_EMAIL);
        $senha = filter_var($_POST['senha'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $confirmar_senha = filter_var($_POST['confirmar_senha'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $ativo = (bool) ($_POST['ativo'] ?? false);

        if ($email === false) {
            throw new Exception('E-mail inválido!');
        }

        if (!$senha or !$confirmar_senha or $senha != $confirmar_senha) {
            throw new Exception('Senha e Confirmação devem ser preenchidas e iguais!');
        }

        if (!cadastrar_usuario($email, $senha, $ativo)) {
            throw new Exception('Não foi possível cadastrar o usuário informado!');
        }

        $msg = array(
            'classe' => 'alert-success',
            'mensagem' => 'Usuário cadastrado com sucesso!'
        );
    }
}
catch(Exception $e)
{
    $msg = array(
        'classe' => 'alert-danger',
        'mensagem' => $e->getMessage()
    );
}

# Configurações da Página
$titulo_pagina = "Administração | Novo Usuário";
$link_ativo = 'usuarios';
require_once 'includes/header-admin.php';

?>


    <!-- CONTEUDO -->
    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2 float-left"><span class="text-secondary">Usuários /</span> Novo Usuário</h1>
        <a href="index.php" class="btn btn-success float-right">
            Voltar
        </a>
        <div class="clearfix"></div>
        <hr>
        <p class="lead mb-0">
            Utilize o formulário abaixo para cadastrar um novo usuário no site.
        </p>
    </div>
    <div class="container">
    
        <?php include_once "templates/alert-mensagens.php"; ?>

        <form method="POST" class="card" action="">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>* E-mail:</label>
                        <input type="text" class="form-control" name="email_login" placeholder="Insira aqui o e-mail de login.." />
                    </div>
                    <div class="form-group col-md-12">
                        <label>* Senha:</label>
                        <input type="password" class="form-control" name="senha" placeholder="Insira aqui a sua senha.." />
                    </div>
                    <div class="form-group col-md-12">
                        <label>* Confirmação de Senha:</label>
                        <input type="password" class="form-control" name="confirmar_senha" placeholder="Repita aqui sua senha.." />
                    </div>
                    <div class="form-group col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="ativo" id="checkboxAtivo" value="1" checked>
                            <label class="custom-control-label" for="checkboxAtivo">Deixar usuário ativo</label>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <button name="cadastrar_usuario" class="btn btn-lg btn-success">
                            Cadastrar Usuário
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php require_once 'includes/footer-admin.php'; ?> 