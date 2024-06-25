<?php
include('../../conexion.php');
include('../../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {    $idapendice8 = mysqli_real_escape_string($conexion, $_POST['idapendice8']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $contenido = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    if (!empty($idapendice8) && !empty($clave) && !empty($contenido)) {
        $query = "UPDATE apendice8 SET clave='$clave', descripcion='$contenido' WHERE idapendice8='$idapendice8'";

        if (mysqli_query($conexion, $query)) {
            header("Location: ../apendice8.php?mensaje=exito");
            exit();
        } else {
            $error_message = "Error al actualizar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice8.php?mensaje=error");
            exit();
        }
    } else {
        header("Location: ../apendice8.php?mensaje=error");
        exit();
    }
} else {
    header("Location: ../apendice8.php");
    exit();
}
?>
