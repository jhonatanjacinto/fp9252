<?php

# Configurações Gerais
require_once 'config.php';
$msg = get_mensagem();
$servico_info = array();

try
{
    if (isset($_POST['atualizar_servico']))
    {
        $id = filter_var($_POST['servico_id'], FILTER_VALIDATE_INT);
        $nome = filter_var($_POST['nome_servico'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $texto = filter_var($_POST['texto'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $ativo = (bool) ($_POST['ativo'] ?? false);

        if (!$nome) {
            throw new Exception('Nome do Serviço é obrigatório!');
        }

        if (!$texto) {
            throw new Exception('Texto do serviço é obrigatório!');
        }

        if ($id === false or $id <= 0) {
            throw new Exception('ID inválido!');
        }

        if (!atualizar_servico($nome, $texto, $ativo, $id)) {
            throw new Exception('Não foi possível atualizar seu serviço!');
        }

        set_mensagem('Serviço atualizado com sucesso!', 'alert-success');
    }


    if (isset($_GET['id']))
    {
        // busca os dados do ID especificado
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        $servico_info = get_servico_por_id($id);

        if (!$servico_info) {
            set_mensagem('Serviço não foi encontrado na base de dados!', 'alert-warning', 'index.php');
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

# Configurações da Página
$titulo_pagina = "Administração | Editar Serviço";
$link_ativo = 'servicos';
require_once 'includes/header-admin.php';

?>

    <!-- CONTEUDO -->
    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2 float-left"><span class="text-secondary">Serviços /</span> Editar Serviço</h1>
        <a href="index.php" class="btn btn-success float-right">
            Voltar
        </a>
        <div class="clearfix"></div>
        <hr>
        <p class="lead mb-0">
            Utilize o formulário abaixo para realizar alterações no serviço selecionado.
        </p>
    </div>
    <div class="container">

        <?php include_once "templates/alert-mensagens.php"; ?>

        <form method="POST" class="card" action="">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>* Nome da Serviço:</label>
                        <input type="text" class="form-control" name="nome_servico" placeholder="Insira aqui o nome do serviço..." value="<?= $servico_info['nome_servico'] ?>" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>* Texto do Serviço:</label>
                        <textarea name="texto" class="form-control" cols="30" rows="10" placeholder="Insira aqui o texto do serviço..."><?= $servico_info['texto_servico'] ?></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="ativo" id="checkboxAtivo" value="1" <?= $servico_info['ativo'] ? 'checked' : null ?>>
                            <label class="custom-control-label" for="checkboxAtivo">Deixar serviço ativo</label>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <button name="atualizar_servico" class="btn btn-lg btn-success">
                            Salvar Serviço
                        </button>
                        <input type="hidden" name="servico_id" value="<?= $servico_info['servico_id'] ?>">
                    </div>
                </div>
            </div>
        </form>
    </div>
    
<?php require_once 'includes/footer-admin.php'; ?> 