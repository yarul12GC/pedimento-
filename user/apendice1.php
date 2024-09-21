<?php
include '../conexion.php';
include '../sesion.php';

// Configuración de paginación
$limit = 8; // Número de registros por página
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$start = ($page - 1) * $limit;

// Consulta SQL con límite
$consultar = "SELECT * FROM apendice1 ORDER BY idapendice1 ASC LIMIT $start, $limit";
$queryapendice1 = mysqli_query($conexion, $consultar);

// Total de registros
$total_query = mysqli_query($conexion, "SELECT COUNT(*) as total FROM apendice1");
$total_data = mysqli_fetch_assoc($total_query);
$total_records = $total_data['total'];
$total_pages = ceil($total_records / $limit);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../estilos/zona.css">
    <link rel="stylesheet" href="../../estilos/pie.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="../media/locenca.png" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>APENDICE1</title>
    <style>
        .pagination-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <header>
        <?php include '../public/cabezauser.php'; ?>
    </header>
    <section class="zona1">

        <fieldset class="fiel">

            <?php
            if (isset($_GET['mensaje'])) {
                $mensaje = $_GET['mensaje'];
                if ($mensaje === "exito") {
                    echo "<div id='mensaje' class='alert alert-success'>El Complemento se ha actualizado correctamente.</div>";
                } elseif ($mensaje === "error") {
                    echo "<div id='mensaje' class='alert alert-danger'>Error al actualizar el Complemento.</div>";
                } elseif ($mensaje === "exito_registro") {
                    echo "<div id='mensaje' class='alert alert-success'>El nuevo Complemento se ha registrado correctamente.</div>";
                } elseif ($mensaje === "error_registro") {
                    echo "<div id='mensaje' class='alert alert-danger'>Error al registrar el nuevo material.</div>";
                }

                // Agrega el script JavaScript
                echo "<script>
                    setTimeout(function() {
                        document.getElementById('mensaje').style.display = 'none';
                    }, 2000);
                </script>";
            }
            ?>

            <legend>Apendice 1</legend>
            <input type="text" name="buscar" placeholder="Buscar" class="form-control buscar" oninput="filtrarTabla()">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ADUANA</th>
                        <th>SECCION</th>
                        <th>COMPLEMENTO</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php while ($row = mysqli_fetch_array($queryapendice1)) { ?>
                        <tr>
                            <td> <?php echo $row['clave']; ?> </td>
                            <td> <?php echo $row['seccion']; ?> </td>
                            <td> <?php echo $row['descripcion']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <!-- Paginación centrada -->
            <div class="pagination-wrapper">
                <nav>
                    <ul class="pagination">
                        <?php if ($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Anterior">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($page < $total_pages): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?= $page + 1 ?>" aria-label="Siguiente">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>

        </fieldset>

    </section>

    <footer>
        <?php include '../public/footer.php'; ?>
    </footer>

    <script>
        function filtrarTabla() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.querySelector('.buscar');
            filter = input.value.toUpperCase();
            table = document.querySelector('.table');
            tr = table.getElementsByTagName('tr');

            for (i = 0; i < tr.length; i++) {
                var visible = false;
                var tds = tr[i].getElementsByTagName('td');
                for (var j = 0; j < tds.length; j++) {
                    td = tds[j];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            visible = true;
                            break;
                        }
                    }
                }
                tr[i].style.display = visible ? '' : 'none';
            }
        }
    </script>

</body>

</html>