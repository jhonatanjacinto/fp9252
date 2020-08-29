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

/** Configurações de Banco de Dados */
define('DB_HOST', 'localhost');
define('DB_NAME', 'caeland');
define('DB_USER', 'root');
define('DB_PWD', '');


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