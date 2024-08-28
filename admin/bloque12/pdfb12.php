<?php
$querytotales = "SELECT * FROM total WHERE idpedimentoc = ?";

$stmttotales = $conexion->prepare($querytotales);
$stmttotales->bind_param("i", $idPedimento);
$stmttotales->execute();
$resulttotales = $stmttotales->get_result();

if ($resulttotales->num_rows > 0) {
    $rowt = $resulttotales->fetch_assoc();

    $html .= '
    <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 3px; padding: 0;">
        <tbody>
            <tr>
                <th  colspan="2" style="text-align: center; border: 1px solid black; font-weight: bold;">TOTALES</th>
            </tr>
            <tr>
                <th style="border: 1px solid black; font-weight: bold; "> EFECTIVO</th>
                <td style="border: 1px solid black;"> $' . htmlspecialchars($rowt['efectivo']) . '</td>
            </tr>
            <tr>
                <th style="border: 1px solid black; font-weight: bold; "> OTROS</th>
                <td style="border: 1px solid black;"> $' . htmlspecialchars($rowt['otros']) . '</td>
            </tr>
            <tr>
                <th style="border: 1px solid black; font-weight: bold; "> TOTAL</th>
                <td style="border: 1px solid black;"> $' . htmlspecialchars($rowt['total']) . '</td>
            </tr>
        </tbody>
    </table>';
} else {
    echo "<tr><td colspan='3' class='text-center'>No se encontraron registros en el cuadro de liquidación.</td></tr>";
}