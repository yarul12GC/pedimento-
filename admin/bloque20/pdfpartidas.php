<?php
foreach ($secciones as $idSeccion => $data) {
    $cuadropart1 = $data['partida1'] ?? [];
    $cuadropart2 = $data['partida2'] ?? [];
    $cuadropart3 = $data['partida3'] ?? [];
    $cuadropermisop4 = $data['permisos'] ?? [];
    $cuadrocomplementos = $data['complementos'] ?? [];
    $cuadroobservaciones = $data['observaciones'] ?? [];
    $cuadrocontribuciones = $data['contribuciones'] ?? [];
    $html .= '
<table cellpadding="0" cellspacing="0" style="width: 100%; font-size: 6px; margin: 0; padding: 0; border-collapse: collapse; border: 1px solid black;">
    <tbody>
        <tr>
            <td style="width: 5%; vertical-align: top; margin: 0; padding: 0;">';
    $html .= '
    <table border="0" cellpadding="2" cellspacing="0" style="width: 100%; font-size: 6px; margin: 0; padding: 0; border-collapse: collapse;">
            <tr>
                <th style="text-align: center; font-weight: bold;"></th>
            </tr>
            <tr>
                <th style="text-align: center; font-weight: bold;">SEC</th>
            </tr>
            <tr>
                <th style="text-align: center; font-weight: bold;"></th>
            </tr>
            <tr>
                <th style="text-align: center; font-weight: bold;">' . $idSeccion . '</th>
            </tr>
        </table>';
    $html .= '</td>
            <td style="width: 65%; vertical-align: top; margin: 0; padding: 0;">
                <table border="0" cellpadding="3" cellspacing="0" style="border: 1px solid black;">
                    <tbody>
                        <tr>
                            <th style="border: 1px solid black; text-align: center; font-weight: bold;">FRACCION</th>
                            <th style="border: 1px solid black; text-align: center; font-weight: bold;">SUBD./NICO</th>
                            <th style="border: 1px solid black; text-align: center; font-weight: bold;">VINC</th>
                            <th style="border: 1px solid black; text-align: center; font-weight: bold;">MET VAL</th>
                            <th style="border: 1px solid black; text-align: center; font-weight: bold;">UMC</th>
                            <th style="border: 1px solid black; text-align: center; font-weight: bold;">CANT UMC</th>
                            <th style="border: 1px solid black; text-align: center; font-weight: bold;">UMT</th>
                            <th style="border: 1px solid black; text-align: center; font-weight: bold;">CANT UMT</th>
                            <th style="border: 1px solid black; text-align: center; font-weight: bold;">P.V/C</th>
                            <th style="border: 1px solid black; text-align: center; font-weight: bold;">P.O/D</th>
                        </tr>
                        <tr>
                            <th class="text-center" colspan="10" style="text-align: center; font-weight: bold; border-top: 1px solid black; border-bottom: 1px solid black;">IDENTIF</th>
                        </tr>
                        <tr>
                            <th colspan="3" style="border: 1px solid black; text-align: center; font-weight: bold;">VAL.ADU./USD</th>
                            <th colspan="2" style="border: 1px solid black; text-align: center; font-weight: bold;">IMP.PRECIO PAG.</th>
                            <th colspan="2" style="border: 1px solid black; text-align: center; font-weight: bold;">PRECIO UNIT.</th>
                            <th colspan="3" style="border: 1px solid black; text-align: center; font-weight: bold;">VAL. AGREG.</th>
                        </tr>';


                        foreach ($cuadropart1 as $sectionData) {
                            $html .= '<tr>
                                        <td style="border: 1px solid black;text-align: center;">' . htmlspecialchars($sectionData['fraccionA']) . '</td>
                                        <td style="border: 1px solid black; text-align: center;">' . htmlspecialchars($sectionData['nico']) . '</td>
                                        <td style="border: 1px solid black; text-align: center;">' . htmlspecialchars($sectionData['vinc']) . '</td>
                                        <td style="border: 1px solid black; text-align: center;">' . htmlspecialchars($sectionData['claveapp11']) . '</td>
                                        <td style="border: 1px solid black; text-align: center;">' . htmlspecialchars($sectionData['umc']) . '</td>
                                        <td style="border: 1px solid black; text-align: center;">' . htmlspecialchars($sectionData['cantumc']) . '</td>
                                        <td style="border: 1px solid black; text-align: center;">' . htmlspecialchars($sectionData['umt']) . '</td>
                                        <td style="border: 1px solid black; text-align: center;">' . htmlspecialchars($sectionData['cant']) . '</td>
                                        <td style="border: 1px solid black; text-align: center;">' . htmlspecialchars($sectionData['claveapp4']) . '</td>
                                        <td style="border: 1px solid black; text-align: center;">' . htmlspecialchars($sectionData['pod']) . '</td>
                                      </tr>';
                        }


                        if (!empty($cuadropart2)) {
                            foreach ($cuadropart2 as $rowPart2) {
                                $html .= '
                                <tr>
                                    <td colspan="10" style="border: 1px solid black;">' . htmlspecialchars($rowPart2['descripcion']) . '</td>
                                </tr>';
                            }
                        } else {
                            $html .= '
                            <tr>
                                <td colspan="10" style="text-align: center; border: 1px solid black;">No hay datos disponibles</td>
                            </tr>';
                        }    
                        
                        
                        
                        if (!empty($cuadropart3)) {
                            foreach ($cuadropart3 as $rowPart3) {
                                $html .= '
                                <tr>
                                    <td colspan="3" style="border: 1px solid black; text-align: center;">' . htmlspecialchars($rowPart3['valaduusd']) . '</td>
                                    <td colspan="2" style="border: 1px solid black; text-align: center;">' . htmlspecialchars($rowPart3['imppreciopag']) . '</td>
                                    <td colspan="2" style="border: 1px solid black; text-align: center;">' . htmlspecialchars($rowPart3['preciounitario']) . '</td>
                                    <td colspan="3" style="border: 1px solid black; text-align: center;">' . htmlspecialchars($rowPart3['valoragregado']) . '</td>
                                </tr>';
                            }
                        } else {
                            $html .= '
                            <tr>
                                <td colspan="10" style="border: 1px solid black; text-align: center;">No se encontraron descripciones en partida3.</td>
                            </tr>';
                        }
    $html .= '</tbody>
            </table>';

    $html .= '
    <table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; text-align: center;">
    <thead>
        <tr>
            <th colspan="1" style="border-left: 1px solid black; text-align: center; font-weight: bold;">PERMISO</th>
            <th colspan="3" style="border-left: 1px solid black; text-align: center; font-weight: bold;">NUMERO DE PERMISO</th>
            <th colspan="2" style="border-left: 1px solid black; text-align: center; font-weight: bold;">FIRMA DE PERMISO</th>
            <th colspan="2" style="border-left: 1px solid black; text-align: center; font-weight: bold;">VAL. COM. DLS</th>
            <th colspan="2" style="border-left: 1px solid black; text-align: center; border-right: 1px solid black;  font-weight: bold;">CANTIDAD UMT</th>
        </tr>
    </thead>
    <tbody>';

    if (!empty($cuadropermisop4)) {
        foreach ($cuadropermisop4 as $rowPermisos) {
            $html .= '
        <tr>
            <td colspan="1" style="border-left: 1px solid black; text-align: center;">' . htmlspecialchars($rowPermisos['claveapendice9']) . '</td>
            <td colspan="3" style="border-left: 1px solid black; text-align: center;">' . htmlspecialchars($rowPermisos['numpermiso']) . '</td>
            <td colspan="2" style="border-left: 1px solid black; text-align: center;">' . htmlspecialchars($rowPermisos['firmapermiso']) . '</td>
            <td colspan="2" style="border-left: 1px solid black; text-align: center;">' . htmlspecialchars($rowPermisos['valcomdls']) . '</td>
            <td colspan="2" style="border-left: 1px solid black; text-align: center; border-right: 1px solid black; ">' . htmlspecialchars($rowPermisos['cantidadumt']) . '</td>
        </tr>';
        }
    } else {
        $html .= '
    <tr>
        <td colspan="10" style="border: 1px solid black; text-align: center;">No se encontraron permisos</td>
    </tr>';
    }

    $html .= '
    </tbody>
</table>';

    // Genera la tabla para los complementos
    $html .= '
    <table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; text-align: center;">
    <thead>
        <tr>
            <th colspan="2" style="text-align: center; border-left: 1px solid black; border-top: 1px solid black;  font-weight: bold;">IDENTIF</th>
            <th colspan="3" style="text-align: center; border-left: 1px solid black; border-top: 1px solid black;  font-weight: bold;">COMPLEMENTO 1</th>
            <th colspan="2" style="text-align: center; border-left: 1px solid black; border-top: 1px solid black;  font-weight: bold;">COMPLEMENTO 2</th>
            <th colspan="3" style="text-align: center; border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black;  font-weight: bold;">COMPLEMENTO 3</th>
        </tr>
    </thead>
    <tbody>';

    if (!empty($cuadrocomplementos)) {
        foreach ($cuadrocomplementos as $rowcomplementos) {
            $html .= '
        <tr>
            <td colspan="2" style="text-align: center;border-left: 1px solid black;">' . htmlspecialchars($rowcomplementos['claveapendice8p']) . '</td>
            <td colspan="3" style="text-align: center;border-left: 1px solid black;">' . htmlspecialchars($rowcomplementos['complemento1']) . '</td>
            <td colspan="2" style="text-align: center;border-left: 1px solid black;">' . htmlspecialchars($rowcomplementos['complemento2']) . '</td>
            <td colspan="3" style="text-align: center;border-left: 1px solid black; border-right: 1px solid black;">' . htmlspecialchars($rowcomplementos['complemento3']) . '</td>
        </tr>';
        }
    } else {
        $html .= '
    <tr>
        <td colspan="10" style="border: 1px solid black; text-align: center;">No se encontraron complementos</td>
    </tr>';
    }

    $html .= '
    </tbody>
</table>';

    // Genera la tabla para las observaciones
    $html .= '
    <table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; ">
        <thead>
            <tr>
                <th colspan="10" style="border: 1px solid black; border-bottom: none; background-color: #6c757d; color: #ffffff; text-align: center;" >OBSERVACIONES A NIVEL PARTIDA</th>
            </tr>
        </thead>
        <tbody>';

    if (!empty($cuadroobservaciones)) {
        foreach ($cuadroobservaciones as $rowobservacionesnp) {
            $html .= '
            <tr>
                <td colspan="10" style="border-left: 1px solid black; border-right: 1px solid black; ">' . htmlspecialchars($rowobservacionesnp['descripcionnp']) . '</td>
            </tr>';
        }
    } else {
        $html .= '
        <tr>
            <td colspan="10" style="border-left: 1px solid black; border-right: 1px solid black; ">No se encontraron observaciones</td>
        </tr>';
    }

    $html .= '
        </tbody>
    </table>';


    $html .= '</td>';

    $html .= '
                <td style="width: 30%; vertical-align: top; margin: 0; padding: 0;">';

    $html .= '
<table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; text-align: center; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;">
    <thead>
    
        <tr  >
            <th style="border-left: 1px solid black; border-top: 1px solid black; height:21; width: 20%;"></th>
            <th style="border-left: 1px solid black; border-top: 1px solid black; height:21; width: 20%;"></th>
            <th style="border-left: 1px solid black; border-top: 1px solid black; height:21; width: 10%;"></th>
            <th style="border-left: 1px solid black; border-top: 1px solid black; height:21; width: 10%;"></th>
            <th style="border-left: 1px solid black; border-top: 1px solid black; height:21; width: 40%;"></th>
        </tr>
        
        <tr>
            <th style="border-left: 1px solid black; border-top: 1px solid black; width: 20%;">CON</th>
            <th style="border-left: 1px solid black; border-top: 1px solid black; width: 20%;">TASA</th>
            <th style="border-left: 1px solid black; border-top: 1px solid black; width: 10%;">T.T.</th>
            <th style="border-left: 1px solid black; border-top: 1px solid black; width: 10%;">F.P.</th>
            <th style="border-left: 1px solid black; border-top: 1px solid black; width: 40%;">IMPORTE</th>
        </tr>

         <tr>
            <th style="border-left: 1px solid black; border-top: 1px solid black; height:21; border-bottom: 1px solid black;"></th>
            <th style="border-left: 1px solid black; border-top: 1px solid black; height:21; border-bottom: 1px solid black;"></th>
            <th style="border-left: 1px solid black; border-top: 1px solid black; height:21; border-bottom: 1px solid black;"></th>
            <th style="border-left: 1px solid black; border-top: 1px solid black; height:21; border-bottom: 1px solid black;"></th>
            <th style="border-left: 1px solid black; border-top: 1px solid black; height:21; border-bottom: 1px solid black;"></th>
        </tr>

    </thead>
    <tbody>';

    if (!empty($cuadrocontribuciones)) {
        foreach ($cuadrocontribuciones as $rowocontribuciones) {
            $html .= '
        <tr>
            <td style="border-left: 1px solid black; text-align: center;">' . htmlspecialchars($rowocontribuciones['claveapendice12p']) . '</td>
            <td style="border-left: 1px solid black; text-align: center;">' . htmlspecialchars($rowocontribuciones['tasa']) . '</td>
            <td style="border-left: 1px solid black; text-align: center;">' . htmlspecialchars($rowocontribuciones['claveapendice18p']) . '</td>
            <td style="border-left: 1px solid black; text-align: center;">' . htmlspecialchars($rowocontribuciones['claveapendice13p']) . '</td>
            <td style="border-left: 1px solid black; text-align: center; ">$' . htmlspecialchars($rowocontribuciones['importe']) . '</td>
        </tr>';
        }
    } else {
        $html .= '
    <tr>
        <td colspan="5" style="border-left: 1px solid black; border-top: 1px solid black; text-align: center;">No se encontraron complementos</td>
    </tr>';
    }

    $html .= '
    </tbody>
</table>';


    $html .= '</td>
    </tr>
</tbody>
</table>';
}
