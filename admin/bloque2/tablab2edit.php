<?php
// Verifica si se ha recibido el parámetro 'id' en la URL
$pedimento_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consulta para obtener los datos del pedimento relacionado
$querytransac =  "SELECT ts.*, a15.clave AS clavea15, a1.clave AS clavea1, a1.seccion
            FROM transacciones ts
            INNER JOIN apendice15 a15 ON ts.idapendice15 = a15.idapendice15
            INNER JOIN apendice1 a1 ON ts.idapendice1 = a1.idapendice1
            WHERE idpedimentoc = ?";
$stmttransac = $conexion->prepare($querytransac);
$stmttransac->bind_param("i", $pedimento_id);
$stmttransac->execute();
$resulttransac = $stmttransac->get_result();

if ($resulttransac->num_rows > 0) {
    $datotransac = $resulttransac->fetch_assoc();
?>
    <table class="table table-bordered table-hover">
        <tr>
            <th>DESTINO/ORIGEN</th>
            <td><?php echo htmlspecialchars($datotransac['clavea15']); ?></td>
            <th>TIPO DE CAMBIO</th>
            <td><?php echo htmlspecialchars($datotransac['tipoCambio']); ?></td>
            <th>PESO BRUTO</th>
            <td><?php echo htmlspecialchars($datotransac['peso_bruto']); ?></td>
            <th>ADUANA</th>
            <td><?php echo htmlspecialchars($datotransac['clavea1'] . $datotransac['seccion']); ?></td>
        </tr>
    </table>
    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarBloque2_<?php echo $pedimento_id; ?>">
        Editar Bloque 2
    </button>
<?php
} else {
?>
    <table class="table table-bordered table-hover">
        <tr>
            <th>DESTINO/ORIGEN</th>
            <td></td>
            <th>TIPO DE CAMBIO</th>
            <td></td>
            <th>PESO BRUTO</th>
            <td></td>
            <th>ADUANA</th>
            <td></td>
        </tr>
    </table>
    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque2">
        <i class="fas fa-database"></i>
    </button>
<?php
}
?>

<!-- Modal para editar Bloque 2 -->
<div class="modal fade" id="editarBloque2_<?php echo $pedimento_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <img src="../media/locenca.png" width="40px"> EDITAR BLOQUE 2
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bloque-b-edit-form" action="../admin/bloque2/editardatosb2.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php
                                include('../conexion.php');

                                // Consulta para obtener los datos de apendice15
                                $apendice15Result = $conexion->query("SELECT idapendice15, clave as clave15 FROM apendice15");

                                if ($conexion->connect_error) {
                                    die("Conexión fallida: " . $conexion->connect_error);
                                }
                                ?>
                                <label for="agenteSelect">DESTINO O ORIGEN (APENDICE15)</label><br>
                                <select class="form-control" name="idapendice15">
                                    <?php while ($apendice15 = $apendice15Result->fetch_assoc()) : ?>
                                        <option value="<?= $apendice15['idapendice15'] ?>" <?php if ($datotransac['idapendice15'] == $apendice15['idapendice15']) echo 'selected'; ?>>
                                            <?= $apendice15['clave15'] ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="bloque-b-campo2">TIPO DE CAMBIO</label>
                                <input type="text" class="form-control" id="bloque-b-campo2" name="tipoCambio" value="<?php echo htmlspecialchars($datotransac['tipoCambio']); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bloque-b-campo3">PESO BRUTO</label>
                                <input type="text" class="form-control" id="bloque-b-campo3" name="peso_bruto" value="<?php echo htmlspecialchars($datotransac['peso_bruto']); ?>" required>
                            </div>
                            <div class="form-group">
                                <?php
                                // Consulta para obtener los datos de apendice1
                                $apendice1Result = $conexion->query("SELECT idapendice1, clave as clave1, seccion, descripcion FROM apendice1");

                                if ($conexion->connect_error) {
                                    die("Conexión fallida: " . $conexion->connect_error);
                                }
                                ?>
                                <label for="agenteSelect">ADUANA (APENDICE1)</label><br>
                                <select class="form-control" name="idapendice1" id="idapendice1">
                                    <option>---SELECCIONE ADUANA---</option>
                                    <?php while ($apendice1 = $apendice1Result->fetch_assoc()) : ?>
                                        <option value="<?= $apendice1['idapendice1'] ?>" data-clave="<?= $apendice1['clave1'] ?>" data-seccion="<?= $apendice1['seccion'] ?>" <?php if ($datotransac['idapendice1'] == $apendice1['idapendice1']) echo 'selected'; ?>>
                                            <?= $apendice1['clave1'] . ' ' . $apendice1['descripcion'] ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($datotransac['idtransacciones']); ?>">

                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Actualizar Bloque</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>