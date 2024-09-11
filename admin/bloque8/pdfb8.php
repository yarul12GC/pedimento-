<?php
// Consulta para obtener permisos
$querypermisos =  "
    SELECT permisos.*, apendice1.idapendice1, apendice1.clave AS claveapn1, apendice1.seccion
    FROM permisos
    INNER JOIN apendice1 ON permisos.idapendice1 = apendice1.idapendice1
    WHERE idpedimentoc = ?";

$stmtpermisos = $conexion->prepare($querypermisos);
$stmtpermisos->bind_param("i", $idPedimento);
$stmtpermisos->execute();
$resultpermisos = $stmtpermisos->get_result();

if ($resultpermisos->num_rows > 0) {
    $datosperm = $resultpermisos->fetch_assoc();
    $html .= '
    <table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0; border-top: 1px solid black; border-bottom: 1px solid black;">
        <tbody>
            <tr>
                <th align="center" style="font-weight:bold;">CÓDIGO DE ACEPTACIÓN</th>
                <th align="center" style="font-weight:bold;">CÓDIGO DE BARRAS</th>
                <th align="center" style="font-weight:bold;">CLAVE DE LA SECCIÓN ADUANERA</th>
            </tr>
            <tr>
                <td align="center">' . htmlspecialchars($datosperm['aviso_electronico']) . '</td>';
} else {
    $html .= '<tr><td colspan="3" class="text-center">No se encontraron registros en el cuadro de valores decrementables.</td></tr>';
}



// Consulta para obtener pago electrónico
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
        $barcode_image_path1 = '../bloque13/barcodes/' . htmlspecialchars($rowpe['barcode_image']);

        $html .= '
            <td align="center">
                <img src="' . $barcode_image_path1 . '" style="width: 150px; height: 40px;">
            </td>';
    } else {
        $html .= '<td align="center">No se encontró el código de barras.</td>';
    }
} else {
    $html .= '<td align="center">No se encontraron registros en el cuadro de liquidación.</td>';
}

// Continuar con la consulta de permisos para obtener la clave de apéndice 1
if (isset($datosperm)) {
    $html .= '
                <td align="center">' . htmlspecialchars($datosperm['claveapn1'].$datosperm['seccion']) . '</td>
            </tr>
        </tbody>
    </table>';

    // Añadir otra tabla para mostrar más detalles
    $html .= '
    <table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; border-top: 1px solid black; border-bottom: 1px solid black;">
        <tr>
            <th style="font-weight:bold;">MARCAS, NÚMERO Y TOTAL DE BULTOS:</th>
            <td>' . htmlspecialchars($datosperm['marca'] . ' ' . $datosperm['modelo']) . '</td>
            <td align="right">' . htmlspecialchars($datosperm['nBultos']) . '</td>
        </tr>
    </table>';
} else {
    $html .= "<tr><td colspan='3' class='text-center'>No se encontraron registros adicionales.</td></tr>";
}
