<?php

$html .= '
<table border="0" cellpadding="1" cellspacing="0" style="border: 1px solid black; border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">
    <thead>
        <tr>
            <th style="width: 20%; border-left: 1px solid black; text-align: center; font-weight: bold;">CLAVE/COMPL. IDENTIFICADOR</th>
            <th style="width: 5%; border-left: 1px solid black; text-align: center; font-weight: bold;"></th>
            <th style="width: 25%; border-left: 1px solid black; text-align: center; font-weight: bold;">COMPLEMENTO 1</th>
            <th style="width: 25%; border-left: 1px solid black; text-align: center; font-weight: bold;">COMPLEMENTO 2</th>
            <th style="width: 25%; border-left: 1px solid black; text-align: center; font-weight: bold;">COMPLEMENTO 3</th>
        </tr>
    </thead>
    <tbody>';

$querycomplemento = "
    SELECT c.*, a.clave AS claveap8
    FROM complementos c
    INNER JOIN apendice8 a ON c.idapendice8 = a.idapendice8
    WHERE c.idpedimentoc = ?
";

$stmtcomplemento = $conexion->prepare($querycomplemento);
$stmtcomplemento->bind_param("i", $idPedimento);
$stmtcomplemento->execute();
$resultcomplemento = $stmtcomplemento->get_result();

$cuadrocomplemento = [];
if ($resultcomplemento->num_rows > 0) {
    while ($rowcomp = $resultcomplemento->fetch_assoc()) {
        $cuadrocomplemento[] = $rowcomp;
    }
} else {
    $html .= '<tr><td colspan="4" class="text-center">No se encontraron registros en el cuadro de complementos.</td></tr>';
}

if (!empty($cuadrocomplemento)) {
    foreach ($cuadrocomplemento as $rowcomp) {
        $html .= '
            <tr>
                <td style="width: 20%; border-left: 1px solid black; text-align: center;"></td>
                <td style="width: 5%; border-left: 1px solid black; text-align: center;">' . htmlspecialchars($rowcomp['claveap8']) . '</td>
                <td style="width: 25%; border-left: 1px solid black; text-align: center;">' . htmlspecialchars($rowcomp['complemento']) . '</td>
                <td style="width: 25%; border-left: 1px solid black; text-align: center;">' . htmlspecialchars($rowcomp['Complemento2']) . '</td>
                <td style="width: 25%; border-left: 1px solid black; text-align: center;">' . htmlspecialchars($rowcomp['Complemento3']) . '</td>
            </tr>';
    }
}

$html .= '
    </tbody>
</table>';
