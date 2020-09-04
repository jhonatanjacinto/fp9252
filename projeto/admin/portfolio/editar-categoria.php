<?php

# Configurações Gerais
require_once 'config.php';
$msg = get_mensagem();
$categoria_info = null;

try 
{
    if (isset($_POST['atualizar_categoria']))
    {
        $id = $_POST['categoria_id'] ?? 0;
        $nome = $_POST['nome_categoria'] ?? '';

        $categoria = new Categoria();
        $categoria->setId($id);
        $categoria->setNome($nome);

        if (!CategoriaDAO::atualizar($categoria)) {
            throw new Exception('Não foi possível atualizar a Categoria!');
        }

        set_mensagem('Categoria atualizada com sucesso!', 'alert-success');
    }

    if (isset($_GET['id']))
    {
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        $categoria_info = CategoriaDAO::getCategoriaPorId($id);
        
        if (!$categoria_info) {
            set_mensagem('Dados da Categoria não foram encontrados!', 'alert-warning', 'categorias.php');
        }
    }
    else
    {
        set_mensagem('ID inválido para edição!', 'alert-warning', 'categorias.php');
    }
}
catch(Exception $e)
{
    set_mensagem($e->getMessage(), 'alert-danger');
}

# Configurações da Página
$titulo_pagina = "Administração | Editar Categoria";
$link_ativo = 'portfolio';
require_once 'includes/header-admin.php';

?>


    <!-- CONTEUDO -->
    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2 float-left"><span class="text-secondary">Categorias /</span> Editar Categoria</h1>
        <a href="categorias.php" class="btn btn-success float-right">
            Voltar
        </a>
        <div class="clearfix"></div>
        <hr>
        <p class="lead mb-0">
            Utilize o formulário abaixo para alterar uma categoria no portfolio do site.
        </p>
    </div>
    <div class="container">
    
        <?php include_once "templates/alert-mensagens.php"; ?>

        <form method="POST" class="card" action="">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>* Nome da Categoria:</label>
                        <input type="text" class="form-control" name="nome_categoria" value="<?= $categoria_info->getNome() ?>" placeholder="Insira aqui o nome da categoria..." />
                    </div>
                    <div class="form-group col-md-12">
                        <button name="atualizar_categoria" class="btn btn-lg btn-success">
                            Salvar Categoria
                        </button>
                        <input type="hidden" name="categoria_id" value="<?= $categoria_info->getId() ?>">
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php require_once 'includes/footer-admin.php'; ?> 