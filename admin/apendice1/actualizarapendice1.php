<?php
include('../../conexion.php');
include('../../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {    $idapendice1 = mysqli_real_escape_string($conexion, $_POST['idapendice1']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $contenido = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    if (!empty($idapendice1) && !empty($clave) && !empty($contenido)) {
        $query = "UPDATE apendice1 SET clave='$clave', descripcion='$contenido' WHERE idapendice1='$idapendice1'";

        if (mysqli_query($conexion, $query)) {
            header("Location: ../apendice1.php?mensaje=exito");
            exit();
        } else {
            $error_message = "Error al actualizar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice1.php?mensaje=error");
            exit();
        }
    } else {
        header("Location: ../apendice1.php?mensaje=error");
        exit();
    }
} else {
    header("Location: ../apendice1.php");
    exit();
}
?>
