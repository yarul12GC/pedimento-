<?php
require 'auth.php';

$user = authenticate($key); // Pasar la clave secreta
echo "Hola, user {$user->sub}";
?>
