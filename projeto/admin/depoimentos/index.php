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

        if (!excluir_depoimento($id)) {
          throw new Exception('Não foi possível excluir o depoimento selecionado na base de dados!');
        }

        set_mensagem('Depoimento excluído com sucesso!', 'alert-success', 'index.php');
    }
}
catch(Exception $e)
{
    set_mensagem($e->getMessage(), 'alert-danger', 'index.php');
}

$lista_depoimentos = get_depoimentos();

# Configurações da Página
$titulo_pagina = "Administração | Depoimentos";
$link_ativo = 'depoimentos';
require_once 'includes/header-admin.php';

?>

    <!-- CONTEUDO -->
    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2 float-left">Depoimentos</h1>
        <a href="adicionar.php" class="btn btn-success float-right">
            Novo Depoimento
        </a>
        <div class="clearfix"></div>
        <hr>
        <p class="lead mb-0">
            Confira abaixo todos os depoimentos cadastrados para exibição no site.
        </p>
    </div>
    <div class="container">

        <?php include "templates/alert-mensagens.php"; ?>

        <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Nome da Pessoa</th>
                <th scope="col" width="40%">Texto</th>
                <th scope="col">Ativo?</th>
                <th scope="col" width="10%" colspan="2"></th>
              </tr>
            </thead>
            <tbody>
            
              <?php foreach ($lista_depoimentos as $depoimento) : ?>
                <tr>
                    <th scope="row"><?= $depoimento['depoimento_id'] ?></th>
                    <td><img src="<?= get_imagem_url($depoimento['foto']) ?>" width="100" class="img-responsive"></td>
                    <td><?= $depoimento['nome'] ?></td>
                    <td><?= $depoimento['texto'] ?></td>
                    <td><?= $depoimento['ativo'] ? 'Sim' : 'Não' ?></td>
                    <td>
                        <a href="editar.php?id=<?= $depoimento['depoimento_id'] ?>" class="btn btn-primary" title="Editar">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="index.php?excluir=<?= $depoimento['depoimento_id'] ?>" class="btn btn-danger" title="Excluir">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
              <?php endforeach; ?>

            </tbody>
          </table>
    </div>
    
<?php require_once 'includes/footer-admin.php'; ?> 