<?php

$html .= '
<table border="0" cellpadding="2" cellspacing="0" style="border: 1px solid black; border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">

<thead>
    <tr style="background-color: #6c757d; color: #ffffff;">
        <th style="text-align: center;">OBSERVACIONES</th>
     </tr>
 </thead>
 

<tbody>';
$querycomplemento = "SELECT * FROM observaciones WHERE idpedimentoc = ?";

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
    echo '<p>No se encontraron OBSERVACIONES.</p>';
}

if (!empty($cuadrocomplemento)) {
    foreach ($cuadrocomplemento as $rowcomp) {

        $html .= '
    <tr>
        <td>' . htmlspecialchars($rowcomp['descripcion']) . '</td>
    </tr>';
    }
} else {
    echo "<tr><td>No se encontraron registros en el cuadro de OBSERVACIONES.</td></tr>";
}

$html .= '</tbody> </table>';