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

        if (!excluir_email_newsletter($id)) {
          throw new Exception('Não foi possível excluir o e-mail selecionado na base de dados!');
        }

        $msg = array(
          'classe' => 'alert-success',
          'mensagem' => 'E-mail excluído com sucesso!'
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

// obtemos a lista de e-mails da base de dados
$lista_emails = get_emails_newsletter();

# Configurações da Página
$titulo_pagina = "Administração | Newsletter";
$link_ativo = 'newsletter';
require_once 'includes/header-admin.php';

?>

    <!-- CONTEUDO -->
    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2">Newsletter</h1>
        <hr>
        <p class="lead mb-0">
            Confira abaixo a lista de e-mails cadastrados para recebimento da newsletter.
        </p>
    </div>
    <div class="container">

        <?php include_once "templates/alert-mensagens.php"; ?>

        <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">E-mail</th>
                <th scope="col">Data</th>
                <th scope="col" width="5%"></th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($lista_emails as $email) : ?>
                <tr>
                  <th scope="row"><?= $email['email_id'] ?></th>
                  <td><?= $email['email'] ?></td>
                  <td><?= $email['data_cadastro'] ?></td>
                  <td>
                      <a href="index.php?excluir=<?= $email['email_id'] ?>" class="btn btn-danger" title="Excluir">
                          <i class="far fa-trash-alt"></i>
                      </a>
                  </td>
                </tr>
              <?php endforeach; ?>

            </tbody>
          </table>
    </div>
    
<?php require_once 'includes/footer-admin.php'; ?> 