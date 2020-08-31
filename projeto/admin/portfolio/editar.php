<?php

# Configurações Gerais
require_once 'config.php';
$msg = null;

# Configurações da Página
$titulo_pagina = "Administração | Editar Projeto";
$link_ativo = 'portfolio';
require_once 'includes/header-admin.php';

?>

    <!-- CONTEUDO -->
    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2 float-left"><span class="text-secondary">Portfolio /</span> Editar Projeto</h1>
        <a href="index.php" class="btn btn-success float-right">
            Voltar
        </a>
        <div class="clearfix"></div>
        <hr>
        <p class="lead mb-0">
            Utilize o formulário abaixo para realizar alterações no projeto selecionado.
        </p>
    </div>
    <div class="container">

        <?php include_once "templates/alert-mensagens.php"; ?>

        <form method="POST" class="card" action="" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>* Título do Projeto:</label>
                        <input type="text" class="form-control" name="titulo" value="" placeholder="Insira aqui o título do projeto..." />
                    </div>
                    <div class="form-group col-md-6">
                        <label>* Categoria do Projeto:</label>
                        <select name="categoria" class="form-control custom-select">
                            <option value="">-- Selecione uma Categoria --</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Imagem:</label>
                        <input type="file" class="form-control-file" name="imagem" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>* Texto do Projeto:</label>
                        <textarea name="descricao" class="form-control" cols="30" rows="10" placeholder="Insira aqui o texto do projeto..."></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="ativo" id="checkboxAtivo" value="1">
                            <label class="custom-control-label" for="checkboxAtivo">Deixar projeto ativo</label>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <button name="atualizar_projeto" class="btn btn-lg btn-success">
                            Salvar Projeto
                        </button>
                        <input type="hidden" name="projeto_id" value="">
                    </div>
                </div>
            </div>
        </form>
    </div>
    
<?php require_once 'includes/footer-admin.php'; ?> 