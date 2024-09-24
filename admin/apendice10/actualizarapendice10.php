<?php
include('../../conexion.php');
include('../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {    $idapendice10 = mysqli_real_escape_string($conexion, $_POST['idapendice10']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $contenido = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    if (!empty($idapendice10) && !empty($clave) && !empty($contenido)) {
        $query = "UPDATE apendice10 SET clave='$clave', descripcion='$contenido' WHERE idapendice10='$idapendice10'";

        if (mysqli_query($conexion, $query)) {
            header("Location: ../apendice10.php?mensaje=exito");
            exit();
        } else {
            $error_message = "Error al actualizar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice10.php?mensaje=error");
            exit();
        }
    } else {
        header("Location: ../apendice10.php?mensaje=error");
        exit();
    }
} else {
    header("Location: ../apendice10.php");
    exit();
}
?>
