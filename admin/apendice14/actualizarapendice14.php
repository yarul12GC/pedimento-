<?php
include('../../conexion.php');
include('../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {    $idapendice14 = mysqli_real_escape_string($conexion, $_POST['idapendice14']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $contenido = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    if (!empty($idapendice14) && !empty($clave) && !empty($contenido)) {
        $query = "UPDATE apendice14 SET clave='$clave', descripcion='$contenido' WHERE idapendice14='$idapendice14'";

        if (mysqli_query($conexion, $query)) {
            header("Location: ../apendice14.php?mensaje=exito");
            exit();
        } else {
            $error_message = "Error al actualizar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice14.php?mensaje=error");
            exit();
        }
    } else {
        header("Location: ../apendice14.php?mensaje=error");
        exit();
    }
} else {
    header("Location: ../apendice14.php");
    exit();
}
?>
