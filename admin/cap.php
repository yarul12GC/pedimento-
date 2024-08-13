<?php
include_once '../sesion.php';
include_once '../public/mensaje.php';
$pedimento_id = $_SESSION['pedimento_id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/pedimento.css">
    <title>captura de pedimento</title>
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
    </style>
</head>


<body>
    <header>
        <?php include '../public/cabeza.php'; ?>
    </header>
    <section class="zona1">
        <fieldset>
            <div class="card">
                <div class="card-header bg-dark text-white">
                    Pedimentos Generados
                </div>


                <input type="text" name="buscar" placeholder="Buscar" class="form-control buscar" oninput="filtrarTabla()">

                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID Pedimento</th>
                                <th>Agente Aduanal</th>
                                <th>Usuario</th>
                                <th class="cent">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once '../conexion.php';

                            $query = "SELECT p.idpedimentoc, a.nombreagente, u.nombreusuario 
                                FROM pedimentocompleto p 
                                JOIN agenteaduanal a ON p.idagente = a.idagente 
                                JOIN usuarios u ON p.idusuario = u.usuarioID
                                ";
                            $result = $conexion->query($query);

                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['idpedimentoc']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['nombreagente']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['nombreusuario']) . "</td>";
                                echo "<td class='cent'>";
                                echo "<a href='archivopedimento.php?id=" . htmlspecialchars($row['idpedimentoc']) . "' class='btn btn-primary btn-sm'>
                                <i class='fas fa-eye'></i> Ver Detalles
                              </a>";

                                echo "<a href='exportar_pdf.php?id=" . $row['idpedimentoc'] . "' class='btn btn-danger btn-sm'>";
                                echo "<i class='fas fa-file-pdf'></i> Exportar PDF</a> ";
                                echo "<a href='exportar_xml.php?id=" . $row['idpedimentoc'] . "' class='btn btn-warning btn-sm'>";
                                echo "<i class='fas fa-file-code'></i> Exportar XML</a> ";
                                echo "<a href='eliminar_pedimento.php?id=" . $row['idpedimentoc'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este pedimento?\");'>";
                                echo "<i class='fas fa-trash'></i> Eliminar</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            $conexion->close();
                            ?>
                        </tbody>
                    </table>
                </div>
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