<?php

    // while () { ... }
    // while() : ... endwhile;
    $contador = 1;
    while ($contador <= 10) :
        print "$contador <br>";
        $contador++;
    endwhile;

    print '<hr>';

    // for () { ... }
    // for () : ... endfor;
    for ($i = 10; $i >= 1; $i--) {
        print "$i <br>";
    }

    print '<hr>';

    // array de informações
    $animais = array('Gato', 'Cachorro', 'Rato', 'Porco');
    $li = '';
    for ($i = 0; $i < count($animais); $i++) {
        $li .= "<li>$animais[$i] - Índice: $i</li>";
    }

    print "<ol>$li</ol>";

    print '<hr>';

    $li = '';
    // foreach() { ... }
    // foreach() : ... endforeach;
    foreach ($animais as $indice => $animal) {
        $li .= "<li>$animal - Índice: $indice</li>";
    }

    print "<ul>$li</ul>";
