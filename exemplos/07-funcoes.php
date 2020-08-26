<?php

    // força que os tipos definidos em parâmetros de funções sejam obedecidos e fornecidos de forma explícita
    // declare(strict_types=1);

    function getNomeCompleto(string $nome, string $sobrenome)
    {
        return "Nome completo é: $nome $sobrenome";
    }

    print getNomeCompleto('Jhonatan', 'Oliveira');
    print '<hr>';

    // Parâmetro REST
    function somar(...$numeros)
    {
        $somaTotal = 0;

        foreach ($numeros as $n)
        {
            $somaTotal += $n;
        }

        return $somaTotal;
    }

    
    print 'Resultado: ' . somar(15, 20) . '<br>';
    print 'Resultado: ' . somar(10, 20, 30, 40, 50) . '<br>';
    print 'Resultado: ' . somar(3, 7, 1) . '<br>';

    $meusNumeros = array(2, 8, 9, 10, 7);
    print somar(...$meusNumeros); // spread operator (espalha os valores do array como argumentos da função somar())

    $meusNomes = array('Adriana', 'Roberto', 'Cláudia');
    $todosOsNomes = array('Rafael', 'Paulo', ...$meusNomes, 'Fernanda', 'Gilmar'); // spread operator

    print '<pre>';
    print_r($todosOsNomes);
    print '</pre>';
