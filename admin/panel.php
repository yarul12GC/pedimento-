<?php
include_once('../conexion.php');
include_once 'sesion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Pedimentos</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

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

        .row-centered {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <?php include '../public/cabeza.php'; ?>
    <div class="content">
        <div class="zona1">
            <div class="container">
                <div class="panel-header">
                    <h1>Panel de Gestión de Pedimentos</h1>
                    <p>Accede a las diferentes opciones para gestionar tus pedimentos</p>
                </div>

                <div class="row row-centered text-center">
                    <div class="col-md-3 mb-4 d-flex justify-content-center">
                        <div class="card card-panel">
                            <div class="card-body text-center">
                                <img src="../media/documento.png" alt="Ver Pedimentos">
                                <h5 class="card-title">Ver Pedimentos Registrados</h5>
                                <p class="card-text">Accede a la lista completa de pedimentos registrados en el sistema.</p>
                                <a href="cap.php" class="btn btn-custom">Ver Pedimentos</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4 d-flex justify-content-center">
                        <div class="card card-panel">
                            <div class="card-body text-center">
                                <img src="../media/genero-neutral.png" alt="Nuevo Pedimento">
                                <h5 class="card-title">Generar Pedimento</h5>
                                <p class="card-text">Crea un nuevo pedimento y añade toda la información necesaria.</p>
                                <a href="panelpedimento.php" class="btn btn-custom">Nuevo Pedimento</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4 d-flex justify-content-center">
                        <div class="card card-panel">
                            <div class="card-body text-center">
                                <img src="../media/exportar.png" alt="Exportar Pedimentos">
                                <h5 class="card-title">Exportar Pedimentos</h5>
                                <p class="card-text">Exporta pedimentos completados para su almacenamiento o revisión.</p>
                                <a href="exportararchivos.php" class="btn btn-custom">Exportar Pedimentos</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4 d-flex justify-content-center">
                        <div class="card card-panel">
                            <div class="card-body text-center">
                                <img src="../media/agente-de-aduanas.png" alt="Gestionar Agentes">
                                <h5 class="card-title">Agentes Aduanales</h5>
                                <p class="card-text">Gestiona a los diferentes agentes aduanales registrados en el sistema.</p>
                                <a href="agenteaduanal.php" class="btn btn-custom">Gestionar Agentes</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4 d-flex justify-content-center">
                        <div class="card card-panel">
                            <div class="card-body text-center">
                                <img src="../media/admin.png" alt="Gestionar Modulos">
                                <h5 class="card-title">Panel Principal</h5>
                                <p class="card-text">Gestiona los diferentes módulos en el sistema.</p>
                                <a href="../../usuarioadm/index.php" class="btn btn-custom">Regresar al Panel Principal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include '../public/footer.php'; ?>
    </div>
</body>

</html>