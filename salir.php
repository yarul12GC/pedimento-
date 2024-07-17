<?php
session_start();

$_SESSION['mensaje'] = '¡Has cerrado sesión exitosamente!';

session_destroy();

header('Location: index.php');
?>
