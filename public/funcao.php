<?php

function validarCpf($cpf)
{
    $digito = substr($cpf, -2);
    $numero = substr($cpf, 0,9);
    
    $digito1 = calcularDgito($numero, 10);
    $numero .= $digito1;
    $digito2 = calcularDgito($numero, 11);
    
    return $digito == $digito1.$digito2;
}

function calcularDgito($numero, $squencia) 
{
    $valores = [];
    for($parametro=$squencia, $i=0; $i<=9; $i++, $parametro--) {
        $valores[] = $numero[$i] * $parametro;
    }
    return (array_sum($valores) * 10) % 11;
}

/***
 * Busca dados da query string vindo do verbo get da requisição
 */
function get($parametro)
{
    
    if($_SERVER['REQUEST_METHOD'] != 'GET') {
        throw new \Exception($_SERVER['REQUEST_METHOD']. ' Metodo inválido', 405);
    }

    $query_string = explode('&', $_SERVER['QUERY_STRING']);
    
    foreach($query_string as $dado) {
        $chave_valor = explode('=',$dado);
        $query[$chave_valor[0]] = $chave_valor[1];
    }

    if(!$query[$parametro]) {
        throw new \Exception("Não existe parametro {$parametro}", 412);
    }

    return $query[$parametro];

}
