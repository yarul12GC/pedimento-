<?php
include('../../conexion.php');
include('../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {    $idapendice6 = mysqli_real_escape_string($conexion, $_POST['idapendice6']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $contenido = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    if (!empty($idapendice6) && !empty($clave) && !empty($contenido)) {
        $query = "UPDATE apendice6 SET clave='$clave', descripcion='$contenido' WHERE idapendice6='$idapendice6'";

        if (mysqli_query($conexion, $query)) {
            header("Location: ../apendice6.php?mensaje=exito");
            exit();
        } else {
            $error_message = "Error al actualizar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice6.php?mensaje=error");
            exit();
        }
    } else {
        header("Location: ../apendice6.php?mensaje=error");
        exit();
    }
} else {
    header("Location: ../apendice6.php");
    exit();
}
?>
