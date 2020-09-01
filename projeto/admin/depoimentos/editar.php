<?php

# Configurações Gerais
require_once 'config.php';
$msg = null;
$depoimento_info = array();

try
{
    if (isset($_POST['atualizar_depoimento']))
    {
        $id = filter_var($_POST['depoimento_id'], FILTER_VALIDATE_INT);
        $nome = filter_var($_POST['nome_pessoa'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $texto = filter_var($_POST['texto'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $ativo = (bool) ($_POST['ativo'] ?? false);

        if (!$nome) {
            throw new Exception('Nome é obrigatório!');
        }

        if (!$texto) {
            throw new Exception('Texto do depoimento é obrigatório!');
        }

        if ($id === false or $id <= 0) {
            throw new Exception('ID inválido!');
        }

        if (!atualizar_depoimento($nome, $texto, '', $ativo, $id)) {
            throw new Exception('Não foi possível atualizar seu depoimento!');
        }

        $msg = array(
            'classe' => 'alert-success',
            'mensagem' => 'Depoimento atualizado com sucesso!'
        );
    }


    if (isset($_GET['id']))
    {
        // busca os dados do ID especificado
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        $depoimento_info = get_depoimento_por_id($id);

        if (!$depoimento_info) {
            header('Location: index.php');
            exit();
        }
    }
    else 
    {
        header('Location: index.php');
        exit();
    }
}
catch(Exception $e)
{
    $msg = array(
        'classe' => 'alert-danger',
        'mensagem' => $e->getMessage()
    );
}

# Configurações da Página
$titulo_pagina = "Administração | Editar Depoimento";
$link_ativo = 'depoimentos';
require_once 'includes/header-admin.php';

?>

    <!-- CONTEUDO -->
    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2 float-left"><span class="text-secondary">Depoimentos /</span> Editar Depoimento</h1>
        <a href="index.php" class="btn btn-success float-right">
            Voltar
        </a>
        <div class="clearfix"></div>
        <hr>
        <p class="lead mb-0">
            Utilize o formulário abaixo para realizar alterações no depoimento selecionado.
        </p>
    </div>
    <div class="container">

        <?php include_once 'templates/alert-mensagens.php'; ?>

        <form method="POST" class="card" action="">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>* Nome da Pessoa:</label>
                        <input type="text" class="form-control" name="nome_pessoa" value="<?= $depoimento_info['nome'] ?>" placeholder="Insira aqui o nome da pessoa..." />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Foto:</label>
                        <input type="file" class="form-control-file" name="foto_pessoa" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>* Texto do Depoimento:</label>
                        <textarea name="texto" class="form-control" cols="30" rows="10" placeholder="Insira aqui o texto do depoimento..."><?= $depoimento_info['texto'] ?></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="ativo" id="checkboxAtivo" <?= $depoimento_info['ativo'] ? 'checked' : null ?>>
                            <label class="custom-control-label" for="checkboxAtivo">Deixar depoimento ativo</label>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <button name="atualizar_depoimento" class="btn btn-lg btn-success">
                            Salvar Depoimento
                        </button>
                        <input type="hidden" name="depoimento_id" value="<?= $depoimento_info['depoimento_id'] ?>">
                    </div>
                </div>
            </div>
        </form>
    </div>
    
<?php require_once 'includes/footer-admin.php'; ?> 