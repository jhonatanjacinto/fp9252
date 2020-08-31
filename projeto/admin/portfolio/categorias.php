<?php

# Configurações Gerais
require_once 'config.php';
$msg = null;

# Configurações da Página
$titulo_pagina = "Administração | Categorias";
$link_ativo = 'portfolio';
require_once 'includes/header-admin.php';

?>

    <!-- CONTEUDO -->
    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2 float-left">Categorias</h1>
        <a href="adicionar-categoria.php" class="btn btn-success float-right ml-2">
            Nova Categoria
        </a>
        <a href="index.php" class="btn btn-primary float-right ml-2">
            Gerenciar Projetos
        </a>
        <div class="clearfix"></div>
        <hr>
        <p class="lead mb-0">
            Confira abaixo todas as categorias cadastradas para exibição no site.
        </p>
    </div>
    <div class="container">

    <?php include_once "templates/alert-mensagens.php"; ?>

        <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Categoria</th>
                <th scope="col" width="10%" colspan="2"></th>
              </tr>
            </thead>
            <tbody>

                <tr>
                    <th scope="row">1</th>
                    <td>Nome da Categoria</td>
                    <td>
                        <a href="editar-categoria.php" class="btn btn-primary" title="Editar">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="categorias.php" class="btn btn-danger" title="Excluir">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                
            </tbody>
          </table>
    </div>
    
<?php require_once 'includes/footer-admin.php'; ?> 