<?php
$querytasasp = "
SELECT 
    tasapedimento.*, 
    apendice18.idapendice18, 
    apendice18.clave AS clavea18,
    apendice12.idapendice12, 
    apendice12.clave AS clavea12,
    apendice12.descripcion AS descripciona12

FROM 
    tasapedimento
INNER JOIN 
    apendice18 ON tasapedimento.idapendice18 = apendice18.idapendice18
INNER JOIN 
    apendice12 ON tasapedimento.idapendice12 = apendice12.idapendice12
WHERE 
    tasapedimento.idpedimentoc = ?
";

$stmttasasp = $conexion->prepare($querytasasp);
$stmttasasp->bind_param("i", $idPedimento);
$stmttasasp->execute();
$resulttasasp = $stmttasasp->get_result();

if ($resulttasasp->num_rows > 0) {
$html .= '
    <td style="width: 60%; vertical-align: top; margin: 0; padding: 0;">
        <table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">
            <thead>
                <tr style="background-color: #6c757d; color: #ffffff; text-align: center; margin: 0; padding: 0;">
                    <th colspan="3" style="font-weight: bold; margin: 0; padding: 0; margin: 0; padding: 0; border-left: 1px solid black; border-right: 1px solid black;">TASA NIVEL PEDIMENTO</th>
                </tr>
            </thead>
            <tbody>
                <tr style="margin: 0; padding: 0;">
                    <th style="text-align: center; font-weight: bold; margin: 0; padding: 0;margin: 0; padding: 0; border-left: 1px solid black; border-right: 1px solid black;">CONTRIB</th>
                    <th style="text-align: center; font-weight: bold; margin: 0; padding: 0;margin: 0; padding: 0; border-left: 1px solid black; border-right: 1px solid black;">CVE.T.TASA</th>
                    <th style="text-align: center; font-weight: bold; margin: 0; padding: 0;margin: 0; padding: 0; border-left: 1px solid black; border-right: 1px solid black;">TASA</th>
                </tr>';

// Iteramos a través de todos los registros de contribuciones
while ($rowtsp = $resulttasasp->fetch_assoc()) {
    $html .= '
                <tr style="margin: 0; padding: 0;">
                    <td style="text-align: center; margin: 0; padding: 0; border-left: 1px solid black;">' . htmlspecialchars($rowtsp['clavea12'].$rowtsp['descripciona12']) . '</td>
                    <td style="text-align: center; margin: 0; padding: 0; border-left: 1px solid black;">' . htmlspecialchars($rowtsp['clavea18']) . '</td>
                    <td style="text-align: center; margin: 0; padding: 0; border-left: 1px solid black;">' . htmlspecialchars($rowtsp['tasa']) . '</td>
                </tr>';
}

$html .= '
            </tbody>
        </table>
    </td>';
} else {
$html .= "<td colspan='3' style='text-align: center; margin: 0; padding: 0;'>No se encontraron registros en el cuadro de contribuciones.</td>";
}