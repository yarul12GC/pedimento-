<?php
$queryvaloresd =  " SELECT * FROM valordecrementable WHERE idpedimentoc = ?";

$stmtvaloresd = $conexion->prepare($queryvaloresd);
$stmtvaloresd->bind_param("i", $pedimento_id);
$stmtvaloresd->execute();
$resultvaloresd = $stmtvaloresd->get_result();

if ($resultvaloresd->num_rows > 0) {
    $datosdcre = $resultvaloresd->fetch_assoc();
?>
    <table class="table table-bordered table-hover">
        <thead class="text-center">
            <tr>
                <th colspan="14" class="text-center table-dark">VALOR DECREMENTABLES</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">TRANSPORTE DECREMENTABLE</th>
                <th scope="row">SEGURO DECREMENTABLE</th>
                <th scope="row">CARGA</th>
                <th scope="row">DESCARGA</th>
                <th scope="row">OTROS DECREMENTABLES</th>
            </tr>
            <tr>
                <td><?php echo htmlspecialchars($datosdcre['VsegurosD']); ?></td>
                <td><?php echo htmlspecialchars($datosdcre['segurosD']); ?></td>
                <td><?php echo htmlspecialchars($datosdcre['fletesD']); ?></td>
                <td><?php echo htmlspecialchars($datosdcre['embalajesD']); ?></td>
                <td><?php echo htmlspecialchars($datosdcre['otrosDecrement']); ?></td>
            </tr>
        </tbody>
    </table>

<?php
} else {
?>
    <table class="table table-bordered table-hover">
        <thead class="text-center table-dark">
            <tr>
                <th colspan="14" class="text-center">VALOR DECREMENTABLES</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">TRANSPORTE DECREMENTABLE</th>
                <th scope="row">SEGURO DECREMENTABLE</th>
                <th scope="row">CARGA</th>
                <th scope="row">DESCARGA</th>
                <th scope="row">OTROS DECREMENTABLES</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque7">
        <i class="fas fa-database"></i>
    </button>

<?php
}
?>