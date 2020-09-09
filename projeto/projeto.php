<?php 

require_once "config.php";

if (!isset($_GET['id'])) {
    header('Location: portfolio.php');
    exit();
}

$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
$projeto = ProjetoDAO::getProjetoPorId($id);

if (!$projeto) {
    header('Location: portfolio.php');
    exit();
}

# Configurações da Página
$titulo_pagina = $projeto->getTitulo();
$classe_body = "projeto";
require_once "includes/header-site.php"; 

?>


     <!-- LISTA DE POSTS -->
     <article id="projeto">
        <div class="container" style="margin-top: 200px;">
             <div class="row">
                <div class="col-lg-4">
                    <img src="<?= get_imagem_url($projeto->getImagem(), '600x400') ?>" class="img-responsive">
                </div>
                <div class="col-lg-8">
                    <h3><?= $projeto->getTitulo() ?></h3>
                    <time>Publicado em: <?= get_data_formatada($projeto->getDataProjeto()) ?></time> <br>
                    <em>Categoria: <?= $projeto->getCategoria()->getNome() ?></em>
                    <p>
                        <?= $projeto->getDescricao() ?>
                    </p>
                </div>
             </div>
        </div>
    </article>   


<?php require_once "includes/footer-site.php"; ?>