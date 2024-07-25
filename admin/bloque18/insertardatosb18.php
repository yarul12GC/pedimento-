<?php
include_once '../../conexion.php';
include_once '../../sesion.php';

$idpedimentoc = $_POST['idpedimentoc'];
$observaciones = $_POST['descripcion'];

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

header("location: ../capturapediemnto.php");
exit();
?>
