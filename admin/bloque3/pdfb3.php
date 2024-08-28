<?php
$querytransp = "SELECT t.*, a1.clave AS clave_entrtadaSalida, a2.clave AS clave_arribo, a3.clave AS clave_salida
FROM transporte t
INNER JOIN apendice3 a1 ON t.idapendice3entrtadaSalida = a1.idapendice3
INNER JOIN apendice3 a2 ON t.idapendice3arribo = a2.idapendice3
INNER JOIN apendice3 a3 ON t.idapendice3salida = a3.idapendice3
WHERE idpedimentoc = ?";
$stmttransp = $conexion->prepare($querytransp);
$stmttransp->bind_param("i", $idPedimento);
$stmttransp->execute();
$resulttransp = $stmttransp->get_result();

if ($resulttransp->num_rows > 0) {
$datostrnsp = $resulttransp->fetch_assoc();
$html .= '
    <tr>
        <td>' . htmlspecialchars($datostrnsp['clave_entrtadaSalida']) . '</td>
        <td>' . htmlspecialchars($datostrnsp['clave_arribo']) . '</td>
        <td>' . htmlspecialchars($datostrnsp['clave_salida']) . '</td>
    </tr>';
} else {
$html .= '<tr><td colspan="3" style="text-align:center;">No se encontraron registros en el cuadro de medios de transporte.</td></tr>';
}