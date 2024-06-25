<?php
require 'vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$key = 'your_secret_key'; // Clave secreta para verificar el JWT

function authenticate($key) {
    if (!isset($_COOKIE['jwt'])) {
        http_response_code(401);
        echo json_encode(['message' => 'Unauthorized']);
        exit();
    }

    $jwt = $_COOKIE['jwt'];

    try {
        $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
        return $decoded; // Retorna la información del usuario
    } catch (Exception $e) {
        http_response_code(401);
        echo json_encode(['message' => 'Unauthorized']);
        exit();
    }
}
?>
