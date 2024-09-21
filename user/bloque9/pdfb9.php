<?php
// Consulta para obtener las fechas
$queryfechas = "SELECT * FROM fechas WHERE idpedimentoc = ?";
$stmtfechas = $conexion->prepare($queryfechas);
$stmtfechas->bind_param("i", $idPedimento);
$stmtfechas->execute();
$resultfechas = $stmtfechas->get_result();

if ($resultfechas->num_rows > 0) {
    $rowfech = $resultfechas->fetch_assoc();

    // Convertir las fechas al formato día-mes-año
    $fechaEntrada = date("d-m-Y", strtotime($rowfech['entrada']));
    $fechaPago = date("d-m-Y", strtotime($rowfech['pago']));

    $html .= '
        <td style="width: 40%; vertical-align: top; margin: 0; padding: 0;">
            <table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">
                <tbody>
                    <tr style="text-align: center; margin: 0; padding: 0;">
                        <th colspan="2" style="font-weight: bold; margin: 0; padding: 0;">FECHAS</th>
                    </tr>
                    <tr style="margin: 0; padding: 0;">
                        <th style="font-weight: bold; text-align: left; margin: 0; padding: 0;">ENTRADAS</th>
                        <td style="margin: 0; padding: 0;">' . htmlspecialchars($fechaEntrada) . '</td>
                    </tr>
                    <tr style="margin: 0; padding: 0;">
                        <th style="font-weight: bold; text-align: left; margin: 0; padding: 0;">PAGO</th>
                        <td style="margin: 0; padding: 0;">' . htmlspecialchars($fechaPago) . '</td>
                    </tr>
                </tbody>
            </table>
        </td>';
} else {
    $html .= "<td colspan='3' style='text-align: center; margin: 0; padding: 0;'>No se encontraron registros en el cuadro de fechas.</td>";
}
