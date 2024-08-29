<?php
include_once '../../conexion.php';
include_once '../sesion.php';


$idapendice3entradasalida = $_POST['idapendice3entrtadaSalida'];
$idapendice3arribo = $_POST['idapendice3arribo'];
$idapendice3salida = $_POST['idapendice3salida'];
$idpedimentoc = $_POST['idpedimentoc'];

if (isset($_SESSION['idpedimento']) && $_SESSION['idpedimento'] == $idpedimentoc) {
    // Si el pedimento en la sesión coincide con el formulario, se está completando durante la misma sesión
    $sameSession = true;
} else {
    // Si no coincide, entonces es un pedimento que se está completando después de una sesión anterior
    $sameSession = false;
}

$sql = "INSERT INTO transporte(idapendice3entrtadaSalida, idapendice3arribo, idapendice3salida, idpedimentoc)
VALUES ('$idapendice3entradasalida', '$idapendice3arribo', '$idapendice3salida', '$idpedimentoc')";

if ($conexion->query($sql) === TRUE) {
    $last_idb3 = $conexion->insert_id;


    $_SESSION['bloques']['bloque3'] = $last_idb3;

    if ($sameSession) {
        // Si es la misma sesión, redirige a la página de captura en curso
        header("Location: ../capturapediemnto.php?id=" . urlencode($idpedimentoc));
    } else {
        // Si es una nueva sesión, redirige a la página de continuación de captura
        header("Location: ../archivopedimentocap.php?id=" . urlencode($idpedimentoc));
    }
    exit();
} else {
    echo "Error:" . $sql . "<br>" . $conexion->error;
}
$conexion->close();
