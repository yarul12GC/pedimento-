<?php
require 'vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secondaryKey = 'secondary_secret_key';

$token = isset($_GET['token']) ? $_GET['token'] : null;

if (!$token) {
    echo '<script> 
            alert("Acceso denegado, no autenticado.");
            window.location = "index.php";
          </script>';
    exit();
}

try {
    $decoded = JWT::decode($token, new Key($secondaryKey, 'HS256'));
    $userData = (array) $decoded->data;

    session_start();
    $_SESSION['user_id'] = $userData['id'];
    $_SESSION['email'] = $userData['email'];
    $_SESSION['tipoUsuarioID'] = $userData['tipoUsuarioID'];
    header("Location: home.php");

    exit();
} catch (Exception $e) {
    echo '<script> 
            alert("Acceso denegado, token inválido.");
            window.location = "index.php";
          </script>';
    exit();
}
?>