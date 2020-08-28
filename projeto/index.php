<?php 

# Configurações Gerais
require_once "config.php";

# Configurações da Página
$titulo_pagina = "Agência Criativa";
require_once "includes/header-site.php";

# incluimos aqui cada seção da página principal
include_once "templates/banner-newsletter.php";
include_once "templates/nossos-servicos.php";
include_once "templates/sobre.php";
include_once "templates/depoimentos.php";
include_once "templates/formulario-contato.php";

require_once "includes/footer-site.php";