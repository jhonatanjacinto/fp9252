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

        if (!excluir_membro($id)) {
          throw new Exception('Não foi possível excluir o membro selecionado na base de dados!');
        }

        set_mensagem('Membro excluído com sucesso!', 'alert-success', 'index.php');
    }
}
catch(Exception $e)
{
    set_mensagem($e->getMessage(), 'alert-danger', 'index.php');
}

$lista_membros = get_membros();

# Configurações da Página
$titulo_pagina = "Administração | Time";
$link_ativo = 'time';
require_once 'includes/header-admin.php';

?>

    <!-- CONTEUDO -->
    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2 float-left">Time</h1>
        <a href="adicionar.php" class="btn btn-success float-right">
            Novo Colaborador
        </a>
        <div class="clearfix"></div>
        <hr>
        <p class="lead mb-0">
            Confira abaixo todos os colaboradores cadastrados no time da sua empresa.
        </p>
    </div>
    <div class="container">

        <?php include "templates/alert-mensagens.php"; ?>

        <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Nome completo</th>
                <th scope="col">Cargo</th>
                <th scope="col" width="40%">Minicurrículo</th>
                <th scope="col">Ativo?</th>
                <th scope="col" width="10%" colspan="2"></th>
              </tr>
            </thead>
            <tbody>

                <?php foreach ($lista_membros as $membro) : ?>
                    <tr>
                        <th scope="row"><?= $membro['membro_id'] ?></th>
                        <td><img src="<?= get_imagem_url($membro['foto']) ?>" width="100" class="img-responsive"></td>
                        <td><?= $membro['nome'] ?></td>
                        <td><?= $membro['cargo'] ?></td>
                        <td><?= $membro['minicurriculo'] ?></td>
                        <td><?= $membro['ativo'] ? 'Sim' : 'Não' ?></td>
                        <td>
                            <a href="editar.php?id=<?= $membro['membro_id'] ?>" class="btn btn-primary" title="Editar">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="index.php?excluir=<?= $membro['membro_id'] ?>" class="btn btn-danger" title="Excluir">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
          </table>
    </div>
    

<?php require_once 'includes/footer-admin.php'; ?>