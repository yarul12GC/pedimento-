<?php
$queryvaloresp =  " SELECT * FROM valoresp WHERE idpedimentoc = ?";

$stmtvaloresp = $conexion->prepare($queryvaloresp);
$stmtvaloresp->bind_param("i", $pedimento_id);
$stmtvaloresp->execute();
$resultvaloresp = $stmtvaloresp->get_result();

if ($resultvaloresp->num_rows > 0) {
    $datosvp = $resultvaloresp->fetch_assoc();
?>
    <table class="table table-bordered table-hover">

        <tr>
            <th>VALOR EN DOLARES</th>
            <td>$<?php echo htmlspecialchars($datosvp['valorDolares']); ?></td>
        </tr>
        <tr>
            <th>VALOR ADUANA</th>
            <td>$<?php echo htmlspecialchars($datosvp['valorAduna']); ?></td>
        </tr>
        <tr>
            <th>PRECIO PAGADO/VALOR COMERCIAL</th>
            <td>$<?php echo htmlspecialchars($datosvp['precioPagado']); ?></td>
        </tr>
        </tbody>
    </table>
    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarBloque4_<?php echo $pedimento_id; ?>">
        Editar Bloque 4
    </button>
<?php
} else {
?>
    <table class="table table-bordered table-hover">
        <tbody>

            <tr>
                <th>VALOR EN DOLARES</th>
                <td></td>
            </tr>

            <tr>
                <th>VALOR ADUANA</th>
                <td></td>
            </tr>

            <tr>
                <th>PRECIO PAGADO/VALOR COMERCIAL</th>
                <td></td>
            </tr>

        </tbody>
    </table>
    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque4">
        <i class="fas fa-database"></i>
    </button>

<?php
}
?>