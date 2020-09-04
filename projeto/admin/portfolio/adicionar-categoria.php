<?php

# Configurações Gerais
require_once 'config.php';
$msg = get_mensagem();

try 
{
    if (isset($_POST['cadastrar_categoria']))
    {
        $nome = $_POST['nome_categoria'] ?? '';
        $categoria = new Categoria();
        $categoria->setNome($nome);

        if (!CategoriaDAO::adicionar($categoria)) {
            throw new Exception('Não foi possível cadastrar a Categoria!');
        }

        set_mensagem('Categoria cadastrada com sucesso!', 'alert-success');
    }
}
catch(Exception $e)
{
    set_mensagem($e->getMessage(), 'alert-danger');
}

# Configurações da Página
$titulo_pagina = "Administração | Nova Categoria";
$link_ativo = 'portfolio';
require_once 'includes/header-admin.php';

?>


    <!-- CONTEUDO -->
    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2 float-left"><span class="text-secondary">Categorias /</span> Nova Categoria</h1>
        <a href="categorias.php" class="btn btn-success float-right">
            Voltar
        </a>
        <div class="clearfix"></div>
        <hr>
        <p class="lead mb-0">
            Utilize o formulário abaixo para cadastrar uma nova categoria no portfolio do site.
        </p>
    </div>
    <div class="container">
    
        <?php include_once "templates/alert-mensagens.php"; ?>

        <form method="POST" class="card" action="">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>* Nome da Categoria:</label>
                        <input type="text" class="form-control" name="nome_categoria" placeholder="Insira aqui o nome da categoria..." />
                    </div>
                    <div class="form-group col-md-12">
                        <button name="cadastrar_categoria" class="btn btn-lg btn-success">
                            Cadastrar Categoria
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php require_once 'includes/footer-admin.php'; ?> 