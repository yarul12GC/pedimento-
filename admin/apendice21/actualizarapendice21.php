<?php
include('../../conexion.php');
include('../../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {    $idapendice21 = mysqli_real_escape_string($conexion, $_POST['idapendice21']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $contenido = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    if (!empty($idapendice21) && !empty($clave) && !empty($contenido)) {
        $query = "UPDATE apendice21 SET clave='$clave', descripcion='$contenido' WHERE idapendice21='$idapendice21'";

        if (mysqli_query($conexion, $query)) {
            header("Location: ../apendice21.php?mensaje=exito");
            exit();
        } else {
            $error_message = "Error al actualizar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice21.php?mensaje=error");
            exit();
        }
    } else {
        header("Location: ../apendice21.php?mensaje=error");
        exit();
    }
} else {
    header("Location: ../apendice21.php");
    exit();
}
?>
