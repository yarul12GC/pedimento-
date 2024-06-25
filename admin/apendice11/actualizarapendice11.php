<?php
include('../../conexion.php');
include('../../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {    $idapendice11 = mysqli_real_escape_string($conexion, $_POST['idapendice11']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $contenido = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    if (!empty($idapendice11) && !empty($clave) && !empty($contenido)) {
        $query = "UPDATE apendice11 SET clave='$clave', descripcion='$contenido' WHERE idapendice11='$idapendice11'";

        if (mysqli_query($conexion, $query)) {
            header("Location: ../apendice11.php?mensaje=exito");
            exit();
        } else {
            $error_message = "Error al actualizar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice11.php?mensaje=error");
            exit();
        }
    } else {
        header("Location: ../apendice11.php?mensaje=error");
        exit();
    }
} else {
    header("Location: ../apendice11.php");
    exit();
}
?>
