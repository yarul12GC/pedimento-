<?php
include_once('../../conexion.php');
include_once('../../sesion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar que se reciban todos los campos necesarios
    if (isset(
        $_POST['idusuario'],
        $_POST['idagente'],
        $_POST['nombreagente'],
        $_POST['apellidoP'],
        $_POST['apellidoM'],
        $_POST['curp'],
        $_POST['rfc'],
        $_POST['nacionalidad'],
        $_POST['tipo_domicilio'],
        $_POST['estado'],
        $_POST['localidad'],
        $_POST['codigo_postal'],
        $_POST['patente']
    )) {

        // Sanitizar los datos recibidos
        $idusuario = htmlspecialchars(trim($_POST['idusuario']));
        $idagente = htmlspecialchars(trim($_POST['idagente']));
        $nombreagente = htmlspecialchars(trim($_POST['nombreagente']));
        $apellidoP = htmlspecialchars(trim($_POST['apellidoP']));
        $apellidoM = htmlspecialchars(trim($_POST['apellidoM']));
        $curp = htmlspecialchars(trim($_POST['curp']));
        $rfc = htmlspecialchars(trim($_POST['rfc']));
        $nacionalidad = htmlspecialchars(trim($_POST['nacionalidad']));
        $tipo_domicilio = htmlspecialchars(trim($_POST['tipo_domicilio']));
        $estado = htmlspecialchars(trim($_POST['estado']));
        $localidad = htmlspecialchars(trim($_POST['localidad']));
        $codigo_postal = htmlspecialchars(trim($_POST['codigo_postal']));
        $patente = htmlspecialchars(trim($_POST['patente']));

        // Preparar la consulta SQL para actualizar los datos del agente
        $query = "
            UPDATE agenteaduanal 
            SET nombreagente = ?, apellidoP = ?, apellidoM = ?, curp = ?, rfc = ?, nacionalidad = ?, 
                tipo_domicilio = ?, estado = ?, localidad = ?, codigo_postal = ?, patente = ? 
            WHERE idagente = ? AND idusuario = ?
        ";

        if ($stmt = $conexion->prepare($query)) {
            // Vincular los parámetros y ejecutar la consulta
            $stmt->bind_param('ssssssssssssi', $nombreagente, $apellidoP, $apellidoM, $curp, $rfc, $nacionalidad, $tipo_domicilio, $estado, $localidad, $codigo_postal, $patente, $idagente, $idusuario);

            if ($stmt->execute()) {
                // Redirigir al usuario con un mensaje de éxito
                header("Location: ../agenteaduanluser.php");
                exit();
            } else {
                // Mostrar error en caso de fallo en la ejecución
                echo "Error al actualizar los datos: " . $stmt->error;
            }

            // Cerrar la sentencia
            $stmt->close();
        } else {
            // Error en la preparación de la consulta
            echo "Error en la consulta SQL: " . $conexion->error;
        }

        // Cerrar la conexión
        $conexion->close();
    } else {
        echo "Todos los campos son obligatorios.";
    }
} else {
    echo "Método no permitido.";
}
