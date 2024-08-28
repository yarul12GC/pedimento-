<?php
require_once 'vendor/autoload.php';
include_once '../../conexion.php';
include_once '../sesion.php';

class CustomPDF extends TCPDF {
    public $footerHtml = '';

    // Método para el encabezado
    public function Header() {
        // Determinar el título del encabezado basado en el número de página
        if ($this->getPage() == 1) {
            $title = 'PEDIMENTO';
        } else {
            $title = 'ANEXO DEL PEDIMENTO';
        }

        $html = '
        <table border="1" cellpadding="2" cellspacing="0" style="width: 100%; font-size: 6px; margin: 0; padding: 0;">
            <tr>
                <!-- Columna del 75% -->
                <td style="width: 75%; vertical-align: top; margin: 0; padding: 0; background-color: #6c757d; color: #ffffff; text-align: center;">' . $title . '</td>
                
                <!-- Columna del 25% -->
                <td style="width: 25%; vertical-align: top; text-align: right;">
                    Página ' . $this->getAliasNumPage() . ' de ' . $this->getAliasNbPages() . '
                </td>
            </tr>
        </table>';

        // Establecer la posición del encabezado
        $this->SetY(6); // Margen superior del encabezado

        $this->writeHTML($html, true, false, false, false, '');
    }

    // Método para el pie de página
    public function Footer() {
        // Posicionar el pie de página a 15 mm del final
        $this->SetY(-60);
        // Configuración de la fuente
        $this->SetFont('helvetica', '', 8);
        // Escribir el contenido HTML en el pie de página
        $this->writeHTML($this->footerHtml, true, false, true, false, '');
    }
}

$idPedimento = isset($_GET['id']) ? intval($_GET['id']) : 0;
$pdf = new CustomPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tu Nombre');
$pdf->SetTitle('Archivo Pedimento');
$pdf->SetSubject('Detalles del Pedimento');
$pdf->SetKeywords('TCPDF, PDF, pedimento, export');

// Establecer márgenes
$pdf->SetMargins(8, 10, 8); 
$pdf->SetAutoPageBreak(true, 60);
$pdf->setViewerPreferences(array('Zoom' => '100'));
$pdf->AddPage(); 

$html = '';



$html .= '
<table border="1" cellpadding="0" cellspacing="0" style="width: 100%; font-size: 6px;  margin: 0; padding: 0;">
    <tr>
        <td style="width: 75%; vertical-align: top; margin: 0; padding: 0;">';

        include_once '../bloque1/pdfb1.php';
        include_once '../bloque2/pdfb2.php';

$html .= '
<table border="1" cellpadding="2" cellspacing="0" style="border-collapse: collapse; font-size: 6px; width: 100%; margin: 0;">
    <tr>
        <td style="width: 45%; margin: 0;">
            <table cellpadding="2" cellspacing="0" style="border-collapse: collapse; font-size: 6px; width: 100%; margin: 0;">
                <tbody>
                    <tr style="text-align: center;">
                        <th colspan="3" style="font-weight:bold;">MEDIOS DE TRANSPORTE</th>
                    </tr>
                    <tr>
                        <th style="font-weight:bold;">ENTRADA SALIDA</th>
                        <th style="font-weight:bold;">ARRIBO</th>
                        <th style="font-weight:bold;">SALIDA</th>
                    </tr>';

                    include_once '../bloque3/pdfb3.php';
$html .= '
                </tbody>
            </table>
        </td>

        <!-- Columna 2: Valores -->
        <td style="width: 55%; margin: 0;">
            <table cellpadding="2" cellspacing="0" style="border-collapse: collapse; font-size: 6px; width: 100%; margin: 0;">
                <tbody>';

                include_once '../bloque4/pdfb4.php';


$html .= '
                </tbody>
            </table>
        </td>
    </tr>
</table>';


        include_once '../bloque5/pdfb5.php';

        include_once '../bloque6/pdfb6.php';

        include_once '../bloque7/pdfb7.php';

        include_once '../bloque8/pdfb8.php';








$html .= '
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0; border: 1px solid black;">
    <tr style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">';

    include_once '../bloque9/pdfb9.php';

// Consulta para obtener las contribuciones
    include_once '../bloque10/pdfb10.php';


// Cerramos la fila y la tabla principal
$html .= '
    </tr>
</table>';


$html .= '
<table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">
        <thead>
            <tr style="background-color: #6c757d; color: #ffffff;">
                <th colspan="14" style="text-align: center;">CUADRO DE LIQUIDACION</th>
            </tr>
        </thead>
</table>';

$html .= '
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">
    <tr>';
$html .= '
    <td style="width: 65%; vertical-align: top;">
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">
            <tbody>
                <tr>
                    <th style="text-align: center; margin: 0; padding: 0; font-weight: bold;">CONCEPTO</th>
                    <th style="text-align: center; margin: 0; padding: 0; border-left: 1px solid black; font-weight: bold;">F.P.</th>
                    <th style="text-align: center; margin: 0; padding: 0; border-left: 1px solid black; font-weight: bold;">IMPORTE</th>
                    <th style="text-align: center; margin: 0; padding: 0; border-left: 1px solid black; font-weight: bold;">CONCEPTO</th>
                    <th style="text-align: center; margin: 0; padding: 0; border-left: 1px solid black; font-weight: bold;">F.P.</th>
                    <th style="text-align: center; margin: 0; padding: 0; border-left: 1px solid black; font-weight: bold;">IMPORTE</th>
                </tr>';

            include_once '../bloque11/pdfb11.php';

$html .= '
            </tbody>
        </table>
    </td>';


$html .= '
       <td style="width: 35%; vertical-align: top;">';

        include_once '../bloque12/pdfb12.php';

$html .= ' </td>
    </tr>
</table>';


$html .= '</td>

        <!-- Columna del 20% -->
        <td style="width: 25%; vertical-align: top;">
        </td>
    </tr>
</table>';




$html .= '
<table border="1" cellpadding="0" cellspacing="0" style="width: 100%; font-size: 6px;  margin: 0; padding: 0;">
    <tr>
        <td style="width: 75%; vertical-align: top; margin: 0; padding: 0;">';

$html .= '
<table border="0" cellpadding="1" cellspacing="0" style="border: 1px solid black; border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">

<thead>
    <tr style="background-color: #6c757d; color: #ffffff;">
        <th style="text-align: center;">DEPÓSITO REFERENCIADO - LÍNEA DE CAPTURA</th>
     </tr>
 </thead>
</table>';

include_once '../bloque13/pdfb13.php';

$html .= '</td>

        <!-- Columna del 20% -->
        <td style="width: 25%; vertical-align: top;">
        </td>
    </tr>
</table>';

include_once '../bloque14/pdfb14.php';

include_once '../bloque15/pdfb15.php';

include_once '../bloque16/pdfb16.php';

include_once '../bloque17/pdfb17.php';

include_once '../bloque18/pdfb18.php';



$html .= '
<table border="0" cellpadding="2" cellspacing="0" style="border: 1px solid black; border-collapse: collapse; width: 100%; font-size: 6px; margin: 0; padding: 0;">
    <thead>
        <tr style="background-color: #6c757d; color: #ffffff;">
            <th style="text-align: center;">PARTIDAS</th>
         </tr>
     </thead>
</table>';

include_once '../bloque19/consultap.php';


// Generar contenido del PDF
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


                        include_once '../bloque20/pdfb20.php';
                        include_once '../bloque21/pdfb21.php';
                        include_once '../bloque22/pdfb22.php';

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
            <td colspan="1" style="border-left: 1px solid black; text-align: center;">' . htmlspecialchars($rowPermisos['idapendice9']) . '</td>
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
            <td colspan="2" style="text-align: center;border-left: 1px solid black;">' . htmlspecialchars($rowcomplementos['idapendice8']) . '</td>
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
            <td style="border-left: 1px solid black; text-align: center;">' . htmlspecialchars($rowocontribuciones['idapendice12']) . '</td>
            <td style="border-left: 1px solid black; text-align: center;">' . htmlspecialchars($rowocontribuciones['tasa']) . '</td>
            <td style="border-left: 1px solid black; text-align: center;">' . htmlspecialchars($rowocontribuciones['idapendice18']) . '</td>
            <td style="border-left: 1px solid black; text-align: center;">' . htmlspecialchars($rowocontribuciones['idapendice13']) . '</td>
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

$html .= '
        <p style=" text-align: center; font-size: 8px;"><strong>******************* FIN DEL PEDIMENTO *******************</strong></p>

';

include_once '../bloque29/pdffother.php';


// Asignar el contenido del pie de página

$pdf->footerHtml = $htmlFooter;
// Añadir contenido HTML al PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Salida del PDF
$pdf->Output('archivo_pedimento.pdf', 'I');
