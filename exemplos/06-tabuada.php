<?php

    print '<pre>';
    print_r($_GET);
    print '</pre>';

    if (!empty($_GET))
    {
        $numero = is_numeric($_GET['numero']) ? (int)$_GET['numero'] : false;
        $tabuada = '';

        if ($numero !== false)
        {
            for ($m = 0; $m <= 10; $m++)
            {
                $resultado = $numero * $m;
                $tabuada .= "$numero x $m = $resultado <br>";
            }
        }
        else 
        {
            $tabuada = "Por favor, informe um número válido!";
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container">

    <form method="GET">
        <fieldset>
            <legend>Tabuada</legend>
            <div class="form-group">
                <label>Nome:</label>
                <input type="number" name="numero" class="form-control">
            </div>
            <button class="btn btn-primary">
                Ver Tabuada
            </button>
        </fieldset>
    </form>
    
    <hr>

    <div class="card">
        <div class="card-header p-2">
            <strong>Resultado</strong>
        </div>
        <div class="card-body p-2">
            <?= $tabuada ?>
        </div>
    </div>

</body>
</html>