<?php
include('../../conexion.php');
include('../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {    $idapendice15 = mysqli_real_escape_string($conexion, $_POST['idapendice15']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $contenido = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    if (!empty($idapendice15) && !empty($clave) && !empty($contenido)) {
        $query = "UPDATE apendice15 SET clave='$clave', descripcion='$contenido' WHERE idapendice15='$idapendice15'";

        if (mysqli_query($conexion, $query)) {
            header("Location: ../apendice15.php?mensaje=exito");
            exit();
        } else {
            $error_message = "Error al actualizar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice15.php?mensaje=error");
            exit();
        }
    } else {
        header("Location: ../apendice15.php?mensaje=error");
        exit();
    }
} else {
    header("Location: ../apendice15.php");
    exit();
}
?>
