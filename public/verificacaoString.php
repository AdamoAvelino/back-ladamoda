<?php

/**
 * Verificar string e validar apenas a string que tenha chaves, couchetes e parentes que fechem.
 */

$string = "{}[{({})}]";
var_dump(verificarString($string));
function verificarString($string)
{
    preg_match_all('/\{/', $string, $chaves_abertura);
    preg_match_all('/\}/', $string, $chaves_fechadura);
    
    // if ($chaves_abertura or $chaves_fechadura) {
    //     $mesma_quantidade = count($chaves_abertura[0]) == count($chaves_fechadura[0]);
    //     if(!$mesma_quantidade) {
    //         return false;
    //     }
    // }

    preg_match_all('/(\{(\{\}|\{.*\})\})/', $string, $delimitadorChaves);
    var_dump($delimitadorChaves[1],$delimitadorChaves[2], $delimitadorChaves[3]);
    return count($chaves_abertura[0]) == count($delimitadorChaves);
}