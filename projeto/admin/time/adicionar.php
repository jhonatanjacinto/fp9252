<?php

# Configurações Gerais
require_once 'config.php';

# Configurações da Página
$titulo_pagina = "Administração | Novo Colaborador";
$link_ativo = 'time';
require_once 'includes/header-admin.php';

?>

    <!-- CONTEUDO -->
    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2 float-left"><span class="text-secondary">Time /</span> Novo Colaborador</h1>
        <a href="index.html" class="btn btn-success float-right">
            Voltar
        </a>
        <div class="clearfix"></div>
        <hr>
        <p class="lead mb-0">
            Utilize o formulário abaixo para cadastrar um novo colaborador no time da sua empresa.
        </p>
    </div>
    <div class="container">
        <form method="POST" class="card" action="">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>* Nome completo:</label>
                        <input type="text" class="form-control" name="nome_completo" placeholder="Insira aqui o nome completo do colaborador..." />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Foto:</label>
                        <input type="file" class="form-control-file" name="foto" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>* Cargo:</label>
                        <input type="text" class="form-control" name="cargo" placeholder="Insira aqui o cargo do colaborador..." />
                    </div>
                    <div class="form-group col-md-6">
                        <label>&nbsp;</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="ativo" id="checkboxAtivo" checked>
                            <label class="custom-control-label" for="checkboxAtivo">Deixar colaborador ativo</label>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>* Minicurrículo:</label>
                        <textarea name="texto" class="form-control" cols="30" rows="10" placeholder="Insira aqui o texto do depoimento..."></textarea>
                    </div>
                    
                    <div class="form-group col-md-12">
                        <button class="btn btn-lg btn-success">
                            Cadastrar Colaborador
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
<?php require_once 'includes/footer-admin.php'; ?> 