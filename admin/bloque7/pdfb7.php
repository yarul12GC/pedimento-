<?php


$html .= '
    </tbody>
</table>';

$queryvaloresd =  "SELECT * FROM valordecrementable WHERE idpedimentoc = ?";
$stmtvaloresd = $conexion->prepare($queryvaloresd);
$stmtvaloresd->bind_param("i", $idPedimento);
$stmtvaloresd->execute();
$resultvaloresd = $stmtvaloresd->get_result();

if ($resultvaloresd->num_rows > 0) {
    $datosdcre = $resultvaloresd->fetch_assoc();

    // Crear el contenido HTML de la tabla
    $html .= '
    <table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse; font-size: 6px;">
       
        <tbody>
            <tr>
                <th align="center" style="font-weight:bold;">TRANSPORTE D</th>
                <th align="center" style="font-weight:bold;">SEGURO DECREMENTABLE</th>
                <th align="center" style="font-weight:bold;">CARGA</th>
                <th align="center" style="font-weight:bold;">DESCARGA</th>
                <th align="center" style="font-weight:bold;">OTROS DECREMENTABLES</th>
            </tr>
            <tr>
                <td align="center" >' . htmlspecialchars($datosdcre['VsegurosD']) . '</td>
                <td align="center" >' . htmlspecialchars($datosdcre['segurosD']) . '</td>
                <td align="center" >' . htmlspecialchars($datosdcre['fletesD']) . '</td>
                <td align="center" >' . htmlspecialchars($datosdcre['embalajesD']) . '</td>
                <td align="center" >' . htmlspecialchars($datosdcre['otrosDecrement']) . '</td>
            </tr>
        </tbody>
    </table>';
} else {
    // Si no se encontraron registros, mostrar un mensaje
    $html = '<p align="center">No se encontraron registros en el cuadro de valores decrementables.</p>';
}
