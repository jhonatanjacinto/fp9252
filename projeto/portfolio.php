<?php 

require_once "config.php";

# Configurações da Página
$titulo_pagina = "Portfolio";
$classe_body = "portfolio";
require_once "includes/header-site.php"; 

?>

    <!-- LISTA DE PROJETOS -->
    <section id="lista-projetos">
        <div class="container">
            <div class="row">
                <article class="card col-md-4">
                        <img src="https://placehold.it/600x400" class="img-responsive">
                        <div class="card-body">
                            <h1 class="h3">Título do projeto #1</h1>
                            <time>Publicado em: 12/04/1991</time>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, et cum ab qui tempore animi quod. Illum rerum earum provident possimus corporis commodi, numquam ea eius ullam rem eum reprehenderit.
                            </p>
                            <a href="projeto.html" class="btn btn-primary">Ver Projeto</a>
                        </div>
                    </article>
                    <article class="card col-md-4">
                        <img src="https://placehold.it/600x400" class="img-responsive">
                        <div class="card-body">
                            <h1 class="h3">Título do projeto #1</h1>
                            <time>Publicado em: 12/04/1991</time>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, et cum ab qui tempore animi quod. Illum rerum earum provident possimus corporis commodi, numquam ea eius ullam rem eum reprehenderit.
                            </p>
                            <a href="projeto.html" class="btn btn-primary">Ver Projeto</a>
                        </div>
                    </article>
                    <article class="card col-md-4">
                        <img src="https://placehold.it/600x400" class="img-responsive">
                        <div class="card-body">
                            <h1 class="h3">Título do projeto #1</h1>
                            <time>Publicado em: 12/04/1991</time>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, et cum ab qui tempore animi quod. Illum rerum earum provident possimus corporis commodi, numquam ea eius ullam rem eum reprehenderit.
                            </p>
                            <a href="projeto.html" class="btn btn-primary">Ver Projeto</a>
                        </div>
                    </article>
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