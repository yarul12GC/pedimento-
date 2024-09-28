<?php
$queryprovocom = "SELECT * FROM provedorocomprador WHERE idpedimentoc = ?";

$stmtprovocom = $conexion->prepare($queryprovocom);
$stmtprovocom->bind_param("i", $idPedimento);
$stmtprovocom->execute();
$resultprovocom = $stmtprovocom->get_result();

if ($resultprovocom->num_rows > 0) {
    $rowpro = $resultprovocom->fetch_assoc();

    // Construir la tabla en HTML
    $html .= '
    <table border="0" cellpadding="3" cellspacing="0" style="border: 1px solid black; border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">
        <thead>
            <tr style="background-color: #6c757d; color: #ffffff;">
                <th colspan="4" style="text-align: center; border: none;">DATOS DEL PROVEEDOR O COMPRADOR</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th style="font-weight: bold; width: 10%; border: none;"> ID.FISCAL</th>
                <th style="font-weight: bold; width: 25%; border: none;">NOMBRE, DENOMINACIÓN O RAZÓN SOCIAL</th>
                <th style="font-weight: bold; width: 55%; border: none;">DOMICILIO</th>
                <th style="font-weight: bold; width: 10%; text-align: center; border: none;">VINCULACIÓN</th>
            </tr>
            <tr>
                <td style="border: none;">' . htmlspecialchars($rowpro['idfiscal']) . '</td>
                <td style="border: none;">' . htmlspecialchars($rowpro['nombreDORS']) . '</td>
                <td style="border: none;">' . htmlspecialchars('CALLE: ' . $rowpro['calle'] . ' NO. E ' . $rowpro['noexterior']);

    // Verificar si el nointerior es diferente de 0, sn, SN, o S/N
    $nointerior = $rowpro['nointerior'];
    if ($nointerior !== '0' && strtolower($nointerior) !== 'sn' && strtolower($nointerior) !== 's/n') {
        // Concatenar si hay número interior válido
        $html .= htmlspecialchars(' NO. I ' . $rowpro['nointerior']);
    }

    // Continuar con el resto del domicilio
    $html .= htmlspecialchars(' C.P. ' . $rowpro['codigo_postal'] . ' CIUDAD: ' . $rowpro['localidad'] . ' ESTADO: ' . $rowpro['entidadF'] . ' PAÍS: ' . $rowpro['pais']) . '</td>';

    // Añadir la vinculación
    $html .= '<td style="text-align: center; border: none;">' . htmlspecialchars($rowpro['vinculacion']) . '</td>
            </tr>
        </tbody>
    </table>';
} else {
    // Si no hay registros, mostrar mensaje
    $html .= "<tr><td colspan='4' class='text-center'>No se encontraron registros en los datos del comprador.</td></tr>";
}
