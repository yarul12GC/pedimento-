<?php
require '../../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
    $password = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : "";
    $confirm_password = isset($_POST["confirm_contrasena"]) ? trim($_POST["confirm_contrasena"]) : "";
    $tipoUsuarioID = isset($_POST["tipoUsuarioID"]) ? intval($_POST["tipoUsuarioID"]) : 0;

    if (empty($email) || empty($password) || empty($confirm_password) || $tipoUsuarioID === 0) {
        echo json_encode(['success' => false, 'message' => 'Por favor, completa todos los campos.']);
        exit();
    } elseif ($password !== $confirm_password) {
        echo json_encode(['success' => false, 'message' => 'Las contraseñas no coinciden.']);
        exit();
    } else {
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=pedimentocenca", "root", "");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Verificamos si el correo ya existe en la base de datos
            $consultaExistencia = $conexion->prepare("SELECT email FROM usuarios WHERE email = :email");
            $consultaExistencia->bindParam(':email', $email);
            $consultaExistencia->execute();

            if ($consultaExistencia->rowCount() > 0) {
                echo json_encode(['success' => false, 'message' => 'El usuario ya existe. Inténtalo con otro correo.']);
            } else {
                // Encriptar la contraseña con la norma hash 512
                $hashedPassword = hash('sha512', $password);

                // Insertar el nuevo usuario en la base de datos
                $consultaInsertar = $conexion->prepare("INSERT INTO usuarios (email, contrasena, tipoUsuarioID) VALUES (:email, :contrasena, :tipoUsuarioID)");
                $consultaInsertar->bindParam(':email', $email);
                $consultaInsertar->bindParam(':contrasena', $hashedPassword);
                $consultaInsertar->bindParam(':tipoUsuarioID', $tipoUsuarioID);

                $consultaInsertar->execute();

                header("Location: ../index.php");
            }
            $conexion = null;
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => "Error de conexión a la base de datos: " . $e->getMessage()]);
        }
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}

