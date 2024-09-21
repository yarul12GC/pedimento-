<?php

$token = 'cf9321b9b76f4aed4143199a08783d6b6ad8d0f10533c038b4b4d1d2fc71bedd';

$url = 'https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF60653/datos/oportuno?token=' . $token;

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($ch);

curl_close($ch);

if ($response === false) {
    echo 'Error al obtener el tipo de cambio';
} else {
    $data = json_decode($response, true);

    if (isset($data['bmx']['series'][0]['datos'][0]['dato'])) {
        $tipoCambioMXN = $data['bmx']['series'][0]['datos'][0]['dato'];

        file_put_contents('../admin/cambiotipo_cambio.txt', $tipoCambioMXN);

        $tipoCambioMXN;
    } else {
        echo 'Error al obtener el tipo de cambio';
    }
}
