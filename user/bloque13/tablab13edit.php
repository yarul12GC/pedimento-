<?php
$querypagoe = "SELECT * FROM pagoelectronico WHERE idpedimentoc = ?";

$stmtpagoe = $conexion->prepare($querypagoe);
$stmtpagoe->bind_param("i", $pedimento_id);
$stmtpagoe->execute();
$resultpagoe = $stmtpagoe->get_result();

if ($resultpagoe->num_rows > 0) {
    $rowpe = $resultpagoe->fetch_assoc();
?>
    <table class="table table-bordered table-hover">
        <thead class="text-center">
            <tr>
                <th colspan="6" class="text-center table-dark">DEPOSITO REFERENCIADO - LINEA DE CAPTURA</th>
            </tr>
        </thead>
        <tbody></tbody>
        <tr>
            <th colspan="6" class="text-center">***DEPOSITO ELECTRONICO***</th>
        </tr>
        <tr>
            <th>PATENTE</th>
            <td><?php echo htmlspecialchars($rowpe['patente']); ?></td>
            <th>PEDIMENTO</th>
            <td><?php echo htmlspecialchars($rowpe['pedimento']); ?></td>
            <th>ADUANA</th>
            <td><?php echo htmlspecialchars($rowpe['aduana']); ?></td>
        </tr>
        <tr>
            <th scope="row" colspan="2" class="text-center">BANCO</th>
            <td colspan="4" class="text-center"><?php echo htmlspecialchars($rowpe['banco']); ?></td>
        </tr>
        <tr>
            <th colspan="2" scope="row" class="text-center">LINEA DE CAPTURA</th>
            <td colspan="4" class="text-center"><?php echo htmlspecialchars($rowpe['lineaC']); ?></td>
        </tr>
        <tr>
            <th>IMPORTE PAGADO</th>
            <td>$<?php echo htmlspecialchars($rowpe['importePago']); ?></td>
            <th>FECHA PAGADA</th>
            <td colspan="3">
                <?php
                // Asumimos que $rowpe['fechapago'] es una fecha en formato válido (por ejemplo, YYYY-MM-DD)
                $fecha_pago_formateada = date("d-m-Y", strtotime($rowpe['fechapago']));
                echo htmlspecialchars($fecha_pago_formateada);
                ?>
            </td>
        </tr>
        <tr>
            <th class="text-center" colspan="2" scope="row">NUMERO DE OPERACIÓN BANCARIA</th>
            <td class="text-center" colspan="4"><?php echo htmlspecialchars($rowpe['noperacionbancar']); ?></td>
        </tr>
        <tr>
            <th class="text-center" colspan="2" scope="row">NUMERO DE TRANSACCION SAT</th>
            <td class="text-center" colspan="4"><?php echo htmlspecialchars($rowpe['ntransaccionS']); ?></td>
        </tr>
        <tr>
            <th class="text-center" colspan="2" scope="row">MEDIO DE PRESENTACION</th>
            <td class="text-center" colspan="4"><?php echo htmlspecialchars($rowpe['mPresentacion']); ?></td>
        </tr>
        <tr>
            <th class="text-center" colspan="2" scope="row">MEDIO DE RECEPCION/COBRO</th>
            <td class="text-center" colspan="4"><?php echo htmlspecialchars($rowpe['MedioRecepcion']); ?></td>
        </tr>
        <tr>
            <th colspan="6" class="text-center">
                <?php if (!empty($rowpe['barcode_image'])) : ?>
                    <img src="../admin/bloque13/barcodes/<?php echo htmlspecialchars($rowpe['barcode_image']); ?>" alt="Código de Barras" width="400" height="80">
                <?php else : ?>
                    No se encontró el código de barras.
                <?php endif; ?>
            </th>
        </tr>
        </tbody>
    </table>
    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarBloque13_<?php echo $pedimento_id; ?>">
        Editar Bloque 13
    </button>
    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#qrpago_<?php echo $pedimento_id; ?>">
        Generar QR
    </button>
<?php
} else {
?>
    <table class="table table-bordered table-hover">
        <thead class="text-center table-dark">
            <tr>
                <th colspan="14" class="text-center table-dark">DEPOSITO REFERENCIADO - LINEA DE CAPTURA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th colspan="14" class="text-center">***DEPOSITO ELECTRONICO***</th>

            </tr>

            <tr>
                <th>PATENTE</th>
                <td></td>
                <th>PEDIMENTO</th>
                <td></td>
                <th>ADUANA</th>
                <td></td>
            </tr>
            <tr>
                <th scope="row">BANCO</th>
                <td colspan="13"></td>
            </tr>
            <tr>
                <th scope="row">LINEA DE CAPTURA</th>
                <td colspan="13"></td>
            </tr>
            <tr>
                <th>IMPORTE PAGADO</th>
                <td></td>
                <th>FECHA PAGADA</th>
                <td colspan="3"></td>
            </tr>
            <tr>
                <th scope="row">NUMERO DE OPERACIÓN BANCARIA</th>
                <td colspan="13"></td>
            </tr>
            <tr>
                <th scope="row">NUMERO DE TRANSACCION SAT</th>
                <td colspan="13"></td>
            </tr>
            <tr>
                <th scope="row">MEDIO DE PRESENTACION</th>
                <td colspan="13"></td>
            </tr>
            <tr>
                <th scope="row">MEDIO DE RECEPCION/COBRO</th>
                <td colspan="13"></td>
            </tr>

            <tr>
                <th colspan="14" class="text-center"> </th>

            </tr>


        </tbody>
    </table>

    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque131">
        <i class="fas fa-database"></i>
    </button>
<?php
}
include 'bloque30/modalqr.php';
?>