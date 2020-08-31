<?php

# Configurações Gerais
require_once 'config.php';
$msg = null;

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
                
                    <tr>
                        <th scope="row">1</th>
                        <td>Nome do Serviço</td>
                        <td>Conteúdo do Serviço</td>
                        <td>Sim</td>
                        <td>
                            <a href="editar.php" class="btn btn-primary" title="Editar">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="index.php" class="btn btn-danger" title="Excluir">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                
            </tbody>
          </table>
    </div>
    
<?php require_once 'includes/footer-admin.php'; ?> 