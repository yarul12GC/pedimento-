<?php
include_once '../../conexion.php';
include_once '../../sesion.php';


$valorDolares = $_POST['valorDolares'];
$valorAduna = $_POST['valorAduna'];
$precioPagado = $_POST['precioPagado'];
$idpedimentoc = $_POST['idpedimentoc'];

$sameSession = isset($_SESSION['pedimento_id']) && $_SESSION['pedimento_id'] == $idpedimentoc;


$sql = "INSERT INTO valoresp(valorDolares, valorAduna, precioPagado, idpedimentoc)
VALUES ('$valorDolares', '$valorAduna', '$precioPagado', '$idpedimentoc')";

if ($conexion->query($sql) === TRUE) {
    $last_idb4 = $conexion->insert_id;

    $_SESSION['bloques']['valorAduna'] = $valorAduna;
    $_SESSION['bloques']['precioPagado'] = $precioPagado;

    $_SESSION['bloques']['bloque4'] = $last_idb4;

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
