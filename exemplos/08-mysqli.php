<?php

# abrir uma conexão com a base de dados
$conexao = mysqli_connect('localhost', 'root', '', 'caeland');
if (mysqli_connect_errno()) {
    exit("Não foi possível conectar no banco de dados!");
}

// Se há dados enviados via POST...
if ($_POST)
{
    $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $idade = filter_var($_POST['idade'], FILTER_VALIDATE_INT, array(
            'options' => array('min_range' => 0, 'max_range' => 130)
        )
    );

    if ($idade === false) {
        exit('Idade informada é inválida!');
    }

    // trata aspas duplas e aspas simples para não ter conflito com a instrução SQL
    $nome = mysqli_real_escape_string($conexao, $nome);
    $sql = "INSERT INTO registros (nome, idade) VALUES ('$nome', $idade)";
    mysqli_query($conexao, $sql);

    if (mysqli_errno($conexao)) {
        exit("<h2>ERRO AO INSERIR DADOS NA BASE DE DADOS...</h2>");
    }

    // limpa os dados de POST do cache do navegador e redireciona o usuário para a mesma página
    header('location: 08-mysqli.php');
    exit();
}

// Se dados foram passados via GET...
if ($_GET)
{
    $id = filter_var($_GET['excluir'], FILTER_VALIDATE_INT, array(
            'options' => array('min_range' => 1)
        )
    );

    if ($id === false) {
        exit('ID inválido para exclusão!');
    }

    $sql = "DELETE FROM registros WHERE pessoa_id = $id";
    mysqli_query($conexao, $sql);

    if (mysqli_errno($conexao)) {
        exit('<h2>ERRO AO EXCLUIR INFORMAÇÃO DA BASE DE DADOS...</h2>');
    }
}

$resultado = mysqli_query($conexao, "SELECT * FROM registros");
$lista_registros = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

// print '<pre>';
// print_r($lista_registros);
// print '</pre>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQLi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <form method="POST">
            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="nome" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>Idade:</label>
                <input type="text" name="idade" class="form-control" value="">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">
                    Enviar
                </button>
            </div>
        </form>
        <hr>
        <ul class="list-group">

            <?php foreach ($lista_registros as $registro) : ?>
                <li class="list-group-item">
                    <?= $registro['nome'] ?> - <?= $registro['idade'] ?> anos <br>

                    <a href="08-mysqli.php?excluir=<?= $registro['pessoa_id'] ?>" class="btn btn-danger">
                        Excluir
                    </a>
                </li>
            <?php endforeach; ?>

        </ul>
        
    </div>
    
</body>
</html>