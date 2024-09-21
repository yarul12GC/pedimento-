<?php
include_once('../conexion.php');
include_once('../sesion.php');

// Obtener el ID del usuario que ha iniciado sesión
$usuario_id = $_SESSION['usuarioID'];

// Consultar si el agente aduanal ya está registrado para este usuario
$query = "SELECT * FROM agenteaduanal WHERE idusuario = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$agente = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agente Aduanal</title>
    <style>
        body {
            background-color: #f7f8fa;
            font-family: 'Arial', sans-serif;
        }

        .form-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            margin: 40px auto;
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.5rem;
            color: #333;
        }

        .btn-custom {
            padding: 10px 20px;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .form-label {
            color: #495057;
            font-weight: bold;
        }

        input[type="text"],
        select {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 10px;
        }

        .modal-footer {
            display: flex;
            justify-content: space-between;
            padding-top: 20px;
        }

        .form-icon {
            position: relative;
        }

        .form-icon input {
            padding-left: 2.5rem;
        }

        .form-icon i {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #495057;
        }
    </style>
</head>

<body>
    <?php include '../public/cabezauser.php'; ?>

    <section class="zona1">
        <?php if ($agente): ?>
            <h2 class="form-header">Datos del Agente Aduanal Registrado</h2>
            <form action="../user/agentea/actualizaragente.php" method="post">
                <div class="row">
                    <!-- Primera columna -->
                    <div class="col-md-4">
                        <div class="mb-3 form-icon">
                            <label for="nombreagente" class="form-label">Nombre</label>
                            <i class="bi bi-person-fill"></i>
                            <input type="text" name="nombreagente" class="form-control" placeholder="Nombre del agente" value="<?php echo htmlspecialchars($agente['nombreagente']); ?>" required>
                        </div>
                        <div class="mb-3 form-icon">
                            <label for="apellidoP" class="form-label">Apellido Paterno</label>
                            <i class="bi bi-person"></i>
                            <input type="text" name="apellidoP" class="form-control" placeholder="Apellido paterno" value="<?php echo htmlspecialchars($agente['apellidoP']); ?>" required>
                        </div>
                        <div class="mb-3 form-icon">
                            <label for="apellidoM" class="form-label">Apellido Materno</label>
                            <i class="bi bi-person"></i>
                            <input type="text" name="apellidoM" class="form-control" placeholder="Apellido materno" value="<?php echo htmlspecialchars($agente['apellidoM']); ?>" required>
                        </div>
                        <div class="mb-3 form-icon">
                            <label for="curp" class="form-label">CURP</label>
                            <i class="bi bi-card-list"></i>
                            <input type="text" name="curp" class="form-control" placeholder="CURP" maxlength="18" value="<?php echo htmlspecialchars($agente['curp']); ?>" required>
                        </div>
                    </div>

                    <!-- Segunda columna -->
                    <div class="col-md-4">
                        <div class="mb-3 form-icon">
                            <label for="rfc" class="form-label">RFC</label>
                            <i class="bi bi-card-text"></i>
                            <input type="text" name="rfc" class="form-control" placeholder="RFC" maxlength="13" value="<?php echo htmlspecialchars($agente['rfc']); ?>" required>
                        </div>
                        <div class="mb-3 form-icon">
                            <label for="nacionalidad" class="form-label">Nacionalidad</label>
                            <i class="bi bi-flag"></i>
                            <input type="text" name="nacionalidad" class="form-control" placeholder="Nacionalidad" value="<?php echo htmlspecialchars($agente['nacionalidad']); ?>" required>
                        </div>
                        <div class="mb-3 form-icon">
                            <label for="tipo_domicilio" class="form-label">Tipo de Domicilio</label>
                            <i class="bi bi-house"></i>
                            <input type="text" name="tipo_domicilio" class="form-control" placeholder="Tipo de domicilio" value="<?php echo htmlspecialchars($agente['tipo_domicilio']); ?>" required>
                        </div>
                        <div class="mb-3 form-icon">
                            <label for="estado" class="form-label">Estado</label>
                            <i class="bi bi-geo-alt-fill"></i>
                            <input type="text" name="estado" class="form-control" placeholder="Estado" value="<?php echo htmlspecialchars($agente['estado']); ?>" required>
                        </div>
                    </div>

                    <!-- Tercera columna -->
                    <div class="col-md-4">
                        <div class="mb-3 form-icon">
                            <label for="localidad" class="form-label">Localidad</label>
                            <i class="bi bi-building"></i>
                            <input type="text" name="localidad" class="form-control" placeholder="Localidad" value="<?php echo htmlspecialchars($agente['localidad']); ?>" required>
                        </div>
                        <div class="mb-3 form-icon">
                            <label for="codigo_postal" class="form-label">Código Postal</label>
                            <i class="bi bi-envelope"></i>
                            <input type="text" name="codigo_postal" class="form-control" placeholder="Código Postal" maxlength="10" value="<?php echo htmlspecialchars($agente['codigo_postal']); ?>" required>
                        </div>
                        <div class="mb-3 form-icon">
                            <label for="patente" class="form-label">Patente</label>
                            <i class="bi bi-file-earmark"></i>
                            <input type="text" name="patente" class="form-control" placeholder="Patente" value="<?php echo htmlspecialchars($agente['patente']); ?>" required>
                        </div>
                        <input type="hidden" name="idusuario" value="<?php echo htmlspecialchars($agente['idusuario']); ?>">
                        <input type="hidden" name="idagente" value="<?php echo htmlspecialchars($agente['idagente']); ?>">
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary btn-custom" name="register" value="Enviar">Actualizar</button>
                    <button type="button" class="btn btn-danger btn-custom" data-bs-dismiss="modal">Cancelar</button>
                </div>

            </form>
        <?php else: ?>
            <h2 class="form-header">Registrar Agente Aduanal</h2>
            <form action="../user/agentea/registaragente.php" method="post">
                <div class="row">
                    <!-- Primera columna -->
                    <div class="col-md-4">
                        <div class="mb-3 form-icon">
                            <label for="nombreagente" class="form-label">Nombre</label>
                            <i class="bi bi-person-fill"></i>
                            <input type="text" name="nombreagente" class="form-control" placeholder="Nombre del agente" required>
                        </div>
                        <div class="mb-3 form-icon">
                            <label for="apellidoP" class="form-label">Apellido Paterno</label>
                            <i class="bi bi-person"></i>
                            <input type="text" name="apellidoP" class="form-control" placeholder="Apellido paterno" required>
                        </div>
                        <div class="mb-3 form-icon">
                            <label for="apellidoM" class="form-label">Apellido Materno</label>
                            <i class="bi bi-person"></i>
                            <input type="text" name="apellidoM" class="form-control" placeholder="Apellido materno" required>
                        </div>
                        <div class="mb-3 form-icon">
                            <label for="curp" class="form-label">CURP</label>
                            <i class="bi bi-card-list"></i>
                            <input type="text" name="curp" class="form-control" placeholder="CURP" maxlength="18" required>
                        </div>
                    </div>

                    <!-- Segunda columna -->
                    <div class="col-md-4">
                        <div class="mb-3 form-icon">
                            <label for="rfc" class="form-label">RFC</label>
                            <i class="bi bi-card-text"></i>
                            <input type="text" name="rfc" class="form-control" placeholder="RFC" maxlength="13" required>
                        </div>
                        <div class="mb-3 form-icon">
                            <label for="nacionalidad" class="form-label">Nacionalidad</label>
                            <i class="bi bi-flag"></i>
                            <input type="text" name="nacionalidad" class="form-control" placeholder="Nacionalidad" required>
                        </div>
                        <div class="mb-3 form-icon">
                            <label for="tipo_domicilio" class="form-label">Tipo de Domicilio</label>
                            <i class="bi bi-house"></i>
                            <input type="text" name="tipo_domicilio" class="form-control" placeholder="Tipo de domicilio" required>
                        </div>
                        <div class="mb-3 form-icon">
                            <label for="estado" class="form-label">Estado</label>
                            <i class="bi bi-geo-alt-fill"></i>
                            <input type="text" name="estado" class="form-control" placeholder="Estado" required>
                        </div>
                    </div>

                    <!-- Tercera columna -->
                    <div class="col-md-4">
                        <div class="mb-3 form-icon">
                            <label for="localidad" class="form-label">Localidad</label>
                            <i class="bi bi-building"></i>
                            <input type="text" name="localidad" class="form-control" placeholder="Localidad" required>
                        </div>
                        <div class="mb-3 form-icon">
                            <label for="codigo_postal" class="form-label">Código Postal</label>
                            <i class="bi bi-envelope"></i>
                            <input type="text" name="codigo_postal" class="form-control" placeholder="Código Postal" maxlength="10" required>
                        </div>
                        <div class="mb-3 form-icon">
                            <label for="patente" class="form-label">Patente</label>
                            <i class="bi bi-file-earmark"></i>
                            <input type="text" name="patente" class="form-control" placeholder="Patente" required>
                        </div>
                        <input type="hidden" name="idusuario" value="<?php echo $usuario_id; ?>">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-custom" name="register" value="Enviar">Registrar Agente</button>
                    <button type="button" class="btn btn-danger btn-custom" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        <?php endif; ?>
    </section>
    <?php include '../public/footer.php'; ?>
</body>

</html>