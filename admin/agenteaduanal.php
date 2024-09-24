<?php
include('../conexion.php');
include('sesion.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agentes</title>
</head>

<body>
    <header>
        <?php
        include '../public/cabeza.php'
        ?>
    </header>

    <section class="zona1">
        <fieldset class="border p-4 rounded">
            <legend>Agentes Aduanales</legend>

            <input type="text" id="buscar" name="buscar" placeholder="Buscar..." class="form-control me-2" oninput="filtrarTabla()"><br>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fas fa-plus"></i> Nuevo Agente Aduanal
            </button>
            <br><br>

            <?php
            $consultar = "SELECT * FROM agenteaduanal ORDER BY idagente DESC";
            $queryagente = mysqli_query($conexion, $consultar);
            ?>

            <table class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>NOMBRE AGENTE</th>
                        <th>CURP</th>
                        <th>RFC</th>
                        <th>DOMICILIO</th>
                        <th>CÓDIGO POSTAL</th>
                        <th class="text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($queryagente)) { ?>
                        <tr>
                            <td><i class="fas fa-user"></i> <?php echo $row['nombreagente'] . ' ' . $row['apellidoP'] . ' ' . $row['apellidoM']; ?></td>
                            <td><?php echo $row['curp']; ?></td>
                            <td><?php echo $row['rfc']; ?></td>
                            <td><?php echo $row['estado'] . ' ' . $row['localidad']; ?></td>
                            <td><?php echo $row['codigo_postal']; ?></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editar_<?php echo $row['idagente']; ?>">
                                    <i class="fas fa-edit"></i> Editar
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmarEliminar(<?php echo $row['idagente']; ?>)">
                                    <i class="fas fa-trash-alt"></i> Eliminar
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </fieldset>
    </section>


    <footer>
        <?php
        include '../public/footer.php'
        ?>
    </footer>

    <!-- Modal para registrar un nuevo agente-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 70vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                        REGISTRAR AGENTE</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../admin/agentea/registaragente.php" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="control-label mb-3" for="nombreagente">NOMBRE </label>
                                    <input class="form-control" type="text" name="nombreagente" placeholder="" required>
                                </div>
                                <div class="mb-3">
                                    <label class="control-label mb-3" for="apellidoP">APELLIDO PATERNO </label>
                                    <input class="form-control" type="text" name="apellidoP" placeholder="" required>
                                </div>
                                <div class="mb-3">
                                    <label class="control-label mb-3" for="apellidoM">APELLIDO MATERNO</label>
                                    <input class="form-control" type="text" name="apellidoM" placeholder="" required>
                                </div>
                                <div class="mb-3">
                                    <label class="control-label mb-3" for="curp">CURP </label>
                                    <input class="form-control" type="text" name="curp" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="control-label mb-3" for="rfc">RFC</label>
                                    <input class="form-control" type="text" name="rfc" placeholder="" required>
                                </div>
                                <div class="mb-3">
                                    <label class="control-label mb-3" for="nacionalidad">NACIONALIDAD</label>
                                    <input class="form-control" type="text" name="nacionalidad" placeholder="" required>
                                </div>
                                <div class="mb-3">
                                    <label class="control-label mb-3" for="Estatus">TIPO DOMICILIO </label>
                                    <input class="form-control" type="text" name="tipo_domicilio" placeholder=""
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label class="control-label mb-3" for="estado">ESTADO</label>
                                    <input class="form-control" type="text" name="estado" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="control-label mb-3" for="localidad">LOCALIDAD</label>
                                    <input class="form-control" type="text" name="localidad" placeholder="" required>
                                </div>
                                <div class="mb-3">
                                    <label class="control-label mb-3" for="codigo_postal">CODIGO POSTAL </label>
                                    <input class="form-control" type="text" name="codigo_postal" placeholder=""
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label class="control-label mb-3" for="patente">PATENTE </label>
                                    <input class="form-control" type="text" name="patente" placeholder=""
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label class="control-label mb-3" for="usuarioID">USUARIO RELACIONADO: </label>
                                    <select required="required" name="idusuario" class="form-control">
                                        <option value="">-- Tipo de Usuario --</option>
                                        <?php
                                        $Usuarios = mysqli_query($conexion, "SELECT usuarioID, email FROM usuarios");

                                        while ($datos = mysqli_fetch_array($Usuarios)) {
                                        ?>
                                            <option value="<?php echo $datos['usuarioID']; ?>">
                                                <?php echo $datos['email']; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <input class="form-control" type="hidden" name="idagente" placeholder="" required>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="register"
                                value="Enviar">Registrarme</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



    <?php
    $queryagente = mysqli_query($conexion, $consultar);
    while ($row = mysqli_fetch_array($queryagente)) {
    ?>
        <!-- Modal para editar agente-->
        <div class="modal fade" id="editar_<?php echo $row['idagente']; ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 70vw;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                            EDITAR AGENTE</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../admin/agentea/actualizaragente.php" method="post">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="control-label mb-3" for="nombreagente">NOMBRE </label>
                                        <input class="form-control" type="text" name="nombreagente"
                                            value="<?php echo $row['nombreagente']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label mb-3" for="apellidoP">APELLIDO PATERNO </label>
                                        <input class="form-control" type="text" name="apellidoP" placeholder=""
                                            value="<?php echo $row['apellidoP']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label mb-3" for="apellidoM">APELLIDO MATERNO</label>
                                        <input class="form-control" type="text" name="apellidoM" placeholder=""
                                            value="<?php echo $row['apellidoM']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label mb-3" for="curp">CURP </label>
                                        <input class="form-control" type="text" name="curp" placeholder=""
                                            value="<?php echo $row['curp']; ?>">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="control-label mb-3" for="rfc">RFC</label>
                                        <input class="form-control" type="text" name="rfc" placeholder=""
                                            value="<?php echo $row['rfc']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label mb-3" for="nacionalidad">NACIONALIDAD</label>
                                        <input class="form-control" type="text" name="nacionalidad" placeholder=""
                                            value="<?php echo $row['nacionalidad']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label mb-3" for="tipo_domicilio">TIPO DOMICILIO </label>
                                        <input class="form-control" type="text" name="tipo_domicilio" placeholder=""
                                            value="<?php echo $row['tipo_domicilio']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label mb-3" for="estado">ESTADO</label>
                                        <input class="form-control" type="text" name="estado" placeholder=""
                                            value="<?php echo $row['estado']; ?>">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="control-label mb-3" for="localidad">LOCALIDAD</label>
                                        <input class="form-control" type="text" name="localidad" placeholder=""
                                            value="<?php echo $row['localidad']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label mb-3" for="codigo_postal">CODIGO POSTAL </label>
                                        <input class="form-control" type="text" name="codigo_postal" placeholder=""
                                            value="<?php echo $row['codigo_postal']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label mb-3" for="patente">PATENTE </label>
                                        <input class="form-control" type="text" name="patente" placeholder=""
                                            value="<?php echo $row['patente']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="TipoUsuarioID">USUARIO RELACIONADO:</label>
                                        <select class="form-control" required name="idusuario">
                                            <option value="">-- Usuario --</option>
                                            <?php
                                            $Usuarios = mysqli_query($conexion, "SELECT usuarioID, email FROM usuarios");
                                            while ($datos = mysqli_fetch_array($Usuarios)) {
                                            ?>
                                                <option value="<?php echo $datos['usuarioID']; ?>" <?php echo ($datos['usuarioID'] == $row['idusuario']) ? 'selected' : ''; ?>>
                                                    <?php echo $datos['email']; ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <input class="form-control" type="hidden" name="idagente" placeholder=""
                                        value="<?php echo $row['idagente']; ?>">

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="register"
                                    value="Enviar">Actualizar</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
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

    function confirmarEliminar(idagente) {
        if (confirm("¿Estás seguro de que deseas eliminar este agente aduanal?")) {
            window.location.href = '../admin/agentea/eliminar-agente.php?idagente=' + idagente;
        }
    }
</script>