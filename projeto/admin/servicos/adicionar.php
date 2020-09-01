<?php

# Configurações Gerais
require_once 'config.php';
$msg = get_mensagem();

try 
{
    if (isset($_POST['cadastrar_servico']))
    {
        $nome = filter_var($_POST['nome_servico'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $texto = filter_var($_POST['texto'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $ativo = (bool) ($_POST['ativo'] ?? false);

        if (!$nome) {
            throw new Exception('Nome do Serviço é obrigatório!');
        }

        if (!$texto) {
            throw new Exception('Texto do Serviço é obrigatório!');
        }

        if (!cadastrar_servico($nome, $texto, $ativo)) {
            throw new Exception('Não foi possível cadastrar o serviço informado!');
        }

        set_mensagem('Serviço cadastrado com sucesso!', 'alert-success');
    }
}
catch(Exception $e)
{
    set_mensagem($e->getMessage(), 'alert-danger');
}

# Configurações da Página
$titulo_pagina = "Administração | Novo Serviço";
$link_ativo = 'servicos';
require_once 'includes/header-admin.php';

?>

    <!-- CONTEUDO -->
    <div class="jumbotron container p-5 mb-5">
        <h1 class="h2 float-left"><span class="text-secondary">Serviços /</span> Novo Serviço</h1>
        <a href="index.php" class="btn btn-success float-right">
            Voltar
        </a>
        <div class="clearfix"></div>
        <hr>
        <p class="lead mb-0">
            Utilize o formulário abaixo para cadastrar um novo serviço no site.
        </p>
    </div>
    <div class="container">
    
        <?php include_once "templates/alert-mensagens.php"; ?>

        <form method="POST" class="card" action="">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>* Nome da Serviço:</label>
                        <input type="text" class="form-control" name="nome_servico" placeholder="Insira aqui o nome do serviço..." />
                    </div>
                    <div class="form-group col-md-12">
                        <label>* Texto do Serviço:</label>
                        <textarea name="texto" class="form-control" cols="30" rows="10" placeholder="Insira aqui o texto do serviço..."></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="ativo" id="checkboxAtivo" value="1" checked>
                            <label class="custom-control-label" for="checkboxAtivo">Deixar serviço ativo</label>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <button name="cadastrar_servico" class="btn btn-lg btn-success">
                            Cadastrar Serviço
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php require_once 'includes/footer-admin.php'; ?> 