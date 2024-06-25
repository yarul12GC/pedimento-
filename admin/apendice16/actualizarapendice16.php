<?php
include('../../conexion.php');
include('../../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {    $idapendice16 = mysqli_real_escape_string($conexion, $_POST['idapendice16']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $contenido = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    if (!empty($idapendice16) && !empty($clave) && !empty($contenido)) {
        $query = "UPDATE apendice16 SET clave='$clave', descripcion='$contenido' WHERE idapendice16='$idapendice16'";

        if (mysqli_query($conexion, $query)) {
            header("Location: ../apendice16.php?mensaje=exito");
            exit();
        } else {
            $error_message = "Error al actualizar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice16.php?mensaje=error");
            exit();
        }
    } else {
        header("Location: ../apendice16.php?mensaje=error");
        exit();
    }
} else {
    header("Location: ../apendice16.php");
    exit();
}
?>
