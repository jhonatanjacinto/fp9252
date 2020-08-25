<?php

    $idade = 15;

    // Sintaxe #1
    if ($idade >= 12 and $idade <= 17) {
        print "Seu plano é o TEEN!";
    }
    else if ($idade >= 18 && $idade <= 29) {
        print "Seu plano é o PROFESSIONAL!";
    }
    else if ($idade >= 30) {
        print "Seu plano é o XPERIENCE!";
    }
    else {
        print "Não há planos para você!";
    }

    print '<br><br>';

    // Sintaxe #2
    if ($idade >= 12 and $idade <= 17) :
        print "Seu plano é o TEEN!";
    elseif ($idade >= 18 && $idade <= 29) :
        print "Seu plano é o PROFESSIONAL!";
    elseif ($idade >= 30) :
        print "Seu plano é o XPERIENCE!";
    else :
        print "Não há planos para você!";
    endif;

    print '<br><br>';

    // Operador ternário
    // (condicao) ? valor1 : valor2
    $email_enviado = false;
    $mensagem = ($email_enviado == true) ? 'E-mail enviado com sucesso!' : 'Não foi possível enviar seu e-mail!';
    print $mensagem;

    print '<br><br>';

    // PHP 5 ou anteriores
    print (isset($_GET['nome'])) ? $_GET['nome'] : 'Não foi passado nenhum nome!';
    print '<br><br>';
    
    // Null Coaslescing Operator (PHP 7+)
    print $_GET['nome'] ?? 'Não foi passado nenhum nome!';
    