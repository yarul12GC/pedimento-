<?php
include_once '../sesion.php';
include_once '../public/mensaje.php';
$pedimento_id = $_SESSION['pedimento_id'] ?? null;

// Incluir el archivo para guardar las secciones si se envía una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['section'])) {
    include 'save_section.php';
}

// Recuperar las secciones guardadas
$sections = $_SESSION['sections'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <header>
        <?php include '../public/cabeza.php'; ?>
    </header>
    <section class="zona1">
        <div class="duplicate-container" id="table-container">
            <?php foreach ($sections as $section) : ?>
                <div class="row row-cols-auto">
                    <div class="col-md-1">
                        <!-- Incluye los archivos PHP según sea necesario -->
                        <?php include 'bloque19/tablasb19.php'; ?>
                    </div>
                    <div class="col-sm-8">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <?php include 'bloque20/tablasb20.php'; ?>
                                <tr>
                                    <?php include 'bloque21/tablasb21.php'; ?>
                                </tr>
                                <tr>
                                    <?php include 'bloque22/tablasb22.php'; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php include 'bloque20/tabla20.php'; ?>
                                </tr>
                                <tr>
                                    <td colspan="11"></td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2"></td>
                                    <td colspan="2"></td>
                                    <td colspan="4"></td>
                                </tr>
                                <?php include 'bloque23/tablasb23.php'; ?>
                                <?php include 'bloque24/tablasb24.php'; ?>
                                <?php include 'bloque25/tablasb25.php'; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-1">
                        <?php include 'bloque27/tablasb27.php'; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="button" class="btn btn-primary" id="duplicate-table-btn">Agregar Sección</button>
        <button type="button" class="btn btn-danger" id="clear-sections-btn">Limpiar Secciones</button>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('duplicate-table-btn').addEventListener('click', function() {
            const container = document.getElementById('table-container');
            const newTable = container.children[0].cloneNode(true); // Clonar la primera tabla
            container.appendChild(newTable); // Agregar la nueva tabla al contenedor

            // Guardar la nueva sección en la sesión
            saveSection(newTable.outerHTML);
        });

        document.getElementById('clear-sections-btn').addEventListener('click', function() {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'clear_sections.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send();
            location.reload(); // Recargar la página después de limpiar
        });

        function saveSection(sectionHTML) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'save_section.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('section=' + encodeURIComponent(sectionHTML));
        }
    </script>
    <?php
    include 'bloque20/modalb20.php';
    ?>
</body>

</html>
