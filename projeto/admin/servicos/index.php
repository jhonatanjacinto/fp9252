<?php

# Configurações Gerais
require_once 'config.php';
$msg = null;

try
{
    if (isset($_GET['excluir']))
    {
        $id = filter_var($_GET['excluir'], FILTER_VALIDATE_INT);
        if ($id === false or $id <= 0) {
          throw new Exception('ID de exclusão fornecido é inválido!');
        }

        if (!excluir_servico($id)) {
          throw new Exception('Não foi possível excluir o serviço selecionado na base de dados!');
        }

        $msg = array(
          'classe' => 'alert-success',
          'mensagem' => 'Serviço excluído com sucesso!'
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

$lista_servicos = get_servicos();

# Configurações da Página
$titulo_pagina = "Administração | Serviços";
$link_ativo = 'servicos';
require_once 'includes/header-admin.php';

?>

    <!-- CONTEUDO -->
    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2 float-left">Serviços</h1>
        <a href="adicionar.php" class="btn btn-success float-right">
            Novo Serviço
        </a>
        <div class="clearfix"></div>
        <hr>
        <p class="lead mb-0">
            Confira abaixo todos os serviços cadastrados para exibição no site.
        </p>
    </div>
    <div class="container">

        <?php include_once "templates/alert-mensagens.php"; ?>

        <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Texto</th>
                <th scope="col">Ativo?</th>
                <th scope="col" width="10%" colspan="2"></th>
              </tr>
            </thead>
            <tbody>
                
                <?php foreach ($lista_servicos as $servico) : ?>
                    <tr>
                        <th scope="row"><?= $servico['servico_id'] ?></th>
                        <td><?= $servico['nome_servico'] ?></td>
                        <td><?= $servico['texto_servico'] ?></td>
                        <td><?= $servico['ativo'] ? 'Sim' : 'Não' ?></td>
                        <td>
                            <a href="editar.php?id=<?= $servico['servico_id'] ?>" class="btn btn-primary" title="Editar">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="index.php?excluir=<?= $servico['servico_id'] ?>" class="btn btn-danger" title="Excluir">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
          </table>
    </div>
    
<?php require_once 'includes/footer-admin.php'; ?> 