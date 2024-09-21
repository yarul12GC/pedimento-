<?php
include('../../conexion.php');
include('../../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idapendice4 = mysqli_real_escape_string($conexion, $_POST['idapendice4']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $clave2 = mysqli_real_escape_string($conexion, $_POST['clave2']);
    $contenido = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    if (!empty($idapendice4) && !empty($clave) && !empty($contenido)) {
        $query = "UPDATE apendice4 SET clave='$clave', descripcion='$contenido', clave2='$clave2' WHERE idapendice4='$idapendice4'";

        if (mysqli_query($conexion, $query)) {
            header("Location: ../apendice4.php?mensaje=exito");
            exit();
        } else {
            $error_message = "Error al actualizar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice4.php?mensaje=error");
            exit();
        }
    } else {
        header("Location: ../apendice4.php?mensaje=error");
        exit();
    }
} else {
    header("Location: ../apendice4.php");
    exit();
}
