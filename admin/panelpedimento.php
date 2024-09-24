<?php
include 'sesion.php';
include '../conexion.php';

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$agentesResult = $conexion->query("SELECT idagente, nombreagente FROM agenteaduanal");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captura de Pedimento</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../estilos/pedimento.css">
</head>

<body class="bg-light">
    <header>
        <?php include '../public/cabeza.php'; ?>
    </header>
    <section class="zona1">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-danger text-white">
                            <h5 class="mb-0"><i class="fas fa-file-alt"></i> Generar Archivo de Pedimento</h5>
                        </div>
                        <div class="card-body">
                            <form id="generar-pedimento-form" method="POST" action="generar_pedimento.php">
                                <div class="form-group">
                                    <label for="agenteSelect"><i class="fas fa-user"></i> Seleccione el agente aduanal responsable:</label>
                                    <select class="form-control" id="agenteSelect" name="agenteSelect">
                                        <?php while ($agente = $agentesResult->fetch_assoc()): ?>
                                            <option value="<?= htmlspecialchars($agente['idagente']) ?>"><?= htmlspecialchars($agente['nombreagente']) ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <input type="hidden" id="agente_id" name="agente_id">
                                <button type="submit" id="generar-pedimento" class="btn btn-success btn-block">
                                    <i class="fas fa-check"></i> Generar Pedimento
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="footer mt-5">
        <?php include '../public/footer.php'; ?>
    </footer>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#generar-pedimento').click(function(event) {
                event.preventDefault();
                var agenteId = $('#agenteSelect').val();
                $('#agente_id').val(agenteId);
                $('#generar-pedimento-form').submit();
            });
        });
    </script>
</body>

</html>