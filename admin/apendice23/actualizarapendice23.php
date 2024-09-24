<?php
include('../../conexion.php');
include('../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {    $idapendice23 = mysqli_real_escape_string($conexion, $_POST['idapendice23']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $contenido = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    if (!empty($idapendice23) && !empty($clave) && !empty($contenido)) {
        $query = "UPDATE apendice23 SET clave='$clave', descripcion='$contenido' WHERE idapendice23='$idapendice23'";

        if (mysqli_query($conexion, $query)) {
            header("Location: ../apendice23.php?mensaje=exito");
            exit();
        } else {
            $error_message = "Error al actualizar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice23.php?mensaje=error");
            exit();
        }
    } else {
        header("Location: ../apendice23.php?mensaje=error");
        exit();
    }
} else {
    header("Location: ../apendice23.php");
    exit();
}
