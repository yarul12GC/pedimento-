<?php
include '../conexion.php';

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$agentesResult = $conexion->query("SELECT idagente, nombreagente FROM agenteaduanal");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captura de Pedimento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../estilos/pedimento.css">
    <title>Pedimento de Importación</title>
</head>

<body>
    <header>
        <?php include '../public/cabeza.php'; ?>
    </header>
    <section class="zona1">
        <fieldset>
            <legend><strong>Genera archivo de Pedimento</strong></legend>

            <div class="form-group">
                <label for="agenteSelect" class="tex"><i class="fas fa-user"></i><strong> Seleccione el agente aduanal
                        responsable de la generación del pedimento.</strong>
                </label><br><br>
                <select class="form-control" id="agenteSelect" name="agenteSelect">
                    <?php while ($agente = $agentesResult->fetch_assoc()): ?>
                        <option value="<?= htmlspecialchars($agente['idagente']) ?>"><?= htmlspecialchars($agente['nombreagente']) ?></option>
                    <?php endwhile; ?>
                </select><br>
            </div>

            <form id="generar-pedimento-form" method="POST" action="generar_pedimento.php">
                <input type="hidden" id="agente_id" name="agente_id">
                <button type="submit" id="generar-pedimento" class="btn btn-primary">Generar Pedimento</button>
            </form>
            <br><br>
        </fieldset>
    </section>
    <footer>
        <?php include '../public/footer.php'; ?>
    </footer>
   
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#generar-pedimento').click(function (event) {
                event.preventDefault();
                var agenteId = $('#agenteSelect').val();
                $('#agente_id').val(agenteId);
                $('#generar-pedimento-form').submit();
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
