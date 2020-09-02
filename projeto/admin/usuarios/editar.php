<?php

# Configurações Gerais
require_once 'config.php';
$msg = get_mensagem();
$usuario_info = array();

try
{
    if (isset($_POST['atualizar_usuario']))
    {
        $id = filter_var($_POST['usuario_id'], FILTER_VALIDATE_INT);
        $email_login = filter_var($_POST['email_login'], FILTER_VALIDATE_EMAIL);
        $senha = filter_var($_POST['senha'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $confirmar_senha = filter_var($_POST['confirmar_senha'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $ativo = (bool) ($_POST['ativo'] ?? false);

        if ($email === false) {
            throw new Exception('E-mail inválido!');
        }

        if ($senha != $confirmar_senha) {
            throw new Exception('Senha e Confirmação devem ser iguais!');
        }

        if ($id === false or $id <= 0) {
            throw new Exception('ID inválido!');
        }

        if (!atualizar_usuario($email_login, $senha, $ativo, $id)) {
            throw new Exception('Não foi possível atualizar o usuário especificado!');
        }

        set_mensagem('Usuário atualizado com sucesso!', 'alert-success');
    }


    if (isset($_GET['id']))
    {
        // busca os dados do ID especificado
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        $usuario_info = get_usuario_por_id($id);

        if (!$usuario_info) {
            set_mensagem('Usuário não foi encontrado na base de dados!', 'alert-warning', 'index.php');
        }
    }
    else 
    {
        set_mensagem('ID inválido para edição!', 'alert-warning', 'index.php');
    }
}
catch(Exception $e)
{
    set_mensagem($e->getMessage(), 'alert-danger');
}

# Configurações da Página
$titulo_pagina = "Administração | Editar Usuário";
$link_ativo = 'usuarios';
require_once 'includes/header-admin.php';

?>


    <!-- CONTEUDO -->
    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2 float-left"><span class="text-secondary">Usuários /</span> Editar Usuário</h1>
        <a href="index.php" class="btn btn-success float-right">
            Voltar
        </a>
        <div class="clearfix"></div>
        <hr>
        <p class="lead mb-0">
            Utilize o formulário abaixo para alterar um usuário do site.
        </p>
    </div>
    <div class="container">
    
        <?php include_once "templates/alert-mensagens.php"; ?>

        <form method="POST" class="card" action="">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>* E-mail:</label>
                        <input type="text" class="form-control" name="email_login" value="<?= $usuario_info['email_login'] ?>" placeholder="Insira aqui o e-mail de login.." />
                    </div>
                    <div class="form-group col-md-12">
                        <label>Senha:</label>
                        <input type="password" class="form-control" name="senha" placeholder="Insira aqui a sua senha.." />
                    </div>
                    <div class="form-group col-md-12">
                        <label>Confirmação de Senha:</label>
                        <input type="password" class="form-control" name="confirmar_senha" placeholder="Repita aqui sua senha.." />
                    </div>
                    <div class="form-group col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="ativo" id="checkboxAtivo" value="1" <?= $usuario_info['ativo'] ? 'checked' : null ?>>
                            <label class="custom-control-label" for="checkboxAtivo">Deixar usuário ativo</label>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <button name="atualizar_usuario" class="btn btn-lg btn-success">
                            Salvar Usuário
                        </button>
                        <input type="hidden" name="usuario_id" value="<?= $usuario_info['usuario_id'] ?>">
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php require_once 'includes/footer-admin.php'; ?> 