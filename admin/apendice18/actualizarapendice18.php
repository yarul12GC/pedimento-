<?php
include('../../conexion.php');
include('../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {    $idapendice18 = mysqli_real_escape_string($conexion, $_POST['idapendice18']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $contenido = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    if (!empty($idapendice18) && !empty($clave) && !empty($contenido)) {
        $query = "UPDATE apendice18 SET clave='$clave', descripcion='$contenido' WHERE idapendice18='$idapendice18'";

        if (mysqli_query($conexion, $query)) {
            header("Location: ../apendice18.php?mensaje=exito");
            exit();
        } else {
            $error_message = "Error al actualizar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice18.php?mensaje=error");
            exit();
        }
    } else {
        header("Location: ../apendice18.php?mensaje=error");
        exit();
    }
} else {
    header("Location: ../apendice18.php");
    exit();
}
?>
