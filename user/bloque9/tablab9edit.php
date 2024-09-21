<?php
$queryfechas = "SELECT * FROM fechas WHERE idpedimentoc = ?";

$stmtfechas = $conexion->prepare($queryfechas);
$stmtfechas->bind_param("i", $pedimento_id);
$stmtfechas->execute();
$resultfechas = $stmtfechas->get_result();

if ($resultfechas->num_rows > 0) {
    $rowfech = $resultfechas->fetch_assoc();
?>
    <table class="table table-bordered table-hover">
        <thead class="text-center">
            <tr>
                <th colspan="8" class="text-center table-dark">FECHAS</th>
            </tr>
        </thead>
        <tbody></tbody>
        <tr>
            <th>ENTRADAS</th>
            <td>
                <?php
                // Asumimos que $rowfech['entrada'] es una fecha válida (YYYY-MM-DD)
                $fecha_entrada = date("d-m-Y", strtotime($rowfech['entrada']));
                echo htmlspecialchars($fecha_entrada);
                ?>
            </td>
        </tr>
        <tr>
            <th>PAGO</th>
            <td>
                <?php
                // Asumimos que $rowfech['pago'] es una fecha válida (YYYY-MM-DD)
                $fecha_pago = date("d-m-Y", strtotime($rowfech['pago']));
                echo htmlspecialchars($fecha_pago);
                ?>
            </td>
        </tr>

        </tbody>
    </table>
    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarBloque9_<?php echo $pedimento_id; ?>">
        Editar Bloque 9
    </button>
<?php
} else {
?>
    <table class="table table-bordered table-hover">
        <thead class="text-center table-dark">
            <tr>
                <th colspan="8" class="text-center">FECHAS</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <th>ENTRADAS</th>
                <td></td>
            </tr>
            <tr>
                <th>PAGO</th>
                <td></td>

            </tr>
        </tbody>
    </table>
    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque9">
        <i class="fas fa-database"></i>
    </button>

<?php
}
?>