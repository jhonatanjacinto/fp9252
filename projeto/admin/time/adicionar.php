<?php

# Configurações Gerais
require_once 'config.php';
$msg = null;

try 
{
    if (isset($_POST['cadastrar_membro']))
    {
        $nome = filter_var($_POST['nome_completo'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $minicurriculo = filter_var($_POST['texto'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $cargo = filter_var($_POST['cargo'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $ativo = (bool) ($_POST['ativo'] ?? false);

        if (!$nome) {
            throw new Exception('Nome do Membro é obrigatório!');
        }

        if (!$minicurriculo) {
            throw new Exception('Minicurrículo é obrigatório!');
        }

        if (!$cargo) {
            throw new Exception('Cargo é obrigatório!');
        }

        if (!cadastrar_membro($nome, $cargo, $minicurriculo, '', $ativo)) {
            throw new Exception('Não foi possível cadastrar o membro informado!');
        }

        $msg = array(
            'classe' => 'alert-success',
            'mensagem' => 'Membro cadastrado com sucesso!'
        );
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
$titulo_pagina = "Administração | Novo Colaborador";
$link_ativo = 'time';
require_once 'includes/header-admin.php';

?>

    <!-- CONTEUDO -->
    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2 float-left"><span class="text-secondary">Time /</span> Novo Colaborador</h1>
        <a href="index.php" class="btn btn-success float-right">
            Voltar
        </a>
        <div class="clearfix"></div>
        <hr>
        <p class="lead mb-0">
            Utilize o formulário abaixo para cadastrar um novo colaborador no time da sua empresa.
        </p>
    </div>
    <div class="container">

        <?php include 'templates/alert-mensagens.php'; ?>

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
                        <button name="cadastrar_membro" class="btn btn-lg btn-success">
                            Cadastrar Colaborador
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
<?php require_once 'includes/footer-admin.php'; ?> 