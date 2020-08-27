<?php

# Configurações Gerais
require_once 'config.php';

# Configurações da Página
$titulo_pagina = "Administração | Bem-vindo(a)";
$link_ativo = 'home';
require_once 'includes/header-admin.php';

?>

    <!-- CONTEUDO -->
    <div class="jumbotron container">
        <h1 class="display-4">Olá, <strong>andre@gmail.com</strong></h1>
        <p class="lead">
            Seja bem-vindo(a) a área de administração do seu website. Aqui você poderá gerenciar os conteúdos exibidos no Caeland&trade;
            assim como cadastros e contatos realizados por seus visitantes.
        </p>
        <hr class="my-4">
        <p>Caso tenha entrado na sua conta sem querer, clique no botão abaixo para sair do sistema.</p>
        <p class="lead">
            <a class="btn btn-danger btn-lg" href="login.html" role="button">Fazer Logout</a>
        </p>
    </div>
    
<?php require_once 'includes/footer-admin.php'; ?>
    