<?php
include('../../conexion.php');
include('../../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {    $idapendice7 = mysqli_real_escape_string($conexion, $_POST['idapendice7']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $contenido = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    if (!empty($idapendice7) && !empty($clave) && !empty($contenido)) {
        $query = "UPDATE apendice7 SET clave='$clave', descripcion='$contenido' WHERE idapendice7='$idapendice7'";

        if (mysqli_query($conexion, $query)) {
            header("Location: ../apendice7.php?mensaje=exito");
            exit();
        } else {
            $error_message = "Error al actualizar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice7.php?mensaje=error");
            exit();
        }
    } else {
        header("Location: ../apendice7.php?mensaje=error");
        exit();
    }
} else {
    header("Location: ../apendice7.php");
    exit();
}
?>
