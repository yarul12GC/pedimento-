<?php
include '../conexion.php';
include '../sesion.php';
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
    <title>APENDICE2</title>
</head>

<body>
    <header>
        <?php include '../public/cabeza.php'; ?>
    </header>
    <section class="zona1">

        <fieldset class="fiel">

            <?php

            $consultar = "SELECT * FROM apendice2 ORDER BY idapendice2 ASC";
            $queryapendice2 = mysqli_query($conexion, $consultar);
            $cantidad = mysqli_num_rows($queryapendice2);

            if (isset($_GET['mensaje'])) {
                $mensaje = $_GET['mensaje'];
                if ($mensaje === "exito") {
                    echo "<div id='mensaje' class='alert alert-success'>El Complemento se ha actualizado correctamente.</div>";
                } elseif ($mensaje === "error") {
                    echo "<div id='mensaje' class='alert alert-danger'>Error al actualizar el Complemento.</div>";
                } elseif ($mensaje === "exito_registro") {
                    echo "<div id='mensaje' class='alert alert-success'>El nuevo Complemento se ha registrado correctamente.</div>";
                } elseif ($mensaje === "error_registro") {
                    echo "<div id='mensaje' class='alert alert-danger'>Error al Complemento el nuevo material.</div>";
                }

                // Agrega el script JavaScript
                echo "<script>
            setTimeout(function() {
                document.getElementById('mensaje').style.display = 'none';
            }, 2000);
        </script>";
            }

            ?>

            <legend>Apendice 2</legend>
            <input type="text" name="buscar" placeholder="Buscar" class="form-control buscar" oninput="filtrarTabla()">
            <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal"
                data-bs-target="#agregarapendice">Nuevo Complemento</button><br><br>


            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>CLAVE</th>
                        <th>COMPLEMENTO</th>
                        <th class="cent">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php while ($row = mysqli_fetch_array($queryapendice2)) { ?>
                        <tr>
                            <td> <?php echo $row['clave']; ?> </td>
                            <td> <?php echo $row['descripcion']; ?></td>
                            <td class="cent">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editar_<?php echo $row['idapendice2']; ?>">Editar</button>
                                <button type="button" class="btn btn-danger"
                                    onclick="confirmarEliminar(<?php echo $row['idapendice2']; ?>)">Eliminar</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>


        </fieldset>


    </section>

    <footer>
        <?php
        include '../public/footer.php';
        ?>
    </footer>



    <!-- Modal -->
    <div class="modal fade" id="agregarapendice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 70vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                        REGISTRAR COMPLEMENTO</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../admin/apendice2/registarApendice2.php" method="post">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label class="control-label mb-3" for="clave">CLAVE </label>
                                    <input class="form-control" type="text" name="clave" required>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label class="control-label mb-3" for="descripcion">CONTENIDO </label>
                                    <input class="form-control" type="text" name="descripcion" required>
                                </div>

                            </div>
                            <input type="hidden" name="idapendice2">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <?php
    $queryapendice2 = mysqli_query($conexion, $consultar);
    while ($row = mysqli_fetch_array($queryapendice2)) {
        ?>

        <div class="modal fade" id="editar_<?php echo $row['idapendice2']; ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 70vw;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                            REGISTRAR COMPLEMENTO</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../admin/apendice2/actualizarapendice2.php" method="post">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="mb-3">
                                        <label class="control-label mb-3" for="clave">CLAVE </label>
                                        <input class="form-control" type="text" name="clave"
                                            value="<?php echo $row['clave']; ?>">
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="mb-3">
                                        <label class="control-label mb-3" for="contenido">CONTENIDO </label>
                                        <input class="form-control" type="text" name="descripcion" required
                                            value="<?php echo $row['descripcion']; ?>">
                                    </div>

                                </div>
                                <input type="hidden" name="idapendice2" value="<?php echo $row['idapendice2']; ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <?php
    }
    ?>

</body>

</html>

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

    function confirmarEliminar(usuarioID) {
        if (confirm("¿Estás seguro de que deseas eliminar este Complemento?")) {
            window.location.href = '../admin/apendice2/eliminarapendice2.php?idapendice2=' + idapendice2;
        }
    }
</script>