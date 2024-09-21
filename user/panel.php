<?php
include_once('../conexion.php');
include_once('../sesion.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Pedimentos</title>
    <style>
        /* Fuente Poppins para todo el sitio */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        /* Encabezado del panel */
        .panel-header {
            text-align: center;
            margin-bottom: 50px;
            padding-top: 20px;
        }

        .panel-header h1 {
            font-size: 2.5rem;
            font-weight: 600;
            color: #495057;
        }

        .panel-header p {
            font-size: 1.2rem;
            color: #6c757d;
        }

        /* Tarjetas del panel */
        .card-panel {
            background-color: #ffffff;
            border-radius: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 10px;
            border: none;
        }

        .card-panel:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        .card-body h5 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #007bff;
        }

        .card-body img {
            width: 80px;
            margin-bottom: 20px;
        }

        /* Botones personalizados */
        .btn-custom {
            background-color: #007bff;
            color: #fff;
            border-radius: 50px;
            padding: 10px 20px;
            font-size: 0.875rem;
            transition: background-color 0.3s;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        /* Alineación de tarjetas */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card-panel {
            margin: 10px;
            max-width: 300px;
            /* Tamaño máximo de cada tarjeta */
        }
    </style>
</head>

<body>
    <!-- Incluir el header -->
    <?php include '../public/cabezauser.php'; ?>
    <div class="content">
        <div class="zona1">
            <div class="container">
                <div class="panel-header">
                    <h1>Panel de Gestión de Pedimentos</h1>
                    <p>Accede a las diferentes opciones para gestionar tus pedimentos</p>
                </div>

                <!-- Contenedor centrado para tarjetas -->
                <div class="card-container">
                    <!-- Botón para ver pedimentos -->
                    <div class="card card-panel">
                        <div class="card-body text-center">
                            <img src="../media/documento.png" alt="Ver Pedimentos">
                            <h5 class="card-title">Ver Pedimentos Registrados</h5>
                            <p class="card-text">Accede a la lista completa de pedimentos registrados en el sistema.</p>
                            <a href="cap.php" class="btn btn-custom">Ver Pedimentos</a>
                        </div>
                    </div>

                    <!-- Botón para generar nuevo pedimento -->
                    <div class="card card-panel">
                        <div class="card-body text-center">
                            <img src="../media/genero-neutral.png" alt="Nuevo Pedimento">
                            <h5 class="card-title">Generar Pedimento</h5>
                            <p class="card-text">Crea un nuevo pedimento y añade toda la información necesaria.</p>
                            <a href="panelpedimento.php" class="btn btn-custom">Nuevo Pedimento</a>
                        </div>
                    </div>

                    <!-- Botón para exportar pedimentos -->
                    <div class="card card-panel">
                        <div class="card-body text-center">
                            <img src="../media/exportar.png" alt="Exportar Pedimentos">
                            <h5 class="card-title">Exportar Pedimentos</h5>
                            <p class="card-text">Exporta pedimentos completados para su almacenamiento o revisión.</p>
                            <a href="exportararchivos.php" class="btn btn-custom">Exportar Pedimentos</a>
                        </div>
                    </div>

                    <!-- Botón para gestionar agentes aduanales -->
                    <div class="card card-panel">
                        <div class="card-body text-center">
                            <img src="../media/agente-de-aduanas.png" alt="Gestionar Agentes">
                            <h5 class="card-title">Mi Agentes Aduanal</h5>
                            <p class="card-text">Gestiona tu informacion simulando un agente aduanal</p>
                            <a href="agenteaduanluser.php" class="btn btn-custom">Gestionar Mi Agentes</a>
                        </div>
                    </div>

                    <!-- Botón para gestionar certificados -->
                    <div class="card card-panel">
                        <div class="card-body text-center">
                            <img src="../media/certificado.png" alt="Gestionar Certificados">
                            <h5 class="card-title">CERTICENCA</h5>
                            <p class="card-text">Gestiona a los diferentes certificados que se te han otorgado en CENCACOMEX.</p>
                            <a href="../../admin/index.php" class="btn btn-custom">Gestionar Certificados</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Incluir el footer -->
        <?php include '../public/footer.php'; ?>
    </div>

</body>

</html>