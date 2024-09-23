<?php
require_once 'vendor/autoload.php';
include_once '../../conexion.php';
include_once '../sesion.php';

class CustomPDF extends TCPDF
{
    public $footerHtml = '';

    // Método para el encabezado
    public function Header()
    {
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
    public function Footer()
    {
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

//  márgenes
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
$html .= '</tbody>
            </table>
        </td>

        <!-- Columna 2: Valores -->
        <td style="width: 55%; margin: 0;">
            <table cellpadding="2" cellspacing="0" style="border-collapse: collapse; font-size: 6px; width: 100%; margin: 0;">
                <tbody>';

include_once '../bloque4/pdfb4.php';


$html .= '</tbody>
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

include_once '../bloque10/pdfb10.php';
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
        <td style="width: 25%; vertical-align: top;">';

        include_once '../bloque30/qrpdf.php';

       $html.= '</td>
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

include_once '../bloque20/pdfpartidas.php';
$html .= '<p style=" text-align: center; font-size: 8px;"><strong>******************* FIN DEL PEDIMENTO *******************</strong></p>';

include_once '../bloque29/pdffother.php';
$pdf->footerHtml = $htmlFooter;
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('archivo_pedimento.pdf', 'I');
