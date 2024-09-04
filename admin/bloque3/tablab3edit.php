<?php
$querytransp =  "SELECT 
                                t.*,
                                a1.clave AS clave_entrtadaSalida, 
                                a2.clave AS clave_arribo, 
                                a3.clave AS clave_salida
                                FROM 
                                transporte t
                                INNER JOIN 
                                apendice3 a1 ON t.idapendice3entrtadaSalida = a1.idapendice3
                                INNER JOIN 
                                apendice3 a2 ON t.idapendice3arribo = a2.idapendice3
                                INNER JOIN 
                                apendice3 a3 ON t.idapendice3salida = a3.idapendice3
                                WHERE idpedimentoc = ?";

$stmttransp = $conexion->prepare($querytransp);
$stmttransp->bind_param("i", $pedimento_id);
$stmttransp->execute();
$resulttransp = $stmttransp->get_result();

if ($resulttransp->num_rows > 0) {
    $datostrnsp = $resulttransp->fetch_assoc();
?>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th colspan="3" class="text-center table-dark">MEDIOS DE TRANSPORTE</th>
            </tr>
            <tr>
                <th>ENTRADA SALIDA</th>
                <th>ARRIBO</th>
                <th>SALIDA</th>
            </tr>
        </thead>
        <tbody></tbody>
        <tr>
            <td><?php echo htmlspecialchars($datostrnsp['clave_entrtadaSalida']); ?></td>
            <td><?php echo htmlspecialchars($datostrnsp['clave_arribo']); ?></td>
            <td><?php echo htmlspecialchars($datostrnsp['clave_salida']); ?></td>
        </tr>
        </tbody>
    </table>
    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarBloque3_<?php echo $pedimento_id; ?>">
        Editar Bloque 3
    </button>
<?php
} else {
?>


    <table class="table table-bordered table-hover">
        <thead class="text-center table-dark">
            <tr>
                <th colspan="8" class="text-center">MEDIOS DE TRANSPORTE</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>ENTRADA SALIDA</th>
                <th>ARRIBO</th>
                <th>SALIDA</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>

            </tr>
        </tbody>
    </table>
    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque3">
        <i class="fas fa-database"></i>
    </button>
<?php
}
?>

<body>
    <!-- Modal para editar Bloque 3 -->
    <div class="modal fade" id="editarBloque3_<?php echo $pedimento_id; ?>" tabindex="-1" aria-labelledby="editarBloque3Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editarBloque3Label">
                        <img src="../media/locenca.png" width="40px"> EDITAR BLOQUE 3
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="bloque3-edit-form" action="../admin/bloque3/actualizar_datosb3.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                    include('../conexion.php');
                                    $apendice3Result = $conexion->query("SELECT idapendice3, clave as clave3 FROM apendice3");
                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }
                                    ?>
                                    <label for="edit-idapendice3entrtadaSalida">ENTRADA/SALIDA (APENDICE 3)</label>
                                    <select class="form-control" id="edit-idapendice3entrtadaSalida" name="idapendice3entrtadaSalida">
                                        <?php while ($apendice3 = $apendice3Result->fetch_assoc()): ?>
                                            <option value="<?= $apendice3['idapendice3'] ?>" <?= $apendice3['idapendice3'] == $datostrnsp['idapendice3entrtadaSalida'] ? 'selected' : '' ?>>
                                                <?= $apendice3['clave3'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                    include('../conexion.php');
                                    $apendice3Result = $conexion->query("SELECT idapendice3, clave as clave3 FROM apendice3");
                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }                                    ?>
                                    <label for="edit-idapendice3arribo">ARRIBO (APENDICE 3)</label>
                                    <select class="form-control" id="edit-idapendice3arribo" name="idapendice3arribo">
                                        <?php while ($apendice3 = $apendice3Result->fetch_assoc()): ?>
                                            <option value="<?= $apendice3['idapendice3'] ?>" <?= $apendice3['idapendice3'] == $datostrnsp['idapendice3arribo'] ? 'selected' : '' ?>>
                                                <?= $apendice3['clave3'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                    include('../conexion.php');
                                    $apendice3Result = $conexion->query("SELECT idapendice3, clave as clave3 FROM apendice3");
                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }                                    ?>
                                    <label for="edit-idapendice3salida">SALIDA (APENDICE 3)</label>
                                    <select class="form-control" id="edit-idapendice3salida" name="idapendice3salida">
                                        <?php while ($apendice3 = $apendice3Result->fetch_assoc()): ?>
                                            <option value="<?= $apendice3['idapendice3'] ?>" <?= $apendice3['idapendice3'] == $datostrnsp['idapendice3salida'] ? 'selected' : '' ?>>
                                                <?= $apendice3['clave3'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">
                        <input type="hidden" name="idtransporte" value="<?php echo $datostrnsp['idtransporte']; ?>">

                        <br>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>