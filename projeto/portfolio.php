<?php

require_once "config.php";

$lista_portfolio = ProjetoDAO::getProjetos(true);

# Configurações da Página
$titulo_pagina = "Portfolio";
$classe_body = "portfolio";
require_once "includes/header-site.php";

?>

<!-- LISTA DE PROJETOS -->
<section id="lista-projetos">
    <div class="container">
        <div class="row">

            <?php foreach ($lista_portfolio as $projeto) : ?>
                <article class="card col-md-4">
                    <img src="<?= get_imagem_url($projeto->getImagem(), '600x400') ?>" class="img-responsive">
                    <div class="card-body">
                        <h1 class="h3"><?= $projeto->getTitulo() ?></h1>
                        <time>Publicado em: <?= get_data_formatada($projeto->getDataProjeto()) ?></time>
                        <em>Categoria: <?= $projeto->getCategoria()->getNome() ?></em>
                        <p>
                            <?= $projeto->getDescricao() ?>
                        </p>
                        <a href="projeto.php?id=<?= $projeto->getId() ?>" class="btn btn-primary">Ver Projeto</a>
                    </div>
                </article>
            <?php endforeach; ?>

        </div>
        <nav class="nav-paginacao">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
            </ul>
        </nav>
    </div>
</section>

<?php require_once "includes/footer-site.php"; ?>