<?php
include_once '../../conexion.php';
include_once '../../sesion.php';

// Verificar que las variables POST están definidas y no están vacías
if (isset($_POST['idapendice12'], $_POST['idapendice13'], $_POST['importe'], $_POST['idpedimentoc'])) {
    $idapendice12Array = $_POST['idapendice12'];
    $idapendice13Array = $_POST['idapendice13'];
    $importeArray = $_POST['importe'];
    $idpedimentoc = $_POST['idpedimentoc'];

    // Verificar que los arrays tienen la misma longitud
    if (count($idapendice12Array) === count($idapendice13Array) && count($idapendice12Array) === count($importeArray)) {

        // Preparar la declaración SQL
        $stmt = $conexion->prepare("INSERT INTO cuadrodeliquidacion (idapendice12, idapendice13, importe, idpedimentoc) VALUES (?, ?, ?, ?)");

        // Verificar si la sesión coincide con el pedimento actual
        $sameSession = isset($_SESSION['pedimento_id']) && $_SESSION['pedimento_id'] == $idpedimentoc;

        // Verificar que la preparación fue exitosa
        if ($stmt) {
            // Iniciar la transacción
            $conexion->begin_transaction();

            try {
                foreach ($idapendice12Array as $index => $idapendice12) {
                    $idapendice13 = $idapendice13Array[$index];
                    $importe = $importeArray[$index];

                    // Vincular los parámetros y ejecutar la declaración
                    $stmt->bind_param("iidi", $idapendice12, $idapendice13, $importe, $idpedimentoc);

                    if ($stmt->execute()) {
                        $last_idb11 = $stmt->insert_id;
                        if (!isset($_SESSION['bloques']['bloque11'])) {
                            $_SESSION['bloques']['bloque11'] = [];
                        }
                        $_SESSION['bloques']['bloque11'][] = $last_idb11;
                    } else {
                        throw new Exception("Error al insertar el registro: " . $stmt->error);
                    }
                }

                // Confirmar la transacción
                $conexion->commit();
            } catch (Exception $e) {
                // Revertir la transacción en caso de error
                $conexion->rollback();
                echo $e->getMessage();
            }

            $stmt->close();
        } else {
            echo "Error en la preparación de la declaración: " . $conexion->error;
        }

        // Redirigir dependiendo de si es la misma sesión o no
        if ($sameSession) {
            header("Location: ../archivopedimentocap.php?id=" . urlencode($idpedimentoc));
        } else {
            header("Location: ../archivopedimentocap.php?id=" . urlencode($idpedimentoc));
        }
        exit();
    } else {
        echo "Los arrays de entrada no tienen la misma longitud.";
    }
} else {
    echo "Datos faltantes en la solicitud.";
}

$conexion->close();
