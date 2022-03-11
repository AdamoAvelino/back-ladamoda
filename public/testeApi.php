<?php
/**
 * Contruir uma api simples que valide o cpf e retorne o cpf e o nome do uduário
 * caso cpf não válido retornar um erro
 */

include "funcao.php";

try {
    $cpf = get('cpff');

    $cpf_valido = validarCpf($cpf);

    $response = [
        "status_code" => 200,
        "cpf" => $cpf,
        "Nome" => "Fulano de Tal"
    ];

    if(!$cpf_valido) {
        $response = [
            "status_code" => 406,
            "mensagem" => "O número do cpf não é válido"
        ];
    }

} catch(\Exception $e) {
    $response = [
        "status_code" => $e->getCode(),
        "mensagem" => $e->getMessage()
    ];

} finally {
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
}
