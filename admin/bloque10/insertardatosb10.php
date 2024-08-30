<?php
include_once '../../conexion.php';
include_once '../../sesion.php';

// Verificar que las variables POST están definidas y no están vacías
if (isset($_POST['idapendice12'], $_POST['idapendice18'], $_POST['tasa'], $_POST['idpedimentoc'])) {
    $idapendice12 = $_POST['idapendice12'];
    $idapendice18 = $_POST['idapendice18'];
    $tasa = $_POST['tasa'];
    $idpedimentoc = $_POST['idpedimentoc'];

    // Verificar si la sesión coincide con el pedimento actual
    $sameSession = isset($_SESSION['pedimento_id']) && $_SESSION['pedimento_id'] == $idpedimentoc;

    // Preparar la declaración SQL
    $stmt = $conexion->prepare("INSERT INTO tasapedimento (idapendice12, idapendice18, tasa, idpedimentoc) VALUES (?, ?, ?, ?)");

    // Verificar que la declaración preparada fue exitosa
    if ($stmt) {
        // Vincular los parámetros y ejecutar la declaración
        $stmt->bind_param("iidi", $idapendice12, $idapendice18, $tasa, $idpedimentoc);

        if ($stmt->execute()) {
            $last_idb10 = $stmt->insert_id;

            // Almacenar el id en la sesión
            if (!isset($_SESSION['bloques']['bloque10'])) {
                $_SESSION['bloques']['bloque10'] = [];
            }
            $_SESSION['bloques']['bloque10'][] = $last_idb10;

            // Redirigir dependiendo de si es la misma sesión o no
            if ($sameSession) {
                header("Location: ../capturapediemnto.php?id=" . urlencode($idpedimentoc));
            } else {
                header("Location: ../archivopedimentocap.php?id=" . urlencode($idpedimentoc));
            }
            exit();
        } else {
            echo "Error al ejecutar la consulta: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conexion->error;
    }
} else {
    echo "Datos faltantes en la solicitud.";
}

$conexion->close();
