<?php
$queryimpoex =  "SELECT * FROM importadorexportador WHERE idpedimentoc = ?";
$stmtimpoex = $conexion->prepare($queryimpoex);
$stmtimpoex->bind_param("i", $idPedimento);
$stmtimpoex->execute();
$resultimpoex = $stmtimpoex->get_result();

if ($resultimpoex->num_rows > 0) {
    $datosimport = $resultimpoex->fetch_assoc();
    $html .= '
<table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; border-top: 1px solid black; border-bottom: 1px solid black;">
        <thead>
            <tr style="background-color: #6c757d; color: #ffffff;">
                <th colspan="14" style="text-align: center;">DATOS DEL IMPORTADOR / EXPORTADOR</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th style="font-weight:bold;">RFC:</th>
                <td colspan="3">' . htmlspecialchars($datosimport['rfc']) . '</td>
                <th colspan="5" style="font-weight:bold;">NOMBRE, DENOMINACION O RAZON SOCIAL:</th>
                <td colspan="5">' . htmlspecialchars($datosimport['nombreE']) . '</td>
            </tr>
           
            <tr>
                <th style="font-weight:bold;">CURP:</th>
                <td colspan="13">' . htmlspecialchars($datosimport['curp']) . '</td>
            </tr>
            <tr>
             <td colspan="14">
                <strong>DOMICILIO:</strong><strong>AVE.</strong> ' . htmlspecialchars($datosimport['Calle']) . '
                <strong>No. Ext</strong>' . htmlspecialchars($datosimport['numeroExterior']) . '
                <strong>No. Int:</strong> ' . htmlspecialchars($datosimport['numeroInterior']) . '
                <strong>C.P:</strong> ' . htmlspecialchars($datosimport['codigoPostal']) . '
                <strong>MUNICIPIO:</strong> ' . htmlspecialchars($datosimport['municipio']) . '
                <strong>ENTIDAD FEDERATIVA:</strong> ' . htmlspecialchars($datosimport['entidadfederativa']) . '
                <strong>PAIS:</strong> ' . htmlspecialchars($datosimport['pais']) . '
             </td>
            </tr>
        </tbody>
    </table>';
} else {
    $html .= '<p>No se encontraron registros en el cuadro de importador o exportador.</p>';
}
