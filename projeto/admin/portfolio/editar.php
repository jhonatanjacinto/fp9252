<?php

# Configurações Gerais
require_once 'config.php';
$msg = get_mensagem();
$projeto_info = null;

try
{
    if (isset($_POST['atualizar_projeto']))
    {
        $projeto_id = filter_var($_POST['projeto_id'], FILTER_VALIDATE_INT);
        $categoria_id = filter_var($_POST['categoria'], FILTER_VALIDATE_INT);
        $titulo = $_POST['titulo'] ?? '';
        $descricao = $_POST['descricao'] ?? '';
        $imagem = $_FILES['imagem']['name'] ? $_FILES['imagem'] : $_POST['imagem_atual'];
        $ativo = (bool) ($_POST['ativo'] ?? false);

        if ($imagem and is_array($imagem)) {
            $imagem_final = upload_imagem($imagem, 'portfolio', true, 300, 600);
            $imagem = 'portfolio/' . $imagem_final;
        }

        $projeto = new Projeto();
        $projeto->setId($projeto_id);
        $projeto->setTitulo($titulo);
        $projeto->getCategoria()->setId($categoria_id);
        $projeto->setDescricao($descricao);
        $projeto->setAtivo($ativo);   
        $projeto->setImagem($imagem);

        if (!ProjetoDAO::atualizar($projeto)) {
            throw new Exception('Não foi possível atualizar o projeto na base de dados!');
        }

        set_mensagem('Projeto atualizado com sucesso!', 'alert-success');
    }

    if (isset($_GET['id']))
    {
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        $projeto_info = ProjetoDAO::getProjetoPorId($id);

        if (!$projeto_info) {
            set_mensagem('Não foi possível encontrar um projeto para o ID fornecido!', 'alert-warning', 'index.php');
        }
    }
    else 
    {
        set_mensagem('ID inválido para edição!', 'alert-warning', 'index.php');
    }
}
catch(Exception $e)
{
    set_mensagem($e->getMessage(), 'alert-danger');
}

# Lista de Categorias da Base de Dados
$lista_categorias = CategoriaDAO::getCategorias();

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
                        <input type="text" class="form-control" name="titulo" value="<?= $projeto_info->getTitulo() ?>" placeholder="Insira aqui o título do projeto..." />
                    </div>
                    <div class="form-group col-md-6">
                        <label>* Categoria do Projeto:</label>
                        <select name="categoria" class="form-control custom-select">
                            <option value="">-- Selecione uma Categoria --</option>

                            <?php foreach ($lista_categorias as $categoria) : ?>
                                <option value="<?= $categoria->getId() ?>" <?= ($categoria->getId() == $projeto_info->getCategoria()->getId()) ? 'selected' : null ?> >
                                    <?= $categoria->getNome() ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Imagem:</label>
                        <input type="file" class="form-control-file" name="imagem" />
                        <input type="hidden" name="imagem_atual" value="<?= $projeto_info->getImagem() ?>" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>* Texto do Projeto:</label>
                        <textarea name="descricao" class="form-control" cols="30" rows="10" placeholder="Insira aqui o texto do projeto..."><?= $projeto_info->getDescricao() ?></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="ativo" id="checkboxAtivo" value="1" <?= $projeto_info->isAtivo() ? 'checked' : null ?> >
                            <label class="custom-control-label" for="checkboxAtivo">Deixar projeto ativo</label>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <button name="atualizar_projeto" class="btn btn-lg btn-success">
                            Salvar Projeto
                        </button>
                        <input type="hidden" name="projeto_id" value="<?= $projeto_info->getId() ?>">
                    </div>
                </div>
            </div>
        </form>
    </div>
    
<?php require_once 'includes/footer-admin.php'; ?> 