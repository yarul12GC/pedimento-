<?php
include('../../conexion.php');
include('../../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {    $idapendice17 = mysqli_real_escape_string($conexion, $_POST['idapendice17']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $contenido = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    if (!empty($idapendice17) && !empty($clave) && !empty($contenido)) {
        $query = "UPDATE apendice17 SET clave='$clave', descripcion='$contenido' WHERE idapendice17='$idapendice17'";

        if (mysqli_query($conexion, $query)) {
            header("Location: ../apendice17.php?mensaje=exito");
            exit();
        } else {
            $error_message = "Error al actualizar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice17.php?mensaje=error");
            exit();
        }
    } else {
        header("Location: ../apendice17.php?mensaje=error");
        exit();
    }
} else {
    header("Location: ../apendice17.php");
    exit();
}
?>
