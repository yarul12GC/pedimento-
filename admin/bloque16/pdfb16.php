<?php

$html .= '
<table border="1" cellpadding="1" cellspacing="0" style="border: 1px solid black; border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">
    <thead>
        <tr style="background-color: #6c757d; ">
            <th style="text-align: center; color: #ffffff;">TRANPORTE:</th>
            <th style="text-align: center; color: #ffffff;">IDENTIFICACION:</th>
            <th style="text-align: left; ">THLinternational E.C.</th>
            <th style="text-align: center; ">AEREO</th>
            <th style="text-align: center; color: #ffffff;">PAIS:</th>
            <th style="text-align: center; ">USA</th>
        </tr>
        
        <tr>
        <td colspan="5">TRANSPORTISTA</td>
        <td colspan="1">RFC</td>
        </tr>

        <tr>
            <td >CURP</td>
            <td ></td>
            <td colspan="4">COMICILIO/CIUDAD/ESTADO</td>
        </tr>
        <tr>
            <td colspan="2">NUMERO DE CANDADO</td>
            <td colspan="4">FX30850000</td>
        </tr>
    </thead>
    <tbody>
       
    </tbody>
</table>';


$querydembar = "SELECT * FROM dembarque WHERE idpedimentoc = ?";

$stmtdembar = $conexion->prepare($querydembar);
$stmtdembar->bind_param("i", $idPedimento);
$stmtdembar->execute();
$resultdembar = $stmtdembar->get_result();

if ($resultdembar->num_rows > 0) {
    $rowemb = $resultdembar->fetch_assoc();
    $html .= '
<table border="0" cellpadding="1" cellspacing="0" style="border: 1px solid black; border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">
    <tbody>
       
      <tr>
                        <th style="background-color: #6c757d;  width: 30%; color: #ffffff; font-weight: bold;" >NUMERO (GUIA/ORDEN EMBARQUE)/ID:</th>
                        <td style="width: 30%; ">' .  htmlspecialchars($rowemb['numeroembarque']) . '</td>

                        <th style="width: 10%; font-weight: bold;">M</th>
                        <td style="width: 10%; ">' .  htmlspecialchars($rowemb['nconocimiento']) . '</td>

                        <th style="width: 10%; font-weight: bold;">H</th>
                        <td style="width: 10%; ">' .  htmlspecialchars($rowemb['nhouse']) . '</td>

                    </tr>
    </tbody>
</table>';
} else {
    echo "<tr><td colspan='3' class='text-center'>No se encontraron registros en los datos monetarios</td></tr>";
}
