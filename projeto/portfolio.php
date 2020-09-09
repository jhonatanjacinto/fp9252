<?php

require_once "config.php";

$pagina = (int) ($_GET['pagina'] ?? 1);
$quantidade = 1;
$lista_portfolio = ProjetoDAO::getProjetos(true, $pagina, $quantidade);
$total = ProjetoDAO::$totalRegistros;
$total_paginas = ceil($total / $quantidade);

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

        <?php if ($total_paginas > 1) : ?>
            <nav class="nav-paginacao">
                <ul class="pagination">
                    <?php if ($pagina > 1) : ?>
                        <li class="page-item"><a class="page-link" href="portfolio.php?pagina=<?= $pagina - 1 ?>">Anterior</a></li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $total_paginas; $i++) : ?>
                        <li class="page-item <?= $pagina == $i ? 'active' : null ?>">
                            <a class="page-link" href="portfolio.php?pagina=<?= $i ?>">
                                <?= $i ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                    
                    <?php if ($pagina < $total_paginas) : ?>
                        <li class="page-item"><a class="page-link" href="portfolio.php?pagina=<?= $pagina + 1 ?>">Próximo</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        <?php endif; ?>

    </div>
</section>

<?php require_once "includes/footer-site.php"; ?>