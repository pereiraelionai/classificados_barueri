
<?php

function validaCPF($cpf) {
 
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;

}

function jsonReturn (string $title, string $msg, string $status, $dados=null) {
    
    $result = ['status' => $status, 'title' => $title, 'status' => $status, 'dados' => $dados];
    header('Content-Type: application/json');
    header("HTTP/1.1 200 OK");
    echo json_encode($result);

    die();
}

function success($title, $msg, $data=null) {
    jsonReturn($title, $msg, 'success', $data);
}
