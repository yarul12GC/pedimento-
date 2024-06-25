<?php
include('../../conexion.php');
include('../../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {    $idapendice19 = mysqli_real_escape_string($conexion, $_POST['idapendice19']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $contenido = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    if (!empty($idapendice19) && !empty($clave) && !empty($contenido)) {
        $query = "UPDATE apendice19 SET clave='$clave', descripcion='$contenido' WHERE idapendice19='$idapendice19'";

        if (mysqli_query($conexion, $query)) {
            header("Location: ../apendice19.php?mensaje=exito");
            exit();
        } else {
            $error_message = "Error al actualizar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice19.php?mensaje=error");
            exit();
        }
    } else {
        header("Location: ../apendice19.php?mensaje=error");
        exit();
    }
} else {
    header("Location: ../apendice19.php");
    exit();
}
?>
