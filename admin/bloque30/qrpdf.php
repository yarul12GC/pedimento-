<?php
$querypagoeqr = "SELECT * FROM pagoelectronicoqr WHERE idpedimentoc = ?";
$stmtpagoeqr = $conexion->prepare($querypagoeqr);
$stmtpagoeqr->bind_param("i", $idPedimento);
$stmtpagoeqr->execute();
$resultpagoeqr = $stmtpagoeqr->get_result();

if ($resultpagoeqr->num_rows > 0) {  // Corregido $resultpagoeqr
    $rowpegr = $resultpagoeqr->fetch_assoc();

    // Verifica si existe la imagen del código de barras
    if (!empty($rowpegr['barcode_image'])) {
        // Ruta de la imagen del código de barras
        $barcode_qr = '../bloque30/' . htmlspecialchars($rowpegr['barcode_image']);

        // Agrega la información adicional del pedimento y la imagen del código de barras
        $html .= '
<style>
    .barcode-containerQR {
         justify-content: center;
        align-items: center;
        text-align: center;
    }
    .barcode-imageqr {
        width: 130px;
        height: 130px;
       
    }
</style>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    <tr>
        <td>
            <div class="barcode-containerQR">
                <img src="' . $barcode_qr . '" class="barcode-imageqr">
            </div>
        </td>
    </tr>
</table>';
    } else {
        // Mostrar mensaje si no hay imagen de código QR
        $pdf->SetY(30);  // Ajusta la posición vertical para el texto de error
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(0, 10, 'No se encontró el código de barras.', 0, 1, 'C', 0, '', 0, false, 'T', 'M');
    }
} else {
    // Mostrar mensaje si no se encuentra el registro del pedimento
    $pdf->SetY(30);  // Ajusta la posición vertical para el texto de error
    $pdf->SetFont('helvetica', '', 10);
    $pdf->Cell(0, 10, 'No se encontraron registros en el cuadro de liquidación.', 0, 1, 'C', 0, '', 0, false, 'T', 'M');
}
