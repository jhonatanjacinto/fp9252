<?php

/**
 * Configurações Gerais do Site
 */
define('SITE_NAME', 'Caeland');
define('SITE_URL', 'http://localhost/FP-73/projeto/');
define('SITE_EMAIL_CONTATO', 'oi@caeland.com');
define('SITE_TWITTER_URL', 'https://twitter.com/caeland');
define('SITE_FACEBOOK_URL', 'https://facebook.com/caeland');
define('SITE_INSTAGRAM_URL', 'https://instagram.com/caeland');
define('SITE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/FP-73/projeto/');
define('SITE_PATH_IMG', SITE_PATH . 'assets/images/');
define('SITE_URL_IMG', SITE_URL . 'assets/images/');

/** Configurações de Banco de Dados */
define('DB_HOST', 'localhost');
define('DB_NAME', 'caeland');
define('DB_USER', 'root');
define('DB_PWD', '');

/** Habilita o uso de sessões na nossa aplicação */
if (!session_id()) {
    session_start();
}

/**
 * Importamos as bibliotecas necessárias para o funcionamento do sistema
 */
require_once "lib/db.php";
require_once "lib/utils.php";
require_once "lib/emails-newsletter.php";
require_once "lib/contatos.php";
require_once "lib/depoimentos.php";
require_once "lib/time.php";
require_once "lib/usuarios.php";
require_once "lib/servicos.php";

/** Realiza o logout do usuário */
if (isset($_GET['logout'])) {
    logout();
}

/** Bloqueia o acesso ao admin */
bloquear_acesso_admin();