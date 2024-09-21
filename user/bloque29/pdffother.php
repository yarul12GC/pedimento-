<?php
$htmlFooter = '
<table border="1" cellpadding="1" cellspacing="0" style="border: 1px solid black; border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">
    <tbody>
   
       <tr>
        <td style="width: 60%; vertical-align: top;"> ';
$queryagente = "SELECT 
        p.*, 
        a.nombreagente, 
        a.apellidoP, 
        a.apellidoM, 
        a.curp, 
        a.rfc, 
        a.nacionalidad, 
        a.tipo_domicilio, 
        a.estado, 
        a.localidad, 
        a.codigo_postal, 
        a.patente
    FROM 
        pedimentocompleto p
    INNER JOIN 
        agenteaduanal a 
    ON 
        p.idagente = a.idagente
    WHERE 
        p.idpedimentoc = ?;";

$stmtagente = $conexion->prepare($queryagente);
$stmtagente->bind_param("i", $idPedimento);
$stmtagente->execute();
$resultagente = $stmtagente->get_result();

if ($resultagente->num_rows > 0) {
    while ($rowagente = $resultagente->fetch_assoc()) {

        $htmlFooter .= '
        <table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">
                                <thead>
                                    <tr>
                                        <th colspan="6" style=" font-weight: bold; text-align: center;">
                                            AGENTE ADUANAL, APODERADO ADUANAL O EL ALMACÉN
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th colspan="3" style=" font-weight: bold;">NOMBRE O RAZ. SOC.</th>
                                        <td colspan="3">' . htmlspecialchars($rowagente['nombreagente']) . '</td>
                                    </tr>
                                    <tr>
                                        <th style=" font-weight: bold; width: 8%;">RFC</th>
                                        <td style=" width: 25%;">' . htmlspecialchars($rowagente['rfc']) . '</td>
                                        <th style=" font-weight: bold; width: 8%;">RFC</th>
                                        <td style=" width: 25%;">' . htmlspecialchars($rowagente['rfc']) . '</td>
                                        <th style=" font-weight: bold; width: 8%;">CURP</th>
                                        <td style=" width: 26%;">' . htmlspecialchars($rowagente['curp']) . '</td>
                                    </tr>
                                    <tr>
                                        <th colspan="6" class="text-center bg-secondary text-light" style=" font-weight: bold;">
                                            MANDATARIO / PERSONA AUTORIZADA
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="2" style=" font-weight: bold;">NOMBRE</th>
                                        <td colspan="4">' . htmlspecialchars($rowagente['nombreagente']) . '</td>
                                    </tr>
                                    <tr>
                                        <th style=" font-weight: bold;">RFC</th>
                                        <td colspan="2">' . htmlspecialchars($rowagente['rfc']) . '</td>
                                        <th style=" font-weight: bold;">CURP</th>
                                        <td colspan="2">' . htmlspecialchars($rowagente['curp']) . '</td>
                                    </tr>

                                </tbody>
                            </table>
        </td>';

        $htmlFooter .= '<td style="width: 40%; vertical-align: top;">

        <table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">
                                <thead>
                                    <tr>
                                        <th style=" font-weight: bold;">DECLARO BAJO PROTESTA DE DECIR VERDAD, EN LOS TÉRMINOS DE LO DISPUESTO POR EL ARTÍCULO 81 DE LA LEY ADUANERA
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th colspan="3">PATENTE O AUTORIZACIÓN:</th>
                                    </tr>
                                    <tr>
                                        <td colspan="3" >
                                            ' . htmlspecialchars($rowagente['patente']) . '
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
</table>';
    }
} else {
    echo "<p class='text-center'>No se encontraron registros del agente aduanal.</p>";
}

$htmlFooter .= '
<table border="0" cellpadding="0" cellspacing="0" style="border: 1px solid black; border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">
    <tbody>
       
       <tbody>
                    <tr>
                        <td>

                            <p>El pago de las contribuciones puede realizarse mediante el servicio de “Pago
                                Electrónico Centralizado Aduanero” (PECA), conforme a lo establecido en la Regla
                                1.6.2. de las Reglas Generales de Comercio Exterior
                                , con la posibilidad de que la cuenta bancaria del Importador-Exportador sea
                                afectada directamente por el Banco. El agente o apoderado aduanal que utilice el
                                servicio de PECA, deberá imprimir la
                                certificación bancaria en el campo correspondiente del pedimento o en el
                                documento oficial, conforme al Apéndice 20 “Certificación de Pago Electrónico
                                Centralizado” del Anexo 22 de las RCGMCE.
                            </p>
                            <p>
                                El Importador-Exportador podrá solicitar la certificación de la información
                                contenida en este pedimento en: Administración General de Aduanas,
                                Administración de Operación Aduanera “7”, Av. Hidalgo Núm. 77,
                                Módulo IV, P.B., Col. Guerrero, C.P. 06300., México, D.F.
                            </p>

                        </td>
                    </tr>
                </tbody>
    </tbody>
</table>';

