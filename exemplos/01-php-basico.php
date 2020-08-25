<?php

    // comentário de uma linha
    # comentário de uma linha
    /* comentário de várias linhas */

    print "Olá mundo!<br>";
    echo "Testando outro texto exibido pro usuário!";

    /**
     * Variáveis no PHP precisam:
     * 1) começar com $
     * 2) Conter letras ou números (sem que números sejam o primeiro caractere)
     * 3) Conter o caracter _ (underscore)
     */
    $preco = 17.50;
    $nomeCompleto = "Paulo Vieira";
    $email = "paulo.vieira@gmail.com";
    $isAposentado = false;
    $idade = 30;

    /**
     * Constantes
     */
    define('URL_SITE', 'http://localhost/meu-site');
    const ANO_SITE = 2020;
    print "<br> A URL do meu site é: " . URL_SITE;
    print "<br> Meu site foi publicado em: " . ANO_SITE;

    print "
        <hr>
        <h1>$nomeCompleto</h1>
        <strong>Idade:</strong> $idade anos <br>
        <strong>E-mail:</strong> $email <br>
        Meu site: " . URL_SITE . "
    ";

    // printf() e sprintf()
    $nomeProduto = "Geladeira Brastemp";
    $precoProduto = 12586.96859;
    $desconto = 15.56;
    $codigo = 5263;
    $caracteristicas = array("Economiza energia", "5 anos de garantia", "110v");

    printf("<br><br> O produto %s, código %d, está com desconto de %d%% e agora custa R$ %.2f", $nomeProduto, $codigo, $desconto, $precoProduto);
    $mensagem = sprintf("<br><br> O produto %s, código %d, está com desconto de %d%% e agora custa R$ %.2f", $nomeProduto, $codigo, $desconto, $precoProduto);

    echo "<br><br>O resultado da substituição foi: $mensagem";
    
    echo "<br><br> Dólar: $ " . number_format($precoProduto, 2);
    echo "<br><br> Real: R$ " . number_format($precoProduto, 2, ',', '.');

    // "Depuração de Variáveis"

    echo '<br><br>';
    var_dump($caracteristicas);
    echo '<br><br>';
    var_export($caracteristicas);
    echo '<br><br>';
    echo '<pre>';
    print_r($caracteristicas);
    echo '</pre>';




