<?php
$queryvaloresp = "SELECT * FROM valoresp WHERE idpedimentoc = ?";
$stmtvaloresp = $conexion->prepare($queryvaloresp);
$stmtvaloresp->bind_param("i", $idPedimento);
$stmtvaloresp->execute();
$resultvaloresp = $stmtvaloresp->get_result();

if ($resultvaloresp->num_rows > 0) {
    $datosvp = $resultvaloresp->fetch_assoc();
    $html .= '
                    <tr>
                        <th style="font-weight:bold; width: 75%; text-align: right;">VALOR EN DOLARES</th>
                        <td style="width: 25%; text-align: right;">$' . htmlspecialchars($datosvp['valorDolares']) . '</td>
                    </tr>
                    <tr>
                        <th style="font-weight:bold; text-align: right;">VALOR ADUANA</th>
                        <td style="text-align: right;">$' . htmlspecialchars($datosvp['valorAduna']) . '</td>
                    </tr>
                    <tr>
                        <th style="font-weight:bold; text-align: right;">PRECIO PAGADO / VALOR COMERCIAL</th>
                        <td style="text-align: right;">$' . htmlspecialchars($datosvp['precioPagado']) . '</td>
                    </tr>';
} else {
    $html .= '<tr><td colspan="2" style="text-align:center;">No se encontraron registros en el cuadro de valores.</td></tr>';
}
