<?php
include ('../conexion.php');
include ('../sesion.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/zona.css">
    <link rel="stylesheet" href="../estilos/pie.css">
    <title>Home Admin</title>
</head>

<body>
    <header>
        <?php include '../public/cabeza.php'; ?>
    </header>
    <section class="zona1">

        <?php

        $consultar = "SELECT 
            u.usuarioID,
            u.email,
            tu.Rol
        FROM 
            usuarios u
        INNER JOIN 
            tipousuarios tu
        ON 
            u.tipoUsuarioID = tu.tipoUsuarioID;";
        $queryUsua = mysqli_query($conexion, $consultar);
        $cantidad = mysqli_num_rows($queryUsua);
        ?>

        <fieldset class="fiel">
            <legend>Usuarios</legend>
            <br>
            <input type="text" name="buscar" placeholder="Buscar" class="form-control buscar" oninput="filtrarTabla()">
            <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal"
                data-bs-target="#exampleModal">Nuevo Usuario</button><br><br>

            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">EMAIL</th>
                        <th scope="col" class="cent">TIPO USUARIO</th>
                        <th scope="col" class="cent">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php while ($row = mysqli_fetch_array($queryUsua)) { ?>
                        <tr>
                            <td><i class="fas fa-user"></i> <?php echo $row['email']; ?></td>
                            <td class="cent"><?php echo $row['Rol']; ?></td>
                            <td class="cent">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editar_<?php echo $row['usuarioID']; ?>">Editar</button>
                                <button type="button" class="btn btn-danger"
                                    onclick="confirmarEliminar(<?php echo $row['usuarioID']; ?>)">Eliminar</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </fieldset>
    </section>
    <footer>
        <?php include '../public/footer.php'; ?>
    </footer>

    <!-- Modal para registrar nuevo usuario -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                        REGISTRAR USUARIO</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../admin/usuarios/register.php" method="post">
                        <div class="row">
                            <label class="col-md-12 text-white"><strong>Ingresa los siguientes datos para generar tu
                                    perfil</strong></label>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="control-label mb-3" for="Estatus">Correo </label>
                                    <input class="form-control" type="text" name="email" placeholder="Correo" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="col-md-4">
                                    <label class="control-label mb-3" for="Estatus">Contraseña </label>
                                    <input class="form-control" type="password" name="contrasena" id="contrasena"
                                        placeholder="Contraseña" minlength="8" required>
                                    <small class="text-white">La contraseña debe tener al menos 8 caracteres.</small>
                                </div>
                                <div class="mb-3">
                                    <label class="control-label mb-3" for="Estatus">Confirma tu Contraseña </label>
                                    <input class="form-control" type="password" name="confirm_contrasena"
                                        id="confirm_contrasena" placeholder="Confirmar Contraseña" minlength="8"
                                        required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="control-label mb-3" for="Estatus">Tipo de usuario </label>
                                    <select required="required" name="tipoUsuarioID" class="form-control">
                                        <option value="">-- Tipo de Usuario --</option>
                                        <?php
                                        $tiposUsuarios = mysqli_query($conexion, "SELECT tipoUsuarioID, Rol FROM tipousuarios");

                                        while ($datos = mysqli_fetch_array($tiposUsuarios)) {
                                            ?>
                                            <option value="<?php echo $datos['tipoUsuarioID']; ?>">
                                                <?php echo $datos['Rol']; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
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

    <!-- Modales para editar usuarios existentes -->
    <?php
    $queryUsua = mysqli_query($conexion, $consultar); // Vuelve a ejecutar la consulta para resetear el puntero
    while ($row = mysqli_fetch_array($queryUsua)) {
        ?>
        <div class="modal fade" id="editar_<?php echo $row['usuarioID']; ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 70vw;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                            EDITAR USUARIO</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../admin/usuarios/actualizar-user.php" method="post">
                            <div class="row">
                                <label class="col-md-12 text-white"><strong>Ingresa los siguientes datos para actualizar tu
                                        perfil</strong></label>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="control-label mb-3" for="Estatus">Correo </label>
                                        <input class="form-control" type="text" name="email" placeholder="Correo"
                                            value="<?php echo $row['email']; ?>" required>
                                    </div>
                                    <input type="hidden" name="usuarioID" value="<?php echo $row['usuarioID']; ?>">
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="nueva_contrasena">Nueva Contraseña:</label>
                                        <input class="form-control" type="password" name="nueva_contrasena"
                                            placeholder="Nueva Contraseña" minlength="8">
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirmar_contrasena">Confirmar Contraseña:</label>
                                        <input class="form-control" type="password" name="confirmar_contrasena"
                                            placeholder="Confirmar Contraseña" minlength="8">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="TipoUsuarioID">Tipo de Usuario:</label>
                                        <select class="form-control" required name="tipoUsuarioID">
                                            <option value="">-- Tipo de Usuario --</option>
                                            <?php
                                            $tiposUsuarios = mysqli_query($conexion, "SELECT tipoUsuarioID, Rol FROM tipousuarios");
                                            while ($datos = mysqli_fetch_array($tiposUsuarios)) {
                                                ?>
                                                <option value="<?php echo $datos['tipoUsuarioID']; ?>" <?php echo ($datos['tipoUsuarioID'] == $datos['tipoUsuarioID']) ? 'selected' : ''; ?>>
                                                    <?php echo $datos['Rol']; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="update"
                                    value="Actualizar">Actualizar</button>
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

    function confirmarEliminar(usuarioID) {
        if (confirm("¿Estás seguro de que deseas eliminar este usuario?")) {
            window.location.href = '../admin/usuarios/eliminarUsuario.php?usuarioID=' + usuarioID;
        }
    }
</script>
