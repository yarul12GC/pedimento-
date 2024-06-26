<?php
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : "";

    if (empty($email) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'Por favor, completa todos los campos.']);
        exit();
    } else {
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=pedimentocenca", "root", "");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $consultaExistencia = $conexion->prepare("SELECT email FROM usuarios WHERE email = :email");
            $consultaExistencia->bindParam(':email', $email);
            $consultaExistencia->execute();

            if ($consultaExistencia->rowCount() > 0) {
                echo json_encode(['success' => false, 'message' => 'El usuario ya existe. Inténtalo con otro correo.']);
            } else {
                $hashedPassword = hash('sha512', $password);
                $fechaRegistro = date('Y-m-d H:i:s'); 

                $consultaInsertar = $conexion->prepare("INSERT INTO usuarios (email, contrasena) VALUES (:email, :contrasena)");
                $consultaInsertar->bindParam(':email', $email);
                $consultaInsertar->bindParam(':contrasena', $hashedPassword);

                $consultaInsertar->execute();

                echo json_encode(['success' => true, 'message' => 'Usuario registrado exitosamente.']);
            }
            $conexion = null;
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => "Error de conexión a la base de datos: " . $e->getMessage()]);
        }
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
?>
