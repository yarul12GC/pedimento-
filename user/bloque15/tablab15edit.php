<?php
$querydmonetarios = "SELECT 
    dmonetarios.*, 
    a14.clave AS claveapn14, 
    a5.clave AS claveapn5
FROM 
    dmonetarios 
INNER JOIN 
    apendice14 a14 ON dmonetarios.idapendice14 = a14.idapendice14
INNER JOIN 
    apendice5 a5 ON dmonetarios.idapendice5 = a5.idapendice5
WHERE 
    dmonetarios.idpedimentoc = ?";

$stmtdmonetarios = $conexion->prepare($querydmonetarios);
$stmtdmonetarios->bind_param("i", $pedimento_id);
$stmtdmonetarios->execute();
$resultdmonetarios = $stmtdmonetarios->get_result();

if ($resultdmonetarios->num_rows > 0) {
    $rowdm = $resultdmonetarios->fetch_assoc();
?>
    <table class="table table-bordered table-hover">
        <tbody>

            <tr>
                <th>NUM.FACTURA</th>
                <th>FECHA</th>
                <th>INCOTERM</th>
                <th>MONEDA</th>
                <th>VAL.MON.FACT</th>
                <th>FACTOR MON. FACT</th>
                <th>VAL. DOLARES</th>

            </tr>
            <tr>
                <td><?php echo htmlspecialchars($rowdm['numfactura']); ?></td>
                <td colspan="3">
                    <?php
                    // Asumimos que $rowpe['fechapago'] es una fecha en formato válido (por ejemplo, YYYY-MM-DD)
                    $fecha_pago_formateada = date("d-m-Y", strtotime($rowdm['fecha']));
                    echo htmlspecialchars($fecha_pago_formateada);
                    ?>
                </td>

                <td><?php echo htmlspecialchars($rowdm['claveapn14']); ?></td>
                <td><?php echo htmlspecialchars($rowdm['claveapn5']); ?></td>
                <td><?php echo htmlspecialchars($rowdm['valmonfact']); ?></td>
                <td><?php echo htmlspecialchars($rowdm['factormonfact']); ?></td>
                <td><?php echo htmlspecialchars($rowdm['valdolares']); ?></td>
            </tr>
        </tbody>
    </table>
    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarBloque15_<?php echo $pedimento_id; ?>">
        Editar Bloque 15
    </button>
<?php
} else {
?>

    <table class="table table-bordered table-hover">

        <tbody>
            <tr>
                <th>NUM.FACTURA</th>
                <th>FECHA</th>
                <th>INCOTERM</th>
                <th>MONEDA</th>
                <th>FACT</th>
                <th>VAL.MON.FACT</th>
                <th>FACTOR MON. FACT</th>
                <th>VAL. DOLARES</th>

            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>

    </table>
    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque15">
        <i class="fas fa-database"></i>
    </button>

<?php
}
?>