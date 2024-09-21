<?php

$querydmonetarios = " SELECT dmonetarios.numfactura, 
                dmonetarios.fecha, 
                a14.clave AS claveapn14, 
                a5.clave AS claveapn5, 
                dmonetarios.valmonfact, 
                dmonetarios.factormonfact, 
                dmonetarios.valdolares
                FROM dmonetarios 
                INNER JOIN apendice14 a14 ON dmonetarios.idapendice14 = a14.idapendice14
                INNER JOIN apendice5 a5 ON dmonetarios.idapendice5 = a5.idapendice5
                WHERE idpedimentoc = ?";

$stmtdmonetarios = $conexion->prepare($querydmonetarios);
$stmtdmonetarios->bind_param("i", $idPedimento);
$stmtdmonetarios->execute();
$resultdmonetarios = $stmtdmonetarios->get_result();
if ($resultdmonetarios->num_rows > 0) {
    $rowdm = $resultdmonetarios->fetch_assoc();
    $fecha_formateada = date("d-m-Y", strtotime($rowdm['fecha']));

    $html .= '
<table border="0" cellpadding="1" cellspacing="0" style="border: 1px solid black; border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">
    <thead>
        <tr>
                        <th style="width: 28%;  text-align: center; font-weight: bold;border-left: 1px solid black;">NUM. CFDI O DOCUMENTO EQUIVALENTE</th>
                        <th  style="width: 12%; text-align: center; font-weight: bold; border-left: 1px solid black;">FECHA</th>
                        <th style="width: 12%;  text-align: center; font-weight: bold;border-left: 1px solid black;">INCOTERM</th>
                        <th style="width: 12%;  text-align: center; font-weight: bold;border-left: 1px solid black;">MONEDA</th>
                        <th style="width: 12%;  text-align: center; font-weight: bold;border-left: 1px solid black;">VAL.MON.FACT</th>
                        <th style="width: 12%;  text-align: center; font-weight: bold;border-left: 1px solid black;">FACTOR MON. FACT</th>
                        <th style="width: 12%;  text-align: center; font-weight: bold;border-left: 1px solid black;">VAL. DOLARES</th>

                    </tr>
    </thead>
    <tbody>
       
      <tr>
                        <td style="width: 28%;  border-left: 1px solid black;" > ' . htmlspecialchars($rowdm['numfactura']) . '</td>
                        <td style="width: 12%; text-align: center; border-left: 1px solid black;" >' . htmlspecialchars($fecha_formateada) . '</td>
                        <td style="width: 12%; text-align: center; border-left: 1px solid black;" >' . htmlspecialchars($rowdm['claveapn14']) . '</td>
                        <td style="width: 12%; text-align: center; border-left: 1px solid black;" >' . htmlspecialchars($rowdm['claveapn5']) . '</td>
                        <td style="width: 12%; text-align: center; border-left: 1px solid black;" >' . htmlspecialchars($rowdm['valmonfact']) . '</td>
                        <td style="width: 12%; text-align: center; border-left: 1px solid black;" >' . htmlspecialchars($rowdm['factormonfact']) . '</td>
                        <td style="width: 12%; text-align: center; border-left: 1px solid black;" >' . htmlspecialchars($rowdm['valdolares']) . '</td>
                    </tr>
    </tbody>
</table>';
} else {
    echo "<tr><td colspan='3' class='text-center'>No se encontraron registros en los datos monetarios</td></tr>";
}
