<?php
include('../../conexion.php');
include('../../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idapendice12 = mysqli_real_escape_string($conexion, $_POST['idapendice12']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $contenido = mysqli_real_escape_string($conexion, $_POST['descripcion']);
    $contribucion = mysqli_real_escape_string($conexion, $_POST['contribucion']);
    $nivel = mysqli_real_escape_string($conexion, $_POST['nivel']);

    // Verificar que no estén vacíos los campos
    if (!empty($idapendice12) && !empty($clave) && !empty($contenido) && !empty($contribucion) && !empty($nivel)) {
        // Corrección de la consulta SQL
        $query = "UPDATE apendice12 SET clave='$clave', descripcion='$contenido', contribucion='$contribucion', nivel='$nivel' WHERE idapendice12='$idapendice12'";

        // Ejecutar la consulta
        if (mysqli_query($conexion, $query)) {
            header("Location: ../apendice12.php?mensaje=exito");
            exit();
        } else {
            // Mensaje de error
            $error_message = "Error al actualizar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice12.php?mensaje=error");
            exit();
        }
    } else {
        // Si los campos están vacíos
        header("Location: ../apendice12.php?mensaje=error");
        exit();
    }
} else {
    // Redirigir si no es método POST
    header("Location: ../apendice12.php");
    exit();
}
