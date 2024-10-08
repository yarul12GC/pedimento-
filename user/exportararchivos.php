<?php
include_once '../sesion.php';
include_once '../conexion.php';

$id_usuario = $_SESSION['usuarioID']; // Obtener el ID del usuario logueado

$registros_por_pagina = 6;
$query_total = "SELECT COUNT(*) as total FROM pedimentocompleto WHERE idusuario = ?";
$stmt_total = $conexion->prepare($query_total);
$stmt_total->bind_param('i', $id_usuario);
$stmt_total->execute();
$result_total = $stmt_total->get_result();
$total_registros = $result_total->fetch_assoc()['total'];
$total_paginas = ceil($total_registros / $registros_por_pagina);

$pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$offset = ($pagina_actual - 1) * $registros_por_pagina;

$query = "SELECT p.idpedimentoc, a.nombreagente, u.Nombre 
          FROM pedimentocompleto p 
          JOIN agenteaduanal a ON p.idagente = a.idagente 
          JOIN usuarios u ON p.idusuario = u.usuarioID 
          WHERE p.idusuario = ? 
          LIMIT ?, ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param('iii', $id_usuario, $offset, $registros_por_pagina);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/pedimento.css">
    <title>PEDIMENTOS DISPONIBLES</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            text-align: center;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .table thead {
            background-color: #007bff;
            color: white;
        }

        .table-hover tbody tr:hover {
            background-color: #e9ecef;
        }

        .pagination {
            justify-content: center;
        }
    </style>
</head>

<body>
    <header>
        <?php include '../public/cabezauser.php'; ?>
    </header>
    <section class="zona1">

        <div class="card-header bg-dark text-white" style="height: 35px;">
            PEDIMENTOS LISTOS PARA EXPORTAR
        </div>

        <div class="card-body">
            <input type="text" name="buscar" placeholder="Buscar" class="form-control mb-3 buscar" oninput="filtrarTabla()">

            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID Pedimento</th>
                        <th>Agente Aduanal</th>
                        <th>Usuario</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['idpedimentoc']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nombreagente']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Nombre']) . "</td>";
                        echo "<td class='text-center'>";

                        // Botón para Continuar
                        echo "<a href='archivopedimentocap.php?id=" . htmlspecialchars($row['idpedimentoc']) . "' class='btn btn-sm btn-outline-warning me-2'>";
                        echo "<i class='fas fa-forward'></i> Continuar";
                        echo "</a>";

                        // Botón para Exportar PDF
                        echo "<a href='../user/exportarpdf/pedimentopdf.php?id=" . htmlspecialchars($row['idpedimentoc']) . "' class='btn btn-sm btn-outline-danger me-2'>";
                        echo "<i class='fas fa-file-pdf'></i> Exportar PDF";
                        echo "</a>";

                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

            <!-- Mostrar el número total de registros -->
            <p class="text-center">Total de Pedimentos Generados: <?php echo $total_registros; ?></p>

            <!-- Paginación -->
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php
                    for ($i = 1; $i <= $total_paginas; $i++) {
                        $active = ($i == $pagina_actual) ? 'active' : '';
                        echo "<li class='page-item $active'><a class='page-link' href='?pagina=$i'>$i</a></li>";
                    }
                    ?>
                </ul>
            </nav>
        </div>

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
<?php
$conexion->close();
?>