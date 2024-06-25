<?php
include('../../conexion.php');
include('../../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {    $idapendice13 = mysqli_real_escape_string($conexion, $_POST['idapendice13']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $contenido = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    if (!empty($idapendice13) && !empty($clave) && !empty($contenido)) {
        $query = "UPDATE apendice13 SET clave='$clave', descripcion='$contenido' WHERE idapendice13='$idapendice13'";

        if (mysqli_query($conexion, $query)) {
            header("Location: ../apendice13.php?mensaje=exito");
            exit();
        } else {
            $error_message = "Error al actualizar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice13.php?mensaje=error");
            exit();
        }
    } else {
        header("Location: ../apendice13.php?mensaje=error");
        exit();
    }
} else {
    header("Location: ../apendice13.php");
    exit();
}
?>
