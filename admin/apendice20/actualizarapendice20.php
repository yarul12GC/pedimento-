<?php
include('../../conexion.php');
include('../../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {    $idapendice20 = mysqli_real_escape_string($conexion, $_POST['idapendice20']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $contenido = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    if (!empty($idapendice20) && !empty($clave) && !empty($contenido)) {
        $query = "UPDATE apendice20 SET clave='$clave', descripcion='$contenido' WHERE idapendice20='$idapendice20'";

        if (mysqli_query($conexion, $query)) {
            header("Location: ../apendice20.php?mensaje=exito");
            exit();
        } else {
            $error_message = "Error al actualizar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice20.php?mensaje=error");
            exit();
        }
    } else {
        header("Location: ../apendice20.php?mensaje=error");
        exit();
    }
} else {
    header("Location: ../apendice20.php");
    exit();
}
?>
