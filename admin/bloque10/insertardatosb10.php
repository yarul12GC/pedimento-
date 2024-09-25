<?php
include_once '../../conexion.php';
include_once '../sesion.php';

// Verificar que los datos POST son arrays y no están vacíos
if (
    isset($_POST['idapendice12'], $_POST['idapendice18'], $_POST['tasa'], $_POST['idpedimentoc']) &&
    is_array($_POST['idapendice12']) &&
    is_array($_POST['idapendice18']) &&
    is_array($_POST['tasa'])
) {

    $idapendice12Array = $_POST['idapendice12'];
    $idapendice18Array = $_POST['idapendice18'];
    $tasaArray = $_POST['tasa'];
    $idpedimentoc = $_POST['idpedimentoc'];

    // Verificar si la sesión coincide con el pedimento actual
    $sameSession = isset($_SESSION['pedimento_id']) && $_SESSION['pedimento_id'] == $idpedimentoc;

    // Preparar la declaración SQL
    $stmt = $conexion->prepare("INSERT INTO tasapedimento (idapendice12, idapendice18, tasa, idpedimentoc) VALUES (?, ?, ?, ?)");

    // Verificar que la declaración preparada fue exitosa
    if ($stmt) {
        $conexion->begin_transaction(); // Iniciar una transacción

        try {
            // Recorrer los arrays de datos e insertar cada tasa
            foreach ($idapendice12Array as $index => $idapendice12) {
                $idapendice18 = $idapendice18Array[$index];
                $tasa = $tasaArray[$index];

                // Vincular los parámetros y ejecutar la declaración
                $stmt->bind_param("iidi", $idapendice12, $idapendice18, $tasa, $idpedimentoc);

                if (!$stmt->execute()) {
                    throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
                }

                // Almacenar el id en la sesión
                $last_idb10 = $stmt->insert_id;
                if (!isset($_SESSION['bloques']['bloque10'])) {
                    $_SESSION['bloques']['bloque10'] = [];
                }
                $_SESSION['bloques']['bloque10'][] = $last_idb10;
            }

            $conexion->commit(); // Confirmar la transacción

            // Redirigir dependiendo de si es la misma sesión o no
            if ($sameSession) {
                header("Location: ../capturapediemnto.php?id=" . urlencode($idpedimentoc));
            } else {
                header("Location: ../archivopedimentocap.php?id=" . urlencode($idpedimentoc));
            }
            exit();
        } catch (Exception $e) {
            $conexion->rollback(); // Revertir la transacción en caso de error
            echo $e->getMessage();
        }

        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conexion->error;
    }
} else {
    echo "Datos faltantes o inválidos en la solicitud.";
}

$conexion->close();
