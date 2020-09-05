<?php

# Configurações Gerais
require_once 'config.php';
$msg = get_mensagem();

try
{
    if (isset($_GET['excluir']))
    {
        $id = filter_var($_GET['excluir'], FILTER_VALIDATE_INT);
        if (!ProjetoDAO::excluir($id)) {
            throw new Exception('Não foi possível excluir o projeto selecionado!');
        }

        set_mensagem('Projeto excluído com sucesso!', 'alert-success', 'index.php');
    }
}
catch(Exception $e)
{
    set_mensagem($e->getMessage(), 'alert-danger', 'index.php');
}

# Lista de Projetos do Portfolio
$lista_projetos = ProjetoDAO::getProjetos();

# Configurações da Página
$titulo_pagina = "Administração | Portfolio";
$link_ativo = 'portfolio';
require_once 'includes/header-admin.php';

?>

    <!-- CONTEUDO -->
    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2 float-left">Portfolio</h1>
        <a href="adicionar.php" class="btn btn-success float-right ml-2">
            Novo Projeto
        </a>
        <a href="categorias.php" class="btn btn-primary float-right ml-2">
            Gerenciar Categorias
        </a>
        <div class="clearfix"></div>
        <hr>
        <p class="lead mb-0">
            Confira abaixo todos os projetos cadastrados para exibição no site.
        </p>
    </div>
    <div class="container">

    <?php include_once "templates/alert-mensagens.php"; ?>

        <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Imagem</th>
                <th scope="col">Categoria</th>
                <th scope="col">Título</th>
                <th scope="col">Data do Projeto</th>
                <th scope="col">Ativo?</th>
                <th scope="col" width="10%" colspan="2"></th>
              </tr>
            </thead>
            <tbody>
                
            <?php foreach ($lista_projetos as $projeto) : ?>
                <tr>
                    <th scope="row"><?= $projeto->getId() ?></th>
                    <td><img src="<?= get_imagem_url( $projeto->getImagem() ) ?>" width="100" class="img-responsive" /></td>
                    <td><?= $projeto->getCategoria()->getNome() ?></td>
                    <td><?= $projeto->getTitulo() ?></td>
                    <td><?= get_data_formatada( $projeto->getDataProjeto() ) ?></td>
                    <td><?= $projeto->isAtivo() ? 'Sim' : 'Não' ?></td>
                    <td>
                        <a href="editar.php?id=<?= $projeto->getId() ?>" class="btn btn-primary" title="Editar">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="index.php?excluir=<?= $projeto->getId() ?>" class="btn btn-danger" title="Excluir">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
          </table>
    </div>
    
<?php require_once 'includes/footer-admin.php'; ?> 