<?php

# Configurações Gerais
require_once 'config.php';
$msg = get_mensagem();
$membro_info = array();

try
{
    if (isset($_POST['atualizar_membro']))
    {
        $id = filter_var($_POST['pessoa_id'], FILTER_VALIDATE_INT);
        $nome = filter_var($_POST['nome_completo'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $cargo = filter_var($_POST['cargo'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $minicurriculo = filter_var($_POST['texto'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $ativo = (bool) ($_POST['ativo'] ?? false);

        if (!$nome) {
            throw new Exception('Nome do Membro é obrigatório!');
        }

        if (!$cargo) {
            throw new Exception('Cargo é obrigatório!');
        }

        if (!$minicurriculo) {
            throw new Exception('Minicurrículo é obrigatório!');
        }

        if ($id === false or $id <= 0) {
            throw new Exception('ID inválido!');
        }

        if (!atualizar_membro($nome, $cargo, $minicurriculo, '', $ativo, $id)) {
            throw new Exception('Não foi possível atualizar o membro do time especificado!');
        }

        set_mensagem('Membro atualizado com sucesso!', 'alert-success');
    }


    if (isset($_GET['id']))
    {
        // busca os dados do ID especificado
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        $membro_info = get_membro_por_id($id);

        if (!$membro_info) {
            set_mensagem('Membro não foi encontrado na base de dados!', 'alert-warning', 'index.php');
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
$titulo_pagina = "Administração | Editar Colaborador";
$link_ativo = 'time';
require_once 'includes/header-admin.php';

?>

    <!-- CONTEUDO -->
    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2 float-left"><span class="text-secondary">Time /</span> Editar Colaborador</h1>
        <a href="index.php" class="btn btn-success float-right">
            Voltar
        </a>
        <div class="clearfix"></div>
        <hr>
        <p class="lead mb-0">
            Utilize o formulário abaixo para alterar as informações de um colaborador.
        </p>
    </div>
    <div class="container">

        <?php include_once "templates/alert-mensagens.php"; ?>

        <form method="POST" class="card" action="">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>* Nome completo:</label>
                        <input type="text" class="form-control" name="nome_completo" value="<?= $membro_info['nome'] ?>" placeholder="Insira aqui o nome completo do colaborador..." />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Foto:</label>
                        <input type="file" class="form-control-file" name="foto" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>* Cargo:</label>
                        <input type="text" class="form-control" name="cargo" value="<?= $membro_info['cargo'] ?>" placeholder="Insira aqui o cargo do colaborador..." />
                    </div>
                    <div class="form-group col-md-6">
                        <label>&nbsp;</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="ativo" id="checkboxAtivo" <?= $membro_info['ativo'] ? 'checked' : null ?>>
                            <label class="custom-control-label" for="checkboxAtivo">Deixar colaborador ativo</label>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>* Minicurrículo:</label>
                        <textarea name="texto" class="form-control" cols="30" rows="10" placeholder="Insira aqui o texto do minicurrículo..."><?= $membro_info['minicurriculo'] ?></textarea>
                    </div>
                    
                    <div class="form-group col-md-12">
                        <button name="atualizar_membro" class="btn btn-lg btn-success">
                            Salvar Colaborador
                        </button>
                        <input type="hidden" name="pessoa_id" value="<?= $membro_info['membro_id'] ?>">
                    </div>
                </div>
            </div>
        </form>
    </div>
    
<?php require_once 'includes/footer-admin.php'; ?>