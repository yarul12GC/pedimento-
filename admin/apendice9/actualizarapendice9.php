<?php
include('../../conexion.php');
include('../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {    $idapendice9 = mysqli_real_escape_string($conexion, $_POST['idapendice9']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $contenido = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    if (!empty($idapendice9) && !empty($clave) && !empty($contenido)) {
        $query = "UPDATE apendice9 SET clave='$clave', descripcion='$contenido' WHERE idapendice9='$idapendice9'";

        if (mysqli_query($conexion, $query)) {
            header("Location: ../apendice9.php?mensaje=exito");
            exit();
        } else {
            $error_message = "Error al actualizar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice9.php?mensaje=error");
            exit();
        }
    } else {
        header("Location: ../apendice9.php?mensaje=error");
        exit();
    }
} else {
    header("Location: ../apendice9.php");
    exit();
}
?>
