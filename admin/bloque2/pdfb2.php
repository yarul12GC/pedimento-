<?php
$querytransac =  "SELECT ts.*, a15.clave AS clavea15, a1.clave AS clavea1, a1.seccion
                 FROM transacciones ts
                 INNER JOIN apendice15 a15 ON ts.idapendice15 = a15.idapendice15
                 INNER JOIN apendice1 a1 ON ts.idapendice1 = a1.idapendice1
                 WHERE idpedimentoc = ?";
$stmttransac = $conexion->prepare($querytransac);
$stmttransac->bind_param("i", $idPedimento);
$stmttransac->execute();
$resulttransac = $stmttransac->get_result();

if ($resulttransac->num_rows > 0) {
    $datotransac = $resulttransac->fetch_assoc();
    $html .= '
<table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; border-top: 1px solid black; border-bottom: 1px solid black;">
        <tr>
            <th style="font-weight: bold; width: 15%;">DESTINO/ORIGEN</th>
            <td style="width: 10%; text-align: left;">' . htmlspecialchars($datotransac['clavea15']) . '</td>
            <th style="font-weight: bold; width: 15%;">TIPO DE CAMBIO</th>
            <td style="width: 10%; text-align: left;">' . htmlspecialchars($datotransac['tipoCambio']) . '</td>
            <th style="font-weight: bold; width: 15%;">PESO BRUTO</th>
            <td style="width: 10%; text-align: left;">' . htmlspecialchars($datotransac['peso_bruto']) . '</td>
            <th style="font-weight: bold; width: 15%;">ADUANA</th>
            <td style="width: 10%; text-align: left;">' . htmlspecialchars($datotransac['clavea1'] . $datotransac['seccion']) . '</td>
        </tr>
    </table>';
} else {
    $html .= '<p>No se encontraron registros en el cuadro de transacciones.</p>';
}
