<?php
include('../../conexion.php');
include('../../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {    $idapendice3 = mysqli_real_escape_string($conexion, $_POST['idapendice3']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $contenido = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    if (!empty($idapendice3) && !empty($clave) && !empty($contenido)) {
        $query = "UPDATE apendice3 SET clave='$clave', descripcion='$contenido' WHERE idapendice3='$idapendice3'";

        if (mysqli_query($conexion, $query)) {
            header("Location: ../apendice3.php?mensaje=exito");
            exit();
        } else {
            $error_message = "Error al actualizar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice3.php?mensaje=error");
            exit();
        }
    } else {
        header("Location: ../apendice3.php?mensaje=error");
        exit();
    }
} else {
    header("Location: ../apendice3.php");
    exit();
}
?>
