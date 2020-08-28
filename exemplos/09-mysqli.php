<?php

/** Operações com banco de dados usando PREPARED STATEMENTS */

# abrir uma conexão com a base de dados
$conexao = mysqli_connect('localhost', 'root', '', 'caeland');
if (mysqli_connect_errno()) {
    exit("Não foi possível conectar no banco de dados!");
}

// Se há dados enviados via POST...
if ($_POST)
{
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];

    $sql = "INSERT INTO registros (nome, idade) VALUES (?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    /**
     * s = string
     * i = integer
     * d = double
     * b = blob
     */
    mysqli_stmt_bind_param($stmt, "si", $nome, $idade);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_errno($stmt)) {
        exit("<h2>ERRO AO INSERIR DADOS NA BASE DE DADOS...</h2>");
    }

    // limpa os dados de POST do cache do navegador e redireciona o usuário para a mesma página
    header('location: 09-mysqli.php');
    exit();
}

// Se dados foram passados via GET...
if ($_GET)
{
    $id = $_GET['excluir'];

    $sql = "DELETE FROM registros WHERE pessoa_id = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_errno($stmt)) {
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

                    <a href="09-mysqli.php?excluir=<?= $registro['pessoa_id'] ?>" class="btn btn-danger">
                        Excluir
                    </a>
                </li>
            <?php endforeach; ?>

        </ul>
        
    </div>
    
</body>
</html>