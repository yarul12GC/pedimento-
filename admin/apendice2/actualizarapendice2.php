<?php
include('../../conexion.php');
include('../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {    $idapendice2 = mysqli_real_escape_string($conexion, $_POST['idapendice2']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $contenido = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    if (!empty($idapendice2) && !empty($clave) && !empty($contenido)) {
        $query = "UPDATE apendice2 SET clave='$clave', descripcion='$contenido' WHERE idapendice2='$idapendice2'";

        if (mysqli_query($conexion, $query)) {
            header("Location: ../apendice2.php?mensaje=exito");
            exit();
        } else {
            $error_message = "Error al actualizar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice2.php?mensaje=error");
            exit();
        }
    } else {
        header("Location: ../apendice2.php?mensaje=error");
        exit();
    }
} else {
    header("Location: ../apendice2.php");
    exit();
}
?>
