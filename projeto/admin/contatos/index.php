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

        if (!excluir_contato($id)) {
          throw new Exception('Não foi possível excluir a mensagem de contato selecionada na base de dados!');
        }

        set_mensagem('Contato excluído com sucesso!', 'alert-success', 'index.php');
    }
}
catch(Exception $e)
{
    set_mensagem($e->getMessage(), 'alert-danger', 'index.php');
}

# lista de contatos do banco
$lista_contatos = get_contatos();

# Configurações da Página
$titulo_pagina = "Administração | Contatos";
$link_ativo = 'contatos';
require_once 'includes/header-admin.php';

?>
    <!-- CONTEUDO -->
    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2">Contatos</h1>
        <hr>
        <p class="lead mb-0">
            Confira abaixo todas as mensagens enviadas pelo formulário de contato do site.
        </p>
    </div>
    <div class="container">

        <?php include_once "templates/alert-mensagens.php"; ?>

        <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col" width="40%">Mensagem</th>
                <th scope="col">Data</th>
                <th scope="col" width="5%"></th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($lista_contatos as $contato) : ?>
                <tr>
                  <th scope="row"><?= $contato['contato_id'] ?></th>
                  <td><?= $contato['nome'] ?></td>
                  <td><?= $contato['email'] ?></td>
                  <td><?= $contato['mensagem'] ?></td>
                  <td><?= $contato['data_contato'] ?></td>
                  <td>
                      <a href="index.php?excluir=<?= $contato['contato_id'] ?>" class="btn btn-danger" title="Excluir">
                          <i class="far fa-trash-alt"></i>
                      </a>
                  </td>
                </tr>
              <?php endforeach; ?>

            </tbody>
          </table>
    </div>

<?php require_once 'includes/footer-admin.php'; ?>
    