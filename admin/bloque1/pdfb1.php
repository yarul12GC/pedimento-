<?php 
$querydpm =  " SELECT dp.*, a2.clave AS clave_apendice2, a16.clave AS clave_apendice16
FROM dpedimento dp
INNER JOIN apendice2 a2 ON dp.idapendice2 = a2.idapendice2
INNER JOIN apendice16 a16 ON dp.idapendice16 = a16.idapendice16
WHERE idpedimentoc = ?";
$stmtdpm = $conexion->prepare($querydpm);
$stmtdpm->bind_param("i", $idPedimento);
$stmtdpm->execute();
$resultdpm = $stmtdpm->get_result();

if ($resultdpm->num_rows > 0) {
$datodpm = $resultdpm->fetch_assoc();
$html .= '
<table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; border-top: 1px solid black; border-bottom: 1px solid black;">
<tr>
<th style="font-weight: bold; width: 14%;">NUM.PEDIMENTO</th>
<td style="width: 14%;">' . htmlspecialchars($datodpm['Nopedimento']) . '</td>
<th style="font-weight: bold; width: 7%;">T.OPER</th>
<td style="width: 6%;">' . htmlspecialchars($datodpm['Toper']) . '</td>
<th style="font-weight: bold; width: 14%;">CVE PEDIMENTO</th>
<td style="width: 17%;">' . htmlspecialchars($datodpm['clave_apendice2']) . '</td>
<th style="font-weight: bold; width: 10%;">REGIMEN</th>
<td style="width: 18%;">' . htmlspecialchars($datodpm['clave_apendice16']) . '</td>
</tr>
</table>';
} else {
$html .= '<p>No se encontraron registros en el cuadro de datos del pedimento.</p>';
}

