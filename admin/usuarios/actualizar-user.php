<?php
include '../../conexion.php';

if (isset($_POST["update"])) {
    $idusuario = mysqli_real_escape_string($conexion, $_POST["usuarioID"]);
    $email = mysqli_real_escape_string($conexion, isset($_POST["email"]) ? $_POST["email"] : "");
    $nueva_contrasena = isset($_POST["nueva_contrasena"]) ? $_POST["nueva_contrasena"] : "";
    $confirmar_contrasena = isset($_POST["confirmar_contrasena"]) ? $_POST["confirmar_contrasena"] : "";
    $tipoUsuarioID = mysqli_real_escape_string($conexion, isset($_POST["tipoUsuarioID"]) ? $_POST["tipoUsuarioID"] : "");

    if (empty($email) || empty($tipoUsuarioID)) {
        header("Location: ../index.php?error=Por favor, completa todos los campos obligatorios.");
        exit();
    }

    if (!empty($nueva_contrasena) || !empty($confirmar_contrasena)) {
        if ($nueva_contrasena !== $confirmar_contrasena) {
            header("Location: ../index.php?error=Las contraseñas no coinciden.");
            exit();
        } else {
            $contrasena_encriptada = hash('sha512', $nueva_contrasena);
            $contrasena_query = ", contrasena = '$contrasena_encriptada'";
        }
    } else {
        $contrasena_query = "";
    }

    $queryUpdate = "UPDATE usuarios SET email = '$email' $contrasena_query, tipoUsuarioID = '$tipoUsuarioID' WHERE usuarioID = '$idusuario'";

    if (mysqli_query($conexion, $queryUpdate)) {
        header("Location: ../index.php");
        exit;
    } else {
        $error_message = "Error al actualizar el usuario: " . mysqli_error($conexion);
        header("Location: ../index.php?error=" . urlencode($error_message));
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}