<?php

# Configurações Gerais
require_once 'config.php';
$msg = get_mensagem();

try
{
    if (isset($_POST['cadastrar_projeto']))
    {
        $categoria_id = filter_var($_POST['categoria'], FILTER_VALIDATE_INT);
        $titulo = $_POST['titulo'] ?? '';
        $descricao = $_POST['descricao'] ?? '';
        $imagem = $_FILES['imagem']['name'] ? $_FILES['imagem'] : '';
        $ativo = (bool) ($_POST['ativo'] ?? false);

        if ($imagem and is_array($imagem)) {
            $imagem_final = upload_imagem($imagem, 'portfolio', true, 300, 600);
            $imagem = 'portfolio/' . $imagem_final;
        }

        $projeto = new Projeto();
        $projeto->setTitulo($titulo);
        $projeto->getCategoria()->setId($categoria_id);
        $projeto->setDescricao($descricao);
        $projeto->setAtivo($ativo);   
        $projeto->setImagem($imagem);

        if (!ProjetoDAO::adicionar($projeto)) {
            throw new Exception('Não foi possível cadastrar o projeto na base de dados!');
        }

        set_mensagem('Projeto cadastrado com sucesso!', 'alert-success');
    }
}
catch(Exception $e)
{
    set_mensagem($e->getMessage(), 'alert-danger');
}

# Retorna a lista de Categorias do Banco de dados
$lista_categorias = CategoriaDAO::getCategorias();

# Configurações da Página
$titulo_pagina = "Administração | Novo Projeto";
$link_ativo = 'portfolio';
require_once 'includes/header-admin.php';

?>


    <!-- CONTEUDO -->
    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2 float-left"><span class="text-secondary">Portfolio /</span> Novo Projeto</h1>
        <a href="index.php" class="btn btn-success float-right">
            Voltar
        </a>
        <div class="clearfix"></div>
        <hr>
        <p class="lead mb-0">
            Utilize o formulário abaixo para cadastrar um novo projeto no portfolio do site.
        </p>
    </div>
    <div class="container">
    
        <?php include_once "templates/alert-mensagens.php"; ?>

        <form method="POST" class="card" action="" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>* Título do Projeto:</label>
                        <input type="text" class="form-control" name="titulo" placeholder="Insira aqui o título do projeto..." />
                    </div>
                    <div class="form-group col-md-6">
                        <label>* Categoria do Projeto:</label>
                        <select name="categoria" class="form-control custom-select">
                            <option value="">-- Selecione uma Categoria --</option>
                            <?php foreach ($lista_categorias as $categoria) : ?>
                                <option value="<?= $categoria->getId() ?>">
                                    <?= $categoria->getNome() ?>
                                </option>
                            <?php endforeach; ?>
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
                            <input type="checkbox" class="custom-control-input" name="ativo" id="checkboxAtivo" value="1" checked>
                            <label class="custom-control-label" for="checkboxAtivo">Deixar projeto ativo</label>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <button name="cadastrar_projeto" class="btn btn-lg btn-success">
                            Cadastrar Projeto
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php require_once 'includes/footer-admin.php'; ?> 