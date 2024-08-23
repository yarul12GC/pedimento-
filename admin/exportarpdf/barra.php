<?php
require_once 'vendor/autoload.php';
include_once '../../conexion.php';
include_once '../sesion.php';

$idPedimento = isset($_GET['id']) ? intval($_GET['id']) : 0;

$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Configuración del documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tu Nombre');
$pdf->SetTitle('Archivo Pedimento');
$pdf->SetSubject('Detalles del Pedimento');
$pdf->SetKeywords('TCPDF, PDF, pedimento, export');

// Establecer márgenes
$pdf->SetMargins(5, 5, 5);
$pdf->SetHeaderMargin(5);
$pdf->SetFooterMargin(5);

// Configuración de preferencias de visualización
$pdf->setViewerPreferences(array(
    'Zoom' => '100'  // Establece el nivel de zoom a 100%
));

$pdf->AddPage();  // Agrega una página al documento

$html = '';

// Consulta para obtener los datos
$querypagoe = "SELECT * FROM pagoelectronico WHERE idpedimentoc = ?";
$stmtpagoe = $conexion->prepare($querypagoe);
$stmtpagoe->bind_param("i", $idPedimento);
$stmtpagoe->execute();
$resultpagoe = $stmtpagoe->get_result();

if ($resultpagoe->num_rows > 0) {
    $rowpe = $resultpagoe->fetch_assoc();

    // Inicia la construcción del HTML
    $html .= '
    <table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 8px; margin: 0; padding: 0;">
        <tr>
            <th colspan="7" style="text-align: center; font-weight: bold; padding-bottom: 10px;">';

    // Verifica si existe la imagen del código de barras y la agrega
    if (!empty($rowpe['barcode_image'])) {
        // Guarda la imagen en un archivo temporal
        $barcode_image_path = 'temp_barcode.png';
        file_put_contents($barcode_image_path, $rowpe['barcode_image']);
        
        // Agrega la imagen con borde rojo
        $pdf->Image($barcode_image_path, '', '', 100, 80, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
        
        // Elimina el archivo temporal
        unlink($barcode_image_path);
    } else {
        $html .= '<span style="color: red;">No se encontró el código de barras.</span>';
    }

    // Continuación de la tabla HTML
    $html .= '
            </th>
        </tr>
        <tr>
            <th colspan="7" style="text-align: center; font-weight: bold; padding-bottom: 5px;">***DEPÓSITO ELECTRÓNICO***</th>
        </tr>
        <tr>
            <th style="font-weight: bold; width: 12%;">PATENTE:</th>
            <td style="text-align: center;">' . htmlspecialchars($rowpe['patente']) . '</td>
            <th style="font-weight: bold;">PEDIMENTO:</th>
            <td>' . htmlspecialchars($rowpe['pedimento']) . '</td>
            <th style="font-weight: bold;">ADUANA:</th>
            <td>' . htmlspecialchars($rowpe['aduana']) . '</td>
        </tr>
        <tr>
            <th colspan="3" style="font-weight: bold;">NOMBRE DE LA INSTITUCIÓN BANCARIA:</th>
            <td colspan="4" class="text-center">' . htmlspecialchars($rowpe['banco']) . '</td>
        </tr>
        <tr>
            <th colspan="2" style="font-weight: bold; width: 20%;">LÍNEA DE CAPTURA:</th>
            <td colspan="5" class="text-center">' . htmlspecialchars($rowpe['lineaC']) . '</td>
        </tr>
        <tr>
            <th colspan="2" style="font-weight: bold;">IMPORTE PAGADO:</th>
            <td>$' . htmlspecialchars($rowpe['importePago']) . '</td>
            <th style="font-weight: bold;">FECHA DE PAGO:</th>
            <td colspan="2">' . htmlspecialchars($rowpe['fechapago']) . '</td>
        </tr>
        <tr>
            <th class="text-center" colspan="3" style="font-weight: bold;">NÚMERO DE OPERACIÓN BANCARIA:</th>
            <td class="text-center" colspan="4">' . htmlspecialchars($rowpe['noperacionbancar']) . '</td>
        </tr>
        <tr>
            <th class="text-center" colspan="3" style="font-weight: bold;">NÚMERO DE TRANSACCIÓN SAT:</th>
            <td class="text-center" colspan="4">' . htmlspecialchars($rowpe['ntransaccionS']) . '</td>
        </tr>
        <tr>
            <th class="text-center" colspan="3" style="font-weight: bold;">MEDIO DE PRESENTACIÓN:</th>
            <td class="text-center" colspan="4">' . htmlspecialchars($rowpe['mPresentacion']) . '</td>
        </tr>
        <tr>
            <th class="text-center" colspan="3" style="font-weight: bold;">MEDIO DE RECEPCIÓN/COBRO:</th>
            <td class="text-center" colspan="4">' . htmlspecialchars($rowpe['MedioRecepcion']) . '</td>
        </tr>
    </table>';
} else {
    $html .= "<table border='0' cellpadding='2' cellspacing='0' style='border-collapse: collapse; width: 100%; font-size: 8px;'><tr><td colspan='7' class='text-center' style='color: red;'>No se encontraron registros en el cuadro de liquidación.</td></tr></table>";
}

// Añadir contenido HTML al PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Salida del PDF
$pdf->Output('archivo_pedimento.pdf', 'I');
?>
