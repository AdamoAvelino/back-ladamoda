<?php

/**
 *
 * Abrir um arquivo texto ler e retornar linhas que tenham uma palavra especial 
 */

include 'funcao.php';

$arquivo = fopen(__DIR__.'/arquivo.txt', 'r');

$print = '';

while($linha = fgets($arquivo, 4096)) {
    if(preg_match('/coisa/i', $linha)) {
        $print .=  $linha. "<br>";
    }
}

echo $print;
