<?php
include('../../conexion.php');
include('../../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {    $idapendice12 = mysqli_real_escape_string($conexion, $_POST['idapendice12']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $contenido = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    if (!empty($idapendice12) && !empty($clave) && !empty($contenido)) {
        $query = "UPDATE apendice12 SET clave='$clave', descripcion='$contenido' WHERE idapendice12='$idapendice12'";

        if (mysqli_query($conexion, $query)) {
            header("Location: ../apendice12.php?mensaje=exito");
            exit();
        } else {
            $error_message = "Error al actualizar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice12.php?mensaje=error");
            exit();
        }
    } else {
        header("Location: ../apendice12.php?mensaje=error");
        exit();
    }
} else {
    header("Location: ../apendice12.php");
    exit();
}
?>
