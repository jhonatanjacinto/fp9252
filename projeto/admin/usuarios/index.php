<?php

# Configurações Gerais
require_once 'config.php';
$msg = get_mensagem();

try
{
    if (isset($_GET['excluir']))
    {
        $id = filter_var($_GET['excluir'], FILTER_VALIDATE_INT);
        if ($id === false or $id <= 0) {
          throw new Exception('ID de exclusão fornecido é inválido!');
        }

        if (!excluir_usuario($id)) {
          throw new Exception('Não foi possível excluir o usuário selecionado na base de dados!');
        }

        set_mensagem('Usuário excluído com sucesso!', 'alert-success', 'index.php');
    }
}
catch(Exception $e)
{
    set_mensagem($e->getMessage(), 'alert-danger', 'index.php');
}

$lista_usuarios = get_usuarios();

# Configurações da Página
$titulo_pagina = "Administração | Usuários";
$link_ativo = 'usuarios';
require_once 'includes/header-admin.php';

?>

    <!-- CONTEUDO -->
    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2 float-left">Usuários</h1>
        <a href="adicionar.php" class="btn btn-success float-right">
            Novo Usuário
        </a>
        <div class="clearfix"></div>
        <hr>
        <p class="lead mb-0">
            Confira abaixo todos os usuários cadastrados no site.
        </p>
    </div>
    <div class="container">

    <?php include_once "templates/alert-mensagens.php"; ?>

        <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Login</th>
                <th scope="col">Ativo?</th>
                <th scope="col" width="10%" colspan="2"></th>
              </tr>
            </thead>
            <tbody>

            <?php foreach ($lista_usuarios as $usuario) : ?>
                <tr>
                    <th scope="row"><?= $usuario['usuario_id'] ?></th>
                    <td><?= $usuario['email_login'] ?></td>
                    <td><?= $usuario['ativo'] ? 'Sim' : 'Não' ?></td>
                    <td>
                        <a href="editar.php?id=<?= $usuario['usuario_id'] ?>" class="btn btn-primary" title="Editar">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="index.php?excluir=<?= $usuario['usuario_id'] ?>" class="btn btn-danger" title="Excluir">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
          </table>
    </div>
    
<?php require_once 'includes/footer-admin.php'; ?> 