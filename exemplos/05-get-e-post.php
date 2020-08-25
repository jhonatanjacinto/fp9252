<?php

    print '<pre>';
    print_r($_POST);
    print '</pre>';

    $nome = null;
    $sexo = 'M';
    $linguagens = [];
    $mensagem = null;
    $opcoes_linguagens = array('PHP', 'ColdFusion', 'Java', 'C#', 'JavaScript', 'Go', 'Python', 'Visual Basic');

    // TEM DADOS ENVIADOS VIA GET? Se sim, vai entrar no IF
    if ($_POST)
    {
        $nome = $_POST['nome'] ?? 'NOME NÃO INFORMADO!';
        $mensagem = $_POST['mensagem'] ?? 'MENSAGEM NÃO INFORMADA!';
        $sexo = $_POST['sexo'] ?? 'SEXO NÃO INFORMADO!';
        $linguagens = $_POST['linguagens'] ?? [];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>$_GET e $_POST</title>
</head>
<body>

    <?php if ($_POST) : ?>
        <div style="border:3px solid green; padding: 30px;">
            <h2 style="margin:0 0 15px 0;">Os dados enviados foram:</h2>
            <strong>Nome: </strong> <?= $nome ?> <br>
            <strong>Sexo: </strong> <?= $sexo ?> <br>
            <strong>Linguagens: </strong> <?= $linguagens ? implode(', ', $linguagens) : 'NENHUMA LINGUAGEM FOI SELECIONADA!' ?> <br>
            <strong>Mensagem:</strong> <?= $mensagem ?>
        </div>
        <br><br>
    <?php endif; ?>

    <form method="POST">
        <fieldset>
            <legend>Dados enviados via POST</legend>
            <label>
                Nome: <br>
                <input type="text" name="nome" value="<?= $nome ?>">
            </label>
            <br><br>
            <label>
                Mensagem: <br>
                <textarea name="mensagem" cols="30" rows="10"><?= $mensagem ?></textarea>
            </label>
            <br>
            <div>
                <strong>Sexo:</strong><br>
                <label>
                    <input type="radio" name="sexo" value="M" <?= ($sexo == 'M') ? 'checked' : null ?>> Masculino
                </label>
                <br>
                <label>
                    <input type="radio" name="sexo" value="F" <?= ($sexo == 'F') ? 'checked' : null ?>> Feminino
                </label>
            </div>
            <br>
            <div>
                <strong>Linguagens Preferidas:</strong><br>

                <?php foreach ($opcoes_linguagens as $linguagem) : 
                        $checked = (in_array($linguagem, $linguagens)) ? 'checked' : null;
                ?>
                    <label>
                        <input type="checkbox" name="linguagens[]" value="<?= $linguagem ?>" <?= $checked ?>> <?= $linguagem ?>
                    </label>
                    <br>
                <?php endforeach; ?>
            </div>
            <br>
            <button>
                Enviar
            </button>
        </fieldset>
    </form>
    
</body>
</html>