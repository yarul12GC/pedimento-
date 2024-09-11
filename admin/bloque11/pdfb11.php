<?php
$queryLiquidacion = "
SELECT cl.*, 
    a12_cl.idapendice12 AS id_apendice12_cl, 
    a12_cl.clave AS clavetpa12_cl,
    a13_cl.idapendice13 AS id_apendice13_cl, 
    a13_cl.clave AS clavetpa13_cl
FROM cuadrodeliquidacion cl
INNER JOIN apendice12 a12_cl ON cl.idapendice12 = a12_cl.idapendice12
INNER JOIN apendice13 a13_cl ON cl.idapendice13 = a13_cl.idapendice13
WHERE cl.idpedimentoc = ?
";

$stmtLiquidacion = $conexion->prepare($queryLiquidacion);
$stmtLiquidacion->bind_param("i", $idPedimento);
$stmtLiquidacion->execute();
$resultLiquidacion = $stmtLiquidacion->get_result();

$cuadroLiquidacion = [];
if ($resultLiquidacion->num_rows > 0) {
    while ($row = $resultLiquidacion->fetch_assoc()) {
        $cuadroLiquidacion[] = $row;
    }
}

if (!empty($cuadroLiquidacion)) {
    $numRegistros = count($cuadroLiquidacion);
    $mitad = ceil($numRegistros / 2); // Calcula la mitad para dividir los registros

    for ($i = 0; $i < $mitad; $i++) {
        $html .= "<tr>";

        // Primera columna de la tabla
        if (isset($cuadroLiquidacion[$i])) {
            $html .= '
            <td style="text-align: center;">' . htmlspecialchars($cuadroLiquidacion[$i]['clavetpa12_cl']) . '</td>
            <td style="border-left: 1px solid black; text-align: center;">' . htmlspecialchars($cuadroLiquidacion[$i]['clavetpa13_cl']) . '</td>
            <td style="border-left: 1px solid black; text-align: center;">' . htmlspecialchars($cuadroLiquidacion[$i]['importe']) . '</td>';
        } else {
            $html .= "<td colspan='3' style='border-left: 1px solid black;'></td>"; // Relleno vacío si no hay más registros
        }

        // Segunda columna de la tabla
        if (isset($cuadroLiquidacion[$i + $mitad])) {
            $html .= '
            <td style="border-left: 1px solid black; text-align: center;">' . htmlspecialchars($cuadroLiquidacion[$i + $mitad]['clavetpa12_cl']) . '</td>
            <td style="border-left: 1px solid black; text-align: center;">' . htmlspecialchars($cuadroLiquidacion[$i + $mitad]['clavetpa13_cl']) . '</td>
            <td style="border-left: 1px solid black; text-align: center;">' . htmlspecialchars($cuadroLiquidacion[$i + $mitad]['importe']) . '</td>';
        } else {
            $html .= '<td colspan="3" style="border-left: 1px solid black;"></td>'; // Relleno vacío si no hay más registros
        }

        $html .= '</tr>';
    }
} else {
    $html .= "<tr><td colspan='6' class='text-center' style='border-left: 1px solid black;'>No se encontraron registros en el cuadro de liquidación.</td></tr>";
}
