<?php

    // Declaração de Arrays
    $listaDeNomes = array('Jhonatan', 'Rodrigo', 'Fernanda');
    // PHP 5.4 (sintaxe curta de array)
    $listaDeIdades = [29, 32, 19];

    // array bidimensional
    $usuarios = array(
        array('Jhonatan', 'jhonatanjacinto@gmail.com'),
        array('Fernanda', 'fernanda@gmail.com'),
        array('Marcio', 'marcio@gmail.com')
    );

    print $usuarios[2][0] . '<br>';


    print 'O 1º nome é: ' . $listaDeNomes[0];

    // Arrays com chave=valor
    $produto = array(
        'nome_produto' => 'Tênis RedNose',
        'tamanhos' => array(42, 43, 44),
        'cores' => array('preto', 'branco', 'azul'),
        'foto' => 'tenis-rednose.jpg',
        'preco' => 150.69,
        'em_estoque' => true,
        'qtd_estoque' => 50,
        'descritivo' => 'blablabla'
    );

    print '<hr>';

    print $produto['nome_produto'] . '<br>';
    print $produto['foto'] . '<br>';
    print $produto['cores'][1] . '<br>';
