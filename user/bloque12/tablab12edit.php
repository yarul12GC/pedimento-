<?php
$querytotales = "SELECT * FROM total WHERE idpedimentoc = ?";

$stmttotales = $conexion->prepare($querytotales);
$stmttotales->bind_param("i", $pedimento_id);
$stmttotales->execute();
$resulttotales = $stmttotales->get_result();

if ($resulttotales->num_rows > 0) {
    $rowt = $resulttotales->fetch_assoc();
?>
    <table class="table table-bordered table-hover">
        <thead class="text-center">
            <tr>
                <th colspan="8" class="text-center table-dark">TOTALES</th>
            </tr>
        </thead>
        <tbody></tbody>
        <tr>
            <th>EFECTIVO</th>
            <td><?php echo htmlspecialchars($rowt['efectivo']); ?></td>
        </tr>
        <tr>
            <th>OTROS</th>
            <td><?php echo htmlspecialchars($rowt['otros']); ?></td>
        </tr>
        <tr>
            <th>TOTAL</th>
            <td><?php echo htmlspecialchars($rowt['total']); ?></td>
        </tr>
        </tbody>
    </table>

<?php
} else {
?>
    <table class="table table-bordered table-hover">
        <thead class="text-center table-dark">
            <tr>
                <th colspan="8" class="text-center">TOTALES</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>EFECTIVO</th>
                <td></td>
            </tr>
            <tr>
                <th>OTROS</th>
                <td></td>
            </tr>
            <tr>
                <th>TOTAL</th>
                <td></td>
            </tr>
        </tbody>
    </table>
<?php
}
?>