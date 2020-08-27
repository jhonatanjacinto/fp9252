<!DOCTYPE html>
<html lang="pt-br">
<head>
     <meta charset="UTF-8">
	<title><?= SITE_NAME ?>&trade; | <?= $titulo_pagina ?? '' ?></title>
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <link rel="stylesheet" href="<?= SITE_URL ?>assets/css/bootstrap.min.css">
     <link rel="stylesheet" href="<?= SITE_URL ?>assets/css/owl.carousel.css">
     <link rel="stylesheet" href="<?= SITE_URL ?>assets/css/owl.theme.default.min.css">
     <link rel="stylesheet" href="<?= SITE_URL ?>assets/css/font-awesome.min.css">
     <link rel="stylesheet" href="<?= SITE_URL ?>assets/css/tooplate-style.css">
</head>
<body class="<?= $classe_body ?? '' ?>">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">
               <span class="spinner-rotate"></span>
          </div>
     </section>

     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="index.php" class="navbar-brand"><?= SITE_NAME ?> <sup style="font-size:12px;vertical-align: middle;">&trade;</sup></a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                         <li><a href="index.php#home" class="smoothScroll">Home</a></li>
                         <li><a href="index.php#feature" class="smoothScroll">Serviços</a></li>
                         <li><a href="index.php#about" class="smoothScroll">Sobre</a></li>
                         <li><a href="index.php#contact" class="smoothScroll">Contato</a></li>
                         <li><a href="portfolio.php" class="smoothScroll">Portfolio</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="index.php#contact">Fale conosco - <span><?= SITE_EMAIL_CONTATO ?></span></a></li>
                    </ul>
               </div>

          </div>
     </section>