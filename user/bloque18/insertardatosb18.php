<?php
include_once '../../conexion.php';
include_once '../../sesion.php';

$idpedimentoc = $_POST['idpedimentoc'];
$observaciones = $_POST['descripcion'];

$sameSession = isset($_SESSION['pedimento_id']) && $_SESSION['pedimento_id'] == $idpedimentoc;


foreach ($observaciones as $observacion) {
    $sql = "INSERT INTO observaciones(descripcion, idpedimentoc) VALUES ('$observacion', '$idpedimentoc')";

    if ($conexion->query($sql) === TRUE) {
        $last_id = $conexion->insert_id;
        if (!isset($_SESSION['bloques']['bloque18'])) {
            $_SESSION['bloques']['bloque18'] = [];
        }
        $_SESSION['bloques']['bloque18'][] = $last_id;
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}

if ($sameSession) {
    // Si es la misma sesión, redirige a la página de captura en curso
    header("Location: ../archivopedimentocap.php?id=" . urlencode($idpedimentoc));
} else {
    // Si es una nueva sesión, redirige a la página de continuación de captura
    header("Location: ../archivopedimentocap.php?id=" . urlencode($idpedimentoc));
}
exit();
