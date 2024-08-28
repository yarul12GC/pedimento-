<?php
$querypagoe = "SELECT * FROM pagoelectronico WHERE idpedimentoc = ?";
$stmtpagoe = $conexion->prepare($querypagoe);
$stmtpagoe->bind_param("i", $idPedimento);
$stmtpagoe->execute();
$resultpagoe = $stmtpagoe->get_result();

if ($resultpagoe->num_rows > 0) {
    $rowpe = $resultpagoe->fetch_assoc();

    // Verifica si existe la imagen del código de barras
    if (!empty($rowpe['barcode_image'])) {
        // Ruta de la imagen del código de barras
        $barcode_image_path = '../bloque13/barcodes/' . htmlspecialchars($rowpe['barcode_image']);

        // Agrega la información adicional del pedimento y la imagen del código de barras
        $html .= '
        <style>
            .barcode-container {
                text-align: center;
            }
            .barcode-image {
               width: 310px;
                height: 45px;
            }
        </style>
        <table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse; width: 100%;">
            <tr>
                <td colspan="7" style="border-collapse: collapse; width: 100%; text-align: center;">
                    <img src="' . $barcode_image_path . '" class="barcode-image">
                </td>
            </tr>
            <tr>
                <th colspan="7" style="padding-bottom: 10px; font-weight: bold; text-align: center;">***DEPÓSITO ELECTRÓNICO***</th>
            </tr>
            <tr>
                <th style="font-weight: bold; width: 12%;">PATENTE:</th>
                <td>' . htmlspecialchars($rowpe['patente']) . '</td>
                <th style="font-weight: bold;">PEDIMENTO:</th>
                <td>' . htmlspecialchars($rowpe['pedimento']) . '</td>
                <th style="font-weight: bold;">ADUANA:</th>
                <td>' . htmlspecialchars($rowpe['aduana']) . '</td>
            </tr>
            <tr>
                <th colspan="3" style="font-weight: bold;">NOMBRE DE LA INSTITUCIÓN BANCARIA:</th>
                <td colspan="4">' . htmlspecialchars($rowpe['banco']) . '</td>
            </tr>
            <tr>
                <th colspan="2" style="font-weight: bold;">LÍNEA DE CAPTURA:</th>
                <td colspan="5">' . htmlspecialchars($rowpe['lineaC']) . '</td>
            </tr>
            <tr>
                <th colspan="2" style="font-weight: bold;">IMPORTE PAGADO:</th>
                <td>$' . htmlspecialchars($rowpe['importePago']) . '</td>
                <th style="font-weight: bold;">FECHA DE PAGO:</th>
                <td colspan="2">' . htmlspecialchars($rowpe['fechapago']) . '</td>
            </tr>
            <tr>
                <th colspan="3" style="font-weight: bold;">NÚMERO DE OPERACIÓN BANCARIA:</th>
                <td colspan="4">' . htmlspecialchars($rowpe['noperacionbancar']) . '</td>
            </tr>
            <tr>
                <th colspan="3" style="font-weight: bold;">NÚMERO DE TRANSACCIÓN SAT:</th>
                <td colspan="4">' . htmlspecialchars($rowpe['ntransaccionS']) . '</td>
            </tr>
            <tr>
                <th colspan="3" style="font-weight: bold;">MEDIO DE PRESENTACIÓN:</th>
                <td colspan="4">' . htmlspecialchars($rowpe['mPresentacion']) . '</td>
            </tr>
            <tr>
                <th colspan="3" style="font-weight: bold;">MEDIO DE RECEPCIÓN/COBRO:</th>
                <td colspan="4">' . htmlspecialchars($rowpe['MedioRecepcion']) . '</td>
            </tr>
        </table>';
    } else {
        $pdf->SetY(30);  // Ajusta la posición vertical para el texto de error
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(0, 10, 'No se encontró el código de barras.', 0, 1, 'C', 0, '', 0, false, 'T', 'M');
    }
} else {
    $pdf->SetY(30);  // Ajusta la posición vertical para el texto de error
    $pdf->SetFont('helvetica', '', 10);
    $pdf->Cell(0, 10, 'No se encontraron registros en el cuadro de liquidación.', 0, 1, 'C', 0, '', 0, false, 'T', 'M');
}
