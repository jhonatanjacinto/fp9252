<?php

/** Operações com banco de dados usando PREPARED STATEMENTS */

# abrir uma conexão com a base de dados
$conexao = new mysqli('localhost', 'root', '', 'caeland');
if ($conexao->connect_errno) {
    exit("Não foi possível conectar no banco de dados!");
}

// Se há dados enviados via POST...
if ($_POST)
{
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];

    $sql = "INSERT INTO registros (nome, idade) VALUES (?, ?)";
    $stmt = $conexao->prepare($sql);
    /**
     * s = string
     * i = integer
     * d = double
     * b = blob
     */
    $stmt->bind_param("si", $nome, $idade);
    $stmt->execute();

    if ($stmt->errno) {
        exit("<h2>ERRO AO INSERIR DADOS NA BASE DE DADOS...</h2>");
    }

    // limpa os dados de POST do cache do navegador e redireciona o usuário para a mesma página
    header('location: 11-mysqli-oo.php');
    exit();
}

// Se dados foram passados via GET...
if ($_GET)
{
    $id = $_GET['excluir'];

    $sql = "DELETE FROM registros WHERE pessoa_id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    if ($stmt->errno) {
        exit('<h2>ERRO AO EXCLUIR INFORMAÇÃO DA BASE DE DADOS...</h2>');
    }
}

$resultado = $conexao->query("SELECT * FROM registros");
$lista_registros = $resultado->fetch_all(MYSQLI_ASSOC);

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